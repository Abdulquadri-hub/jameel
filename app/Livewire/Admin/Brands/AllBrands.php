<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class AllBrands extends Component
{
    use WithPagination;

    public $bid;

    public function trash()
    {
       dump($this->bid);
    }
    
    public function render()
    {
        $data['title']  = "Brand";

        $data['brands'] = Brand::latest()->paginate(5);

        return view('livewire.admin.brands.all-brands',$data);
    }
}
