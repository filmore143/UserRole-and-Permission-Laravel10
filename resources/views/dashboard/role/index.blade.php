@extends('layouts.app')
@section('admin_content')
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Roles</h2>
            <p>List of Roles</p>
        </div>
        <div>
            <a href="{{route('role.create')}}" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Add Role</a>
        </div>
    </div>


    <div class="card mb-4">
        <header class="card-header">
            {{-- <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control" />
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Show 20</option>
                        <option>Show 30</option>
                        <option>Show 40</option>
                    </select>
                </div>
            </div> --}}
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>

                            <th scope="col">Role</th>
                            <th scope="col" class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $value)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td><b>{{$value->name}}</b></td>
                            {{-- <td>{{$value->roles->first() ? $value->roles->first()->name : 'No Role Assigned'}}</td> --}}
                            <td class="text-end">
                             <form action="{{route('role.destroy', $value->id)}}" method="post">
                                @csrf
                                @method('delete')

                                <a href="#" class="btn btn-md rounded font-sm">Detail</a>
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('role.edit', $value->id)}}">Edit info</a>
                                        <button type="submit" class="dropdown-item bg-danger text-white" onclick="return confirm('Are you sure?')">Delete</button>
                                    </div>
                                </div>
                            </form>
                                <!-- dropdown //end -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- table-responsive //end -->
        </div>
        <!-- card-body end// -->
    </div>
</section>
@endsection
