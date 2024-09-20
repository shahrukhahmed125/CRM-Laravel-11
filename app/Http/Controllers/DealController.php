<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Deal;
use App\Models\Pipeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user->hasRole('admin')) {
            $deals = Deal::where('user_id', 1)->with(['customer', 'pipeline'])->get();
            return view('admin.deals.index', compact('deals'));
        } elseif ($user->hasRole('sales')) {
            $deals = Deal::where('user_id', 2)->with(['customer', 'pipeline'])->get();
            return view('sales.deals.index', compact('deals'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pipelines = Pipeline::all();
        $customers = Customer::all();
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('admin.deals.create', compact('pipelines', 'customers'));
        } elseif ($user->hasRole('sales')) {
            return view('sales.deals.create', compact('pipelines', 'customers'));
        }else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pipeline_id' => 'required|exists:pipelines,id',
            'customer_id' => 'required|exists:customers,id',
            'deal_name' => 'required|string|max:255',
            'stage' => 'required|string|max:255',
            'deal_value' => 'required|numeric',
            'closing_date' => 'required|date',
        ]);

        $data = new Deal;
        $data->user_id = Auth::user()->id;
        $data->fill($request->all());
        $data->save();

        return redirect()->back()->with('msg', 'Deal created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deal $deal)
    {
        $deal->load(['pipeline', 'customer']);
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('admin.deals.show', compact('deal'));
        } elseif ($user->hasRole('sales')) {
            return view('sales.deals.show', compact('deal'));
        }else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deal $deal)
    {
        $pipelines = Pipeline::all();
        $customers = Customer::all();
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('admin.deals.edit', compact('deal', 'pipelines', 'customers'));
        } elseif ($user->hasRole('sales')) {
            return view('sales.deals.edit', compact('deal', 'pipelines', 'customers'));
        }else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deal $deal)
    {
        $request->validate([
            'pipeline_id' => 'required|exists:pipelines,id',
            'customer_id' => 'required|exists:customers,id',
            'deal_name' => 'required|string|max:255',
            'stage' => 'required|string|max:255',
            'deal_value' => 'required|numeric',
            'closing_date' => 'required|date',
        ]);
        $deal->user_id = Auth::user()->id;
        $deal->update($request->all());

        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.deals.index')->with('msg', 'Deal updated successfully.');
        } elseif ($user->hasRole('sales')) {
            return redirect()->route('sales.deals.index')->with('msg', 'Deal updated successfully.');
        }else {
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();
        return redirect()->back()->with('msg', 'Deal deleted successfully.');
    }
}
