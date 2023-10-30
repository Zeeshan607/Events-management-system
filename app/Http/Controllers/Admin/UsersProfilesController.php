<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\EventOrganizer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data["users"]=User::paginate(10);
        return view("admin.user-profiles.index",$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user-profiles.create');
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
        //
        $request->validate([
            "name"=>["required","string","max:255"],
            "email"=>["required",'string', 'email', 'max:255'],
            'country'=>['required', 'string', 'max:255'],
            'city'=>['required', 'string', 'max:255']
        ]);

        $password=Str::Random(8);
        $eo=new User();
        $eo->fill($request->all());
        $eo->password=$password;
        $eo->save();
        return redirect()->route("admin.user_profiles.index")->with('msg',"User created successfully");


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
        $data["user"]=User::findOrFail($id);
        return view("admin.user-profiles.edit",$data);
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


        $eo=User::findOrFail($id);
        $eo->fill($request->all());
        $eo->save();
        return redirect()->route("admin.user_profiles.index")->with('msg',"User updated successfully");
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
        $user=User::findOrFail($id);
        $user->delete();
        return back()->with("msg","Profile deleted successfully");
    }
}
