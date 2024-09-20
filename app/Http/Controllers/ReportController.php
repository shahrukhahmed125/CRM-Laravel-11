<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Interaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'admin')
        {

            //customers interactions data for line chart
    
            $interactions = DB::table('interactions')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();
        
            $dates = $interactions->pluck('date');
            $counts = $interactions->pluck('count');
    
            $interactions = Interaction::with('customer', 'user')
            ->selectRaw('customer_id, COUNT(id) as total_interactions')
            ->groupBy('customer_id')
            ->get();
    
            // sales data for bar chart
    
            $salesData = DB::table('deals')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(deal_value) as total_value'))
            ->groupBy('date')
            ->get();
    
            $sales = Deal::with('pipeline', 'customer', 'user')
            ->selectRaw('user_id, COUNT(id) as total_deals, SUM(deal_value) as total_value')
            ->groupBy('user_id')
            ->get();
    
            return view('admin.reports.index', compact('dates', 'counts', 'interactions', 'salesData', 'sales'));
        }
        elseif($user->role == 'sales')
        {

            
            //customers interactions data for line chart
    
            $interactions = DB::table('interactions')
            ->join('users', 'interactions.user_id', '=', 'users.id') // Join with users table
            ->select(DB::raw('DATE(interactions.created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('users.role', '=', 'sales') // Filter for 'sales' role
            ->groupBy(DB::raw('DATE(interactions.created_at)'))
            ->get();
        
            $dates = $interactions->pluck('date');
            $counts = $interactions->pluck('count');
        
            // Fetch interaction counts grouped by customer for users with the role 'sales'
            $interactions = Interaction::with('customer', 'user')
            ->join('users', 'interactions.user_id', '=', 'users.id') // Join with users table
            ->selectRaw('customer_id, COUNT(interactions.id) as total_interactions')
            ->where('users.role', '=', 'sales') // Filter for 'sales' role
            ->groupBy('customer_id')
            ->get();
    
            // sales data for bar chart
    
            $salesData = DB::table('deals')
            ->join('users', 'deals.user_id', '=', 'users.id') // Join with users table
            ->select(DB::raw('DATE(deals.created_at) as date'), DB::raw('SUM(deal_value) as total_value'))
            ->where('users.role', '=', 'sales') // Filter for 'sales' role
            ->groupBy('date')
            ->get();
        
            // Fetch sales data grouped by user for users with the role 'sales'
            $sales = Deal::with('pipeline', 'customer', 'user')
            ->join('users', 'deals.user_id', '=', 'users.id') // Join with users table
            ->selectRaw('users.id as user_id, COUNT(deals.id) as total_deals, SUM(deal_value) as total_value')
            ->where('users.role', '=', 'sales') // Filter for 'sales' role
            ->groupBy('users.id') // Group by user ID
            ->get();
    
            return view('sales.reports.index', compact('dates', 'counts', 'interactions', 'salesData', 'sales'));

        }
        elseif($user->role == 'support')
        {

            
            //customers interactions data for line chart
    
            $interactions = DB::table('interactions')
            ->join('users', 'interactions.user_id', '=', 'users.id') // Join with users table
            ->select(DB::raw('DATE(interactions.created_at) as date'), DB::raw('COUNT(*) as count'))
            ->where('users.role', '=', 'support') // Filter for 'support' role
            ->groupBy(DB::raw('DATE(interactions.created_at)'))
            ->get();
        
            $dates = $interactions->pluck('date');
            $counts = $interactions->pluck('count');
        
            // Fetch interaction counts grouped by customer for users with the role 'support'
            $interactions = Interaction::with('customer', 'user')
            ->join('users', 'interactions.user_id', '=', 'users.id') // Join with users table
            ->selectRaw('customer_id, COUNT(interactions.id) as total_interactions')
            ->where('users.role', '=', 'support') // Filter for 'support' role
            ->groupBy('customer_id')
            ->get();
    
            return view('support.reports.index', compact('dates', 'counts', 'interactions'));

        }else{
            abort(403);
        }
    }

    public function salesPerformance()
    {
        $user = Auth::user();

        if($user->role == 'admin')
        {
            
            $sales = Deal::with('pipeline', 'customer', 'user')
            ->selectRaw('user_id, COUNT(id) as total_deals, SUM(deal_value) as total_value')
            ->groupBy('user_id')
            ->get();
    
            return view('admin.reports.sales-performance', compact('sales'));

        }elseif($user->role == 'sales')
        {
            $sales = Deal::with('pipeline', 'customer', 'user')
            ->join('users', 'deals.user_id', '=', 'users.id') // Join with users table
            ->selectRaw('users.id as user_id, COUNT(deals.id) as total_deals, SUM(deal_value) as total_value')
            ->where('users.role', '=', 'sales') // Filter for 'sales' role
            ->groupBy('users.id') // Group by user ID
            ->get();

            return view('sales.reports.sales-performance', compact('sales'));

        }
        elseif($user->role == 'support')
        {
            $sales = Deal::with('pipeline', 'customer', 'user')
            ->join('users', 'deals.user_id', '=', 'users.id') // Join with users table
            ->selectRaw('users.id as user_id, COUNT(deals.id) as total_deals, SUM(deal_value) as total_value')
            ->where('users.role', '=', 'support') // Filter for 'support' role
            ->groupBy('users.id') // Group by user ID
            ->get();

            return view('support.reports.sales-performance', compact('sales'));
        }
        else{
            abort(403);
        }
    }

    public function customerInteractions()
    {
        $user = Auth::user();

        if($user->role == 'admin')
        {
            $interactions = Interaction::with('customer', 'user')
                ->selectRaw('customer_id, COUNT(id) as total_interactions')
                ->groupBy('customer_id')
                ->get();
    
            return view('admin.reports.customer-interactions', compact('interactions'));

        }
        elseif($user->role == 'sales')
        {
            $interactions = Interaction::with('customer', 'user')
            ->join('users', 'interactions.user_id', '=', 'users.id') // Join with users table
            ->selectRaw('interactions.customer_id, COUNT(interactions.id) as total_interactions')
            ->where('users.role', '=', 'sales') // Filter for 'sales' role
            ->groupBy('interactions.customer_id') // Group by customer ID
            ->get();


            return view('sales.reports.customer-interactions', compact('interactions'));
        }
        elseif($user->role == 'support'){

            $interactions = Interaction::with('customer', 'user')
            ->join('users', 'interactions.user_id', '=', 'users.id') // Join with users table
            ->selectRaw('interactions.customer_id, COUNT(interactions.id) as total_interactions')
            ->where('users.role', '=', 'support') // Filter for 'support' role
            ->groupBy('interactions.customer_id') // Group by customer ID
            ->get();


            return view('support.reports.customer-interactions', compact('interactions'));
        }
        else{

            abort(403);
        }

    }
}
