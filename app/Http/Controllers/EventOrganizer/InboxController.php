<?php

namespace App\Http\Controllers\EventOrganizer;

use App\Events\UserHasNewMessageEvent;
use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('eo.inbox.index');
    }

    public function loadConversations(Request $request){
        if($request->ajax()){
            $cons=Conversation::with(['Messages'])->where(['sender'=>$request->eo_id])->orWhere(["receiver"=>$request->eo_id])
                ->orderBy('created_at',"desc")->get();
            foreach($cons as $con){
                $con['sender_profile']=User::findOrFail($con->sender);
                 }
            return response()->json(['conversations'=>$cons]);
        }
         abort(404);
    }

    public function handleSendMsg(Request $request){


        $request->validate([
            'from'=>"required",
            "to"=>"required",
            'body'=>"required",
        ]);

        $data=$request->except('_token');
        if(!$request->has('conversation_id')){
            $con=new Conversation();
            $con->sender=$data["from"];
            $con->receiver=$data['to'];
            $con->sender_type="eo";
            $con->eo_last_seen_at=Carbon::now();
            $con->save();
        }else{
            $con=Conversation::findOrFail($request->conversation_id);
        }
        $con_id=$con->id;
        $data['conversation_id']=$con->id;
        $msg= new Message();
        $msg->fill($data);
        $msg->save();
        broadcast(new UserHasNewMessageEvent($request->to,$msg))->toOthers();
        return response()->json(["success"=>"Message send successfully",'message'=>$msg,'conversation_id'=>$con_id],200);
    }

    public function mark_as_read(Request $request)
    {
        if($request->ajax()){
           $conv= Conversation::findOrFail($request->conv_id);
            $conv->messages()->where(["read_at"=>null])->where("from","!=",$request->reader_id)->update(["read_at"=>Carbon::now()]);
            $conv->eo_last_seen_at=Carbon::now();
            $conv->save();
            return response()->json(["success"=>"Conversation mark as read successfully"]);
        }
        abort(404);
    }


    public function delete_conversation(Request $request){
        if($request->ajax()){

            $con=Conversation::findOrFail($request->id);
            $con->messages()->delete();
            $con->delete();
            return response()->json(["success"=>"Conversation Deleted successfully"]);

        }
        abort(404);
    }
    public function FetchAllMsgsOfConversation(Request $request){
        if($request->ajax()){
            $con=Conversation::findOrFail($request->conv_id);
           $msgz= $con->messages;
            return response()->json(["messages"=>$msgz],200);
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
