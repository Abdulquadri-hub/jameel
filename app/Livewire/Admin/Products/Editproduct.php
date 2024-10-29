<?php

namespace App\Livewire\Admin\Products;

use id;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Warehouse;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\WithFileUploads;

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

        if(!empty($this->pid))
        {
            
            $data['single_product'] = Product::with(['brand', 'category', 'warehouse'])->where("pid", $this->pid)->first();

            $data['categories'] = $this->categories = Categories::all();

            $data['warehouses'] = $this->warehouses = Warehouse::all();

            $data['brands'] = $this->brands =  Brand::all();

            $this->product = $data['single_product']->product;
            $this->product_status = $data['single_product']->product_status;
            $this->product_slug = $data['single_product']->product_slug;
            $this->description = $data['single_product']->description;
            $this->price = $data['single_product']->price;
            $this->quantity = $data['single_product']->quantity;
            $this->sku = $data['single_product']->sku;
            $this->image1 = $data['single_product']->image1;

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

    public function save()
    {

        $product = Product::where("pid", $this->pid)
                            ->where("user_id", Auth::user()->id)
                            ->first();

        if(!$product)
        {
            session()->flash('error', 'Product not found!.');
            return redirect()->back();
        }

        if($this->image1)
        {
            $oldImage1 = $product->image1;
            if(!empty($oldImage1) && file_exists($oldImage1))
            {
                dd("yes");
            }
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
        
        exit;

        $save = $product->update([
                "product" => $this->product,
                "description" => $this->description,
                "product_slug" => $this->product_slug,
                "product_status" => $this->product_status,
                "price" => $this->price,
                "qua-ntity" => $this->quantity,
                "sku" => $this->sku,
                "image1" => $image1fullpath ?? $product->image1,
                "image2" => $image2fullpath ?? $product->image2,
                "image3" => $image3fullpath ?? $product->image3,
                "returnable" => $this->returnable,
                "category_id" => $this->category_id,
                "warehouse_id" => $this->warehouse_id,
                "brand_id" => $this->brand_id,
            ]);


        session()->flash('success', 'Product successfully updated.');
        
        return $this->redirect(route('product.index'), navigate: true);
            
    }
}
