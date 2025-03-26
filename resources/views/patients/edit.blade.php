@extends('components.admin')

@section('title', 'Edit Patient')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Edit Patient</h2>
        <form action="{{ route('patients.update', $patient) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium">First Name</label>
                <input type="text" name="firstname" value="{{ $patient->firstname }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Last Name</label>
                <input type="text" name="lastname" value="{{ $patient->lastname }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Impairments</label>
                <input type="text" name="impairments" value="{{ $patient->impairments }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Birthdate</label>
                <input type="date" name="birthdate" value="{{ $patient->birthdate }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Address</label>
                <input type="text" name="address" value="{{ $patient->address }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" value="{{ $patient->email }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Number</label>
                <input type="text" name="number" value="{{ $patient->number }}" class="w-full border p-2 rounded">
            </div>
            <div class="flex justify-end space-x-4">
                <a href="{{ route('patients.index') }}" class="text-gray-600 px-4 py-2 border rounded">Cancel</a>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
@endsection
