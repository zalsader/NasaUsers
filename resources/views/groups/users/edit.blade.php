@extends('app')

@section('content')
<h1>Edit user in {{ $group->name }}</h1>
{!! form($form) !!}
{!! form($deleteForm) !!}
@endsection
