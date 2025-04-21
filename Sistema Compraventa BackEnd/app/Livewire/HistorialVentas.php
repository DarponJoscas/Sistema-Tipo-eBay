<?php

namespace App\Livewire;

use Livewire\Component;

class HistorialVentas extends Component
{
    public function render()
    {
        return view('livewire.historial-ventas')->extends('layouts.app')->section('content');
    }
}
