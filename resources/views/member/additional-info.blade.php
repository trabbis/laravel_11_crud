@extends('layouts.member')

@section('title', 'Additional Information')

@section('content')
<form action="{{ route('member.additional-info.store') }}" method="POST" class="space-y-6">
    @csrf
    <div class="space-y-6">
        <div>
            <label for="occupation" class="block text-sm font-medium text-gray-700">Occupation</label>
            <input type="text" name="occupation" id="occupation" value="{{ old('occupation') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label for="company" class="block text-sm font-medium text-gray-700">Company (Optional)</label>
            <input type="text" name="company" id="company" value="{{ old('company') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Interests (Optional)</label>
            <div class="mt-2 space-y-2">
                <div class="flex items-center">
                    <input type="checkbox" name="interests[]" value="sports" id="interest_sports" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="interest_sports" class="ml-2 block text-sm text-gray-700">Sports</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="interests[]" value="reading" id="interest_reading" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="interest_reading" class="ml-2 block text-sm text-gray-700">Reading</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="interests[]" value="music" id="interest_music" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="interest_music" class="ml-2 block text-sm text-gray-700">Music</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="interests[]" value="travel" id="interest_travel" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="interest_travel" class="ml-2 block text-sm text-gray-700">Travel</label>
                </div>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Preferences (Optional)</label>
            <div class="mt-2 space-y-2">
                <div class="flex items-center">
                    <input type="checkbox" name="preferences[]" value="newsletter" id="pref_newsletter" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="pref_newsletter" class="ml-2 block text-sm text-gray-700">Receive Newsletter</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="preferences[]" value="updates" id="pref_updates" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="pref_updates" class="ml-2 block text-sm text-gray-700">Receive Updates</label>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('member.contact-info') }}" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Back
        </a>
        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Next Step
        </button>
    </div>
</form>
@endsection 