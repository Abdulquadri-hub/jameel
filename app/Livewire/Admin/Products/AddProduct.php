<?php

namespace App\Livewire\Admin\Products;

use App\Helpers\Jameel;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Inventory;
use App\Models\Warehouse;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class AddProduct extends Component
{
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
    public $warehouse_id;
    public $brand_id;
    public $categories;
    public $warehouses;
    public $brands;
    public $image1Preview;
    public $image2Preview;
    public $image3Preview;
    public $isLoading = false;

    public function reload()
    {
        $this->isLoading = true;
    }

    use WithFileUploads;

    public function render()
    {
        $data['title']  = "Product";

        $data['categories'] = $this->categories = Categories::all();

        $data['warehouses'] = $this->warehouses = Warehouse::all();

        $data['brands'] = $this->brands =  Brand::all();

        return view('livewire.admin.products.add-product',$data);
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

    public function save()
    {

        $this->validate([
            "product" => "required|string|unique:products,product",
            "description" =>  "required|string",
            "product_slug" =>  "required|string|unique:products,product_slug",
            "product_status" =>  "required|string",
            "price"  => "required|numeric|min:0.01",
            "quantity"  => "required|numeric|min:0",
            "currency" => "sometimes|nullable",
            "sku" => "required|numeric",
            "image1" =>  "required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048",
            "image2" => "sometimes|nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048",
            "image3" => "sometimes|nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048",
            "returnable" => "sometimes",
            "category_id" => "required",
            "warehouse_id" => "required",
            "brand_id" => "required",
        ]);

        if($this->image1)
        {
            $fileName1 = time() . '.' . $this->image1->getClientOriginalExtension();
            $this->image1->storeAs('product_images', $fileName1, 'public');
            $image1fullpath =  asset('storage/public_images/' . $fileName1);
        }else
        if($this->image2)
        {
            $fileName2 = time() . '.' . $this->image2->getClientOriginalExtension();
            $fileName2 = $this->image2->store('product_images', $fileName2, 'public');
            $image2fullpath = asset('storage/public_images/' . $fileName2);

        }else 
        if($this->image3)
        {
            $fileName3 = time() . '.' . $this->image3->getClientOriginalExtension();
            $this->image3->store('product_images', $fileName3, 'public');
            $image3fullpath = asset('storage/public_images/' . $fileName3);
        }

        $save = Product::create([
                "pid"  => Str::uuid(),
                "product" => $this->product,
                "description" => $this->description,
                "product_slug" => $this->product_slug,
                "product_status" => $this->product_status,
                "price" => $this->price,
                "qua-ntity" => $this->quantity,
                "sku" => $this->sku,
                "image1" => $image1fullpath ?? null,
                "image2" => $image2fullpath ?? null,
                "image3" => $image3fullpath ?? null,
                "returnable" => $this->returnable,
                "category_id" => $this->category_id,
                "warehouse_id" => $this->warehouse_id,
                "brand_id" => $this->brand_id,
                "user_id" => Auth::user()->id
            ]);

        // if($save)
        // {
        //     Inventory::create([
                
        //     ]);
        // }

        session()->flash('success', 'Product successfully created.');
        
        return $this->redirect(route('product.index'), navigate: true);
            
    }
}
