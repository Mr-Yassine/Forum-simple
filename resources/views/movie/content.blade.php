@extends('layouts.app')

@section('content')
<div class="container col-12">
    <div class="row">
      <div class="col-4 text-center">
            <img src="{{asset($movie->fiche)}}" style="width: 300px" alt="" srcset="">
      </div>
      <div class="col-8">
          
        <h1 style="font-family: 'Otomanopee One', sans-serif;">{{$movie->titre}}</h1>
        <h3 style="font-size: 16px">{{$movie->dPub}}</h3>

      </div>
    </div>
    <div class="row mt-5">

      <div class="col-12">
        <h3 style="font-family: 'Otomanopee One', sans-serif;">Comments</h3>
        @foreach ($movie->comments() as $comment)
        <div class="" style="width: 90vw; margin: 0 auto;">


          {{-- <h4><span style="font-size: 15px">{{$comment->created_at}}</span></h4> --}}
          <div class="content d-flex justify-content-between align-items-end">
            <h4 class="pt-4 mx-5" style="font-weight: lighter;" >{{$comment->message}}</h4>
            {{-- {{ $commentaire->user_id }} --}}
            @auth
            
            @if ($comment->user_id==Auth::user()->id)
            
                <form action="{{route('comment.update',$comment->id)}}" method="post">
                  <a href="{{route('comment.edit',$comment->id)}}" ><i class="fas fa-edit"></i></a>
                  @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <a type="submit" ><i class="fas fa-trash-alt" style="color: red"></i></a>
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
        <input type="text" class="form-control" name="message"> &nbsp;&nbsp;
        <input class="btn btn-dark " type="submit" value="Submit" > 
      </form>
    </div>
  </div>
    @endauth

  </div>
@endsection

<script src="https://kit.fontawesome.com/6f17665668.js" crossorigin="anonymous"></script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Otomanopee+One&display=swap');

  form i {
    font-size: 26px
  }
</style>