@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $post->title }}</h2>
        <article>{{ $post->desc }}</article>
        <h1>კომენტარები</h1>   
        <article>{{ $post->comment }}</article>
        <form action="{{ route('comment') }}" method="post">
            @csrf
            <textarea name="comment" class="form-control" placeholder="კომენტარი" cols="30" rows="10"></textarea>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button class="btn btn-primary w-100 mt-4">დაკომენტარება</button>
        </form> 
    </div>
@endsection