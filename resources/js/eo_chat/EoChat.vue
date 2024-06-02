<style>
.backend-chat{
    height:800px;
}

.conversation-profile-img{
    width:45px;
    height: 45px;
}
.chat-placeholder.default{
  height:100%;
}
.chat-placeholder img{
    width:215px;
    height: 100px;
    opacity: 0.5;
}
.conversations-list{
    max-height:800px;
    overflow-y:auto;
}
.close-icon{
    cursor:pointer;
}
.room{
    position:relative;
    overflow: hidden;
}
.room .newBadge{
    position:absolute;
    right:0%;
    top:40%;

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
.conv-menu{
    z-index:100;
    position:absolute!important;
    top:5px;
    right:10px;
    width:10px;
    text-align: center;

    cursor: pointer;
}
.conv-menu a{
    color: #989898!important;
}
.conv-menu :hover{
    color:black;
}
.conv-menu .dropdown-menu{
    padding:0px!important;
    top:20px!important;
    font-size: 12px;
    min-width:fit-content!important;
}
</style>

<template>



    <div class="container-fluid p-0 bg-white backend-chat">
<!--        <div class="row mx-0">-->

<!--        </div>-->
        <div class="row mx-0" v-if="does_user_has_conversations">
            <div class="chat-sidebar p-0">
                <div class="conversations-list-desktop-view">
                    <ul class="conversations-list list-unstyled">
                        <h3 class="py-3 ps-2 "><b>Conversations</b> </h3>
                        <span class="close-icon">&times;</span>
                        <li class="border-top border-bottom p-2 bg-light room" :id="'room-'+conv.id" v-for="conv in this.conversations" :key="conv.id" v-if="!loading">
                            <a href="#" class="link-info text-decoration-none" role="button" v-on:click.prevent="load_my_messages(conv.id)">
                                <div class="row m-0">
                                    <div class="col-2 p-0 d-flex flex-column align-items-center">
                                        <img :src="this.img_src+'/user/profile-placeholder.jpg'" class="rounded-circle conversation-profile-img"  alt="profile img here"/>
                                    </div>
                                    <div class="col-10 p-0 d-flex flex-column justify-content-center">
                                        <h5><b>{{ conv.sender_profile.name }}</b> </h5>
                                        <span id="recent-msg">{{ conv.messages?conv.messages[conv.messages.length -1].body:''}}</span>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <small class="text-opacity-75 text-muted">Last seen at {{formatTimestamp(conv.user_last_seen_at)}}</small>
                                </div>
                            </a>
                            <div class="conv-menu dropdown">
                                <a href="#" type="button" id="conversation_menu" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="conversation_menu">
                                    <li class="dropdown-item" v-on:click="deleteConversation(conv.id)">
                                       <span >Delete</span>
                                    </li>
                                </ul>
                            </div>
                            <div v-if="conv.messages.some(this.checkForUnreadMsg)">
                                <span class='badge bg-danger float-end newBadge'>New</span>
                            </div>

                        </li>
                        <li v-else>
                            <div class="loader">
                                <i class="fa fa-spinner fa-spin"></i>
                            </div>
                        </li>



                         <div class="divider"></div>
                    </ul>
                </div>
            </div>
            <div class="chat-content p-0">
                <section class="chat-section">

                    <div class="container-fluid p-0">
                        <div class="row mx-0">
                            <div class="col-12 p-0">
                                <div class="card chat-container">
                                    <div class="row mx-0 my-2 d-md-none d-lg-none">
                                        <div class="col-12">
                                            <a class="chat-toggle my-2" role="button"><i class="hamburger align-self-center"></i></a>
                                        </div>
                                    </div>
                                    <div v-if="this.active_conversation !== ''">
                                    <div class="card-header">


                                        <div class="row mx-0 " >
                                            <div class="col-12">
                                                <div class="d-flex flex-row to-organizer">
                                                    <div class="flex-col-1 ">
                                                        <img :src="this.img_src+'/user/profile-placeholder.jpg'" alt="eo profile">
                                                    </div>
                                                    <div class="flex-col-2 col">
                                                        <h6>{{this.active_conv_sender_profile.name}}</h6>
                                                        <span class="to-status">Last seen: 5 hours ago</span>
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

                                        </div>


                                    </div>

                                    <div class="card-body" id="chat-body">



                                        <div class="chat-wrapper">
                                            <div class="message " v-for="msg in this.active_conv_messages" :id="msg.from" :class="[msg.from !== this.auth_id?'received' :'send']">
                                                <p>{{ msg.body }}</p>
                                                <p class="msg-time">{{this.formatTimestampInTime(msg.created_at)}}
                                                <span v-if="msg.from === this.auth_id" :title="'Seen at '+this.formatTimestamp(msg.read_at)" class="text-primary">
                                                    <span v-if="msg.read_at"><i class="fa fa-check-double text-primary"></i></span>
                                                    <span v-else><i class="fa fa-check text-primary"></i></span>
                                                </span>
                                                </p>
                                            </div>


                                        </div>


                                    </div>
                                    <div class="card-footer">
                                        <form  v-on:submit.prevent="sendSms($event, this.active_conversation)">
                                            <div class="input-group">
                                                <input type="text" name="message" class="form-control" id="msg" placeholder="Type here....">
                                                <button type="submit" class="btn btn-primary btn-sm"  ><i class="fa fa-paper-plane me-2"></i>SEND</button>
                                            </div>
                                        </form>
                                    </div>



                                    </div>
                                    <div v-else>
                                        <div class="chat-placeholder  d-flex flex-column align-items-center justify-content-center p-5">
                                            <img :src="this.img_src+'/home/logo-colored.png'" class="chat-placeholder" alt="placeholder image here" />
                                            <b>Chat system developed by <a href="https://muhammadzeeshan.dev">Muhammad Zeeshan</a></b>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div v-else >
            <div class="chat-placeholder default d-flex flex-column align-items-center align-self-center justify-content-between p-5">
<!--                <div class="">-->
                    <img :src="this.img_src+'/home/logo-colored.png'" class="chat-placeholder" alt="placeholder image here" />
                    <b>Chat system developed by BC190402071</b>
                    <span class="text-muted"><b>There are no conversations yet available for you!</b></span>
<!--                </div>-->

            </div>
        </div>

</div>

<!--    </div>-->
</template>

<script>
import swal from "sweetalert2";
import moment from "moment";

let token= document.querySelector("meta[name='csrf-token']").getAttribute('content');
const servername= window.location.protocol+"//"+window.location.hostname;
const loadingIcon="<i class='fa fa-spinner fa-spin'></i>";
const sendBtnText="<i class='fa fa-paper-plane me-2'></i>SEND"
    export default {
        name:'EoChat',
        props:['auth_id'],
        data: function () {
            return {
                conversations:'',
                active_conversation:"",
                active_conv_messages:[],
                active_conv_sender_profile:"",
                img_src: servername + "/storage",
                isAnyConvActive:false,
                errors:[],
                loading:true,
                does_user_has_conversations:false,
            }
        },
        // watch:{
        //
        // },
        mounted() {
            var app=this;
            // console.log('Eo chat Component mounted.');
            axios.get(servername+ "/eo/inbox/loadConversations/?eo_id="+this.auth_id).then(resp=>{
                    this.conversations=resp.data.conversations;
                    if(!resp.data.conversations.length){
                        this.does_user_has_conversations=false;
                    }else{
                        this.does_user_has_conversations=true;
                    }
                    this.loading=false;
                },(servErr)=>{
                    console.log(servErr);
                }).catch(err=>{
                    console.log(err);
                });

            // Pusher.logToConsole=true;
            window.Echo.private('EventOrganizer-'+ this.auth_id )
                .listen(`.EoHasNewMessage`,(e) =>{
                    // console.log(e.conversation);
                                if(!this.does_user_has_conversations){
                                    this.does_user_has_conversations=true;
                                }
                             let convIndex = app.conversations.findIndex(c=> c.id === e.conversation.id)
                             if( convIndex>=0){
                                 // console.log('conditions gets true for conversations array')
                                 app.conversations[convIndex].messages.push(e.message);
                                         $('#room-' +  app.conversations[convIndex].id).find('#recent-msg').text(e.message.body);
                                         let newbadge = "<span class='badge bg-danger float-end newBadge'>New</span>";
                                         $('#room-' +  app.conversations[convIndex].id).append(newbadge);

                                 if(app.active_conversation && app.active_conversation == e.message.conversation_id){
                                     setTimeout(function(){
                                         app.scrollMsgToView();
                                     },400);

                                     setTimeout(function(){
                                         app.markAsRead(e.message.conversation_id);
                                     },800);
                                 }


                             }else{
                                 app.createNewConversation(e.conversation, e.message)
                             };



                });//echo function ends




        },
        methods:{

            load_my_messages(con_id){
                let conversation = this.conversations.filter(con => con.id == con_id);
                this.active_conversation=con_id;
                this.active_conv_messages=conversation[0].messages;
                this.active_conv_sender_profile=conversation[0].sender_profile;
                this.isAnyConvActive=true;
                var app=this;
                // console.log('load conversation function called')
                if(this.isAnyConvActive){
                    setTimeout(function(){
                        app.scrollMsgToView();
                    },380)
                }
                if(conversation[0].messages.some(app.checkForUnreadMsg)){
                setTimeout(function(){
                        // console.log('yes MarkAsRead runs there was some unread msgz');
                        app.markAsRead(con_id);
                },1500);
                }

            },
            sendSms:function(e,conv_id){
                // to=> user, from=>event organizer
                let app=this;
                let btn=$(e.target).find("button[type='submit']");
                $(btn).html(loadingIcon);
                $(btn).addClass("disabled");
                let data;
                if(!conv_id){
                    data={
                        "from":this.auth_id,
                        "to":this.active_conv_sender_profile.id,
                        "body":$(e.target).find("#msg").val(),
                        "_token":token,
                    }
                }else{
                    data={
                        "from":this.auth_id,
                        "to":this.active_conv_sender_profile.id,
                        "body":$(e.target).find("#msg").val(),
                        'conversation_id':conv_id,
                        "_token":token,
                    }
                }

                axios.post(servername+"/eo/inbox/send_msg",data).then(resp=>{
                    if(resp.data.message.conversation_id == this.active_conversation){
                        this.active_conv_messages.push(resp.data.message)
                    }

                    $(e.target).find("#msg").val('');
                    $(btn).html(sendBtnText);
                    $(btn).removeClass("disabled");
                    setTimeout(function(){
                        app.scrollMsgToView();
                    },380)

                },(servErr)=>{
                    // console.log(servErr.response.data.message);
                    $(e.target).val('');
                    $(btn).html(sendBtnText);
                    $(btn).removeClass("disabled");
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
                }).catch(err=>{
                    // console.log(err.response.data)
                    $(e.target).val('');
                    $(btn).html(sendBtnText);
                    $(btn).removeClass("disabled");
                    swal.fire({
                        title: 'Error!',
                        text: err.message +" Please contact system Administrator or try again",
                        icon: 'error',
                    }).then(function(){
                        window.location.reload();
                    })
                });
            },
            scrollMsgToView:function(){
                var div =document.querySelector("#chat-body");
                div.scrollTo(0, div.scrollHeight);
            },
            markAsRead:function(conv_id){
                var data={"conv_id":conv_id,"_token":token,"reader_id":this.auth_id}
                axios.post(servername+"/eo/inbox/mark_as_read",data).then(resp=>{
                    if(resp.status==200){
                        $("#room-"+conv_id).find(".newBadge").remove();
                    }
                    // console.log(resp);
                },(servErr)=>{
                    // console.log(servErr.response.data.message);
                    swal.fire({
                        title: 'Error!',
                        text: servErr.response.data.message +" Please contact system Administrator or try again",
                        icon: 'error',
                    }).then(function(){
                        window.location.reload();
                    })
                }).catch(err=>{
                    swal.fire({
                        title: 'Error!',
                        text: err.message +" Please contact system Administrator or try again",
                        icon: 'error',
                    }).then(function(){
                        window.location.reload();
                    })
                    console.log(err.response.data);
                })

            },
            checkForUnreadMsg:function(el, i, arr){
                    return el.read_at === null && el.from !== this.auth_id;
            },
            createNewConversation(conv,msg){
                    conv["messages"]=[];
                    conv.messages.push(msg);
                   this.conversations.unshift(conv);

                    // this.getAllMessagesForNewConversation(conv).then(resp=>{
                    //     conv["messages"]=resp.messages;
                    //     app.conversations.unshift(conv);
                    // })
            },
            // getAllMessagesForNewConversation(conv){
            //     const promise =  axios.get(servername+"/eo/inbox/get_all_msg_of_new_conv/?conv_id="+conv.id);
            //     return Promise.resolve(promise)
            //         .then(resp =>  resp.data)
            //         .catch(error => {
            //             console.error('Error:', error.message);
            //             return [];
            //         });
            //
            // },
            deleteConversation:function(id){
                let data={
                    "_token":token,
                    "id":id,
                };
                swal.fire({
                    title:'Are you sure?',
                    text:"You will not be able to recover this Conversation and it's messages!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#324cdd',
                    confirmButtonText: 'Yes, delete it!',
                    // closeOnConfirm: true
                }).then(resp=> {
                    if (resp.isConfirmed) {
                        axios.post(servername + "/eo/inbox/delete_conversation", data).then(resp => {
                            console.log(resp)
                            if(resp.status==200){
                                swal.fire(
                                    'Success',
                                    'Conversation Deleted successfully!',
                                    'success'
                                ).then(function(){
                                    window.location.reload();
                                })
                            }

                        }, (servErr) => {
                            // console.log(servErr.response.data.message)
                            swal.fire({
                                title: 'Error!',
                                text: servErr.response.data.message +" Please contact system Administrator",
                                icon: 'error',
                            }).then(function(){
                                window.location.reload();
                            })
                        }).catch(err => {
                            // console.log(err.response.data)
                            swal.fire({
                                title: 'Error!',
                                text: err.message +" Please contact system Administrator",
                                icon: 'error',
                            }).then(function(){
                                window.location.reload();
                            })
                        })
                    }
                });
            },
            formatTimestamp:function(timestamp){
                return moment(timestamp).format("MM-DD-YYYY h:mm:ss a")
            },
            formatTimestampInTime:function(timestamp){
                return moment(timestamp).format("h:mm a")
            },


        }
    }
</script>
