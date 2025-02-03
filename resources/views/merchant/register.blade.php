<form action="{{ route('merchant.register') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Enter your name">
    <input type="email" name="email" placeholder="Enter your email">
    <input type="password" name="password" placeholder="Enter your password">
    <button type="submit">Register</button>
</form>
