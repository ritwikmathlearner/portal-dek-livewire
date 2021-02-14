<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Code goes here
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function run()
    {
//        Role::create(['name' => 'super admin']);
//        Role::create(['name' => 'tutor']);
//        $user = User::create([
//            'name' => 'Super Administrator',
//            'email' => 'ritwikmath@gmail.com',
//            'password' => '1234'
//        ]);
//        $user->assignRole('super admin');
        $superAdmin = Role::where('name', 'super admin')->first();
        $tutor = Role::where('name', 'tutor')->first();
//        $permission = Permission::create(['name' => 'register employee']);
//        Permission::create(['name' => 'list employee']);
//        Permission::create(['name' => 'manage user']);
//        Permission::create(['name' => 'create role']);
//        Permission::create(['name' => 'assign permission']);
//        $permission = Permission::create(['name' => 'register tutor']);
//        $permission->assignRole($superAdmin);
//        $permission = Permission::create(['name' => 'register team leader']);
//        $permission->assignRole($superAdmin);
//        $permission = Permission::create(['name' => 'create task']);
//        $permission->assignRole($superAdmin);
//        $permission = Permission::create(['name' => 'supervise task']);
//        $permission->assignRole($superAdmin);
//        $permission = Permission::create(['name' => 'manage employee']);
//        $permission->assignRole($superAdmin);
//        $permission = Permission::create(['name' => 'list tasks']);
//        $permission->assignRole([$superAdmin, $tutor]);
//        $permission = Permission::create(['name' => 'check quality analysis']);
//        $permission->assignRole($superAdmin);
//        $permission = Permission::create(['name' => 'create category']);
//        $permission->assignRole($superAdmin);
//        $permission = Permission::create(['name' => 'list category']);
//        $permission->assignRole($superAdmin);
        dd($superAdmin->name, $tutor->name, Auth::user()->hasRole('super admin'));
    }
}
