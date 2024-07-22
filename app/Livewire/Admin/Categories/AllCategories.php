<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Categories;
use Livewire\WithPagination;

class AllCategories extends Component
{
    use WithPagination;

    public function render()
    {
        $data['title']  = "Categories";

        $data['categories'] = Categories::latest()->paginate(5);

        return view('livewire.admin.categories.all-categories',$data);
    }
}
