<?php

namespace App\Http\Controllers\Admin;

use App\Events\NewEventCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $data["events"]=Event::where("is_approved",true)->paginate(10);
        return view("admin.events.index",$data);
    }

    /**
     * show the list of events which are pending for approval by admin,
     * and are uploaded by event organizers
     *
     * @return \Illuminate\Http\Response
     */
    public function show_unapproved(){
        $data["events"]=Event::where(["is_approved"=>false])->where("organizer_type","<>","admin")->paginate(10);
        return view("admin.events.unapproved",$data);

    }
    /**
     * approve events of particular id
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function approveEvent(Request $request){
        $e=Event::findOrFail($request->id);
        $e->is_approved=1;
        $e->save();
        NewEventCreated::dispatch($e);
        return response(["success"=>true,"msg"=>"Event approved successfully","status"=>"200"]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.events.create");
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
        $data['is_approved']=1;
        $data["organizer_id"]=\Auth::guard("admin")->user()->id;
        $data["organizer_type"]="admin";
        $event=new Event();
        $event->fill($data);
        $event->save();


        return redirect()->route("admin.events.index")->with("msg","Event stored successfully");
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
        return view("admin.events.show",$data);
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
        return view("admin.events.edit",$data);



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
        $event=Event::findOrFail($id);
        $event->fill($data);
        $event->save();

        return redirect()->route("admin.events.index")->with("msg","Event updated successfully");

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
