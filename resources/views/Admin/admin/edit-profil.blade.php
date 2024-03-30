@extends('layouts/auth')


@section('auth')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajouter un nouvel Administrateur</h1>
    </div>

    <form class="row g-3" method="POST" action="{{route('profil_uptodate', ['id' => $profil->id])}}">
        @method('PUT')
        @csrf
        <div class="col-12">
            <label for="adminName" class="form-label">Nom et Prénom(s)</label>
            <input type="text" class="form-control" id="adminName" name="adminName" value="{{$profil->adminName}}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{$profil->email}}">
          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="adminTel" class="form-label">Téléphone</label>
          <input type="tel" class="form-control" name="adminTel" id="adminTel" value="{{$profil->adminTel}}">
          @error('adminTel')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword4" name="password">
          @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Confirmer Password</label>
          <input name="password_confirmation" type="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-md-12 mt-2">
          <button type="submit" class="btn btn-light" style="background-color: #389d69;">Créer</button>
        </div>
      </form>

@endsection

