<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function room_detail(room $room){
        return view('home.room_detail',compact('room'));
    }
    
    public function book_room(Request $request,$id){
        $booking = new Booking();
        $booking->room_id = $id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->checkindate = $request->checkindate;
        $booking->checkoutdate = $request->checkoutdate;
        $booking->save();   
        return redirect()->back();
    }
}
