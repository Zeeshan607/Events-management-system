<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventOrganizer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventOrganizersProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data["event_organizers"]=EventOrganizer::paginate(10);
        return view("admin.eo-profiles.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.eo-profiles.create');
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
        $request->validate([
            "name"=>["required","string","max:255"],
            "email"=>["required",'string', 'email', 'max:255'],
            'country'=>['required', 'string', 'max:255'],
            'city'=>['required', 'string', 'max:255']
        ]);

        $password=Str::Random(8);
        $eo=new EventOrganizer();
        $eo->fill($request->all());
        $eo->password=$password;
        $eo->save();
        return redirect()->route("admin.eo_profiles.index")->with('msg',"Event Organizer created successfully");



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
        //
        $data["eo"]=EventOrganizer::findOrFail($id);
        return view("admin.eo-profiles.edit",$data);
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
        $request->validate([
            "name"=>["required","string","max:255"],
            "email"=>["required",'string', 'email', 'max:255'],
            'country'=>['required', 'string', 'max:255'],
            'city'=>['required', 'string', 'max:255']
        ]);


        $eo=EventOrganizer::findOrFail($id);
        $eo->fill($request->all());
        $eo->save();
        return redirect()->route("admin.eo_profiles.index")->with('msg',"Event Organizer updated successfully");
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
        $eo=EventOrganizer::findOrFail($id);
        $eo->delete();
        return back()->with("msg","Profile deleted successfully");
    }
}
