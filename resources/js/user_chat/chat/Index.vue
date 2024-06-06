<style>
.msg-status-icon{
    display:inline-flex;
    font-size: 12px;
    margin-left:10px;
    opacity:0.8;
    color: #86cdf8;
}
#chat-body{
    height:700px;
}
.loader{
    display: flex;
    flex-direction: column;
    align-items:center;
}
.loader .fa-spinner{
    font-weight: bold;
    font-size:40px;
    opacity: 0.5;
}

</style>
<template>
    <div class="container" :class="{'loading':loading}">
        <div class="row mx-0" v-if="!loading">
            <div class="col-12">
                <div class="card chat-container">
                    <div class="card-header">
                        <div class="row mx-0">
                            <div class="col-6">
                                <p class="m-0"><b>{{this.user.name}}</b></p>
                                <span><i class="fa fa-dot-circle text-success active-icon"></i> Active</span>
                            </div>
                            <div class="col-6 text-end">
                                <span>{{ getTodayDateTime() }}</span>
                            </div>
                        </div>

                    </div>
                    <div class="row mx-0 ">
                        <div class="col-12">
                            <div class="d-flex flex-row to-organizer">
                                <div class="flex-col-1 ">
                                    <img :src="this.img_src+'/eo/' +this.eo.image" alt="eo profile">
                                </div>
                                <div class="flex-col-2 col">
                                    <h6>{{ this.eo.name }}</h6>
                                    <span class="to-status"> {{ this.conversation  ? 'Last Seen at :' + formatTimestamp(this.conversation.eo_last_seen_at?this.conversation.eo_last_seen_at: new Date(new Date(). getTime() - (24 * 60 * 60 * 1000))  ):"Active" }}</span>
                                    <span class="ratings">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-alt"></i>
                                            </span>

                                </div>
                            </div>
                        </div>
                        <hr class=" mx-auto" style="width:98%">
                    </div>
                    <div class="card-body" id="chat-body">
                       <div v-if="this.messages.length >0">
                           <input type="hidden" name="conversation_id" id="conversation_id" :value="this.messages[0].conversation_id">
                       </div>

                        <div class="chat-wrapper">

                                <div class="message" v-if="this.messages.length >0" v-for="msg in this.messages" :id="msg.id" v-bind:class="[(msg.from == this.auth_user_id)?'send' :'received']" >
                                    <p>{{msg.body}}</p>
                                    <div class="d-flex flex-row justify-content-end mx-0 align-items-center">
                                        <p class="msg-time">{{ formatTimestamp(msg.created_at) }}</p>
                                        <div v-if="msg.from == this.auth_user_id">

                                            <span class="msg-status-icon" v-if="msg.read_at"><i class="fa fa-check-double"></i></span>
                                            <span class="msg-status-icon" v-else><i class="fa fa-check"></i></span>
                                        </div>

                                    </div>

                                </div>
                            <div v-else>
                                <p class="text-success text-center m-0 p-0 ">Be first to start conversation</p>
                            </div>

                            <div id="scroll_ref"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form  v-on:submit.prevent="sendSms($event)">
                        <div class="input-group">
                            <input type="text" name="message" class="form-control" id="msg" placeholder="Type here....">
                            <button type="submit" class="btn btn-primary btn-sm"  ><i class="fa fa-paper-plane me-2"></i>SEND</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<div v-else>
    <div class="loader">
        <i class="fa fa-spinner fa-spin"></i>
    </div>
</div>
    </div>
