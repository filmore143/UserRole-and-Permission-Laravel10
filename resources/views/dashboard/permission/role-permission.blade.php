@extends('layouts.app')
@section('admin_content')
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Permissions</h2>
            <p>List of Permissions</p>
        </div>
        <div>
            <a href="{{route('permission.create')}}" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Add Permission</a>
        </div>
    </div>


    <div class="card mb-4">
   <form action="{{route('sync.permissions')}}" method="post">
     @csrf
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Permission Name</th>
                            @foreach($roles as $role)
                            <th scope="col">{{$role->name}}</th>
                            @endforeach

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key => $value)
                        <tr>
                            <td><b>{{$value->name}}</b></td>
                            @foreach($roles as $role)
                                <td>
                                    <input type="checkbox" name="permissions[{{$role->name}}][]" value="{{$value->name}}" {{$role->hasPermissionTo($value->name) ? 'checked': ''}}>
                                </td>
                            @endforeach

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
            <!-- table-responsive //end -->
            <div class="row">
                <div class="col-md-3">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </div>
        </div>
    </form>
        <!-- card-body end// -->
    </div>
</section>
@endsection
