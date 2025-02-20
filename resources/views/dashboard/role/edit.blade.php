@extends('layouts.app')
@section('admin_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title">Edit Role</h2>
                <div>
                    <a href="{{route('role.index')}}" class="btn btn-md rounded font-sm hover-up">View All</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Edit Role Details</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('role.update', $role->id)}}">
                        @csrf
                        @method('put')
                        @if ($errors->has('password'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('password') as $message)
                                        <li>{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif




                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" placeholder="Type name" class="form-control" value="{{$role->name}}"  name="name" id="name" required/>
                            </div>

                    <div class="row mt-4">
                                @foreach($permissions as $permission)
                                    <div class="col-md-2">
                                        <input type="checkbox" name="permission[]" value="{{$permission->id}}"" {{$role->hasPermissionTo($permission->name) ? 'checked' : null}}>
                                        <label for="" class="form-check-label">{{$permission->name}}</label>
                                    </div>
                                @endforeach
                    </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-4 ">
                                <input type="submit" value="Save" class="btn btn-primary"
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
