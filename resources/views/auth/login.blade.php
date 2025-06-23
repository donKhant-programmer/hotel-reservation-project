<h2>Login</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form action="{{ route('login.post') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>

@if($errors->any())
    <p style="color:red">{{ $errors->first() }}</p>
@endif
