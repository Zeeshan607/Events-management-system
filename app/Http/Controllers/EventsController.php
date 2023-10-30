<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\UserInterestedEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $query=Event::where(["is_approved"=>true]);

        if($request->has("search")){

                $query->where("title","LIKE","%".$request->search."%");
        }
        if($request->has("country")){
            $query->where("country","LIKE","%".$request->country."%");
        }

        if($request->has("city")){
              $query->where("city","LIKE","%".$request->city."%");
          }

        if($request->has("date")){
              $query->whereDate("datetime","=",date("Y-m-d",strtotime($request->date)));
          }
//dd($query->toSql());
        $data['events']=$query->paginate(8);

        return view("front.events",$data);
    }

    public function getSearchRequest(Request $request){
            return redirect()->route('events',["search"=>$request->search]);
    }


    public function handleUserEventInterest(Request $request){
        if($request->ajax()){
            $request->validate([
                "event_id"=>"required",
                "is_interested"=>"required"
            ]);

            $user=$request->user("web");

            if($request->is_interested){
                $user->InterestedEvent()->attach($request->event_id);
                $status="attached";
//
            }else{
                $user->InterestedEvent()->detach($request->event_id);
                $status="detached";
            }
            return response()->json(["success"=>true,"status"=>$status],200);

        }
        abort(404);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view("front.single",$data);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
