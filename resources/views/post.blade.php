@extends('layouts.app')

@section('content')
   <div class="container">
    <form action="{{ route('savepost') }}" method="post">
        @csrf
        <input type="text" name="title" class="form-control" placeholder="title">
        <textarea name="desc" class="form-control" cols="30" rows="10" placeholder="description"></textarea>
        <button class="btn btn-primary mt-4 w-100">დამატება</button>
    </form>
   </div>
@endsection