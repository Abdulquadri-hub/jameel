<?php

namespace App\Livewire\Admin\Warehouses;

use App\Models\Warehouse;
use Livewire\Component;

class AllWarehouses extends Component
{
    public $isLoading = false;

    public function reload()
    {
        $this->isLoading = true;
    }
    public function render()
    {
        $title = "Warehouse";

        $warehouses = Warehouse::with("user")->latest()->paginate(5);

        return view('livewire.admin.warehouses.all-warehouses', compact('title', 'warehouses'));
    }
}
