@if (session('message'))
  <p>{{ session('message') }}</p>
@endif

<p>Selamat datang {{ Auth::user()->name }}</p>

@can('be-organizer')
  <p><a href="/event">Event</a></p>
@endcan
@can('be-participant')
  <p><a href="/event-history">Event History</a></p>
@endcan
