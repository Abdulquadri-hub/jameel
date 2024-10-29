<?php

namespace App\Livewire\Admin\RolesAndPermissions\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermission extends Component
{
    public $role;
    public $roleId;
    public $permissions;
    public $selectedPermissions = [];
    public $isLoading = false;

    public function reload()
    {
        $this->isLoading = true;
    }

    public function mount()
    {
        $this->role = Role::findOrFail($this->roleId);
        $this->permissions = Permission::all();
        $this->selectedPermissions = $this->role->permissions->pluck("name")->toArray();
    }

    public function assignPermissions()
    {
        $this->validate([
            'selectedPermissions' => "required|array|min:1",
        ]);

        $this->role->syncPermissions($this->selectedPermissions);

        session()->flash('message', 'Permissions assigned successfully.');

        return $this->redirect(route('roles-and-permissions.index'), navigate: true);
    }

    public function render()
    {
        $title = "Assign Permissions";

        return view('livewire.admin.roles-and-permissions.roles.assign-permission', compact('title'));
    }
}
