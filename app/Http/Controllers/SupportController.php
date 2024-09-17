<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SupportController extends Controller
{
    public function index()
    {
        return view('support.supportDashboard');
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
}
