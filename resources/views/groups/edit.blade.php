@extends('app')

@section('content')
{!! form($form) !!}
{!! form($deleteForm) !!}
@endsection
@section('scripts')
<script type="text/javascript">
$('input#name').change(function(event) {
$('input#permalink').val($(this).val().toLowerCase()
    .replace(/^\s+|\s+$|[^\w\s]/g,'').replace(/\s+/g, '-'));
});
</script>
@endsection
