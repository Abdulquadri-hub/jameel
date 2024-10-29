<?php

namespace App\Livewire\Admin\RolesAndPermissions;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissions extends Component
{
    public $activeTable = "roles";
    public $tableTitle = "Roles";
    public $roles = [];
    public $permissions = [];
    public $isLoading = false;
    

    public function showRoles()
    {
        $this->activeTable = "roles";
        $this->tableTitle = "Roles";

        $this->roles = Role::all();
    }

    public function showPermissions()
    {
        $this->activeTable  = "permissions";
        $this->tableTitle  = "Permissions";

        $this->permissions = Permission::all();
    }

    public function reload()
    {
        $this->isLoading = true;
    }

    public function render()
    {
        $title = "Roles And Permissions";
        
        $this->roles = Role::all();
        $this->permissions = Permission::all();

        return view('livewire.admin.roles-and-permissions.roles-and-permissions', compact('title'));
    }
}
