@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row col-lg-12">
      @auth
      <div class="col">
          <div >
              <a href="{{route('movie.create')}}" class="btn btn-dark m-4">New Movies</a>
          </div>
        <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">Fiche</th>
                <th scope="col">Titre</th>
                <th scope="col">Date de Pub</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($movies as $row)
                <tr>
                    <td><img src="{{asset($row->fiche)}}" style="width: 50px"></td>
                    <td>{{$row->titre}}</td>
                    <td>{{$row->dPub}}</td>
                    <td>
                        <form action="{{route('movie.destroy',$row->id)}}" method="post">
                            <a href="{{route('movie.edit',$row->id)}}" class="btn btn-primary">Edit</a>
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                  </tr>
                @endforeach


            </tbody>
          </table>
      </div>
      @endauth
    </div>
  </div>
@endsection
