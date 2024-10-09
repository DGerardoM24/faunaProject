<?php

use App\Http\Controllers\AsignaComentarioController;
use App\Http\Controllers\AsignaEnfermedadeController;
use App\Http\Controllers\AsignaMultimediaController;
use App\Http\Controllers\AsignaRutaController;
use App\Http\Controllers\BanderaController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\DietaController;
use App\Http\Controllers\EnfermedadeController;
use App\Http\Controllers\EntornoController;
use App\Http\Controllers\EspecyController;
use App\Http\Controllers\EstadosConservacionController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\OrdeneController;
use App\Http\Controllers\PublicacioneController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\TipoEnfermedadeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Importar la clase Auth si no está presente

// Ruta principal que retorna la vista 'welcome'
Route::get('/', function () {
    return view('welcome');
});

// Ruta de recurso para manejar BanderaController
Route::resource('banderas', BanderaController::class);

Route::resource('tipo-enfermedades', TipoEnfermedadeController::class);
Route::resource('clases', ClaseController::class);
Route::resource('ordenes', OrdeneController::class);
Route::resource('estados-conservacions', EstadosConservacionController::class);
Route::resource('entornos', EntornoController::class);
Route::resource('dietas', DietaController::class);
Route::resource('familias', FamiliaController::class);
Route::resource('rutas', RutaController::class);
Route::resource('multimedia', MultimediaController::class);
Route::resource('enfermedades', EnfermedadeController::class);
Route::resource('comentarios', ComentarioController::class);
Route::resource('grupos', GrupoController::class);
Route::resource('especies', EspecyController::class);
Route::resource('publicaciones', PublicacioneController::class);
Route::resource('asigna-multimedia', AsignaMultimediaController::class);
Route::resource('asigna-enfermedades', AsignaEnfermedadeController::class);
Route::resource('asigna-rutas', AsignaRutaController::class);
Route::resource('asigna-comentarios', AsignaComentarioController::class);

// Rutas de autenticación (si estás utilizando laravel/ui)
Auth::routes();

// Ruta para el home, protegido por autenticación
Route::get('/home', [HomeController::class, 'index'])->name('home');
