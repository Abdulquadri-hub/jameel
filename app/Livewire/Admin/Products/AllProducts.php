<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AllProducts extends Component
{
    use WithPagination;

    public function render()
    {
        $data['title']  = "Products";

        $data['products'] = Product::latest()->paginate(5);

        return view('livewire.admin.products.all-products',$data);
    }
}
