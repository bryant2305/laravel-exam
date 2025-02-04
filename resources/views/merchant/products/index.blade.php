<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product List</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-8">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Product List</h2>
    
    @if(session('success'))
      <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    <ul class="space-y-4">
      @forelse ($products as $product)
        <li class="bg-white p-4 rounded shadow flex justify-between items-center">
          <div>
            <span class="text-gray-700 font-medium">{{ $product->name }}</span>
            @if($product->category)
              <span class="text-gray-500 text-sm">({{ $product->category->name }})</span>
            @endif
          </div>
        </li>
      @empty
        <li class="text-center text-gray-500">No products available.</li>
      @endforelse
    </ul>
    
    <div class="mt-6 flex justify-center">
      <a href="{{ route('merchant.products.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
        Create Product
      </a>
    </div>
  </div>
</body>
</html>
