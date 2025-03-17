<x-app-layout>
    <x-slot name="">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Ticket') }}
        </h2>
    </x-slot>

    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        select, input[type="datetime-local"], button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .success-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            text-align: center;
        }
        .error-message {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            text-align: center;
        }
    </style>

    <div class="container">
        <form action="{{ route('tickets.store') }}" method="POST" id="ticketForm">
            @csrf

            <div class="form-group">
                <label for="departure_city">Kota Keberangkatan:</label>
                <select name="departure_city" id="departure_city" required>
                    <option value="">-- Pilih Kota --</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bali">Bali</option>
                    <option value="Yogyakarta">Yogyakarta</option>
                    <option value="Surabaya">Surabaya</option>
                </select>
            </div>

            <div class="form-group">
                <label for="destination_city">Kota Tujuan:</label>
                <select name="destination_city" id="destination_city" required>
                    <option value="">-- Pilih Kota --</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bali">Bali</option>
                    <option value="Yogyakarta">Yogyakarta</option>
                    <option value="Surabaya">Surabaya</option>
                </select>
            </div>

            <div class="form-group">
    <label for="bus_id">Pilih Bus:</label>
    <select name="bus_id" id="bus_id" required>
        <option value="">-- Pilih Bus --</option>
        @foreach($buses as $bus)
            <option value="{{ $bus->id }}">{{ $bus->bus_number }} - {{ $bus->route }}</option>
        @endforeach
    </select>
</div>

            <div class="form-group">
                <label for="departure_time">Waktu Keberangkatan:</label>
                <input type="datetime-local" name="departure_time" id="departure_time" required>
            </div>

            <button type="submit">Pesan Tiket</button>
        </form>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-app-layout>