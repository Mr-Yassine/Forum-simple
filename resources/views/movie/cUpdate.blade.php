@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('comment.update',$comment->id)}}" class="d-flex justify-content-center" method="post">

            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <input type="hidden" name="post_id" value="{{ $comment->movie->id }}">
                <input type="text" class="form-control"  value="{{ $comment->message }}" name="message">
                <input class="btn btn-dark " type="submit" value="add" > 
            </div>
        </form>

        
      </div>
    </div>
  </div>
@endsection