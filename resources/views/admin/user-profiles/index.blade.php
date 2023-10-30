@extends("admin.layouts.app")


@section("title","Users")


@section("content")

    <div class="container-fluid content-container">

        <div class="row mx-0">
            <div class="col-12 ">
                <h1>Users</h1>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 text-end">
                <a href="{{route('admin.user_profiles.create')}}" class="btn btn-primary">Create New User</a>
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

                        @forelse($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route('admin.user_profiles.edit',$user->id)}}"><i class="fa fa-edit mx-1"></i></a>
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
                                    $('#delRecord'+`{{$user->id}}`).submit();
                                    }
                                    });
                                    " ><i class="fa fa-trash"></i></a>
                                <form action="{{route('admin.user_profiles.destroy',$user->id)}}" id="delRecord{{$user->id}}" method="post">
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
                {{$users->links()}}
            </div>
        </div>
    </div>


@endsection
