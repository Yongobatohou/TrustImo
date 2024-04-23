<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\HouseOptionsController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\OwnerDashController;
use App\Http\Controllers\ParcelleController;
use App\Http\Controllers\ParcelleOptionsController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\PictureParcelleController;
use App\Http\Controllers\PropriétaireController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\OwnerAuthenticate;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*** USERS ROUTES START */

//Home route
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/pro', [HomeController::class, 'pro'])->name('pro');

Route::get('/login', [AuthController::class, 'get_login'])->name('get_login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
//Users Register routes Start
Route::get('/register', [AuthController::class, 'get_register'])->name('get_register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
//Users Register routes End

Route::post('/contact-message', [ContactController::class, 'contact'])->name('contact');

Route::middleware('auth')->group(function () {
    //User Views
    $idRegist = '[0-9]+';
    $slugRegist = '[0-9a-z\-]+';

    Route::get('/properties', [HouseController::class, 'properties'])->name('properties.listing');
    Route::get('/property/{slug}-{property}', [HouseController::class, 'show'])->name('properties.details')->where([
        'property' => $idRegist,
        'slug' => $slugRegist
    ]);

    Route::get('/parcelles', [ParcelleController::class, 'parcelles'])->name('parcelles.listing');
    Route::get('/parcelle/{slugue}-{parcelle}', [ParcelleController::class, 'show'])->name('parcelle.details')->where([
        'parcelle' => $idRegist,
        'slugue' => $slugRegist
    ]);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
        //Admin && Owner profil
    Route::get('/pro-profil', [AuthController::class, 'profil'])->name('get-profil');

    // User Profil start
    Route::get('/profil', [ClientsController::class, 'profil'])->name('profil');
    Route::put('/profil{id}', [ClientsController::class, 'user_update'])->name('updated_user');
    Route::put('/pass-profil{id}', [ClientsController::class, 'user_pass_update'])->name('update_pass');

    //User profil END

    /*** USERS ROUTES END */




    /////////////////////////////////////////////////////////////////////////////////////////////////////////////




    /** Routes pour les ADMINISTRATEURS : START **/



    /** Routes Clients: START **/

    //edit user profil informations
    Route::get('/edit-user-profil{id}', [AuthController::class, 'user_edit'])->name('edit_user_profil');
    Route::put('/edit-user-profil{id}', [AuthController::class, 'user_update'])->name('update_user_profil');
    //delete user profil
    Route::get('/delete_user{id}', [AuthController::class, 'delete_user'])->name('delete_user_profil');

    /** Routes Clients : END **/



    /** Routes Admins : START **/

    //Dashboard routes Start
    Route::get('/dashboard', [HomeController::class, 'get_dashboard'])->name('get_dashboard');
    Route::get('/clients', [ClientsController::class, 'get_clients'])->name('get_clients');
    Route::get('/maisons', [HouseController::class, 'get_houses'])->name('get_houses');
    /* Route::get('/agences', [OwnerController::class, 'get_agences'])->name('get_agences'); */




    /** Routes PROPRIÉTÉS : Start **/

    //add admin account
    Route::get('/add-house', [HouseController::class, 'get_add_house'])->name('get_add_house')->can('create', "App\\Models\House");
    Route::post('/add-house', [HouseController::class, 'add_house'])->name('add_house')->can('create', "App\\Models\House");
    Route::post('/add-pictures{id}', [PictureController::class, 'store'])->name('pictures.store')->can('create', "App\\Models\House");
    Route::get('/pictures{id}', [PictureController::class, 'destroy'])->name('pictures.destroy')->can('create', "App\\Models\House");


    //edit user profil informations
    Route::get('/edit-house{maison}', [HouseController::class, 'edit_house'])->name('edit_house')->can('update', 'maison');
    Route::put('/edit-house{house}', [HouseController::class, 'update_house'])->name('update_house')->can('update', 'house');

    //delete user profil
    Route::get('/delete-house{maison}', [HouseController::class, 'delete_house'])->name('delete_house')->can('delete', 'maison');

    /** Routes PROPRIÉTÉS  : END **/





    /** Routes caractéristiques (propriétés) : START **/

    Route::get('/house-options', [HouseOptionsController::class, 'get_options'])->name('get_options')->can('create', "App\\Models\HouseOption");
    //add house option
    Route::get('/add-option', [HouseOptionsController::class, 'get_add_option'])->name('get_add_option')->can('create', "App\\Models\HouseOption");
    Route::post('/add-option', [HouseOptionsController::class, 'add_option'])->name('add_option')->can('create', "App\\Models\HouseOption");

    //edit house option informations
    Route::get('/edit-option{id}', [HouseOptionsController::class, 'edit_option'])->name('edit_option');
    Route::put('/edit-option{id}', [HouseOptionsController::class, 'update_option'])->name('update_option');

    //delete house option
    Route::get('/delete-option{id}', 'HouseOptionsController@delete_option')->name('destroy_option');
    /** Routes caractéristiques (propriétés) : END **/





    /** Routes PARCELLES: Start **/

    Route::get('/parcelle', [ParcelleController::class, 'get_parcelles'])->name('get_parcelles');

    //add parcelle
    Route::get('/add-parcelle', [ParcelleController::class, 'get_add_parcelle'])->name('get_add_parcelle')->can('create', "App\\Models\Parcelle");
    Route::post('/add-parcelle', [ParcelleController::class, 'add_parcelle'])->name('add_parcelle')->can('create', "App\\Models\Parcelle");

    Route::post('/add-parcelle_pictures{id}', [PictureParcelleController::class, 'store'])->name('addparcellepictures')->can('create', "App\\Models\Parcelle");
    Route::get('/get-parcelle_pictures{id}', [PictureParcelleController::class, 'destroy'])->name('destroyparcellepictures')->can('create', "App\\Models\Parcelle");

    //edit parcelle
    Route::get('/edit-parcelle{parcelle}', [ParcelleController::class, 'edit_parcelle'])->name('edit_parcelle')->can('update', 'parcelle');
    Route::put('/edit-parcelle{Parcelle}', [ParcelleController::class, 'update_parcelle'])->name('update_parcelle')->can('update', 'Parcelle');

    //delete parcelle
    Route::get('/delete-parcelle{parcelle}', [ParcelleController::class, 'delete_parcelle'])->name('delete_parcelle')->can('delete', 'parcelle');

    /** Routes PARCELLES: END **/





    /** Routes caractéristiques (parcelles) : START **/

    Route::get('/parcelle-parcel_options', [ParcelleOptionsController::class, 'get_parcel_options'])->name('get_parcel_options')->can('create', "App\\Models\ParcelleOption");

    //add parcelle option
    Route::get('/add-parcel_option', [ParcelleOptionsController::class, 'get_add_parcel_option'])->name('get_add_parcel_option')->can('create', "App\\Models\ParcelleOption");
    Route::post('/add-parcel_option', [ParcelleOptionsController::class, 'add_parcel_option'])->name('add_parcel_option')->can('create', "App\\Models\ParcelleOption");


    //edit parcelle option informations
    Route::get('/edit-parcel_option{id}', [ParcelleOptionsController::class, 'edit_parcel_option'])->name('edit_parcel_option')->can('update', "App\\Models\ParcelleOption");
    Route::put('/edit-parcel_option{id}', [ParcelleOptionsController::class, 'update_parcel_option'])->name('update_parcel_option')->can('update', "App\\Models\ParcelleOption");


    //delete parcelle option
    Route::get('/delete-parcel_option{id}', 'ParcelleOptionsController@delete_parcel_option')->name('delete_parcel_option')->can('delete', "App\\Models\ParcelleOption");

    /** Routes caractéristiques (parcelles) : END **/
});
