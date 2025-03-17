<x-app-layout>
    <x-slot name="">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking History') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @if($tickets->isEmpty())
            <div class="bg-yellow-100 text-yellow-800 p-4 rounded">
                <p>Tidak ada riwayat pemesanan tiket.</p>
            </div>
        @else
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border-b">Nomor Bus</th>
                        <th class="py-2 px-4 border-b">Rute</th>
                        <th class="py-2 px-4 border-b">Waktu Keberangkatan</th>
                        <th class="py-2 px-4 border-b">Dipesan Pada</th>
                        <th class="py-2 px-4 border-b">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $ticket->bus->bus_number }}</td>
                            <td class="py-2 px-4 border-b">{{ $ticket->bus->route }}</td>
                            <td class="py-2 px-4 border-b">{{ $ticket->departure_time }}</td>
                            <td class="py-2 px-4 border-b">{{ $ticket->created_at }}</td>
                            <td class="py-2 px-4 border-b">
                                <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this ticket?');">Batalkan</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>