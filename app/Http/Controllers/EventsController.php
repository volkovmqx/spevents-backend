<?php

namespace SPE\Http\Controllers;

use Illuminate\Http\Request;

use SPE\Http\Requests;
use SPE\Http\Requests\EventRequest;
use SPE\Http\Controllers\Controller;
use SPE\Event;
use SPE\User;
use Carbon\Carbon;
use DB;
use Input;
use Validator;
use Redirect;
use Session;
use Hash;
use Image;
class EventsController extends Controller
{

    public function __construct() {

        $this->middleware('auth' ,[
            'except' => [
                'eventsjson',
                'registerjson',
                'connectjson',
                'subscribe',
                'unsubscribe'
            ]]);

    }
    public function eventsjson()
    {
        if(Input::has('userId')) {
            $gid = Input::get('userId');
            $user = User::where('googleUserId', '=' , $gid)->first();
            if($user) {
                $events = Event::where('dateandtime', '>=', Carbon::now())
                ->orderBy('dateandtime', 'asc')
                ->get();

                foreach ($events as $event) {
                    $subcribed =  DB::table('event_user')
                    ->where('user_id','=',$user->id)
                    ->where('event_id','=',$event->id)
                    ->get() ? 'true' : 'false';
                    $event->subcribed =  $subcribed;
                }

                return response()->json($events);
            }
            else {

                $message = ['message' => 'Gid Not Found'];
                return response()->json($message);
            }
        }
    }

    public function connectjson()
    {
         if(Input::has('userId')) {
            $gid = Input::get('userId');
            $user = User::where('googleUserId', '=' , $gid)->first();
            if($user) {
                $message = ['message' => 'welcomeback'];
                return response()->json($message);
            }
            
            else{
                $message = ['message' => 'givemeotherdetails'];
                return response()->json($message);
            }
        }
    }

    public function registerjson(Request $request)
    {

            $user = new User;
            $user->name = Input::get('displayName');
            $user->email = Input::get('email'); 
            $user->googleUserId = Input::get('userId');
            $user->password = Hash::make('rand(11111,99999)');
            $user->save();
            $message = ['message' => 'welcomeontheboard'];
            return response()->json($message);
    }
    public function subscribe()
    {  
        if(Input::has('userId') && Input::has('eventId')) {
            $gid = Input::get('userId');
            $eid = Input::get('eventId');

            $user = User::where('googleUserId', '=' , $gid)->first();
            if($user) {
                $event = Event::find($eid);
                if($event) {
                    $user->events()->attach($eid);
                    $message = ['message' => 'subscribed'];
                    return response()->json($message);
                } else {
                    $message = ['message' => 'Eid Not Found'];
                    return response()->json($message);
                }
            }
            else {

                $message = ['message' => 'Gid Not Found'];
                return response()->json($message);
            }
        }
           
    }
    public function unsubscribe()
    {
      if(Input::has('userId') && Input::has('eventId')) {
            $gid = Input::get('userId');
            $eid = Input::get('eventId');

            $user = User::where('googleUserId', '=' , $gid)->first();
            if($user) {
                $event = Event::find($eid);
                if($event) {
                    $user->events()->detach($eid);
                    $message = ['message' => 'unsubscribed'];
                    return response()->json($message);
                } else {
                    $message = ['message' => 'Eid Not Found'];
                    return response()->json($message);
                }
            }
            else {

                $message = ['message' => 'Gid Not Found'];
                return response()->json($message);
            }
        }
          
    }
    public function index()
    {
        $numberofevents = Event::all()->count();
        $events = Event::orderBy('dateandtime', 'asc')->get();
        return view('events.index')
        ->with('events', $events)
        ->with('numberofevents', $numberofevents);
    }

    
    public function dashboard()
    {
        $currentevent = Event::where('dateandtime', '>=', Carbon::now())
        ->orderBy('dateandtime', 'asc')
        ->first();
        
        $numberofevents = Event::all()->count();
        $numberofusers = User::all()->count();
        $subscribes = User::with('events')->get()->toArray();


       
        $subscribes = DB::table('event_user')
        ->join('events', 'events.id', '=', 'event_user.event_id')
        ->join('users', 'users.id', '=', 'event_user.user_id')
        ->orderBy("event_user.created_at", "desc")
        ->take(5)->select('events.name as EN', 'users.name as UN', 'event_user.created_at')->get();

        return view('dashboard')
        ->with('currentevent', $currentevent)
        ->with('numberofevents',$numberofevents)
        ->with('subscribes',$subscribes)
        ->with('numberofusers',$numberofusers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $numberofevents = Event::all()->count();
        return view('events.create')->with('numberofevents',$numberofevents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $image = Input::file('image');
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('uploads/' . $filename);
        Image::make($image->getRealPath())->fit(500, 500)->save($path);
        Session::flash('success', 'Event Saved !'); 
        $event = Input::all();
        unset($event['image']);
        $event['imgpath'] = $filename;
        Event::create($event);
        return redirect('events');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $numberofevents = Event::all()->count();
        $event = Event::find($id);
        return view('events.edit')->with('event',$event)->with('numberofevents',$numberofevents);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
            $updatedevent = Input::all();

            if(Input::hasFile('image')) {

                $image = Input::file('image');
                $filename  = time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('uploads/' . $filename);
                Image::make($image->getRealPath())->fit(500, 500)->save($path);
                unset($updatedevent['image']);
                $updatedevent['imgpath'] = $filename;
          }
             else {
              unset($updatedevent['image']);
             }
             Session::flash('updated', 'Event with id '. $id .' Updated!');
             $event = Event::find($id);
             $event->update($updatedevent);
                return redirect('events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);
        return redirect('events');
    }
}
