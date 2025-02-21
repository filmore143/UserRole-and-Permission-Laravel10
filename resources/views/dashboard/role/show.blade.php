@extends('layouts.app')
@section('admin_content')
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Roles</h2>
            <p>View Role</p>
        </div>
        <div>
            <a href="{{route('role.create')}}" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Add Role</a>
        </div>
    </div>


    <div class="card mb-4">
        <!-- <header class="card-header">
           <div class="row gx-3">
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
            </div> -
        </header> -->
        <!-- card-header end// -->
        <div class="card-body">
            <h6>Role Name: {{$role->name}}</h6>
            <div class="row mt-4">
                @foreach ($rolePermissions as $permission)
                    <div class="col-md-2">
                        {{$permission}}
                    </div>
                @endforeach
            </div>
        </div>
        <!-- card-body end// -->
    </div>
</section>
@endsection
