<h2>Store List</h2>
<ul>
    @foreach ($stores as $store)
        <li>{{ $store->name }}</li>
    @endforeach
</ul>
<a href="{{ route('merchant.store.create') }}">Create Store</a>
