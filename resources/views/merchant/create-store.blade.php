<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Create Store</h2>
            
            <form action="{{ route('merchant.store.create') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Store Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter store name" 
                        class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" 
                    class="w-full bg-green-500 text-white py-3 rounded-md hover:bg-green-600 transition duration-300 ease-in-out">
                    Save
                </button>
            </form>
        </div>
    </div>

</body>
</html>
