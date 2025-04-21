<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Usuarios;
use App\Livewire\HistorialCompras;
use App\Livewire\HistorialVentas;
use App\Livewire\PerfilUsuario;


Route::get('/', Usuarios::class)->name('login');
Route::get('/logout', Usuarios::class)->name('logout');
Route::get('/register', Usuarios::class)->name('register');
Route::get('/perfil', PerfilUsuario::class)->name('perfil');
Route::get('/historial-compras', HistorialCompras::class)->name('historial-compras');
Route::get('/historial-ventas', HistorialVentas::class)->name('historial-ventas');
