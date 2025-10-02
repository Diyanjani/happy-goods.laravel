<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the user's addresses.
     */
    public function index()
    {
        $addresses = Address::where('user_id', Auth::id())->get();
        return view('addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new address.
     */
    public function create()
    {
        return view('addresses.create');
    }

    /**
     * Store a newly created address.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100'
        ]);

        Address::create([
            'user_id' => Auth::id(),
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country
        ]);

        return redirect()->route('addresses.index')->with('success', 'Address added successfully!');
    }

    /**
     * Display the specified address.
     */
    public function show(Address $address)
    {
        $this->authorize('view', $address);
        return view('addresses.show', compact('address'));
    }

    /**
     * Show the form for editing the specified address.
     */
    public function edit(Address $address)
    {
        $this->authorize('update', $address);
        return view('addresses.edit', compact('address'));
    }

    /**
     * Update the specified address.
     */
    public function update(Request $request, Address $address)
    {
        $this->authorize('update', $address);
        
        $request->validate([
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100'
        ]);

        $address->update([
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country
        ]);

        return redirect()->route('addresses.index')->with('success', 'Address updated successfully!');
    }

    /**
     * Remove the specified address.
     */
    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);
        
        $address->delete();
        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully!');
    }
}
