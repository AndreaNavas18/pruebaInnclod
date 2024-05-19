@extends('layouts.app')

@section('content')
<div id="dashboard">
</div>
<script>
    window.documentos = @json($documentos);
</script>
@endsection
