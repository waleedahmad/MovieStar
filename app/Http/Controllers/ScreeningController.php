<?php

namespace App\Http\Controllers;

use App\MovieShowings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    private $days = [
        'sun',
        'mon',
        'tue',
        'wed',
        'thu',
        'fri',
        'sat',
    ];

    public function getScreenings()
    {
        $screenings = MovieShowings::all();
        return view('admin.screenings.screenings')->with('screenings', $screenings);
    }


    public function addScreening()
    {
        return view('admin.screenings.add');
    }

    public function saveScreening(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'movie' =>  'required',
            'tickets_count' => 'required|numeric|min:1',
            'ticket_price' => 'required|numeric|min:1',
            'showing_date' => 'required',
            'showing_time' => 'required'
        ]);

        if($validator->passes()){
            $showing = new MovieShowings();
            $showing->movie_id = $request->movie;
            $showing->seats_count = $request->tickets_count;
            $showing->ticket_price = $request->ticket_price;
            $showing->show_time = $request->showing_date . ' ' . str_replace(' ', '', $request->showing_time) . ':00';
            $showing->day = $this->days[Carbon::parse($showing->show_time)->dayOfWeek];

            if($showing->save()){
                return redirect('/admin/screenings');
            }
        }else{
            return redirect('/admin/screenings/add')->withInput()->withErrors($validator);
        }
    }


    public function deleteScreening(Request $request)
    {
        $screening = MovieShowings::find($request->id);

        return response()->json([
            'deleted'   => $screening->delete()
        ]);
    }


    public function editScreening($id)
    {
        $screening = MovieShowings::find($id);
        return view('admin.screenings.edit')->with('screening', $screening);
    }

    public function updateScreening(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'movie' =>  'required',
            'tickets_count' => 'required|numeric|min:1',
            'ticket_price' => 'required|numeric|min:1',
            'showing_date' => 'required',
            'showing_time' => 'required'
        ]);

        if($validator->passes()){
            $showing = MovieShowings::find($request->id);
            $showing->movie_id = $request->movie;
            $showing->seats_count = $request->tickets_count;
            $showing->ticket_price = $request->ticket_price;
            $showing->show_time = $request->showing_date . ' ' . str_replace(' ', '', $request->showing_time) . ':00';
            $showing->day = $this->days[Carbon::parse($showing->show_time)->dayOfWeek];

            if($showing->save()){
                return redirect('/admin/screenings');
            }
        }else{
            return redirect('/admin/screenings/add')->withInput()->withErrors($validator);
        }
    }

    public function getScreeningTickets(){
        $screenings = MovieShowings::all();
        return view('admin.reservations.screenings')->with('screenings', $screenings);
    }

    public function getScreeningReservations($id){
        $screening = MovieShowings::find($id);
        return view('admin.reservations.screening')->with('screening', $screening);
    }
}
