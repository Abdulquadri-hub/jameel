<?php

namespace App\Livewire\Admin\Products;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Str;

class Editproduct extends Component
{
    public $pid;
    public $product;
    public $product_slug;
    public $product_status;
    public $barcode;
    public $views;
    public $description;
    public $price;
    public $quantity;
    public $currency;
    public $sku;
    public $image1;
    public $image2;
    public $image3;
    public $returnable;
    public $category_id;
    public $brand_id;
    public $categories;
    public $brands;
    public $image1Preview;
    public $image2Preview;
    public $image3Preview;


    public function render()
    {
        $data['title']  = "Product";

        if(!empty($this->pid))
        {
            
            $data['single_product'] = Product::with(['brand', 'category'])->where("pid", $this->pid)->first();

            //get categories
            $data['categories'] = $this->categories = Categories::all();

            //get brands 
            $data['brands'] = $this->brands =  Brand::all();

            $this->product = $data['single_product']->product;
            $this->product_status = $data['single_product']->product_status;
            $this->product_slug = $data['single_product']->product_slug;
            $this->description = $data['single_product']->description;
            $this->price = $data['single_product']->price;
            $this->quantity = $data['single_product']->quantity;
            $this->sku = $data['single_product']->sku;

        }else {

            session()->flash('error', 'This product do not exists.');

            return $this->redirect(route('product.index'), navigate: true);
        }

        return view('livewire.admin.products.editproduct',$data);
    }

    
    public function UpdatedProduct($product)
    {
        $this->product_slug = Str::slug($product);
    }

    public function UpdatedImage1()
    {
        $this->image1Preview = $this->image1->temporaryUrl();
    }

    public function UpdatedImage2()
    {
        $this->image2Preview = $this->image2->temporaryUrl();
    }

    public function UpdatedImage3()
    {
        $this->image3Preview = $this->image3->temporaryUrl();
    }
}
