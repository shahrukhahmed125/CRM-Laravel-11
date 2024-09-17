<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SalesController extends Controller
{
    public function index()
    {
        return view('sales.salesDashboard');
    }

    public function changePassword()
    {
        return view('sales.salesChangePassword');
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

            return redirect()->route('sales.dashboard')->with('msg', 'Password changed successfully!');
        }

        return redirect()->back()->with('error', 'Inavlid old password!');
    }

    public function customerData()
    {
        $data = Customer::select('id', 'first_name', 'last_name', 'email', 'phone', 'company')->get();
        return view('sales.salesCustomer', compact('data'));
    }

    
    public function addCustomerData()
    {
        return view('sales.salesAddCustomer');
    }

    public function addCustomerDataPost(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
        ]);

        $data = new Customer;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->company = $request->company;
        $data->save();

        return redirect()->back()->with('msg', 'Customer added successfully!');
    }

    public function editCustomerData($id)
    {
        $data = Customer::findOrfail($id);
        return view('sales.salesEditCustomer', compact('data'));
    }

    
    public function editCustomerDataPost(Request $request, $id)
    {
        $data = Customer::findOrfail($id);
        $data->fill($request->all());
        $data->update();

        return redirect()->route('sales.customerData')->with('msg', 'Customer Updated Successfully!');
    }

    public function customerSearch(Request $request)
    {
        $query = $request->input('query');

        // Use the search scope defined in the Customer model
        $data = Customer::search($query)->get();

        return view('sales.salesCustomerSearch', compact('data'));

    }
}
