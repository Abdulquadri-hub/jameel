<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AddBrand extends Component
{
    public $brand;
    public $description;
    public $brand_slug;
    public $brand_status;
    public $isLoading = false;

    public function reload()
    {
        $this->isLoading = true;
    }

    public function render()
    {
        $data['title']  = "Brand";

        return view('livewire.admin.brands.add-brand', $data);
    }

    public function UpdatedBrand($brand)
    {
        $this->brand_slug = Str::slug($brand);
    }

    public function save()
    {
        $user = Auth::user();

        $this->validate([
            'brand' => "required|unique:brands,brand",
            'brand_slug' => "required|unique:brands,brand_slug",
            'brand_status' => "required"
        ]);
       
        Brand::create([
            'brand' => $this->brand,
            'bid' => Str::uuid(),
            'user_id' => $user->id,
            'brand_slug' => $this->brand_slug,
            'brand_status' => $this->brand_status 
        ]);

        session()->flash('success', 'Brand successfully created.');

        $this->reset(['brand', 'brand_slug', 'brand_status']);

        return $this->redirect(route('brand.index'), navigate: true);
    }
}
