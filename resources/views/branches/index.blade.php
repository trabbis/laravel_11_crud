<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Branches</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                        Branches
                    </h2>
                    <div class="mb-4">
                        <label for="country" class="block text-sm font-medium text-gray-700">Select Country</label>
                        <select id="country" name="country" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">Please select a branch</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch['id'] }}">{{ $branch['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 