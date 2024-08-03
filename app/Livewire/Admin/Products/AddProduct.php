<?php

namespace App\Livewire\Admin\Products;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
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
    public $brand_id;
    public $categories;
    public $brands;
    public $image1Preview;
    public $image2Preview;
    public $image3Preview;

    use WithFileUploads;

    public function render()
    {
        $data['title']  = "Product";

        //get categories
        $data['categories'] = $this->categories = Categories::all();

        //get brands 
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

        // try {
 
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
                "brand_id" => "required",
            ]);

            Product::create([
                "pid"  => Str::uuid(),
                "product" => $this->product,
                "description" => $this->description,
                "product_slug" => $this->product_slug,
                "product_status" => $this->product_status,
                "price" => $this->price,
                "quantity" => $this->quantity,
                "sku" => $this->sku,
                "image1" => $this->image1?->store("product_images", "public"),
                "image2" => $this->image2?->store("product_images", "public"),
                "image3" => $this->image3?->store("product_images", "public"),
                "returnable" => $this->returnable,
                "category_id" => $this->category_id,
                "brand_id" => $this->brand_id,
                "user_id" => Auth::user()->id
            ]);

            session()->flash('success', 'Product successfully created.');
        
            return $this->redirect(route('product.index'), navigate: true);

        // } catch (\Throwable $th) {
        //     Log::info($th);
        // }
            
    }
}
