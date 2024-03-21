<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\HouseOptionsController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ParcelleController;
use App\Http\Controllers\ParcelleOptionsController;
use App\Http\Controllers\PropriétaireController;
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

//Home route
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/pro', [HomeController::class, 'pro'])->name('pro');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*** USERS ROUTES START */

//Users Login routes Start
Route::get('/login', [AuthController::class, 'get_login'])->name('get_login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Users Login routes End

//Users Register routes Start
Route::get('/register', [AuthController::class, 'get_register'])->name('get_register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
//Users Register routes End

/*** USERS ROUTES END */

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /** Routes pour les Agences/Démarcheurs/Propriétaires : START **/

Route::get('/agences', [OwnerController::class, 'get_agences'])->name('get_agences');
//login
Route::get('/owner-login', [OwnerController::class, 'get_owner_login'])->name('get_owner_login');
Route::post('/owner-login', [OwnerController::class, 'login'])->name('login');
//add admin account
Route::get('/add-owner', [OwnerController::class, 'get_add_owner'])->name('get_add_owner');
Route::post('/add-owner', [OwnerController::class, 'add_owner'])->name('add_owner');
//edit admin account
Route::get('/owner-profil{id}', [OwnerController::class, 'edit_owner_profil'])->name('edit_owner_profil');
Route::put('/owner-profil{id}', [OwnerController::class, 'uptodate_owner_profil'])->name('uptodate_owner_profil');
//delete admin account
Route::get('/delete-owner{id}', [OwnerController::class, 'delete_owner_profil'])->name('delete_owner_profil');

    /** Routes pour les Agences/Démarcheurs/Propriétaires : END **/

////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /** Routes pour les Clients(users) : END **/

Route::get('/clients', [ClientsController::class, 'get_clients'])->name('get_clients');
        //edit user profil informations
Route::get('/edit-user-profil{id}', [AuthController::class, 'user_edit'])->name('edit_user_profil');
Route::put('/edit-user-profil{id}', [AuthController::class, 'user_update'])->name('update_user_profil');
        //delete user profil
Route::get('/delete_user{id}', [AuthController::class, 'delete_user'])->name('delete_user_profil');

    /** Routes pour les Clients(users) : END **/

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /** Routes pour les Administrateurs : START **/

        //Dashboard routes Start
Route::get('/dashboard', [AdminController::class, 'get_dashboard'])->name('get_dashboard');

        //login
Route::get('/admin-login', [AdminController::class, 'get_admin_login'])->name('get_admin_login');
Route::post('/admin-login', [AdminController::class, 'login'])->name('admin_login');
Route::get('/administrateurs', [AdminController::class, 'get_admin'])->name('get_admins');
        //add admin account
Route::get('/add-admin', [AdminController::class, 'get_add_admin'])->name('get_add_admin');
Route::post('/add-admin', [AdminController::class, 'add_admin'])->name('add_admin');
        //edit admin account
Route::get('/edit-profil{id}', [AdminController::class, 'edit_profil'])->name('edit_profil');
Route::put('/edit-profil{id}', [AdminController::class, 'uptodate'])->name('profil_uptodate');
        //delete admin account
Route::get('/delete{id}', [AdminController::class, 'deleteit'])->name('delete_admin_profil');

    /** Routes pour les Administrateurs : END **/

////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /** Routes pour les PROPRIÉTÉS : Start **/

    Route::get('/maisons', [HouseController::class, 'get_houses'])->name('get_houses');
    //add admin account
Route::get('/add-house', [HouseController::class, 'get_add_house'])->name('get_add_house');
Route::post('/add-house', [HouseController::class, 'add_house'])->name('add_house');
    //edit user profil informations
Route::get('/edit-house{id}', [HouseController::class, 'edit_house'])->name('edit_house');
Route::put('/edit-house{id}', [HouseController::class, 'update_house'])->name('update_house');
    //delete user profil
Route::get('/delete-house{id}', [HouseController::class, 'delete_house'])->name('delete_house');

//User Views
$idRegist = '[0-9]+';
$slugRegist = '[0-9a-z\-]+';

Route::get('/properties', [HouseController::class, 'properties'])->name('properties.listing');
Route::get('/property/{slug}-{property}', [HouseController::class, 'show'])->name('properties.details')->where([
    'property' => $idRegist,
    'slug' => $slugRegist
]);

/** Routes pour les PROPRIÉTÉS  : END **/


////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /** Routes pour les caractéristiques des propriétés : START **/

Route::get('/house-options', [HouseOptionsController::class, 'get_options'])->name('get_options');
    //add house option
Route::get('/add-option', [HouseOptionsController::class, 'get_add_option'])->name('get_add_option');
Route::post('/add-option', [HouseOptionsController::class, 'add_option'])->name('add_option');
    //edit house option informations
Route::get('/edit-option{id}', [HouseOptionsController::class, 'edit_option'])->name('edit_option');
Route::put('/edit-option{id}', [HouseOptionsController::class, 'update_option'])->name('update_option');
    //delete house option
Route::get('/delete-option{id}', 'HouseOptionsController@delete_option')->name('destroy_option');
/** Routes pour les caractéristiques des propriétés : END **/



////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /** Routes pour les PARCELLES: Start **/

    Route::get('/parcelle', [ParcelleController::class, 'get_parcelles'])->name('get_parcelles');
    //add admin account
    Route::get('/add-parcelle', [ParcelleController::class, 'get_add_parcelle'])->name('get_add_parcelle');
    Route::post('/add-parcelle', [ParcelleController::class, 'add_parcelle'])->name('add_parcelle');
    //edit user profil informations
    Route::get('/edit-parcelle{id}', [ParcelleController::class, 'edit_parcelle'])->name('edit_parcelle');
    Route::put('/edit-parcelle{id}', [ParcelleController::class, 'update_parcelle'])->name('update_parcelle');
    //delete user profil
Route::get('/delete-parcelle{id}', [ParcelleController::class, 'delete_parcelle'])->name('delete_parcelle');

//User Views
Route::get('/parcelles', [ParcelleController::class, 'parcelles'])->name('parcelles.listing');
Route::get('/parcelle/{slugue}-{parcelle}', [ParcelleController::class, 'show'])->name('parcelle.details')->where([
    'parcelle' => $idRegist,
    'slugue' => $slugRegist
]);

/** Routes pour les PARCELLES: END **/



////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /** Routes pour les caractéristiques des parcelles : START **/
    Route::get('/parcelle-parcel_options', [ParcelleOptionsController::class, 'get_parcel_options'])->name('get_parcel_options');
    //add parcelle option
Route::get('/add-parcel_option', [ParcelleOptionsController::class, 'get_add_parcel_option'])->name('get_add_parcel_option');
Route::post('/add-parcel_option', [ParcelleOptionsController::class, 'add_parcel_option'])->name('add_parcel_option');
    //edit parcelle option informations
Route::get('/edit-parcel_option{id}', [ParcelleOptionsController::class, 'edit_parcel_option'])->name('edit_parcel_option');
Route::put('/edit-parcel_option{id}', [ParcelleOptionsController::class, 'update_parcel_option'])->name('update_parcel_option');
    //delete parcelle option
Route::get('/delete-parcel_option{id}', 'ParcelleOptionsController@delete_parcel_option')->name('delete_parcel_option');
/** Routes pour les caractéristiques des parcelles : END **/

