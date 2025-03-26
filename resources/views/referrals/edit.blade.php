@extends('components.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-semibold mb-6">Edit Referral</h2>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('referrals.update', $referral) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Full Name</label>
                    <input type="text" name="full_name" value="{{ $referral->full_name }}" class="w-full p-2 border rounded-md" required>
                </div>

                <div>
                    <label class="block font-medium">Address</label>
                    <input type="text" name="address" value="{{ $referral->address }}" class="w-full p-2 border rounded-md">
                </div>

                <div>
                    <label class="block font-medium">Age</label>
                    <input type="number" name="age" value="{{ $referral->age }}" class="w-full p-2 border rounded-md">
                </div>

                <div>
                    <label class="block font-medium">Sex</label>
                    <select name="sex" class="w-full p-2 border rounded-md">
                        <option value="Male" {{ $referral->sex == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $referral->sex == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div>
                    <label class="block font-medium">Date</label>
                    <input type="date" name="date" value="{{ $referral->date }}" class="w-full p-2 border rounded-md">
                </div>

                <div>
                    <label class="block font-medium">Source Clinic</label>
                    <input type="text" name="source_clinic" value="{{ $referral->source_clinic }}" class="w-full p-2 border rounded-md">
                </div>

                <div>
                    <label class="block font-medium">Doctor</label>
                    <input type="text" name="doctor" value="{{ $referral->doctor }}" class="w-full p-2 border rounded-md">
                </div>
            </div>

            <div class="mt-4">
                <label class="block font-medium">Instruction</label>
                <textarea name="instruction" rows="5" class="w-full p-2 border rounded-md">{{ $referral->instruction }}</textarea>
            </div>

            <!-- Buttons Aligned to Right -->
            <div class="mt-6 flex justify-end space-x-3">
                <a href="{{ route('referrals.index') }}" class="text-gray-600 hover:text-gray-800 px-4 py-2">Cancel</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-md shadow-md transition-transform transform hover:scale-105">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
