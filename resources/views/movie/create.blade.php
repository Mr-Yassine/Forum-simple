@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('movie.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label  class="form-label">Fiche</label>
              <input type="file" name="image" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Titre</label>
                <input type="text" name="titre" class="form-control" >
              </div>
              <div class="mb-3">
                <label  class="form-label">Date de Pub</label>
                <input type="date" name="datepub" class="form-control" >
              </div>
              <button type="submit" class="btn btn-dark col-12">Save</button>
          </form>
      </div>
    </div>
  </div>
@endsection