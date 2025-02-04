<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Store List</h2>
            
            <ul class="space-y-4">
                @forelse ($stores as $store)
                    <li class="bg-gray-50 p-4 rounded-lg shadow-sm flex justify-between items-center">
                        <span class="text-gray-700">{{ $store->name }}</span>
                        <a href="#" class="text-blue-500 hover:underline">Edit</a>
                    </li>
                @empty
                    <li class="text-center text-gray-500">No stores available.</li>
                @endforelse
            </ul>

            <div class="mt-6 text-center">
                <a href="{{ route('merchant.store.create') }}" 
                   class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition">
                    Create Store
                </a>
            </div>
        </div>
    </div>

</body>
</html>
