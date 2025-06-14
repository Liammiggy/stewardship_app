<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PastorController;
use App\Http\Controllers\ChurchController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\IncedentClaimsController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\RepresentativeController;

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
        // Route::post('store', 'store')->name('dataMahasiswa.store');
        Route::get('show/{id}', 'show')->name('dataMahasiswa.show');
        Route::get('edit', 'edit')->name('dataMahasiswa.edit');
        Route::put('edit/{id}', 'update')->name('dataMahasiswa.update');
        Route::delete('destroy/{id}', 'destroy')->name('dataMahasiswa.destroy');
        Route::get('memberlist', 'memberlist')->name('dataMahasiswa.memberlist');
        Route::get('bulkupload', 'bulkupload')->name('dataMahasiswa.bulkupload');
        Route::get('addpayment', 'addpayment')->name('dataMahasiswa.addpayment');




        Route::get('/dataMahasiswa', [MahasiswaController::class, 'index'])->name('dataMahasiswa.index');
        Route::get('/dataMahasiswa/create', [MahasiswaController::class, 'create'])->name('dataMahasiswa.create');
        Route::post('/dataMahasiswa/store', [MahasiswaController::class, 'store'])->name('dataMahasiswa.store');




    });



  Route::controller(PastorController::class)->prefix('dataPastor')->group(function () {

        Route::get('addpastor', 'addpastor')->name('dataPastor.addpastor');
        Route::get('pastorlist', 'pastorlist')->name('dataPastor.pastorlist');
        Route::get('edit', 'edit')->name('dataPastor.edit');


    });


    //   Route::controller(ChurchController::class)->prefix('dataChurch')->group(function () {

    //     Route::get('addchurch', 'addchurch')->name('dataChurch.addchurch');
    //     Route::get('churchlist', 'churchlist')->name('dataChurch.churchlist');
    //     Route::get('edit', 'edit')->name('dataChurch.edit');


    // });


    //   Route::controller(RepresentativeController::class)->prefix('dataRepresentative')->group(function () {

    //     Route::get('representativelistAdd', 'representativelistAdd')->name('dataRepresentative.representativelistAdd');
    //     Route::get('representativelist', 'representativelist')->name('dataRepresentative.representativelist');
    //     Route::get('edit', 'edit')->name('dataRepresentative.edit');


    // });

        Route::controller(RepresentativeController::class)->prefix('dataRepresentative')->group(function () {
        Route::get('representativelistAdd', 'representativelistAdd')->name('dataRepresentative.representativelistAdd');
        Route::get('representativelist', 'representativelist')->name('dataRepresentative.representativelist');
        Route::get('/representative/edit/{id}', [RepresentativeController::class, 'edit'])->name('dataRepresentative.edit');
        Route::put('/representative/update/{id}', [RepresentativeController::class, 'update'])->name('dataRepresentative.update');

        Route::post('store', 'store')->name('dataRepresentative.store'); // <-- ADD THIS
    });


    //     Route::controller(OrganizationController::class)->prefix('dataOrganization')->group(function () {

    //     Route::get('addorganization', 'addorganization')->name('dataOrganization.addorganization');
    //     Route::get('organizationlist', 'organizationlist')->name('dataOrganization.organizationlist');
    //     Route::get('edit', 'edit')->name('dataOrganization.edit');


    // });

     Route::get('/get-representatives/{type}', [RepresentativeController::class, 'getRepresentatives']);
     Route::get('/count-members', [MahasiswaController::class, 'countMembers']);
     Route::get('/count-member-types', [MahasiswaController::class, 'countMemberTypes']);

     Route::get('/get-members', [MahasiswaController::class, 'getMembers']);





        Route::controller(IncedentClaimsController::class)->prefix('dataIncedentClaims')->group(function () {

        Route::get('create', 'create')->name('dataIncedentClaims.create');
        Route::get('incidentlist', 'incidentlist')->name('dataIncedentClaims.incidentlist');
        Route::get('edit', 'edit')->name('dataIncedentClaims.edit');
        route::get('claimsreleasing', 'claimsreleasing')->name('dataIncedentClaims.claimsreleasing');
        Route::get('printpreview', 'printpreview')->name('dataIncedentClaims.printpreview');


        Route::post('store', [IncedentClaimsController::class, 'store'])->name('dataIncedentClaims.store');



    });
         Route::resource('incidents', \App\Http\Controllers\IncidentController::class);






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
