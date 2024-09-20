<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Interaction;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SupportController extends Controller
{
    public function index()
    {
        $user = Auth::user()->name;

        $customer = Customer::join('interactions', 'customers.id', '=', 'interactions.customer_id') // Join with interactions
        ->join('users', 'interactions.user_id', '=', 'users.id') // Join with users table
        ->where('users.role', '=', 'support') // Filter for 'support' role
        ->orderBy('customers.created_at', 'desc') // Order by customer creation date
        ->select('customers.*') // Select customer fields
        ->distinct() // Ensure unique customers
        ->limit(5) // Limit to 5 customers
        ->get();

        $interaction = Interaction::join('users', 'interactions.user_id', '=', 'users.id') 
        ->where('users.role', '=', 'support') 
        ->orderBy('interactions.created_at', 'desc') 
        ->limit(5) 
        ->get();

        $notifications = Notification::where('notifiable_id', 2)
        ->orderBy('created_at', 'desc') 
        ->limit(5)
        ->get();

        foreach ($notifications as $notification) {

            $notification->decoded_data = json_decode($notification->data, true) ?: [];
            
            if (isset($notification->decoded_data['user_id'])) {
                $notification->user = User::find($notification->decoded_data['user_id']);
            }
        }

        //customers interactions data for line chart

        $interactions = DB::table('interactions')
        ->join('users', 'interactions.user_id', '=', 'users.id') // Join with users table
        ->select(DB::raw('DATE(interactions.created_at) as date'), DB::raw('COUNT(*) as count'))
        ->where('users.role', '=', 'support') // Filter for 'support' role
        ->groupBy(DB::raw('DATE(interactions.created_at)'))
        ->get();
        
        $dates = $interactions->pluck('date');
        $counts = $interactions->pluck('count');
    
        // Fetch interaction counts grouped by customer, for users with the role 'support'
        $interactions = Interaction::with('customer', 'user')
        ->join('users', 'interactions.user_id', '=', 'users.id') // Join with users table
        ->selectRaw('customer_id, COUNT(interactions.id) as total_interactions')
        ->where('users.role', '=', 'support') // Filter for 'support' role
        ->groupBy('customer_id')
        ->get();

        $customers = DB::table('customers')->count();
        $deals = DB::table('deals')->count();
        $total = DB::table('deals')->sum('deal_value');

        return view('support.supportDashboard', compact('user', 'customer', 'interaction', 'notifications', 'dates', 'counts','interactions', 'customers','deals','total'));

    }

    public function changePassword()
    {
        return view('support.supportChangePassword');
    }

    public function changePasswordPost(Request $request)
    {

        $request->validate([
            'oldPassword' => 'required|min:8|string',
            'password' => 'required|min:8|string',
        ]);

        $user = Auth::user()->id;
        $data = User::findOrfail($user);
        
        if(Hash::check($request->oldPassword, $data->password))
        {
            $data->password = $request->password;
            $data->save();

            return redirect()->route('support.dashboard')->with('msg', 'Password changed successfully!');
        }

        return redirect()->back()->with('error', 'Inavlid old password!');
    }

    public function customerData()
    {
        $data = Customer::select('id', 'first_name', 'last_name', 'email', 'phone', 'address', 'status')->get();
        return view('support.supportCustomer', compact('data'));
    }

    public function editCustomerData($id)
    {
        $data = Customer::findOrfail($id);
        return view('support.supportEditCustomer', compact('data'));
    }

    
    public function editCustomerDataPost(Request $request, $id)
    {
        $data = Customer::findOrfail($id);
        $data->fill($request->all());
        $data->update();

        return redirect()->route('support.customerData')->with('msg', 'Customer Updated Successfully!');
    }

    public function customerSearch(Request $request)
    {
        $query = $request->input('query');

        // Use the search scope defined in the Customer model
        $data = Customer::search($query)->get();

        return view('support.supportCustomerSearch', compact('data'));

    }

    public function profile()
    {
        $data = Auth::user();
        return view('support.supportProfile',compact('data'));
    }

    public function profilePost(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::findOrfail($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        return redirect()->route('support.dashboard')->with('msg', 'Profile changed successfully!');

    }


    public function showNotifications()
    {
        $notifications = Notification::where('notifiable_id', 3)->orderBy('created_at', 'desc')->get();

        foreach ($notifications as $notification) {

            $notification->decoded_data = json_decode($notification->data, true) ?: [];
            
            if (isset($notification->decoded_data['user_id'])) {
                $notification->user = User::find($notification->decoded_data['user_id']);
            }
        }

        return view('support.supportNotification', compact('notifications'));
    }

    public function deleteNotification($notify)
    {
        $data = Notification::where('id', $notify)->delete();
        if($data)
        {
            return redirect()->back()->with('msg', 'Notification deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('msg', 'Error.');

        }


    }
}
