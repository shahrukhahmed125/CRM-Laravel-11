<?php

namespace App\Http\Controllers;

use App\Models\Pipeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PipelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pipelines = Pipeline::with('deals')->get();
        $user = Auth::user();

        if ($user->hasRole('sales')) {
            // Get only the pipelines that belong to the logged-in sales user
            $pipelines = Pipeline::where('user_id', $user->id)->with('deals')->get();
        } else {
            // For other roles like admin, get all pipelines
            $pipelines = Pipeline::with('deals')->get();
        }

        if ($user->hasRole('admin')) {
            return view('admin.pipelines.index', compact('pipelines'));
        } elseif ($user->hasRole('sales')) {
            return view('sales.pipelines.index', compact('pipelines'));
        }
        elseif ($user->hasRole('support')) {
            return view('support.pipelines.index', compact('pipelines'));
        }
        else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('admin.pipelines.create');
        } elseif ($user->hasRole('sales')) {
            return view('sales.pipelines.create');
        }
        else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'position' => 'required|integer',
        ]);

        $data = new Pipeline;
        $data->fill($request->all());
        $data->user_id = Auth::user()->id;
        $data->save();

        $user = Auth::user();

        if($user->hasRole('admin'))
        {
            return redirect()->route('admin.pipelines.index')->with('msg', 'Pipeline created successfully.');
        }elseif($user->hasRole('sales'))
        {
            return redirect()->route('sales.pipelines.index')->with('msg', 'Pipeline created successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pipeline $pipeline)
    {
        $pipeline->load('deals.customer');
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('admin.pipelines.show', compact('pipeline'));
        } elseif ($user->hasRole('sales')) {
            return view('sales.pipelines.show', compact('pipeline'));
        } 
        elseif ($user->hasRole('support')) {
            return view('support.pipelines.show', compact('pipeline'));
        } 
        else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pipeline $pipeline)
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('admin.pipelines.edit', compact('pipeline'));
        } elseif ($user->hasRole('sales')) {
            return view('sales.pipelines.edit', compact('pipeline'));
        }
        else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pipeline $pipeline)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'position' => 'required|integer',
        ]);

        $pipeline->update($request->all());

        $user = Auth::user();

        if($user->hasRole('admin'))
        {
            return redirect()->route('admin.pipelines.index')->with('msg', 'Pipeline created successfully.');
        }elseif($user->hasRole('sales'))
        {
            return redirect()->route('sales.pipelines.index')->with('msg', 'Pipeline created successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pipeline $pipeline)
    {
        $pipeline->delete();

        return redirect()->route('pipelines.index')->with('msg', 'Pipeline deleted successfully.');
    }
}
