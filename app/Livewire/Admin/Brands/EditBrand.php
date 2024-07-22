<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EditBrand extends Component
{
    public $bid;
    public $brand;
    public $brand_slug;
    public $brand_status;

    public function render()
    {   
        $data['title']  = "Brand";

        if(!empty($this->bid))
        {
            
            $data['single_brand'] = Brand::where("bid", $this->bid)->first();

            $this->brand = $data['single_brand']->brand;
            $this->brand_status = $data['single_brand']->brand_status;

        }else {

            session()->flash('error', 'This brand do not exists.');

            return $this->redirect(route('brand.index'), navigate: true);
        }

        return view('livewire.admin.brands.edit-brand',$data);
    }

    public function save()
    {
        $user = Auth::user();

        $this->validate([
            'brand' => "required|unique:brands,brand",
            'brand_status' => "required"
        ]);
       
        Brand::where("bid", $this->bid)->first()->update([
            'brand' => $this->brand,
            'brand_slug' => Str::slug($this->brand),
            'brand_status' => $this->brand_status 
        ]);

        session()->flash('success', 'Brand successfully updateed.');

        $this->reset(['brand', 'brand_status']);

        return $this->redirect(route('brand.index'), navigate: true);
    }
}
