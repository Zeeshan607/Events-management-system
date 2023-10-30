<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventOrganizer;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data["users_count"]=User::count();
        $data["users_registered_in_last_week"]=User::whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-7 days')) )->count();
        $data["eos_count"]=EventOrganizer::count();
        $data["eos_registered_in_last_week"]=EventOrganizer::whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-7 days')) )->count();
        $data["events_count"]=Event::where('is_approved',true)->count();
        $data["events_published_in_last_week"]=Event::whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-7 days')) )->count();
        return view("admin.dashboard",$data);
    }












}
