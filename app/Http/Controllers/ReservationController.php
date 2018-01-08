<?php

namespace App\Http\Controllers;

use App\MovieShowings;
use App\Reservations;
use App\Rules\TicketCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function getReservationForm($id)
    {
        $screening = MovieShowings::find($id);
        return view('reservations.reserve')->with('screening', $screening);
    }

    public function reserveTickets($id, Request $request){
        $screening = MovieShowings::find($id);

        if($screening){
            $validator = \Validator::make($request->all(), [
                'tickets' => [
                    'required',
                    'numeric',
                    new TicketCount($screening->seats_count, $request->tickets, $screening->id)
                ]
            ]);

            if($validator->passes()){

                if($screening->reservations()->create([
                    'user_id' => Auth::user()->id,
                    'tickets_count' => $request->tickets,
                    'paid'  => false,
                ])){
                    return redirect('/reservations');
                }

            }else{
                return redirect('/reserve/screening/'.$id)->withErrors($validator)->withInput();
            }
        }
    }

    public function getReservations()
    {
        $reservations = Reservations::where('user_id', '=', Auth::user()->id)->get();
        return view('reservations.reservations')->with('reservations', $reservations);
    }
}
