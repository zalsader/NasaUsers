@extends('app')

@section('content')
@foreach($groups as $group)
<a class="btn btn-primary" href="{{ route('groups.show', $group->permalink) }}" >{{$group->name}}</a>
@endforeach

<a class="btn btn-primary" href="{{ route('groups.create') }}">Add new Group</a>
@endsection
