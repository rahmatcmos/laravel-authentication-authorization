<!-- resources/views/auth/login.blade.php -->
<form method="POST" action="/login">
  @if (count($errors) > 0)
    <ul>
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
    </ul>
  @endif

{!! csrf_field() !!}
<div>
  Username
  <input type="text" name="username" value="{{ old('username') }}">
</div>
<div>
  Password
  <input type="password" name="password" id="password">
</div>
<div>
  <input type="checkbox" name="remember"> Remember Me
</div>
<div>
  <button type="submit">Login</button>
</div>
<div>
  <button type="submit">Login</button>
  <a href="/password/reset">Forgot password?</a>
</div>
</form>
