<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventportionController extends Controller
{
    public function store(Request $request)
    {
        $event=new Event();
        $event->name=request('name');
        $event->user_id=Auth::id();
        $event->location="";
        $event->date="";
        $event->save();
        return redirect('/dashboard');
    }
}
