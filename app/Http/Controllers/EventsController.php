<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EvetnFormRequest;
use App\Event;
use Carbon\Carbon;
use Auth;
use Hash;
use Mail;
use App\User;

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
     $image = $this->saveImage($request);
     $slug =uniqid();
     $user = Auth::user();
     $date = $request->get('date_event').' '.$request->get('time_event');
     $enddate = $request->get('end_event').' '.$request->get('end_time');
     $data = array(
        'user_id' => $user->id,
        'title' => $request->get('title'),
        'concept' => $request->get('concept'),
        'department' =>  $request->get('department'),
        'objetives' =>  $request->get('objetives'),
        'impact_studTeach' => $request->get('impact_studTeach'),
        'description' => $request->get('description'),
        'date_event' => date('Y-m-d H:i:s',strtotime($date)),
        'end_event' => date('Y-m-d H:i:s',strtotime($enddate)),
        'teacherEnvol' => $request->get('teacherEnvol'),
        'slug' => $slug,
        'picture' => $image
        );

     $Event = new Event($data);

      // $Event->checkAvailableTime($data['date_event'], $data['end_event']);

      //  exit;
     if($Event->checkAvailableTime($data['date_event'], $data['end_event'])==true){
        $Event->save();
        return redirect('/calendary')->with('status', 'Your Event has been created! its unique id is: '.$slug);
    }else{
        return view('events.create', array('event', $data))->withErrors(['messages' => 'There\'s an event on that hour, try to change it please']);
    }
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
        $dateend = strtotime($event->end_event);
        $event->end_event = date('Y-m-d', $dateend);
        $event->end_time = date('H:i A', $dateend);
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
        $dateend = strtotime($event->end_event);
        $event->end_event = date('Y-m-d', $dateend);
        $event->end_time = date('H:i A', $dateend);
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
        $dateend = $request->get('end_event').' '.$request->get('end_time');
        $event->title = $request->get('title');
        $event->concept = $request->get('concept');
        $event->department = $request->get('department');
        $event->objetives = $request->get('objetives');
        $event->impact_studTeach = $request->get('impact_studTeach');
        $event->description = $request->get('description');
        $event->date_event = date('Y-m-d H:i:s',strtotime($date));
        $event->end_event = date('Y-m-d H:i:s',strtotime($dateend));
        // $event->time_event = $request->get('time_event');
        $event->title = $request->get('title');
        if($request->get('status') != null) {
            $event->status = 1;
        } else {
            $event->status = 2;
        }
        
        $image = $this->saveImage($request);
        if($image){
            $user->picture = $image;
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

    public function calendary(){
        return view('events.calendar');
    }


    public function jsonAllEvents(){

       $out = array();

       $allEvents = Event::all();

       foreach($allEvents as $event){
            $data = date('Y-m-d H:i:s', strtotime("{$event->date_event}"));
            $dataend = date('Y-m-d H:i:s', strtotime("{$event->end_event}"));
           // $data_end = Carbon::createFromFormat('Y-m-d', strtotime("{$event->date_event}"))->add
            $out[] = array(
                'id' => $event->id,
                'title' => $event->title,
                'class' => 'Organizador' .$event->user_id,
                'start' => strtotime($data).'000',
                'end' => strtotime($dataend).'000',
                'url' => url('/event',  $event->id)
            );
        }
        return response()->json(['success' => 1, 'result' => $out]);

    }
        public function saveImage($request){
        if(!$request->hasFile('picture'))
        {
            return false;
        }

        $mime = $request->file('picture')->getMimeType();
        $extension = strtolower($request->file('picture')->getClientOriginalExtension());
        $fileName = uniqid().'.'.$extension;
        $path = "files_uploaded";

        switch ($mime)
        {
            case "image/jpeg":
            case "image/png":
                if ($request->file('picture')->isValid())
                {
                    $request->file('picture')->move($path, $fileName);
                    return $fileName;
                }
                break;
            default:
                return false;
        }
    }

    public function revisionEvents(){
        $todayEvents = Event::whereBetween('date_event', [ Carbon::today() , Carbon::tomorrow() ])->get();
        $users = User::all();
        if(count($todayEvents)>=1){
            // print_r($todayEvents);
            foreach($users as $user){
                
                    //Enviar correos.
                    //Formar correo con blade. 
                    //Enviar correo a usuario o lista de usaurios de base de datos.
                    //view('emails.lista_eventos')->with('events', $todayEvents);
                   Mail::send("emails.lista_eventos", array('events' => $todayEvents, 'user' => $user), function($message)use ($user){
                       $message->to($user->email, $user->name)
                                ->bcc('abraham.vazquez@tectijuana.edu.mx')
                                ->subject('Eventos del dia de hoy');
                    // echo "entra aqui ";
                            });
                   
            }
        }
    }
}
