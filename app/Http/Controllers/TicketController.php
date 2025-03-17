<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
   // Di metode index di TicketController
   public function index()
{
    $buses = Bus::all(); // Ambil semua bus dari database
    return view('tickets.index', compact('buses'));
}

// App\Http\Controllers\TicketController.php

// App\Http\Controllers\TicketController.php

public function store(Request $request)
{
    $request->validate([
        'departure_city' => 'required|string',
        'destination_city' => 'required|string',
        'bus_id' => 'required|exists:buses,id',
        'departure_time' => 'required|date',
    ]);

    // Simpan tiket
    Ticket::create([
        'user_id' => Auth::id(),
        'bus_id' => $request->bus_id,
        'departure_time' => $request->departure_time,
        'departure_city' => $request->departure_city,
        'destination_city' => $request->destination_city,
    ]);

    // Redirect ke halaman riwayat pemesanan
    return redirect()->route('tickets.history')->with('success', 'Tiket berhasil dipesan!');
}
// App\Http\Controllers\TicketController.php

// App\Http\Controllers\TicketController.php

public function history()
{
    $tickets = Ticket::where('user_id', Auth::id())->with('bus')->get();
    return view('tickets.history', compact('tickets'));
}
public function destroy(Ticket $ticket)
{
    $ticket->delete();

    return redirect()->route('tickets.history')->with('success', 'Tiket berhasil dihapus!');
}
}