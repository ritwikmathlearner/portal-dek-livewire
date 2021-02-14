<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ManageUserController extends Controller
{
    public function create_role()
    {
        return view('manage_users.create_role');
    }

    public function role_permissions()
    {
        return view('manage_users.role_permissions');
    }
}
