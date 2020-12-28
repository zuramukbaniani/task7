@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <form action="{{ route('save_passport_id') }}" method="post">
                        @csrf
                        <input type="text" name="passport_id" class="form-control" placeholder="პირადი ნომერი">
                        <button class="btn btn-warning">დამატება</button>
                    </form>
                    @foreach ($posts as $post)
                        <a href="{{ route('show', ['id'=>$post->id]) }}">{{ $post->title }}</a>
                        <article>{{ $post->desc }}</article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
