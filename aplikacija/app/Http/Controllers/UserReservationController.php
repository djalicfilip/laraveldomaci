<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Resources\ReservationResource;




class UserReservationController extends Controller
{
    public function index($user_id)
    {
        $reservations=Reservation::get()->where('user_id',$user_id);
     if(is_null($reservations)){
        return response()->json('There is no reservation by this user.');
     }
     return response()->json($reservations);
    }

}
