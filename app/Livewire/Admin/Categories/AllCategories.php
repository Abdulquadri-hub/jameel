<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Categories;
use Livewire\WithPagination;

class AllCategories extends Component
{
    use WithPagination;

    public $isLoading = false;
    public $cid;

    public function reload()
    {
        $this->isLoading = true;
    }

    public function render()
    {
        $data['title']  = "Categories";

        $data['categories'] = Categories::with("user")->latest()->paginate(5);

        return view('livewire.admin.categories.all-categories',$data);
    }

    public function trash($id)
    {
        $this->cid = $id;
    
       if(!empty($this->cid))
       {
           $categoryToTrash = Categories::find($this->cid);
           $categoryToTrash->delete();
           if($categoryToTrash)
           {
                session()->flash('success', 'Category successfully trashed.');
           }else {
                session()->flash('error', 'Category not found!.');
           }
    
       }else {
            session()->flash('error', 'Category dont exists.');
       }
    }
}
