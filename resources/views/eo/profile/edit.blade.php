@extends("eo.layouts.app")







@section("content")


    <div class="container-fluid content-container">
        <div class="row mx-0">
            <div class="col-12 ">
                <form action="" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control">

                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
