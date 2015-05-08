@extends('app')

@section('content')
<h1>Add User to {{ $group->name }}</h1>
{!! form($form) !!}
@endsection
