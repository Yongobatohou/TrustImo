@extends('layouts.auth')

@section('auth')

<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Mettre à jour le compte</h1>
    </div>
    <form class="user" method="POST" action="{{route('update_user_profil', ['id' => $user->id])}}">
        @method('PUT')
        @csrf
        <div class="form-group">
                <input type="text" name="UserName" class="form-control" id="exampleFirstName"
                    placeholder="Nom d'utilisateur" value="{{$user->UserName}}">
                    @error('UserName')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" id="exampleInputEmail"
                placeholder="Adresse Email" value="{{$user->email}}">
                @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="departement">Département</label>
            <select class="form-control" name="departement" id="departement">
                <option value="{{$user->departement}}" selected>{{$user->departement}}</option>
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
        <div class="form-group">
            <label class="control-label" for="userCity">Ville</label>
            <select class="form-control" name="userCity" id="userCity">
                <option value="{{$user->userCity}}">{{$user->userCity}}</option>
                <option value="Natitingou">Natitingou</option>
                <option value="Parakou">Parakou</option>
                <option value="Tanguiéta">Tanguiéta</option>
                <option value="Kandi">Kandi</option>
                <option value="N'Dali">N'Dali</option>
                <option value="Perma">Perma</option>
            </select>
            @error('userCity')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label class="control-label" for="tel">Numero de téléphone</label>
            <input class="form-control" type="text" name="tel" id="tel" value="{{$user->tel}}">
            @error('tel')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control"
                    id="exampleInputPassword" name="password" placeholder="Mot de passe">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control"
                    id="exampleRepeatPassword" name="password_confirmation" placeholder="Confirmer mot de passe">
            </div>
        </div>
        <input class="btn btn-success btn-user" type="submit" value="Mettre à jour">
    </form>
</div>

@endsection
