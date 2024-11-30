<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\room;
use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
     public function index(){
        if(Auth::id()){
            $role = Auth::user()->role;
            if($role === 'user'){
                $rooms = room::latest()->paginate(5);
                return view('home.index',compact('rooms'));
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
            'description' => 'required|min:10',
            'price' => 'required|numeric|min:1',
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
    public function view_room(){
        $rooms = room::latest()->paginate(5);
        return view('admin.view_room',compact('rooms'));
    }
    public function delete_room(room $room){
        $room->delete();
        return redirect()->back();
    }
    public function edit_room(room $room){
        return view('admin.edit_room',compact('room'));
    }
    public function update_room(room $room, Request $request){
        $valid = $request->validate([
            'room_title' => 'required|min:3|max:240',
            'description' => 'required|min:10',
            'price' => 'required|numeric|min:1',
            'image'=>'image',
            'wifi'=>'required',
            'room_type'=>'required',
        ]);
        $room -> room_title = $valid['room_title'];
        $room -> description = $valid['description'];
        $room -> price = $valid['price'];
        $room -> wifi = $valid['wifi'];
        $room -> room_type = $valid['room_type'];

        if($request->has('image')){
            $image = $valid['image'];
            $oldImage = $room->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('room',$imagename);
            $room ->image  = $imagename;
            if ($oldImage && File::exists(public_path(path: 'room/' . $oldImage))) {
                File::delete(public_path('room/' . $oldImage));
            }
        }

        $room->save();
        return redirect()->route('view_room');
    }
}
