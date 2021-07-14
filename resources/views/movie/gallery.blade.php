@extends('layouts.app')
@section('content')
<div class="container col-12 d-flex justify-content-evenly " >
    <div class="row col-12 ">
        @foreach ($movies as $row)
            <div class="col-lg-3 col-md-4 col-sm-6  ">
                <div class="card m-2 " style="width: 18rem;">
                    <img src="{{asset($row->fiche)}}"  class="card-img-top" alt="{{$row->fiche}}" style="height: 22rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$row->titre}}</h5>
                        <h6 class="card-title">{{$row->dPub}}</h6>
                        <a href="{{route('comment.show',$row->id)}}" class="btn btn-info col-12">Show</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  </div>
@endsection