<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Interaction;
use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Interaction::with('customer')->get(); 
        $user = Auth::user();
        
        if ($user->role === 'sales') {
            $data = Interaction::where('user_id', $user->id)->with('customer')->get();
        }
        elseif ($user->role === 'support') {
            $data = Interaction::where('user_id', $user->id)->with('customer')->get();
        }


        if ($user->hasRole('admin')) {
            return view('admin.interaction.index', compact('data'));
        } elseif ($user->hasRole('sales')) {
            return view('sales.interaction.index', compact('data'));
        } elseif ($user->hasRole('support')) {
            return view('support.interaction.index', compact('data'));
        } else {
            abort(403); // Access denied if the user does not have the right role
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all(); // Fetch all customers for the dropdown
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('admin.interaction.create', compact('customers'));
        } elseif ($user->hasRole('sales')) {
            return view('sales.interaction.create', compact('customers'));
        } elseif ($user->hasRole('support')) {
            return view('support.interaction.create', compact('customers'));
        } else {
            abort(403); // Access denied if the user does not have the right role
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'type' => 'required|in:call,email,meeting',
            'details' => 'required|string',
            'date' => 'required|date',
            'reminder_at' => 'nullable|date|after_or_equal:today',
        ]);

        $data = new Interaction;
        $data->fill($request->all());
        $data->user_id = Auth::user()->id;
        $data->save();

        if ($request->has('reminder_at')) {

            $reminderAtUtc = Carbon::parse($request->reminder_at, 'Asia/Karachi')->utc();
            Reminder::create([
                'interaction_id' => $data->id,
                'reminder_at' => $reminderAtUtc,
            ]);
        }
        
        $user = Auth::user();

        if($user->hasRole('admin'))
        {
            return redirect()->route('admin.interactions.index')->with('msg', 'Interaction logged successfully.');
        }elseif($user->hasRole('sales'))
        {
            return redirect()->route('sales.interactions.index')->with('msg', 'Interaction logged successfully.');
        }
        elseif($user->hasRole('support'))
        {
            return redirect()->route('support.interactions.index')->with('msg', 'Interaction logged successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $interaction = Interaction::findOrFail($id);
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('admin.interaction.show', compact('interaction'));
        } elseif ($user->hasRole('sales')) {
            return view('sales.interaction.show', compact('interaction'));
        } elseif ($user->hasRole('support')) {
            return view('support.interaction.show', compact('interaction'));
        } else {
            abort(403); // Access denied if the user does not have the right role
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interaction $interaction)
    {
        $customers = Customer::all();
        $reminder = Reminder::where('interaction_id', $interaction->id)->first();
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return view('admin.interaction.edit', compact('interaction', 'customers', 'reminder'));
        } elseif ($user->hasRole('sales')) {
            return view('sales.interaction.edit', compact('interaction', 'customers', 'reminder'));
        } elseif ($user->hasRole('support')) {
            return view('support.interaction.edit', compact('interaction', 'customers', 'reminder'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Interaction $interaction)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'type' => 'required|in:call,email,meeting',
            'details' => 'required|string',
            'date' => 'required|date',
            'reminder_at' => 'nullable|date|after_or_equal:today',
        ]);

        if ($request->has('reminder_at')) {

            $reminderAtUtc = Carbon::parse($request->reminder_at, 'Asia/Karachi')->utc();
            $reminder = Reminder::where('interaction_id', $interaction->id)->first();

            if ($reminder) {
                // Update the existing reminder
                $reminder->update([
                    'reminder_at' => $reminderAtUtc,
                ]);
            } else {
                // Create a new reminder if it doesn't exist
                Reminder::create([
                    'interaction_id' => $interaction->id,
                    'reminder_at' => $reminderAtUtc,
                ]);
            }
        }

        $interaction->update($request->all());
        $user = Auth::user();

        if($user->hasRole('admin'))
        {
            return redirect()->route('admin.interactions.index')->with('msg', 'Interaction updated successfully.');
        }elseif($user->hasRole('sales'))
        {
            return redirect()->route('sales.interactions.index')->with('msg', 'Interaction updated successfully.');
        }
        elseif($user->hasRole('support'))
        {
            return redirect()->route('support.interactions.index')->with('msg', 'Interaction updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Interaction $interaction)
    {
        $interaction->delete();
        return redirect()->back()->with('msg', 'Interaction deleted successfully.');
        
    }
}
