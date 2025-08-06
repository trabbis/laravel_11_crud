@extends('layouts.member')

@section('title', 'Contact Information')

@section('content')
<form action="{{ route('member.contact-info.store') }}" method="POST" class="space-y-6">
    @csrf
    <div class="space-y-6">
        <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="text" name="email" id="email" value="{{ old('email', $address['email']) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
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