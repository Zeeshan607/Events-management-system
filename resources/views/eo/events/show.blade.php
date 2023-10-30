@extends("eo.layouts.app")

@section("title","Event")

@section("content")

    <div class="container-fluid content-container">
        <div class="row mx-0 mb-3">
            <div class="col-12 d-flex flex-column align-items-center">
                <img src="{{asset("/storage/events/".$event->image)}}" class="img-fluid event-img" alt="Event image here">
            </div>
        </div>
        <div class="row mx-0 my-3">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <span>{{date('d-m-Y   h:m A T', strtotime($event->datetime))}}</span>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="d-flex flex-row justify-content-end event-share">
                        <span class="fa fa-share-alt mx-1"></span>
                        <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook mx-1"></i></a>
                        <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram mx-1"></i></a>
                        <a href="https://www.linkedin.com" target="_blank"><i class="fab fa-linkedin mx-1"></i></a>
                    </div>
            </div>
        </div>
        <div class="row mx-0 mb-3">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <h1>{{$event->title}}</h1>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-end">
                <a href="#" class="btn btn-secondary">Invite via link</a>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12">
                <p>{!! $event->description !!}</p>
            </div>
        </div>
{{--        <div class="row mx-0 mt-5">--}}
{{--            <div class="col-12">--}}
{{--                <h4 class="text-uppercase">Organized By</h4>--}}

{{--                <div class="d-flex flex-row organizer-card">--}}
{{--                    <div class=" d-flex flex-column justify-content-center">--}}
{{--                        @if($event->organizer_type=="admin")--}}
{{--                        <img src="{{asset("storage/admin/".$event->getOrganizer()->image)}}" alt="" width="50px" height="50px" class="rounded-circle">--}}
{{--                        @else--}}
{{--                            <img src="{{asset("storage/eo/".$event->getOrganizer()->image)}}" alt="" width="50px" height="50px" class="rounded-circle">--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <div class="d-flex flex-column ps-3 justify-content-center">--}}
{{--                        <p class="m-0 text-uppercase">{{$event->getOrganizer()->name}}</p>--}}
{{--                        @if($event->organizer_type=="admin")--}}
{{--                        <span>Admin at <a href="/">Event Space</a></span>--}}
{{--                        @else--}}
{{--                            <span>Event's organizer at <a href="/">Event Space</a></span>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
    </div>


    @endsection
