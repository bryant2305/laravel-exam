<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda - {{ $store->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #ff4500;
        }
        h2 {
            color: #ff6347;
            margin-top: 20px;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        li {
            background-color: #ffecd1;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $store->name }}</h1>

        @foreach ($categories as $category)
            <h2>{{ $category->name }}</h2>

            <ul>
                @foreach ($category->products as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </ul>
        @endforeach
    </div>
</body>
</html>
