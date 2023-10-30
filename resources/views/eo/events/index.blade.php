@extends("eo.layouts.app")







@section("content")


    <div class="container-fluid content-container">
        <div class="row mx-0 mb-4">
            <div class="col-12">
                <h3>Events</h3>
            </div>
        </div>

        <div class="row mx-0 mb-3">
            <div class="col-12 text-end">
                <a href="{{route('eo.events.create')}}" class="btn btn-primary">Create a new event</a>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12">
                @if(session()->has('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session()->get('msg')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="table-responsive">

                <table class="table ">
                    <tr>
                        <th>Title</th>
                        <th>Scheduled on</th>
                        <th>Location</th>
                        <th>Users interested</th>

                        <th>Actions</th>
                    </tr>

                    @forelse($events as $event)
                        <tr>
                            <td>{{$event->title}}</td>
                            <td>{{$event->datetime?date('d-m-Y h:m:s A T', strtotime($event->datetime)):""}}</td>
                            <td>{{$event->address." ". $event->city." ". $event->country}}</td>
                            <td>{{$event->InterestedUser()->count()??0}}</td>
                            <td>
                                <a href="{{route("eo.events.show",$event->id)}}"><i class="fa fa-eye mx-1"></i></a>
                                <a href="{{route("eo.events.edit",$event->id)}}" ><i class="fa fa-edit mx-1"></i></a>
                                <a href="#" class="m-2" onclick="
                                    event.preventDefault();
                                    swal({
                                    title:'Are you sure?',
                                    text:'You will not be able to recover this record!',
                                    type: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#324cdd',
                                    confirmButtonText: 'Yes, delete it!',
                                    closeOnConfirm: true
                                    },function(resp){
                                    if(resp){
                                    $('#delRecord'+`{{$event->id}}`).submit();
                                    }
                                    });
                                    " ><i class="fa fa-trash mx-1"></i></a>
                                <form action="{{route('eo.events.destroy',$event->id)}}" id="delRecord{{$event->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No events found</td>
                        </tr>
                    @endforelse
                </table>

                </div>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12">
                {{$events->links()}}
            </div>
        </div>
    </div>

    @endsection
