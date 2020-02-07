<?php

namespace App\Http\Controllers;

use App\Role;
use Auth;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $role = new Role();
        $admin = $role->checkRole();
        if($admin){
            return redirect('batch'); 
        }
        return back(); 
    }
}
