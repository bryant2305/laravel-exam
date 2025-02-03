<form action="{{ route('merchant.store.create') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Store Name">
    <button type="submit">Save</button>
</form>
