<?php

namespace App\Livewire\Admin\RolesAndPermissions\Permissions;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class AddPermission extends Component
{
    public $permission;
    public $isLoading = false;

    public function reload()
    {
        $this->isLoading = true;
    }

    public function render()
{
        $title = "Add Permission";
        return view('livewire.admin.roles-and-permissions.permissions.add-permission', compact('title'));
    }

    public function save()
    {
        $this->validate([
            'permission' => "required|unique:permissions,name",
        ]);
       
        Permission::create([
            'name' => $this->permission,
        ]);

        session()->flash('success', 'Permission successfully created.');

        $this->reset(['permission']);
    }
}
