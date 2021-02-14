<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleCreateForm extends Component
{
    public $permissions;
    public $allPermissions;
    public $role;

    protected $rules = [
        'role' => 'required|string|unique:roles,name',
        'permissions' => ''
    ];

    public function mount()
    {
        $this->allPermissions = Permission::all();
    }

    public function resetForm()
    {
        $this->reset(['role']);
        $this->dispatchBrowserEvent('resetPermission');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        //Validate input
        $validatedData = $this->validate();

        //Create new role
        $role = Role::create(['name' => $validatedData['role']]);
        $role->syncPermissions($validatedData['permissions']);
        $this->dispatchBrowserEvent('success-alert');
        $this->resetForm();
    }

    public function render()
    {
        $this->dispatchBrowserEvent('contentChanged');
        return view('livewire.role-create-form');
    }
}
