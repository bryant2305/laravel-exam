<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Admin Login</h2>

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <!-- Mostrar el error si existe -->
                @if ($errors->has('email'))
                    <div class="mb-4 text-red-500 text-sm">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-md">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" 
                           class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-md">
                </div>

                <button type="submit" 
                        class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600">
                    Login
                </button>
            </form>
        </div>
    </div>
</body>
</html>
