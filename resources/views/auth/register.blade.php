<!-- resources/views/auth/register.blade.php -->
<form method="POST" action="/register">
  @if (count($errors) > 0)
    <ul>
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
    </ul>
  @endif
  
{!! csrf_field() !!}
<div>
  Name
  <input type="text" name="name" value="{{ old('name') }}">
</div>
<div>
  Username
  <input type="text" name="username" value="{{ old('username') }}">
</div>
<div>
  Email
  <input type="email" name="email" value="{{ old('email') }}">
</div>
<div>
  Password
  <input type="password" name="password">
</div>
<div>
  Confirm Password
  <input type="password" name="password_confirmation">
</div>
<div>
  <button type="submit">Register</button>
</div>
</form>
