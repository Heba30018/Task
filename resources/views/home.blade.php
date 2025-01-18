@extends('layouts.app')

@section('title') Create @endsection

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<h1>{{ $message }}</h1>

@endsection('content')
