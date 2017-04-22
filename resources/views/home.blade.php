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

<h3>Semua Event</h3>
@foreach (App\Event::get() as $event)
  <p><strong>Event: {{ $event->name }}</strong></p>
  <p>{{ $event->description }}</p>
  <p>Tempat/Waktu: {{ $event->location }}, {{ $event->begin_date }} - {{ $event->finish_date }}</p>
@can ('be-organizer')
  <a href="/edit-event/{{ $event->id }}">Edit Event</a>
@endcan
@can ('be-participant')
  <a href="/join-event/{{ $event->id }}">Join Event</a>
@endcan
@endforeach
