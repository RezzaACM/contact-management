<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $user = new User();
        $role = new Role();
        $data['users'] = $user->showAllUser();
        $data['roles'] = $role->getRoles();
        return view('dashboard.admin-management',$data);
    }
}
