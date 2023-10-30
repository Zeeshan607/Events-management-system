@extends("eo.layouts.app")







@section("content")


    <div class="container-fluid content-container" id="eo-chat-app-js">

        <eo-chat-app auth_id="{!!\Auth::guard('event_organizer')->id()!!}"></eo-chat-app>

    </div>

@endsection
