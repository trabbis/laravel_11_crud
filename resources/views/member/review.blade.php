@extends('layouts.member')

@section('title', 'Review Information')

@section('content')
<div class="space-y-8">
    <!-- Basic Information -->
    <div>
        <h3 class="text-lg font-medium text-gray-900">Basic Information</h3>
        <div class="mt-4 bg-gray-50 rounded-lg p-4">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $basicInfo['first_name'] }} {{ $basicInfo['last_name'] }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Date of Birth</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $basicInfo['date_of_birth'] }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Gender</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ ucfirst($basicInfo['gender']) }}</dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Contact Information -->
    <div>
        <h3 class="text-lg font-medium text-gray-900">Contact Information</h3>
        <div class="mt-4 bg-gray-50 rounded-lg p-4">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $contactInfo['email'] }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $contactInfo['phone'] }}</dd>
                </div>
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Address</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ $contactInfo['address'] }}<br>
                        {{ $contactInfo['city'] }}, {{ $contactInfo['postal_code'] }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <!-- Additional Information -->
    <div>
        <h3 class="text-lg font-medium text-gray-900">Additional Information</h3>
        <div class="mt-4 bg-gray-50 rounded-lg p-4">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Occupation</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $additionalInfo['occupation'] }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Company</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $additionalInfo['company'] ?? 'Not specified' }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Interests</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        @if(!empty($additionalInfo['interests']))
                            {{ implode(', ', $additionalInfo['interests']) }}
                        @else
                            None selected
                        @endif
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Preferences</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        @if(!empty($additionalInfo['preferences']))
                            {{ implode(', ', $additionalInfo['preferences']) }}
                        @else
                            None selected
                        @endif
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <form action="{{ route('member.submit') }}" method="POST">
        @csrf
        <div class="flex justify-between">
            <a href="{{ route('member.additional-info') }}" class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Back
            </a>
            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Submit Information
            </button>
        </div>
    </form>
</div>
@endsection 