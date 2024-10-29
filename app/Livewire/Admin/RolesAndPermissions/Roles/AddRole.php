<?php

namespace App\Livewire\Admin\RolesAndPermissions\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AddRole extends Component
{
    public $role;
    public $isLoading = false;

    public function reload()
    {
        $this->isLoading = true;
    }
    public function render()
    {
        $title = "Add Role";
        return view('livewire.admin.roles-and-permissions.roles.add-role', compact('title'));
    }

    public function save()
    {
        $this->validate([
            'role' => "required|unique:roles,name",
        ]);
       
        Role::create([
            'name' => $this->role,
        ]);

        session()->flash('success', 'Role successfully created.');

        $this->reset(['role']);

        return $this->redirect(route('roles-and-permissions.index'), navigate: true);
    }
}
