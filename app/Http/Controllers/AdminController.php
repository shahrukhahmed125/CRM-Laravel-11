<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user()->name;
        return view('admin.adminDashboard', compact('user'));
    }

    public function changePassword()
    {
        return view('admin.adminChangePassword');
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

            return redirect()->route('admin.dashboard')->with('msg', 'Password changed successfully!');
        }

        return redirect()->back()->with('error', 'Inavlid old password!');
    }

    public function profile()
    {
        $data = Auth::user();
        return view('admin.adminProfile',compact('data'));
    }

    public function profilePost(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::findOrfail($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        return redirect()->route('admin.dashboard')->with('msg', 'Profile changed successfully!');

    }

    public function customerData()
    {
        $data = Customer::all();
        return view('admin.adminCustomer', compact('data'));
    }

    public function addCustomerData()
    {
        return view('admin.adminAddCustomer');
    }

    public function addCustomerDataPost(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
        ]);

        $data = new Customer;
        $data->fill($request->all());
        $data->save();

        return redirect()->back()->with('msg', 'Customer added successfully!');
    }

    public function editCustomerData($id)
    {
        $data = Customer::findOrfail($id);
        return view('admin.adminEditCustomer', compact('data'));
    }

    public function editCustomerDataPost(Request $request, $id)
    {
        $data = Customer::findOrfail($id);
        $data->fill($request->all());
        $data->update();

        return redirect()->route('admin.customerData')->with('msg', 'Customer Updated Successfully!');
    }

    public function deleteCustomerData($id)
    {
        $data = Customer::findOrfail($id);
        $data->delete();

        return redirect()->back()->with('msg', 'Customer Deleted Successfully!');
    }

    public function customerSearch(Request $request)
    {
        $query = $request->input('query');

        // Use the search scope defined in the Customer model
        $data = Customer::search($query)->get();

        return view('admin.adminCustomerSearch', compact('data'));

    }

    public function userData()
    {
        $user = User::OrderBy('role', 'asc')->get();
        return view('admin.adminUser', compact('user'));
    }

    public function addUserData()
    {
        return view('admin.adminAddUser');
    }

    public function addUserDataPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        $data = new User;
        $data->fill($request->all());
        $data->role = $request->role;
        $data->email_verified_at = $request->email_verified_at;
        $data->save();

        return redirect()->back()->with('msg', 'User Added Successfully!');
    }

    public function deleteUserData($id)
    {
        $data = User::findOrfail($id);
        $data->delete();

        return redirect()->back()->with('msg', 'User Deleted Successfully!');
    }

    public function editUserData($id)
    {
        $data = User::findOrfail($id);
        return view('admin.adminEditUser', compact('data'));
    }

    public function editUserDataPost(Request $request, $id)
    {
        $data = User::findOrfail($id);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required',
        ]);

        $data->fill($request->all());
        $data->role = $request->role;
        $data->email_verified_at = $request->email_verified_at;
        $data->update();

        return redirect()->route('admin.userData')->with('msg', 'User Updated Successfully!');
    }
}