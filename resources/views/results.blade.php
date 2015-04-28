@extends('layout')

@section('content')

  <h1>Classes</h1>

 <p>
  @if (sizeof($classes) > 0)
    Showing <strong>{{ sizeof($classes) }}</strong> yoga classes
  @else
    No results
  @endif
  @if ($searchKeyword != '')
    for <strong>{{ $searchKeyword }}</strong> 
  @else
    for <strong>all keywords</strong>
  @endif
  @if ($searchLocation != '')
    in <strong>{{ $searchLocation->location_name }}</strong> 
  @else
    in <strong>all locations</strong> 
  @endif
  @if ($searchStyle != '')
    with <strong>{{ $searchStyle->style_name }}</strong>
  @else
    with <strong>all styles</strong>
  @endif
  <a href="/">or go home</a>

  @if (sizeof($classes) > 0)
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Location</th>
          <th>Style</th>
          <th>Studio</th>
          <th>Day</th>
          <th>Time</th>
          <th>Rating</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($classes as $class)
        <tr>
          <td><a href="/classes/id/{{ $class->id }}">{{ $class->name }}</a></td>
          <td>{{ $class->location }}</td>
          <td>{{ $class->style }}</td>
          <td><a href="/studios/id/{{ $class->studio_id }}">{{ $class->studio }}</a></td>
          <td>{{ $class->day }}</td>
          <td>{{ $class->time }} {{ $class->period }}</td>
          <td>
            @for ($i = 1; $i <= 5; $i++)
              @if ($i <= round($class->rating))
                &#9733;
              @else
                &#9734;
              @endif
            @endfor
            &nbsp;
            ({{ $class->num_ratings }} @if ($class->num_ratings != 1) ratings) @else rating) @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @endif

  <br><br>

@stop