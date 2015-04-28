@extends('layout')

@section('content')

<h1>Studios</h1>
<p>
@if (sizeof($studios) > 0)
  Showing <strong>{{ sizeof($studios) }}</strong> yoga studios
@else
  No results
@endif
in <strong>{{ $location_name }}</strong> <a href="/">or go home</a>

@if (sizeof($studios) > 0)
<table class="table table-striped">
  <thead>
    <tr>
      <th>Name</th>
      <th>Location</th>
      <th>Address</th>
      <th>Website</th>
      <th>Rating</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($studios as $studio)
    <tr>
      <td><a href="/studios/id/{{ $studio->id }}">{{ $studio->studio_name }}</a></td>
      <td>{{ $studio->location_name }}</td>
      <td>{{ $studio->address }}</td>
      <td><a href="{{ $studio->website }}">{{ $studio->website }}</a></td>
      <td>
        @for ($i = 1; $i <= 5; $i++)
          @if ($i <= round($studio->rating))
            &#9733;
          @else
            &#9734;
          @endif
        @endfor
        &nbsp;
        ({{ $studio->num_ratings }} ratings)
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif

<br><br>

@stop