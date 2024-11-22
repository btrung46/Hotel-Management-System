<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index(){
        if(Auth::id()){
            $role = Auth::user()->role;
            if($role === 'user'){
                return view('home.index');
            }
            else if ($role === 'admin'){
                return view('admin.dashboard');
            }
            else{
                return redirect()->back();
            }
        }
     }
}
