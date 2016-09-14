<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EvetnFormRequest;
use App\Event;
use Carbon\Carbon;
use Auth;

class EventsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        foreach($events as $event){
            switch($event->status){
                case 2:
                    $status = 'Aproved';
                    break;
                case 3:
                    $status = 'Deny';
                    break;
                default:
                    $status = 'Pending';
                    break;
            }
            $event->status = $status;
        }
        return view('events.index', compact('events'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvetnFormRequest $request)
    {
       $slug =uniqid();
       $user = Auth::user();
       $date = $request->get('date_event').' '.$request->get('time_event');
       $data = array(
        'user_id' => $user->id,
        'title' => $request->get('title'),
        'concept' => $request->get('concept'),
        'department' =>  $request->get('department'),
        'objetives' =>  $request->get('objetives'),
        'impact_studTeach' => $request->get('impact_studTeach'),
        'description' => $request->get('description'),
        'date_event' => date('Y-m-d H:i:s',strtotime($date)),
        'slug' => $slug
        );

       // print_r($data);exit;
       $Event = new Event($data);
       $Event->save();

       return redirect('/eventslist')->with('status', 'Your Event has been created! its unique id is: '.$slug);
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::whereId($id)->firstOrFail();
        $date = strtotime($event->date_event);
        $event->date_event = date('Y-m-d', $date);
        $event->time_event = date('H:i A', $date);
        return view('events.show', compact('event'));



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::whereId($id)->firstOrFail();
        $date = strtotime($event->date_event);

        $event->date_event = date('Y-m-d', $date);
        $event->time_event = date('H:i:s', $date);
        return view('events.edit', compact('event'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, EvetnFormRequest $request)
    {
        $event = Event::whereId($id)->firstOrFail();
        $date = $request->get('date_event').' '.$request->get('time_event');
        $event->title = $request->get('title');
        $event->concept = $request->get('concept');
        $event->department = $request->get('department');
        $event->objetives = $request->get('objetives');
        $event->impact_studTeach = $request->get('impact_studTeach');
        $event->description = $request->get('description');
        $event->date_event = date('Y-m-d H:i:s',strtotime($date));
        // $event->time_event = $request->get('time_event');
        $event->title = $request->get('title');
        if($request->get('status') != null) {
            $ticket->status = 1;
        } else {
            $event->status = 2;
        }
        $event->save();
        return redirect(action('EventsController@index', $event->id))->with('status', 'The event '.$id.' has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::whereId($id)->firstOrFail();
        $event->delete();
        return redirect('/eventlist')->with('status', 'The event '.$id.' has been deleted!');
    }

    public function changeStatus($id, $status){
        $event = Event::whereId($id)->firstOrFail();
        $event->status = $status;
        $event->save();
        return redirect(action('EventsController@index', $id))->with('status', 'The event '.$id.' has been updated!');
    }
}
