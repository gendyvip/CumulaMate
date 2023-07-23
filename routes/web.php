<?php

use App\Http\Controllers\Admin\DegreeController;
use App\Http\Controllers\AcadimicController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('welcome');
})->name('home');
Route::post('/acadimic', [AcadimicController::class, 'acadimic'])->name('acadimic');
Route::get('/student/{student}', [AcadimicController::class, 'show'])->name('acadimic.show');

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {
  Route::middleware('can:dashboard')->get('/', [IndexController::class, 'index'])->name('index');
  Route::middleware('can:roles')->resource('/roles', RoleController::class);
  Route::middleware('can:roles')->post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
  Route::middleware('can:roles')->delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
  Route::middleware('can:permissions')->resource('/permissions', PermissionController::class);
  Route::middleware('can:degree')->resource('/degree', DegreeController::class);
  Route::middleware('can:degree excel')->post('/degree-import', [DegreeController::class, 'import'])->name('degree-import');
  Route::middleware(['role:admin', 'permission:mobile scan'])->get('/mobile-app', [DegreeController::class, 'mobile'])->name('mobile-app');
  Route::middleware(['role:admin', 'permission:mobile scan'])->post('/image-scan', [DegreeController::class, 'image'])->name('image-scan');
  Route::middleware('can:export pdf')->get('/pdfexport', [DegreeController::class, 'pdfexport'])->name('pdfexport');
  Route::middleware('can:export pdf')->get('/printdegree', [DegreeController::class, 'printDegree'])->name('printDegree');
  Route::middleware('can:permissions')->post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
  Route::middleware('can:permissions')->delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
  Route::middleware('can:user show')->get('/users', [UserController::class, 'index'])->name('users.index');
  Route::middleware('can:user show')->get('/users/all', [UserController::class, 'getUsersDatatable'])->name('users.all');
  Route::middleware('can:user show')->get('/degree/all', [DegreeController::class, 'getUsersDatatable'])->name('degree.all');
  Route::middleware('can:user delete')->post('/users/delete', [UserController::class, 'delete'])->name('users.delete');
  Route::resources([
    'users' => UserController::class,
    'middleware' => 'user control'
  ]);
  Route::middleware('can:user show')->get('/users/{user}', [UserController::class, 'show'])->name('users.show');
  Route::middleware('can:user delete')->delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
  Route::middleware('can:roles')->post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
  Route::middleware('can:roles')->delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
  Route::middleware('can:permissions')->post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
  Route::middleware('can:permissions')->delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
});

require __DIR__ . '/auth.php';