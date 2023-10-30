@extends("eo.layouts.app")


@section('title',"Edit Event")

@section("content")
    <div class="container-fluid content-container">
        <div class="row mx-0">
            <div class="col-12">
                <h3>Edit</h3>
            </div>
        </div>
        <div class="row mx-0 mt-5">
            <div class="col-12">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$error}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <form action="{{route("eo.events.update",$event->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{old("title",$event->title)}}" id="title" class="form-control ">
                        @error("title")
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error("image")
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="form-group mt-3">
                        <label for="image">Date Time</label>
                        <input type="datetime-local" name="datetime" value="{{$event->getFormatedDateToEdit()}}" id="datetime" class="form-control">
                        @error("datetime")
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="row mx-0 mt-3">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-0 pe-md-2 pe-lg-2">
                            <div class="form-group ">
                                <label for="country">Country</label>
                                <input type="text" name="country" id="country" value="{{old('country',$event->country)}}" class="form-control" />
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-0 ps-md-2 ps-lg-2">
                            <div class="form-group ">
                                <label for="city">City</label>
                                <select name="city" id="city" data-old_value="{{$event->city}}" class="form-select">
                                    <option value="null" selected  disabled>--Select--</option>
                                </select>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" value="{{old("address",$event->address)}}" class="form-control ">
                        @error("address")
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="5" maxlength="2000" class="form-control">{{$event->description}}</textarea>
                        @error("description")
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="row mx-0 mt-3">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection

@section("scripts")
    <script>
        {{--var country_cities=[];--}}
        {{--let country_ov=$("#country").data("old_value");--}}
        {{--let city_ov=$("#city").data("old_value");--}}

        {{--$(document).ready(function(){--}}
        {{--    $.getJSON("{{asset('APi/countries+cities.json')}}", function(data){--}}

        {{--        data.map(function(obj, i) {--}}

        {{--            let country=new Object();--}}
        {{--            country["name"]=obj.name;--}}
        {{--            country["cities"]=obj.cities.filter(c=> {return c.name});--}}
        {{--            country_cities.push(country);--}}

        {{--            if(obj.name== country_ov){--}}
        {{--                $('#country').append("<option value='" + obj.name + "'  selected>" + obj.name + "</option>");--}}
        {{--                fetch_cities(country_ov)--}}
        {{--            }else{--}}
        {{--                $('#country').append("<option value='" + obj.name + "'  >" + obj.name + "</option>");--}}
        {{--            }--}}
        {{--        });--}}
        {{--    }).fail(function(){--}}
        {{--        $("#err").append("<p class='text-danger'>OOPs! something went wrong while loading countries data,please try again</p>")--}}
        {{--        setTimeout(function(){--}}
        {{--            $("#err > p").remove();--}}
        {{--        },4000)--}}

        {{--    });--}}


        {{--});--}}

        {{--function fetch_cities(country){--}}
        {{--    let citiz=  country_cities.find(c=>{return c.name==country})--}}
        {{--    if($("#city").children("option").length>1){--}}
        {{--        $("#city").empty();--}}
        {{--        $('#city').append("<option value='null'>--Select--</option>")--}}
        {{--    }--}}
        {{--    citiz.cities.map(function(c){--}}
        {{--        if(c.name== city_ov){--}}
        {{--            $('#city').append("<option value='" + c.name + "' selected>" + c.name + "</option>")--}}
        {{--        }else{--}}
        {{--            $('#city').append("<option value='" + c.name + "'>" + c.name + "</option>")--}}

        {{--        }--}}

        {{--    })--}}
        {{--}--}}




    //    new code:
        let country_ov=$("#country").val();
        let city_ov=$("#city").data("old_value");

        $(document).ready(function(){
            $.getJSON("{{asset('APi/countries+cities.json')}}", function(data){

                data.map(function(obj, i) {


                    if(obj.name=="Pakistan") {
                        //COUNTRY SELECT INPUT
                        if(obj.name==country_ov){
                            $('#country').val(obj.name);
                            $('#country').prop('readonly', "true");

                            //CITY SELECT INPUT
                            if ($("#city").children("option").length > 1) {
                                $("#city").empty();
                                $('#city').append("<option value='null'>--Select--</option>")
                            }
                            obj.cities.map(function (c) {
                                if(c.name== city_ov){
                                    $('#city').append("<option value='" + c.name + "' selected>" + c.name + "</option>")
                                }else{
                                    $('#city').append("<option value='" + c.name + "'>" + c.name + "</option>")

                                }
                            });

                        }else{
                            $('#country').val(obj.name);
                            $('#country').prop('readonly', "true");
                        }

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
@endsection

