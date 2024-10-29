<?php

namespace App\Livewire\Admin\Warehouses;

use Livewire\Component;
use App\Models\Warehouse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AddWarehouse extends Component
{
    public $warehouse;
    public $warehouse_status;
    public $isLoading = false;

    public function reload()
    {
        $this->isLoading = true;
    }

    public function render()
    {
        $title = "Warehouse";

        return view('livewire.admin.warehouses.add-warehouse', compact('title'));
    }

    public function save()
    {
        $user = Auth::user();

        $this->validate([
            'warehouse' => "required|unique:warehouses,warehouse",
            'warehouse_status' => "required"
        ]);
       
        Warehouse::create([
            'warehouse' => $this->warehouse,
            'wid' => Str::uuid(),
            'location' => "Lagos",
            'user_id' => $user->id,
            'warehouse_status' => $this->warehouse_status 
        ]);

        session()->flash('success', 'Warehouse successfully created.');

        $this->reset(['warehouse', 'warehouse_status']);

        return $this->redirect(route('warehouse.index'), navigate: true);
    }
}
