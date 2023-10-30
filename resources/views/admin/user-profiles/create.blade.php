@extends('admin.layouts.app')

@section('title', "Create User")


@section('content')


    <div class="container-fluid content-container">
        <div class="row mx-0">
            <div class="col-12">
                <h1>Create</h1>
                <div id="err"></div>
            </div>
        </div>

        <div class="row mx-0">
            <div class="col-12">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{$error}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endforeach
                @endif
                <form action="{{route("admin.user_profiles.store")}}" method="post">
                    @csrf


                    <div class="form-group mt-2">
                        <label for="">Name</label>
                        <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                    <div class="form-group mt-2">
                        <label for="email">Email</label>
                        <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="row mx-0 mt-3">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-0 pe-md-2 pe-lg-2">
                            <div class="form-group ">
                                <label for="country">Country</label>
                                <input type="text" name="country" id="country" value="Pakistan"  class="form-control" />
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
                                <select name="city" id="city"  class="form-select">
                                    <option value="null" selected>--Select--</option>
                                </select>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mx-0 mt-4">
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



@endsection

@section('scripts')
    <script>


        $(document).ready(function(){
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
                            $('#city').append("<option value='" + c.name + "'>" + c.name + "</option>")
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
@endsection
