<?php

namespace App\Http\Controllers\EventOrganizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data["events"]=Event::where(["is_approved"=>true,"event_organizer_id"=>\Auth::guard("event_organizer")->user()->id])->paginate(10);
        return view("eo.events.index",$data);
    }



    public function showNonApprovedEvents(){

        $data["events"]=Event::where("is_approved",false)->where("event_organizer_id",\Auth::guard("event_organizer")->user()->id)->paginate(10);
        return view("eo.events.non-approved",$data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('eo.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        //

        $fileNameToStore="";
        if($request->hasFile('image')){
            $filename=pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
            $filename=str_replace(" ","-",$filename);
            $fileExtension=$request->file('image')->getClientOriginalExtension();
            $fileNameToStore=$filename.time().'.'.$fileExtension;
            Storage::disk('public')->put("/events/".$fileNameToStore, file_get_contents($request->file('image')));

        }

        $data=$request->validated();
        $data["description"]=$request->description?$request->description:null;
        $data['image']=$fileNameToStore;
        $data["event_organizer_id"]=\Auth::guard("event_organizer")->user()->id;
        $data["organizer_type"]="eo";
        $event=new Event();
        $event->fill($data);
        $event->save();
        return redirect()->route("eo.events.index")->with("msg","Event submitted for approval successfully.");

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
        $data["event"]=Event::findOrFail($id);
        return view("eo.events.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data["event"]=Event::findOrFail($id);
        return view("eo.events.edit",$data);
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
        //


        $fileNameToStore='';
        if($request->hasFile('image')){
            $filename=pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME);
            $filename=str_replace(" ","-",$filename);
            $fileExtension=$request->file('image')->getClientOriginalExtension();
            $fileNameToStore=$filename.time().'.'.$fileExtension;
            Storage::disk('public')->put("/events/".$fileNameToStore,  file_get_contents($request->file('image')));

        }


        $data=$request->validated();
        $data["description"]=$request->description?$request->description:null;
        if($fileNameToStore){
            $data['image']=$fileNameToStore;
        }
        $data["event_organizer_id"]=\Auth::guard("event_organizer")->user()->id;
        $data["organizer_type"]="eo";
        $event=Event::findOrFail($id);
        $event->fill($data);
        $event->save();
        return redirect()->route("eo.events.index")->with("msg","Event updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $event=Event::findOrFail($id);
        $event->delete();
        return back()->with("msg","Event deleted successfully");
    }
}
