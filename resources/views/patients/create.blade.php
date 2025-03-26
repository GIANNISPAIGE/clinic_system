@extends('components.admin')

@section('title', 'Add Patient')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Add Patient</h2>
        <form action="{{ route('patients.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" name="firstname" class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" name="lastname" class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Impairments</label>
                <input type="text" name="impairments" class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Birthdate</label>
                <input type="date" name="birthdate" class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" name="address" class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Number</label>
                <input type="text" name="number" class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <div class="flex justify-end space-x-4 mt-6">
                <a href="{{ url('patients-list/new') }}" class="text-gray-600 px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-100 transition">Cancel</a>
                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-600 transition">Save</button>
            </div>
        </form>
    </div>
@endsection
