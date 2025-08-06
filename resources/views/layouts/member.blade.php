<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Member Information - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Progress Steps -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex items-center relative">
                            <div class="rounded-full h-12 w-12 py-3 px-3 {{ request()->routeIs('member.basic-info') ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                                1
                            </div>
                            <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium text-gray-500">Basic Info</div>
                        </div>
                        <div class="flex-auto border-t-2 transition duration-500 ease-in-out {{ request()->routeIs('member.contact-info') || request()->routeIs('member.additional-info') || request()->routeIs('member.review') ? 'border-blue-600' : 'border-gray-300' }}"></div>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center relative">
                            <div class="rounded-full h-12 w-12 py-3 px-3 {{ request()->routeIs('member.contact-info') ? 'bg-blue-600 text-white' : (request()->routeIs('member.additional-info') || request()->routeIs('member.review') ? 'bg-blue-600 text-white' : 'bg-gray-200') }}">
                                2
                            </div>
                            <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium text-gray-500">Contact Info</div>
                        </div>
                        <div class="flex-auto border-t-2 transition duration-500 ease-in-out {{ request()->routeIs('member.additional-info') || request()->routeIs('member.review') ? 'border-blue-600' : 'border-gray-300' }}"></div>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center relative">
                            <div class="rounded-full h-12 w-12 py-3 px-3 {{ request()->routeIs('member.additional-info') ? 'bg-blue-600 text-white' : (request()->routeIs('member.review') ? 'bg-blue-600 text-white' : 'bg-gray-200') }}">
                                3
                            </div>
                            <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium text-gray-500">Additional Info</div>
                        </div>
                        <div class="flex-auto border-t-2 transition duration-500 ease-in-out {{ request()->routeIs('member.review') ? 'border-blue-600' : 'border-gray-300' }}"></div>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center relative">
                            <div class="rounded-full h-12 w-12 py-3 px-3 {{ request()->routeIs('member.review') ? 'bg-blue-600 text-white' : 'bg-gray-200' }}">
                                4
                            </div>
                            <div class="absolute top-0 -ml-10 text-center mt-16 w-32 text-xs font-medium text-gray-500">Review</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                        @yield('title')
                    </h2>

                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">
                                        There were errors with your submission
                                    </h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html> 