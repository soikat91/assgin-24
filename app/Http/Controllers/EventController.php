<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function event(){

        return view('pages.dashboard.event-page');
    }

    function eventList(Request $request){

        $userId=$request->header('id');
        return Event::where('user_id',$userId)->get();
    }

    function eventCreate(Request $request){

        $userId=$request->header('id');

        return Event::where('user_id',$userId)->create([
            
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'date'=>$request->input('date'),
            'time'=>$request->input('time'),
            'location'=>$request->input('location'),
            "user_id"=>$userId
        ]);

        

    }

    function eventDelete(Request $request){
        $userId=$request->header('id');
        $eventId=$request->input('id');
        return Event::where('id',$eventId)->where('user_id',$userId)->delete();
    }
}
