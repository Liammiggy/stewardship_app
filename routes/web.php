<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PastorController;
use App\Http\Controllers\ChurchController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\IncedentClaimsController;
use App\Http\Controllers\ContributionController;
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

Route::get('/', function () {
    return view('auth/login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(MahasiswaController::class)->prefix('dataMahasiswa')->group(function () {
        Route::get('', 'index')->name('dataMahasiswa');       
        Route::get('create', 'create')->name('dataMahasiswa.create');
        Route::post('store', 'store')->name('dataMahasiswa.store');
        Route::get('show/{id}', 'show')->name('dataMahasiswa.show');
        Route::get('edit', 'edit')->name('dataMahasiswa.edit');
        Route::put('edit/{id}', 'update')->name('dataMahasiswa.update');
        Route::delete('destroy/{id}', 'destroy')->name('dataMahasiswa.destroy');
        Route::get('memberlist', 'memberlist')->name('dataMahasiswa.memberlist');
        Route::get('bulkupload', 'bulkupload')->name('dataMahasiswa.bulkupload');
        Route::get('addpayment', 'addpayment')->name('dataMahasiswa.addpayment');


    });

     
 
  Route::controller(PastorController::class)->prefix('dataPastor')->group(function () {
       
        Route::get('addpastor', 'addpastor')->name('dataPastor.addpastor');
        Route::get('pastorlist', 'pastorlist')->name('dataPastor.pastorlist');
        Route::get('edit', 'edit')->name('dataPastor.edit');


    });


      Route::controller(ChurchController::class)->prefix('dataChurch')->group(function () {
       
        Route::get('addchurch', 'addchurch')->name('dataChurch.addchurch');
        Route::get('churchlist', 'churchlist')->name('dataChurch.churchlist');
        Route::get('edit', 'edit')->name('dataChurch.edit');


    });

        Route::controller(OrganizationController::class)->prefix('dataOrganization')->group(function () {
       
        Route::get('addorganization', 'addorganization')->name('dataOrganization.addorganization');
        Route::get('organizationlist', 'organizationlist')->name('dataOrganization.organizationlist');
        Route::get('edit', 'edit')->name('dataOrganization.edit');


    });




        Route::controller(IncedentClaimsController::class)->prefix('dataIncedentClaims')->group(function () {
       
        Route::get('addincidentrequest', 'addincidentrequest')->name('dataIncedentClaims.addincidentrequest');
        Route::get('incidentlist', 'incidentlist')->name('dataIncedentClaims.incidentlist');
        Route::get('edit', 'edit')->name('dataIncedentClaims.edit');
        route::get('claimsreleasing', 'claimsreleasing')->name('dataIncedentClaims.claimsreleasing');
        Route::get('printpreview', 'printpreview')->name('dataIncedentClaims.printpreview');


    });


        Route::controller(ContributionController::class)->prefix('dataContribution')->group(function () {
       
        Route::get('addcontribution', 'addcontribution')->name('dataContribution.addcontribution');
        Route::get('add_Incedent_contribution', 'add_Incedent_contribution')->name('dataContribution.add_Incedent_contribution');
         Route::get('add_Incedent_contribution_payment', 'add_Incedent_contribution_payment')->name('dataContribution.add_Incedent_contribution_payment');
        Route::get('contributionlist', 'contributionlist')->name('dataContribution.contributionlist');
        Route::get('edit', 'edit')->name('dataContribution.edit');       
        Route::get('printpreview', 'printpreview')->name('dataContribution.printpreview');


    });




    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
   
});
