@if (session('message'))
  <p>{{ session('message') }}</p>
@endif

<p>Selamat datang {{ Auth::user()->name }}</p>
