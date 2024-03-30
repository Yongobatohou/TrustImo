@extends('layouts/auth')


@section('auth')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ajouter un nouvel Administrateur</h1>
    </div>


    <form class="row g-3" method="POST" action="{{route('uptodate_owner_profil', ['id' => $profil->id])}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-12">
            <label for="OwnerName" class="form-label">Nom(/Intitulé de l'angence)</label>
            <input type="text" class="form-control" id="OwnerName" name="OwnerName" value="{{$profil->OwnerName}}">
            @error('OwnerName')
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
        <div class="form-group col-md-6">
            <label class="control-label" for="departement">Département</label>
            <select class="form-control" name="departement" id="departement">
                <option value="{{$profil->departement}}" selected>{{$profil->departement}}</option>
                <option value="ATACORA">ATACORA</option>
                <option value="DONGA">DONGA</option>
                <option value="BORGOU">BORGOU</option>
                <option value="ALIBORI">ALIBORI</option>
                <option value="ZOU">ZOU</option>
                <option value="COLLINE">COLLINE</option>
                <option value="OUÉMÉ">OUÉMÉ</option>
                <option value="MONO">MONO</option>
                <option value="COUFFO">COUFFO</option>
                <option value="PLATEAU">PLATEAU</option>
                <option value="ATLANTIQUE">ATLANTIQUE</option>
                <option value="LITORALE">LITORALE</option>
            </select>
            @error('departement')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label class="control-label" for="OwnerCity">Ville</label>
            <select class="form-control" name="OwnerCity" id="OwnerCity">
                <option value="{{$profil->OwnerCity}}">{{$profil->OwnerCity}}</option>
                <option value="Natitingou">Natitingou</option>
                <option value="Parakou">Parakou</option>
                <option value="Tanguiéta">Tanguiéta</option>
                <option value="Kandi">Kandi</option>
                <option value="N'Dali">N'Dali</option>
                <option value="Perma">Perma</option>
            </select>
            @error('OwnerCity')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label class="control-label" for="tel">Numero de téléphone</label>
            <input class="form-control" type="text" name="tel" id="tel" value="{{$profil->tel}}">
            @error('tel')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label class="control-label" for="statut">Status</label>
            <select class="form-control" name="status" id="statut">
                <option value="{{$profil->status}}">{{$profil->status}}</option>
                <option value="Démarcheur">Démarcheur</option>
                <option value="Agence">Agence</option>
                <option value="Propriétaire">Propriétaire</option>
            </select>
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label class="control-label" for="avatar">Avatar</label>
            <input class="form-control" type="file" id="avatar" name="avatar">
            @error('avatar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
            <div class="col-md-6">
                <input type="password" class="form-control"
                    id="exampleInputPassword" name="password" placeholder="Mot de passe">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control"
                    id="exampleRepeatPassword" name="password_confirmation" placeholder="Confirmer mot de passe">
            </div>
        <div class="col-md-12 mt-2 d-flex justify-content-center">
          <button type="submit" class="btn btn-light" style="background-color: #389d69;">Mettre à jour</button>
        </div>
      </form>



@endsection

