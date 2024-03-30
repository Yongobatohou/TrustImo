<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function get_clients(){
        $clients = User::all();
        return view('Admin.User.clients', [
            'clients' => $clients,
        ]);
    }


}
