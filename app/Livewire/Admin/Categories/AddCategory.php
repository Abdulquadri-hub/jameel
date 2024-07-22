<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Categories;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AddCategory extends Component
{
    public $category;
    public $category_slug;
    public $category_status; 

    public function render()
    {
        $data['title']  = "Category";

        return view('livewire.admin.categories.add-category',$data);
    }

    public function UpdatedCategory($category)
    {
        $this->category_slug = Str::slug($category);
    }

    public function save()
    {
        $user = Auth::user();

        $this->validate([
            'category' => "required|unique:categories,category",
            'category_slug' => "required|unique:categories,category_slug",
            'category_status' => "required"
        ]);
       
        Categories::create([
            'category' => $this->category,
            'cid' => Str::uuid(),
            'user_id' => $user->id,
            'category_slug' => $this->category_slug,
            'category_status' => $this->category_status 
        ]);

        session()->flash('success', 'Category successfully created.');

        $this->reset(['category', 'category_slug', 'category_status']);

        return $this->redirect(route('categories.index'), navigate: true);
    }
}
