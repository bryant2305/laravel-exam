<form action="{{ route('merchant.login') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Enter your email">
    <input type="password" name="password" placeholder="Enter your password">
    <button type="submit">Login</button>
</form>
