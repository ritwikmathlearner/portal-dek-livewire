<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionForm extends Component
{
    public $roles;
    public $role_id = null;
    public $originalPermissions = [];
    public $permissions = [];
    public $all_permissions;

    public function mount()
    {
        $this->roles = Role::all()->except(1);
        $this->all_permissions = Permission::all();
    }

    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;
    }

    protected $listeners = ['select_role_id' => 'selectRoleId'];

    public function selectRoleId()
    {
        $role = Role::find($this->role_id);
        $this->permissions = $role->permissions()->pluck('id')->toArray();
    }

    public function assignPermission()
    {
        $role = Role::find($this->role_id);
        $originalPermissions = $role->permissions()->pluck('id')->toArray();
        $removePermissions = array_diff($originalPermissions, $this->permissions);
        $role->syncPermissions($this->permissions);
        foreach($removePermissions as $remove) {
            $role->revokePermissionTo($remove);
        }
        $this->dispatchBrowserEvent('success-alert');
    }

    public function resetForm()
    {
        $this->reset(['role_id', 'permissions']);
    }

    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged');
        return view('livewire.role-permission-form');
    }
}
