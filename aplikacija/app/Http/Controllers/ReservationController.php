<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\ReservationCollection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations=Reservation::all();
        return new ReservationCollection($reservations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'number_of_people'=>'required|min:5',
            'package_id'=>'required',
            'client_id'=>'required'
          ]);
          if ($validator->fails()){
              return response()->json($validator->errors());
          }
  
  $r=Reservation::create([
      'number_of_people'=>$request->number_of_people,
      'package_id'=>$request->package_id,
      'client_id'=>$request->client_id,
      'user_id'=>Auth::user()->id
  ]);
  
  return response()
  ->json(['Post created successfully.', new ReservationResource($r)]);
  }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return new ReservationResource($reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $validator=Validator::make($request->all(),[
            'number_of_people'=>'required|lt:5',
            'package_id'=>'required',
            'client_id'=>'required'
          ]);
          if ($validator->fails()){
              return response()->json($validator->errors());
          }

$reservation->package_id=$request->package_id;
$reservation->number_of_people=$request->number_of_people;
$reservation->client_id=$request->client_id;
$reservation->save();

return response()
->json(['Reservation updated successfully.', new ReservationResource($reservation)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->json('Reservation deleted successfully.');
    }

//kreira novu rezevaciju
public function add(Request $request)
{
    $validator=Validator::make($request->all(),[
        'number_of_people'=>'required|lt:5',
        'package_id'=>'required',
        'client_id'=>'required'
      ]);
      if ($validator->fails()){
          return response()->json($validator->errors());
      }

$reservation=Reservation::create([
  'number_of_people'=>$request->number_of_people,
  'package_id'=>$request->package_id,
  'client_id'=>$request->client_id,
  'user_id'=>Auth::user()->id
]);


    return response()->json(['Reservation created successfully', new ReservationResource($reservation)]);
}


//trazi rezervaciju po id-ju i azuzira je
public function updateById(Request $request, int $id)
{
    $validator=Validator::make($request->all(),[
        'number_of_people'=>'required|lt:5',
        'package_id'=>'required',
        'client_id'=>'required'
      ]);
      if ($validator->fails()){
          return response()->json($validator->errors());
      }
    $reservation = Reservation::find($id);
    $reservation->package_id=$request->package_id;
    $reservation->number_of_people=$request->number_of_people;
    $reservation->client_id=$request->client_id;
    $reservation->save();
    
    return response()
    ->json(['Reservation updated successfully.', new ReservationResource($reservation)]);
}

//trazi rezervaciju po id-ju i brise je 
public function delete(int $id)
{
    $reservation = Reservation::findOrFail($id);
    $reservation->delete();

    return response()->json('Reservation deleted successfully.');
}
public function packagereservation(int $id)
    {

        $reservations = Reservation::get()->where('package_id', $id);
        if (is_null($reservations)) {
            return response()->json("There is no reservation for this package");
        }
        return response()->json($reservations);
    }

}
