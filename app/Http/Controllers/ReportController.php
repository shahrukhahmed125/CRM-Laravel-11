<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Interaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
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

    public function salesPerformance()
    {

        $sales = Deal::with('pipeline', 'customer', 'user')
            ->selectRaw('user_id, COUNT(id) as total_deals, SUM(deal_value) as total_value')
            ->groupBy('user_id')
            ->get();

        return view('admin.reports.sales-performance', compact('sales'));
    }

    public function customerInteractions()
    {

        $interactions = Interaction::with('customer', 'user')
            ->selectRaw('customer_id, COUNT(id) as total_interactions')
            ->groupBy('customer_id')
            ->get();

        return view('admin.reports.customer-interactions', compact('interactions'));
    }
}
