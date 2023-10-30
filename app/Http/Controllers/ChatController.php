<?php

namespace App\Http\Controllers;

use App\Events\EoHasNewMessageEvent;
use App\Models\Conversation;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {

        $data["eo_id"]=$id;
        return view('front.chat',$data);
    }
    public function getChat(Request $request){

        $request->validate([
           "user"=>"required",
           "eo"=>"required"
        ]);
        $conversation=Conversation::with(["Messages"])->where(["sender"=>$request->user,"receiver"=>$request->eo])->orWhere(["sender"=>$request->eo,"receiver"=>$request->user])->first();
        return response()->json(["conversation"=>$conversation]);

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
            $con->sender_type="user";
            $con->user_last_seen_at=Carbon::now();
            $con->save();
        }else{
            $con=Conversation::findOrFail($request->conversation_id);
        }
        $con_id=$con->id;
        $data['conversation_id']=$con->id;
        $msg= new Message();
        $msg->fill($data);
        $msg->save();

        broadcast(new EoHasNewMessageEvent($request->to, $con, $msg))->toOthers();
        return response()->json(["success"=>"Message send successfully",'message'=>$msg,'conversation_id'=>$con_id],200);


    }
    public function mark_as_read(Request $request)
    {
        if($request->ajax()){
            $conv= Conversation::findOrFail($request->conv_id);
            $conv->messages()->where(["read_at"=>null])->where("from","!=",$request->reader_id)->update(["read_at"=>Carbon::now()]);
            $conv->user_last_seen_at=Carbon::now();
            $conv->save();
            return response()->json(["success"=>"Conversation mark as read successfully"]);
        }
        abort(404);
    }

}
