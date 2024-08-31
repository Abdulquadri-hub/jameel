<?php

namespace App\Livewire\Admin\Warehouses;

use Livewire\Component;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;

class EditWarehouse extends Component
{
    public $wid;
    public $warehouse;
    public $warehouse_status;

    public function render()
    {
        $data['title']  = "Warehouse";

        if(!empty($this->wid))
        {
            
            $data['single_warehouse'] = Warehouse::where("wid", $this->wid)->first();

            $this->warehouse = $data['single_warehouse']->warehouse;
            $this->warehouse_status = $data['single_warehouse']->warehouse_status;

        }else {

            session()->flash('error', 'This warehouse do not exists.');

            return $this->redirect(route('warehouse.index'), navigate: true);
        }

        return view('livewire.admin.warehouses.edit-warehouse',$data);
    }

    public function save()
    {
        $user = Auth::user();

        $this->validate([
            'warehouse' => "required|unique:warehouses,warehouse",
            'warehouse_status' => "required"
        ]);
       
        Warehouse::where("wid", $this->wid)->first()->update([
            'warehouse' => $this->warehouse,
            'warehouse_status' => $this->warehouse_status 
        ]);

        session()->flash('success', 'Warehouse successfully updated.');

        $this->reset(['warehouse', 'warehouse_status']);

        return $this->redirect(route('warehouse.index'), navigate: true);
    }
}
