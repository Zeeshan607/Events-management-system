@extends("admin.layouts.app")

@section("title","Unapproved Events")

@section("content")

    <div class="container-fluid content-container">
        <div class="row mx-0">
            <div class="col-12">
                <h1>Pending events</h1>
            </div>
        </div>

        <div class="row mx-0">
            <div class="col-12">
                <div id="err"></div>
                <div class="table-responsive">
                <table class="table ">
                    <tr>
                        <th>Title</th>
                        <th>Happening_at</th>
                        <th>Location</th>
                        <th>Organized by</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>

                @forelse($events as $event)
                    <tr>
                        <td>{{$event->title}}</td>
                        <td>{{date('d-m-Y h:m:s A T', strtotime($event->datetime))}}</td>
                        <td>{{$event->address." ". $event->city." ". $event->country}}</td>
                        <td>{{$event->getOrganizer()->name}}</td>
                        <td>{{date('d-m-Y h:m:s A T', strtotime($event->created_at))}}</td>
                        <td>
                            <a href="{{route("admin.events.show",$event->id)}}"  >View</a>
                            <a href="#"  onclick="approve_event({!! $event->id !!})">Approve</a>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No pending events found</td>
                    </tr>
                    @endforelse
                </table>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">

                {!! $events->links() !!}

        </div>
    </div>

    @endsection
@section("scripts")
    <script>

        function approve_event(id){
            $.ajax({
                url:"{{route("admin.events.approve")}}",
                type:"POST",
                data:{"id":id,"_token":"{!! @csrf_token() !!}"},
                success:function(resp){
                    if(resp.success){

                        swal({
                            title: 'Success',
                            text: "Event approved successfully",
                            type: 'success',
                        },function(resp){
                            if(resp){
                                window.location.reload();
                            }
                        });

                    }
                },
                error:function(xhr, servStatus, errCode){
                    const err=JSON.parse(xhr.responseText);
                    swal({
                        title: 'Error',
                        text: "Oops! something went wrong. Err:"+err.message+". Please try again",
                        type: 'error',
                    },function(resp){
                        if(resp){
                            window.location.reload();
                        }
                    });


                }
            })
        }

    </script>
    @endsection
