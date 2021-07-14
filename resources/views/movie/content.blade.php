@extends('layouts.app')

@section('content')
<div class="container col-12">
    <div class="row">
      <div class="col-4 text-center">
            <img src="{{asset($movie->fiche)}}" style="width: 300px" alt="" srcset="">
      </div>
      <div class="col-8">
          
        <h1 >{{$movie->titre}}</h1>
        <h3>{{$movie->dPub}}</h3>

      </div>
    </div>
    <div class="row mt-5">

      <div class="col-12">
        <h3 >Comments</h3>
        @foreach ($movie->comments() as $comment)
        <div class="">
          <h4><span style="font-size: 15px">{{$comment->created_at}}</span></h4>
          <div class="content d-flex justify-content-between">
            <h4 class="pt-1 mx-5" >{{$comment->message}}</h4>
            {{-- {{ $commentaire->user_id }} --}}
            @auth
            @if ($comment->user_id==Auth::user()->id)

                <form action="{{route('comment.update',$comment->id)}}" method="post">
                  <a href="{{route('comment.edit',$comment->id)}}" class="btn btn-primary">Edit</a>
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            @endif

            @endauth


          </div>
          <div class="lign bg-dark" style="height: 0.5px;">

          </div>
      </div>
      @endforeach
    </div>
  </div>

    @auth

    <div class="row mt-5">

      <div class="col-12">
      <form action="{{route('comment.store')}}" class="d-flex justify-content-center" method="post">
        @csrf
        <input type="hidden" name="movie_id" value="{{$movie->id}}">
        <input type="text" class="form-control" name="message">
        <input class="btn btn-dark " type="submit" value="add" > 
      </form>
    </div>
  </div>
    @endauth

  </div>
@endsection