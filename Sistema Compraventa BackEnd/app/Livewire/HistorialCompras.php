<?php

namespace App\Livewire;

use Livewire\Component;

class HistorialCompras extends Component
{
    public function render()
    {
        return view('livewire.historial-compras')->extends('layouts.app')->section('content');
    }
}
