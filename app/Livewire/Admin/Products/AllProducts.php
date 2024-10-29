<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AllProducts extends Component
{
    use WithPagination;

    public $isLoading = false;
    public $pid;

    public function reload()
    {
        $this->isLoading = true;
    }

    public function render()
    {
        $data['title']  = "Products";

        $data['products'] = Product::with(["user"])->latest()->paginate(5);

        return view('livewire.admin.products.all-products',$data);
    }

    public function trash($id)
    {
        $this->pid = $id;
dd("yes");
       if(!empty($this->pid))
       {
           $productToTrash = Product::find($this->pid);
           $productToTrash->delete();
           if($productToTrash)
           {
                session()->flash('success', 'Product successfully trashed.');
           }else {
                session()->flash('error', 'Product not found!.');
           }
    
       }else {
            session()->flash('error', 'Product dont exists.');
       }
    }
}
