<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Ticket; // Pastikan model Ticket diimpor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan Auth diimpor

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        $tickets = Ticket::where('user_id', Auth::id())->with('bus')->get(); // Ambil tiket pengguna
        return view('buses.index', compact('buses', 'tickets'));
    }

    public function create()
    {
        return view('buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_number' => 'required|unique:buses',
            'seat_capacity' => 'required|integer',
            'route' => 'required|string',
        ]);

        Bus::create($request->all());
        return redirect()->route('buses.index')->with('success', 'Bus created successfully!');
    }

    public function edit(Bus $bus)
    {
        return view('buses.edit', compact('bus'));
    }

    public function update(Request $request, Bus $bus) // Menggunakan route model binding
    {
        $request->validate([
            'bus_number' => 'required|string',
            'seat_capacity' => 'required|integer',
            'route' => 'required|string',
        ]);

        $bus->update($request->only(['bus_number', 'seat_capacity', 'route']));

        return redirect()->route('buses.index')->with('success', 'Bus berhasil diperbarui!');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('buses.index')->with('success', 'Bus berhasil dihapus!');
    }
}