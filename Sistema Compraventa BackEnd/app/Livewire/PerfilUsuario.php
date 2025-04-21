<?php

namespace App\Livewire;

use Livewire\Component;

class PerfilUsuario extends Component
{
    public function render()
    {
        return view('livewire.perfil-usuario')->extends('layouts.app')->section('content');
    }
}
