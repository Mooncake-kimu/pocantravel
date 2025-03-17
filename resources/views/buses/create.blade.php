<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Bus') }}
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
        .alert {
            padding: 10px;
            margin-top: 20px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('buses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="bus_number">Bus Number:</label>
                <input type="text" name="bus_number" id="bus_number" class="form-control" value="{{ old('bus_number') }}" required>
            </div>
            <div class="form-group">
                <label for="seat_capacity">Seat Capacity:</label>
                <input type="number" name="seat_capacity" id="seat_capacity" class="form-control" value="{{ old('seat_capacity') }}" required min="1">
            </div>
            <div class="form-group">
                <label for="route">Route:</label>
                <input type="text" name="route" id="route" class="form-control" value="{{ old('route') }}" required>
            </div>
            <button type="submit">Add Bus</button>
        </form>
    </div>
</x-app-layout>