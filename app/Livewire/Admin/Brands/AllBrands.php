<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class AllBrands extends Component
{
    use WithPagination;

    public $bid;

    public function render()
    {
        $data['title']  = "Brand";
        
        $data['brands'] = Brand::with(['user'])->latest()->paginate(5);
        
        return view('livewire.admin.brands.all-brands',$data);
    }


    public function trash($id)
    {
        $this->bid = $id;
    
       if(!empty($this->bid))
       {
           $trashedBrand = Brand::find($this->bid);
           $trashedBrand->delete();
           if($trashedBrand)
           {
                session()->flash('success', 'Brand successfully trashed.');
           }else {
                session()->flash('error', 'Brand not found!.');
           }
    
       }else {
            session()->flash('error', 'Brand dont exists.');
       }
    }
}

