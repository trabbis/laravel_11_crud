@extends('layouts.member')

@section('title', 'Basic Information')

@section('content')
<form action="{{ route('member.basic-info.store') }}" method="POST" class="space-y-6">
    @csrf
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
        <div>
            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{$firstName}}" readonly class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{$lastName}}" readonly class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" name="last_name" id="last_name" value="{{$address['street']}} {{$address['city']}}, {{$address['province']}}" readonly class="mt-1 block w-full rounded-md border-gray-300 bg-gray-50 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Is this information correct and up to date?</label>
            <div class="mt-2 space-y-2">
                <div class="flex items-center">
                    <input type="radio" name="correct" value="yes" id="correct_yes" {{ old('correct') == 'yes' ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="correct_yes" class="ml-2 block text-sm text-gray-700">Yes</label>
                </div>
            </div>
            <div class="mt-2 space-y-2">
                <div class="flex items-center">
                    <input type="radio" name="correct" value="no" id="correct_no" {{ old('correct') == 'no' ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="correct_no" class="ml-2 block text-sm text-gray-700">No</label>
                </div>
            </div>
            @error('correct')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        {{-- <div>
            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
            <select name="gender" id="gender" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Select gender</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>  --}}
        
    </div>

    <div class="flex justify-end">
        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Next Step
        </button>
    </div>
</form>
@endsection 