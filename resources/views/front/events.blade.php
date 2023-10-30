@extends("front.layouts.app")


@section("header-content")
    <div class="row mx-0 search-bar">
        <div class="col-12">

                <div class="row mx-0">
                    <div class="form-group col-12">
                        <input type="text" name="search" placeholder="Search...." id="search" class="form-control">
                    </div>
                </div>
                <div class="row mx-0">

                    <div class="col-12 col-sm-12 col-md-4 col-lg-4  ">
                        <div class="form-group py-2">

                            <input name="country" id="country"  class="country-select form-control" value="Pakistan" />
                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 ">
                        <div class="form-group py-2">
                            <select name="city" id="city" class="city-select form-select">
                                <option value="null" selected disabled>--Select City--</option>
                            </select>
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group py-2 col-12 col-sm-12 col-md-4 col-lg-4">
                        <input type="date" name="date" class="form-control" id="date">
                    </div>


                </div>
                <div class="row mx-0">
                    <div class="col-12">
                        <div class="form-group text-center search-btn-col">
                            <a type="button" class="btn btn-sm btn-link" onclick="resetFilter()">Reset Filters</a>
                            <button type="button"  onclick="searchQuery($('#search').val(), $('#country').val(), $('#city').val(),$('#date').val())" class="btn btn-primary">Search Now</button>
                        </div>
                    </div>
                </div>

        </div>
    </div>

@endsection

@section("content")

{{--    <header class="header">--}}
{{--        <section class="ct-header-section">--}}
{{--            <div class="overlay">--}}
{{--                <div class="container"  >--}}
{{--                    <div class="row mx-auto ">--}}
{{--                        <div class="col-12 ">--}}

{{--                            @include("front.layouts.partials.navbar")--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="container ct-header-content ">--}}

{{--                    <div class="row mx-0 search-bar">--}}
{{--                        <div class="col-12">--}}
{{--                            <form action="">--}}
{{--                                <div class="row mx-0">--}}
{{--                                    <div class="form-group py-2 col-12 col-sm-12 col-md-5 col-lg-5">--}}
{{--                                        <input type="text" name="location" placeholder="Event Location" class="form-control" id="">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group py-2 col-12 col-sm-12 col-md-5 col-lg-5">--}}
{{--                                        <input type="date" name="date" class="form-control" id="">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group py-2 col-12 col-sm-12 col-md-2 col-lg-2 text-center search-btn-col">--}}
{{--                                        <button type="submit" class="btn btn-primary">Search Now</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    --}}
{{--                    --}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </header>--}}

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
                                    <div class="col-6 interest" >

{{--@php--}}
{{--dd($event->checkIfCurrentUserIsInterested(\Auth::guard('web')->user()));--}}
{{--@endphp--}}
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
{{--                                <div class="ribbon-corner">--}}
{{--                                    <div class="ribbon-content"><i class="bi bi-person-fill mr-2"></i>Yours</div>--}}
{{--                                </div>--}}
                            </div>
                        @empty
                            <p>Sorry! 0 result found</p>
                        @endforelse




                    </div>
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-12">
                    {!! $events->links() !!}
                </div>
            </div>
        </div>
    </section>

    @endsection


@section("scripts")
{{--    @include('global-partial.country-city-new-js')--}}
<script>
    $(document).ready(function(){
        const urlParams = new URLSearchParams(window.location.search);
        $.getJSON("{{asset('APi/countries+cities.json')}}", function(data){
            data.map(function(obj, i) {
                if(obj.name=="Pakistan") {

                    $('#country').val(obj.name);
                    $('#country').prop('readonly', "true");
                    if ($("#city").children("option").length > 1) {
                        $("#city").empty();
                        $('#city').append("<option value='null'>--Select--</option>")
                    }
                    obj.cities.map(function (c) {

                        if(urlParams.has('city') && urlParams.get('city')!=="" && urlParams.get('city') ==c.name ){
                            $('#city').append("<option value='" + c.name + "' selected>" + c.name + "</option>");
                        }else{
                            $('#city').append("<option value='" + c.name + "'>" + c.name + "</option>");
                        }

                    });
                }

            });

        }).fail(function(){
            $("#err").append("<p class='text-danger'>OOPs! something went wrong while loading countries data,please try again</p>")
            setTimeout(function(){
                $("#err > p").remove();
            },4000)
        });
    });
</script>
    <script>
        let token= document.querySelector("meta[name='csrf-token']").getAttribute('content');
        function searchQuery(search, country, city, date){

            const urlParams = new URLSearchParams(window.location.search);

            if(search !== ""){
                urlParams.set('search', search);
            }
            if(country !== null){
                urlParams.set('country', country);
            }
            if(city !== null){
                urlParams.set('city', city);
            }
             if(date !== ""){
                 urlParams.set('date', date);
             }

            window.location.search = urlParams;

        }

        function resetFilter(){
            window.location.search="";
        }

        $(document).ready(function(){
            $(".ct-header-section").addClass("page-with-large-content");

            const urlParams = new URLSearchParams(window.location.search);
            if(urlParams.has('search') && urlParams.get('search')!==""){
                $('#search').val(urlParams.get('search'));
            }

            if(urlParams.has('date') && urlParams.get('date')!==""){
                $('#date').val(urlParams.get('date'));
            }




        });

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
                            console.log(resp);
                            if(resp.success){
                                $(e.target).prop("checked",true);
                                $(e.target).siblings('label').addClass('text-primary');
                            }

                        },
                        error:function(err){
                            console.log(err);
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
