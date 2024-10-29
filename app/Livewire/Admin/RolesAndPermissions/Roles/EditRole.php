<?php

namespace App\Livewire\Admin\RolesAndPermissions\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditRole extends Component
{
    public $isLoading = false;
    public $role;
    public $rid;

    public function mount()
    {
        $this->role = Role::findOrFail($this->rid)->name;
    }

    public function reload()
    {
        $this->isLoading = true;
    }

    public function update()
    {
        $this->validate([
            'role' => "required|unique:roles,name",
        ]);

        Role::findOrFail($this->rid)->update(["name" => $this->role]);

        session()->flash('success', 'Role successfully updated.');

        $this->reset(['role']);

        return $this->redirect(route('roles-and-permissions.index'), navigate: true);
    }

    public function render()
    {
        $title = "Role";
        return view('livewire.admin.roles-and-permissions.roles.edit-role', compact('title'));
    }
}
