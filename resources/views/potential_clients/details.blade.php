@extends('layouts.app')

@section('content')

<div class="card border-warning">
    <div class="card-header">
        Detalhes de:                  
    </div>
    <div class="card-body">
        <pre> {{ var_dump($resultSerach) }}</pre>
    </div>
</div>


@endsection
