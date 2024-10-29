<?php

namespace App\Livewire\Admin\RolesAndPermissions\Permissions;

use Livewire\Component;

class EditPermission extends Component
{
    public $isLoading = false;

    public function reload()
    {
        $this->isLoading = true;
    }
    public function render()
    {
        return view('livewire.admin.roles-and-permissions.permissions.edit-permission');
    }
}
