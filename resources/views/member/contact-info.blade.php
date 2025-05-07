@extends('layouts.member')

@section('title', 'Contact Information')

@section('content')
<form action="{{ route('member.contact-info.store') }}" method="POST" class="space-y-6">
    @csrf
    <div class="space-y-6">
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Street Address</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input type="text" name="city" id="city" value="{{ old('city') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
        </div>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('member.basic-info') }}" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Back
        </a>
        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Next Step
        </button>
    </div>
</form>
@endsection 