</template>
<script>
import swal from "sweetalert2";
let token= document.querySelector("meta[name='csrf-token']").getAttribute('content');
const servername= window.location.protocol+"//"+window.location.hostname;
const loadingIcon="<i class='fa fa-spinner fa-spin'></i>";
const sendBtnText="<i class='fa fa-paper-plane me-2'></i>SEND"
import moment from 'moment';
export default {
    name:"index",
    props:['auth_user_id','eo_id'],
    data: function () {
        return {
            conversation:"",
            messages: [],
            eo:"",
            user:"",
            img_src: servername + "/storage",
            errors:[],
            loading:true,
        }
    },
// beforeMount() {
//
//         this.loading=true;
// },
    mounted() {
        var app=this;
        // console.log('User chat mounted')
        this.getEoProfile();
        this.getUserProfile();
        this.getTodayDateTime();
        axios.get(servername+'/get_chat/?user='+this.auth_user_id+"&eo="+this.eo_id).then(resp=>{
            this.conversation=resp.data.conversation??resp.data.conversation;
            // console.log(resp.data)
            this.messages=resp.data.conversation?.messages??[];
            this.loading=false;
            setTimeout(function(){
                app.scrollMsgToView();
            },500);
        }).catch(err=>{
            // console.log(err)
            swal.fire({
                title: 'Error!',
                text: err.message +" Please contact system Administrator",
                icon: 'error',
            }).then(function(){
                window.location.reload();
            })
            this.loading=false;
        })


        if(app.messages.some(app.checkForUnreadMsg)){
            setTimeout(function(){
                app.markAsRead(app.conversation.id);
            },1000);
        }

        //
        // Pusher.logToConsole = true;
        window.Echo.private('User-'+ this.auth_user_id )
            .listen(`.UserHasNewMessage`,function(e){
                   app.messages.push(e.message)
                setTimeout(function(){
                    app.scrollMsgToView()
                },500)
            });

    },
    methods: {
        sendSms:function(e){
            // from=> user, to=>event organizer
            let data;
            let con_id=$('#conversation_id').val();
            let btn=$(e.target).find("button[type='submit']");
            $(btn).html(loadingIcon);
            $(btn).addClass("disabled");
            if(!con_id){
                 data={
                    "from":this.auth_user_id,
                    "to":this.eo_id,
                    "body":$(e.target).find("#msg").val(),
                    "_token":token,
                }
            }else{
                data={
                    "from":this.auth_user_id,
                    "to":this.eo_id,
                    "body":$(e.target).find("#msg").val(),
                    'conversation_id':con_id,
                    "_token":token,
                }
            }
                let app=this;
               axios.post(servername+"/send_sms",data).then(resp=>{
                   this.messages.push(resp.data.message)
                   // console.log(resp.data)
                   this.conversation_id=resp.data.conversation_id;
                   this.conversation=resp.data.conversation;
                   $(e.target).find("#msg").val('');
                   setTimeout(function(){
                       app.scrollMsgToView()
                   },400)
                   $(btn).html(sendBtnText);
                   $(btn).removeClass("disabled");
               },(servErr)=>{
                       // console.log(servErr.response.data.message);
                       if(servErr.response.status==404){
                           swal.fire({
                               title: 'Error!',
                               text: "something went wrong or this conversation is deleted by other participant: Please contact system Administrator or try again",
                               icon: 'error',
                           }).then(function(){
                               window.location.reload();
                           });
                       }else{
                           swal.fire({
                               title: 'Error!',
                               text: servErr.response.data.message+": Please contact system Administrator or try again",
                               icon: 'error',
                           }).then(function(){
                               window.location.reload();
                           });
                       }

                       $(e.target).val('');
                       $(btn).html(sendBtnText);
                       $(btn).removeClass("disabled");
               }).catch(err=>{
                        // console.log(err)
                       swal.fire({
                           title: 'Error!',
                           text: "Oops something went wrong. Please contact system Administrator or try again",
                           icon: 'error',
                       }).then(function(){
                           window.location.reload();
                       })
                       $(e.target).val('');
                       $(btn).html(sendBtnText);
                       $(btn).removeClass("disabled");
                   });
        },
        getEoProfile(){
            axios.get(servername+ "/getEoProfile/?id="+ this.eo_id ).then(resp=>{
                this.eo=resp.data.eo;
            },(servErr)=>{
                swal.fire({
                    title: 'Error!',
                    text: servErr.response.data.message +" Please contact system Administrator",
                    icon: 'error',
                }).then(function(){
                    window.location.reload();
                })
                // console.log(servErr);
            }).catch(err=>{
                swal.fire({
                    title: 'Error!',
                    text: err.message +" Please contact system Administrator",
                    icon: 'error',
                }).then(function(){
                    window.location.reload();
                })
                // console.lo(err)
            });
        },
        getUserProfile(){
            axios.get(servername+ "/getUserProfile/?id="+ this.auth_user_id ).then(resp=>{
                this.user=resp.data.user;
                // console.log(resp.data)
            },(servErr)=>{

                swal.fire({
                    title: 'Error!',
                    text: servErr.response.data.message +" Please contact system Administrator",
                    icon: 'error',
                }).then(function(){
                    window.location.reload();
                })

            }).catch(err=>{
                // console.log(err);
                swal.fire({
                    title: 'Error!',
                    text: err.message +" Please contact system Administrator",
                    icon: 'error',
                }).then(function(){
                    window.location.reload();
                })
                // console.log(this.errors);
            });
        },
        markAsRead:function(conv_id){
            var data={"conv_id":conv_id,"_token":token,"reader_id":this.auth_user_id}
            axios.post(servername+"/mark_as_read",data).then(resp=>{
                // console.log(resp);
            },(servErr)=>{
                swal.fire({
                    title: 'Error!',
                    text: servErr.response.data.message +" Please contact system Administrator",
                    icon: 'error',
                }).then(function(){
                    window.location.reload();
                })
                // console.log(servErr.response.data.message);
            }).catch(err=>{
                swal.fire({
                    title: 'Error!',
                    text: err.message +" Please contact system Administrator",
                    icon: 'error',
                }).then(function(){
                    window.location.reload();
                })
                // console.log(err.response.data);
            })

        },
        formatTimestamp:function(timestamp){
            // console.log(moment(timestamp).format("MM-DD-YYYY h:mm:ss a"));
                return moment(timestamp).format("MM-DD-YYYY h:mm:ss a");
        },
        formatTimestampInTime:function(timestamp){
            return moment(timestamp).format("h:mm a")
        },
        scrollMsgToView:function(){
            var div =document.querySelector("#chat-body");
            div.scrollTo(0, div.scrollHeight);
        },
        checkForUnreadMsg:function(el, i, arr){
            return el.read_at === null && el.from !== this.auth_user_id;
        },
        getTodayDateTime:function(){
            let d= new Date();
                return  moment(d).format("DD-MM-YYYY h:mm:ss a");

        }
    },
}

</script>
