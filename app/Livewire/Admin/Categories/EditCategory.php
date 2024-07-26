<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EditCategory extends Component
{
    public $cid;
    public $category;
    public $category_slug;
    public $category_status;

    public function render()
    {
        $data['title']  = "Category";

        if(!empty($this->cid))
        {
            
            $data['single_category'] = Categories::where("cid", $this->cid)->first();

            $this->category = $data['single_category']->category;
            $this->category_status = $data['single_category']->category_status;

        }else {

            session()->flash('error', 'This category do not exists.');

            return $this->redirect(route('categories.index'), navigate: true);
        }

        return view('livewire.admin.categories.edit-category',$data);
    }

    public function save()
    {
        $user = Auth::user();

        $this->validate([
            'category' => "required|unique:categories,category",
            'category_status' => "required"
        ]);
       
        Categories::where("cid", $this->cid)->first()->update([
            'category' => $this->category,
            'category_slug' => Str::slug($this->category),
            'category_status' => $this->category_status 
        ]);

        session()->flash('success', 'Category successfully updated.');

        $this->reset(['category', 'category_status']);

        return $this->redirect(route('categories.index'), navigate: true);
    }
}
