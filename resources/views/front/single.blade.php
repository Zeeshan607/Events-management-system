@extends("front.layouts.app")

@section("header-content")
    <div class="row mx ">
        <div class="col-12 ">
            <h1 class="text-start">Event Details:</h1>
        </div>
    </div>

    @endsection



@section("content")
    <!-- se = single event -->
    <section class="se-details-section">
        <div class="container se-details">
            <div class="row mx-0 mb-3 se-title">
                <div class="col-12">
                    <h1 class="text-bold text-uppercase">{{$event->title}}</h1>
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-12 se-img">
                    <img src="{{asset("storage/events/".$event->image)}}" alt="event logo">
                </div>
            </div>
            <div class="row mx-0 se-info">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 se-datetime">
                    <a href="#"><i class="fa fa-calendar me-2"></i>{{date('d-m-Y h:m:s A ', strtotime($event->datetime))}}</a>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 se-joined">
                    <a href="#"><i class="fa fa-user me-2"></i>500+ people interested</a>

                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 se-location">
                    <a href="#"> <i class="fa fa-map-marker-alt me-2"></i>{{$event->address." ". $event->city." ". $event->country}}</a>
                </div>
            </div>
            <div class="row mx-0 organizer-profile">
                <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                    <div class="d-flex flex-row">
                        <div class="flex-col-1 ">
                            <figure>
                                <img src="{{asset('storage/eo/'.$event->getOrganizer()->image)}}" alt="eo profile">
                            </figure>
                        </div>
                        <div class="flex-col-2 col">
                            <h6>Organized by {{$event->getOrganizer()->name}}</h6>
                            <span></span>
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
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 chat-col">
                    <a class="btn btn-primary" href="{{route('chat.index',$event->getOrganizer()->id)}}"><i class="fa fa-comment"></i> Chat</a>
                </div>

            </div>

            <div class="row mx-0 se-description">
                <div class="col-12">
                    <p>
                 {{$event->description}}
                  </p>
                </div>
            </div>
        </div>
    </section>


@endsection
