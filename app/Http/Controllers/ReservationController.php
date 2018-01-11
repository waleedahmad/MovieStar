<?php

namespace App\Http\Controllers;

use App\Screenings;
use App\Reservations;
use App\Rules\TicketCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function getReservationForm($id)
    {
        $screening = Screenings::find($id);
        return view('reservations.reserve')->with('screening', $screening);
    }

    public function reserveTickets($id, Request $request){
        $screening = Screenings::find($id);

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

    public function deleteReservation(Request $request)
    {
        return response()->json([
            'deleted' => Reservations::find($request->id)->delete()
        ]);
    }

    public function getScreeningTickets(){
        $screenings = Screenings::all();
        return view('admin.reservations.screenings')->with('screenings', $screenings);
    }

    public function getScreeningReservations($id){
        $screening = Screenings::find($id);
        return view('admin.reservations.screening')->with('screening', $screening);
    }

    public function getAddReservationsForm($id){
        $screening = Screenings::find($id);
        return view('admin.reservations.add')->with('screening', $screening);
    }

    public function addReservation($id, Request $request)
    {
        $screening = Screenings::find($id);

        if($screening){
            $validator = \Validator::make($request->all(), [
                'user'  =>  'required',
                'tickets' => [
                    'required',
                    'numeric',
                    new TicketCount($screening->seats_count, $request->tickets, $screening->id)
                ]
            ]);

            if($validator->passes()){

                if($screening->reservations()->create([
                    'user_id' => $request->user,
                    'tickets_count' => $request->tickets,
                    'paid'  => true,
                ])){
                    return redirect('/admin/screenings/'.$id.'/reservations');
                }

            }else{
                return redirect('/admin/screenings/'.$id.'/reservations/add')->withErrors($validator)->withInput();
            }
        }
    }

    public function editReservation($id, $res_id)
    {
        $reservation = Reservations::find($res_id);
        return view('admin.reservations.edit')->with('reservation', $reservation);
    }

    public function updateReservation($id, $res_id, Request $request)
    {
        $reservation = Reservations::find($res_id);

        if($reservation){
            $validator = \Validator::make($request->all(), [
                'user'  =>  'required',
                'tickets' => [
                    'required',
                    'numeric',
                ]
            ]);

            if($validator->passes()){

                $booked = $reservation->screening->reservations->where('id', '!=', $reservation->id)->sum('tickets_count');
                $total = $reservation->screening->seats_count;
                $res_count = $booked + $request->tickets;

                if($res_count <= $total){
                    $reservation->user_id = $request->user;
                    $reservation->tickets_count = $request->tickets;
                    $reservation->paid = true;
                    if($reservation->save()){
                        return redirect('/admin/screenings/'.$id.'/reservations');
                    }
                }else{
                    $validator->errors()->add('tickets', 'We don\'t have '.$request->tickets. ' tickets available');
                    return redirect('/admin/screenings/'.$id.'/reservation/'.$res_id.'/edit')->withErrors($validator)->withInput();

                }

            }else{
                return redirect('/admin/screenings/'.$id.'/reservation/'.$res_id.'/edit')->withErrors($validator)->withInput();
            }
        }
    }
}
