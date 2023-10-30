@extends("front.layouts.app")


@section("header-content")

    <div class="row mx ">
        <div class="col-12 ">
            <h1 class="text-start">Chat:</h1>
        </div>
    </div>

    @endsection

@section("content")


{{--    {{ dd($eo_id)  }}--}}

    <section class="chat-section" id="user-chat-app-js" style="height: 1000px">
            <user-chat-app auth_user_id="{{\Auth::guard('web')->id()}}" eo_id="{!! $eo_id !!}"></user-chat-app>
    </section>
@endsection
