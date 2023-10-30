@extends('front.layouts.app')



@section("content")

    <header class="header">
        <section class="hero-section">
            <div class="overlay">
                <div class="container"  >
                    <div class="row mx-auto ">
                        <div class="col-12 ">
                            @include("front.layouts.partials.navbar")
                        </div>
                    </div>
                </div>

                <div class="container hero-content ">
                    <div class="row mx hero-text">
                        <div class="col-12">
                            <h1>EVENTS, MEETUPS & CONFERENCES</h1>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam aspernatur cum veritatis consequuntur quod repudiandae doloremque,
                                minima provident voluptas nobis assumenda eligendi repellat nihil itaque laudantium doloribus? At, corporis eveniet!
                            </p>
                        </div>
                    </div>
                    <div class="row mx-0 search-bar">
                        <div class="col-12">
                            <form action="{{route('events.search')}}" method="post">
                                @csrf
                                <div class="row mx-0">
                                    <div class="form-group py-2 col-12 col-sm-12 col-md-10 col-lg-10 text-dark text-start">
                                       <input type="text" name="search" placeholder="Search...." class="form-control" id="search">
                                    </div>
                                    <div class="form-group py-2 col-12 col-sm-12 col-md-2 col-lg-2 text-center search-btn-col">
                                        <button type="submit" class="btn btn-primary">Search Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <section class="events-section">
        <div class="container">
            <div class="row mx-0">
                <div class="col-12">
                    <div class="events-wrapper">

                        @forelse($events as $event)
                        <div class="card event">
                            <div class="event-thumb">
                                <img src="{{asset('storage/events/'.$event->image)}}" alt="image here">
                                <div class="event-lavel">
                                    <i class="fa fa-sitemap"></i> <span>500 Seat</span>
                                </div>
                            </div>
                            <div class="event-content">
                                <div class="event-info row mx-0">
                                    <div class="event-date col-6"><a href="#"><i class="fa fa-calendar-alt"></i> {{date('d-m-Y', strtotime($event->datetime))}}</a></div>
                                    <div class="event-location col-6"><a href="#"> <i class="fa fa-map-marker-alt"></i>{{$event->city==null?" ":$event->city}}, {{$event->country}}</a></div>
                                </div>
                                <h5 class="event-title"><a href="{{route('events.show',$event->id)}}">{{$event->title}}</a></h5>
                            </div>

                            <div class="event-actions card-footer row mx-0">
                                <div class="col-6 interest">

                                    @if(Auth::guard('web')->check())

                                        @if($event->checkIfCurrentUserIsInterested(\Auth::guard('web')->user()))
                                            <div class="pretty p-icon p-toggle p-plain interested-pretty-icon">
                                                <input type="checkbox" checked id="interest"  onclick="interestStatusRequest(event, `{!! $event->id !!}`)" />
                                                <div class="state p-off ">
                                                    <i class="icon far fa-heart text-danger"></i>
                                                </div>
                                                <div class="state p-on p-danger-o">
                                                    <i class="icon fa fa-heart"></i>
                                                </div>
                                                <label for="interest" class="text-primary">
                                                    interested
                                                </label>
                                            </div>

                                        @else
                                            <div class="pretty p-icon p-toggle p-plain interested-pretty-icon" checked >
                                                <input type="checkbox" id="interest" onclick="interestStatusRequest(event, `{!! $event->id !!}`)"  />
                                                <div class="state p-off ">
                                                    <i class="icon far fa-heart text-danger"></i>
                                                </div>
                                                <div class="state p-on p-danger-o">
                                                    <i class="icon fa fa-heart"></i>
                                                </div>
                                                <label for="interest" class="">
                                                    interested
                                                </label>
                                            </div>
                                        @endif


                                    @else
                                        <a href="{{route('login')}}"><i class="far fa-heart mx-2 text-danger"></i>Interested</a>
                                    @endif
                                </div>

                                <div class="col-6 share"><a href="#"><i class="fa fa-share mx-2"></i>Share</a></div>
                            </div>
                        </div>
                        @empty
                            <p>Sorry Featured events are not available yet</p>
                        @endforelse




                    </div>
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-12 text-center">
                    <a href="{{route("events")}}">View all</a>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <div class="row mx-0 about-heading">
                <div class="col-12 ">
                    <h1 class="text-uppercase">ABOUT</h1>
                </div>
            </div>
            <div class="row mx-0 about-content">
                <div class="col-12">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque magnam ipsum tenetur minus neque sapiente nihil quis odit a et maiores adipisci quas iste optio obcaecati, alias temporibus unde. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Deserunt aliquam aspernatur voluptatum optio nobis commodi sapiente ipsum laudantium! Earum exercitationem quam eligendi quo molestiae ipsa nam suscipit a magnam voluptates.
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque magnam ipsum tenetur minus neque sapiente nihil quis odit a et maiores adipisci quas iste optio obcaecati, alias temporibus unde. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Deserunt aliquam aspernatur voluptatum optio nobis commodi sapiente ipsum laudantium! Earum exercitationem quam eligendi quo molestiae ipsa nam suscipit a magnam voluptates.

                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="organizers-section">
        <div class="container">
            <div class="row mx-0 organizers-heading">
                <h1 class="text-uppercase">Top Rated Event Organizers</h1>
            </div>
            <div class="row mx-0 organizers-slider">
                <div class="col-12">
                    <div class="jcarousel-wrapper">
                        <div class="jcarousel">
                            <ul>
                                <li>
                                    <div class="card eo">
                                        <figure>
                                            <img src="{{asset('web/assets/images/speaker-1.png')}}"  alt="Image 1">
                                        </figure>
                                        <div class="card-body eo-body">
                                            <h5>Sentiago Axel</h5>
                                            <span class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-alt"></i>
                                  </span>
                                        </div>
                                    </div>

                                </li>
                                <li>  <div class="card eo">
                                        <figure>
                                            <img src="{{asset('web/assets/images/speaker-2.png')}}" alt="Image 1">
                                        </figure>
                                        <div class="card-body eo-body">
                                            <h5>Sentiago Axel</h5>
                                            <span class="ratings">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-alt"></i>
                              </span>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="card eo">
                                        <figure>
                                            <img src="{{asset('web/assets/images/speaker-3.png')}}" alt="Image 1">
                                        </figure>
                                        <div class="card-body eo-body">
                                            <h5>Sentiago Axel</h5>
                                            <span class="ratings">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-alt"></i>
                              </span>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="card eo">
                                        <figure>
                                            <img src="{{asset('web/assets/images/speaker-2.png')}}" alt="Image 1">
                                        </figure>
                                        <div class="card-body eo-body">
                                            <h5>Sentiago Axel</h5>
                                            <span class="ratings">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-half-alt"></i>
                            </span>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                        <a href="#" class="jcarousel-control-next">&rsaquo;</a>

                        <p class="jcarousel-pagination"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sponsers-section">
        <div class="container">
            <div class="row mx-0 sponsers-heading">
                <div class="col-12">
                    <h5>OUR SPONSERS</h5>
                </div>
            </div>

            <div class="row mx-0">
                <div class="col-12">
                    <ul class="sponsers-list">

                        <li><img src="{{asset('web/assets/images//toyota-logo-png-transparent.png')}}" alt="sponser-toyota"></li>
                        <li><img src="{{asset('web/assets/images/Bank-Alfalah-Logo-300x208-1.png')}}" alt="sponser-alflah"></li>
                        <li><img src="{{asset('web/assets/images/MasterCard_Logo.png')}}" alt="sponser-mastercard"></li>
                        <li><img src="{{asset('web/assets/images/1200px-United_Bank_Limited_logo.svg.png')}}" alt="sponser-ubl"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


@endsection

@section("scripts")
    <script type="text/javascript">
        let token= document.querySelector("meta[name='csrf-token']").getAttribute('content');
    function interestStatusRequest(e,event_id){
    // e.preventDefault();
    if(`{!! \Auth::check()!!}`??false){
    if(!$(e.target).is(":checked")){
    $.ajax({
    url:`{{route('user.events.interest')}}`,
    type:"post",
    data:{"_token":token,"event_id":event_id,"is_interested":0},
    success:function(resp){
    if(resp.success){
    $(e.target).prop("checked",false);
    $(e.target).siblings('label').removeClass('text-primary');
    }
    },
    error:function(err){
    console.log(err);
    }
    })

    }else{
    $.ajax({
    url:`{{route('user.events.interest')}}`,
    type:"post",
    data:{"_token":token,"event_id":event_id,"is_interested":1},
    success:function(resp){
    // console.log(resp);
    if(resp.success){
    $(e.target).prop("checked",true);
    $(e.target).siblings('label').addClass('text-primary');
    }

    },
    error:function(err){
    // console.log(err);
    }
    })
    }



    }else{
    window.location="/login";
    }
    // console.log('function works');
    }
    </script>

@endsection



