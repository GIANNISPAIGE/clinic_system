@extends('components.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-semibold mb-6">Add Referral</h2>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('referrals.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Full Name</label>
                    <input type="text" name="full_name" class="w-full p-2 border rounded-md" required>
                </div>

                <div>
                    <label class="block font-medium">Address</label>
                    <input type="text" name="address" class="w-full p-2 border rounded-md">
                </div>

                <div>
                    <label class="block font-medium">Age</label>
                    <input type="number" name="age" class="w-full p-2 border rounded-md">
                </div>

                <div>
                    <label class="block font-medium">Sex</label>
                    <select name="sex" class="w-full p-2 border rounded-md">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div>
                    <label class="block font-medium">Date</label>
                    <input type="date" name="date" class="w-full p-2 border rounded-md">
                </div>

                <div>
                    <label class="block font-medium">Source Clinic</label>
                    <input type="text" name="source_clinic" class="w-full p-2 border rounded-md">
                </div>

                <div>
                    <label class="block font-medium">Doctor</label>
                    <input type="text" name="doctor" class="w-full p-2 border rounded-md">
                </div>
            </div>

            <div class="mt-4">
                <label class="block font-medium">Instruction</label>
                <textarea name="instruction" rows="5" class="w-full p-2 border rounded-md"></textarea>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                    Save
                </button>
                <a href="{{ route('referrals.index') }}" class="ml-2 text-gray-600 hover:text-gray-800">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
