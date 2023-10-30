@extends("admin.layouts.app")


@section("content")

    <div class="container-fluid content-container">

        <div class="row mx-0">
            <div class="col-12 ">
                <h1>Event Organizers</h1>
            </div>
        </div>
                <div class="row mx-0">
                    <div class="col-12 text-end">
                        <a href="{{route('admin.eo_profiles.create')}}" class="btn btn-primary">Create New organizer</a>
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
                        @if(session()->has('msg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session()->get('msg')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="table-responsive">


                    <table class="table ">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>

                            @forelse($event_organizers as $eo)
                            <tr>
                                <td>{{$eo->name}}</td>
                                <td>{{$eo->email}}</td>
                                <td>
                                    <a href="{{route('admin.eo_profiles.edit',$eo->id)}}"><i class="fa fa-edit mx-1"></i></a>
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
                                        $('#delRecord'+`{{$eo->id}}`).submit();
                                        }
                                        });
                                        " ><i class="fa fa-trash"></i></a>
                                    <form action="{{route('admin.eo_profiles.destroy',$eo->id)}}" id="delRecord{{$eo->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                 <td colspan="4"> 0 Event organizer's profile found</td>
                                </tr>
                            @endforelse

                    </table>
                        </div>
                </div>
            </div>
        <div class="row mx-0">
            <div class="col-12 text-center">
                {{$event_organizers->links()}}
            </div>
        </div>
    </div>


@endsection
