<?php

namespace App\Livewire\Admin\Warehouses;

use App\Models\Warehouse;
use Livewire\Component;

class AllWarehouses extends Component
{

    public function render()
    {
        $title = "Warehouse";

        $warehouses = Warehouse::with("user")->latest()->paginate(5);

        return view('livewire.admin.warehouses.all-warehouses', compact('title', 'warehouses'));
    }
}
