@extends('layouts.app')

@section('title') Login @endsection

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


<form action="{{ route('login') }}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">username</label>
    <input name="username" type="text" class="form-control"
     id="exampleInputEmail1" aria-describedby="emailHelp"
     value="{{old('username')}}"
     >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">password</label>
    <input name="password" type="password" class="form-control"
     id="exampleInputEmail1" aria-describedby="emailHelp"
     value="{{old('password')}}"
     >
  </div>
  
  <div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Role</label>
  <select  name="role" class="form-control">

    <option value="admin">Admin</option>
    <option value="customer">customer</option>
    <option value="vendor">vendor</option>
  </select>
  </div>


  <button type="submit" class="btn btn-primary">Login</button>
</form>


@endsection('content')
