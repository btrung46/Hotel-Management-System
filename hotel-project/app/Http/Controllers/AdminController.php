<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\room;

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
    public function create_room(){
        return view('admin.create_room');
    }
    public function add_room(Request $request){
        $valid = $request->validate([
            'room_title' => 'required|min:3|max:240',
            'description' => 'required|min:1|max:240',
            'price' => 'required|min:1',
            'image'=>'image',
            'wifi'=>'required',
            'room_type'=>'required',
        ]);
        $room = new room();
        $room -> room_title = $valid['room_title'];
        $room -> description = $valid['description'];
        $room -> price = $valid['price'];
        $room -> wifi = $valid['wifi'];
        $room -> room_type = $valid['room_type'];

        $image = $valid['image'];
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $room ->image  = $imagename;
        }

        $room->save();
        return redirect()->back();
    }
}
