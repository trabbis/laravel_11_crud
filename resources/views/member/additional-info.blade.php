@extends('layouts.member')

@section('title', 'Additional Information')

@section('content')
    @if (session('email_changed'))
        <div class="rounded-md bg-blue-50 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-blue-800">
                        {{ session('email_changed') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('member.additional-info.store') }}" method="POST" class="space-y-6">
        @csrf
        <div class="space-y-6">
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Telephone number</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $address['phone']) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

            </div>

            <div>
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" value="{{$personalInfo['birthDate']}}" readonly class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Gender</label>
                <div class="mt-2 space-y-2">
                    <div class="flex items-center">
                        <input type="radio" name="gender" value="male" id="gender_male" {{ old('gender') == 'male' ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <label for="gender_male" class="ml-2 block text-sm text-gray-700">Male</label>
                    </div>
                </div>
                <div class="mt-2 space-y-2">
                    <div class="flex items-center">
                        <input type="radio" name="gender" value="female" id="gender_female" {{ old('gender') == 'female' ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <label for="gender_female" class="ml-2 block text-sm text-gray-700">Female</label>
                    </div>
                </div>
                <div class="mt-2 space-y-2">
                    <div class="flex items-center">
                        <input type="radio" name="gender" value="DNIDENTIFY" id="genderDoNotIdentify" {{ old('gender') == 'DNIDENTIFY' ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <label for="genderDoNotIdentify" class="ml-2 block text-sm text-gray-700">I do not identify with the listed options</label>
                    </div>
                </div>
                <div class="mt-2 space-y-2">
                    <div class="flex items-center">
                        <input type="radio" name="gender" value="preferNotToSay" id="genderPreferNotToSay" {{ old('gender') == 'preferNotToSay' ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <label for="genderPreferNotToSay" class="ml-2 block text-sm text-gray-700">Prefer not to say</label>
                    </div>
                </div>
            </div>
    

            {{--
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
            --}}
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