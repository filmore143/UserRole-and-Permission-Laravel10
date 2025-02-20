@extends('layouts.app')
@section('admin_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title">Edit User</h2>
                <div>
                    <a href="{{route('user.index')}}" class="btn btn-md rounded font-sm hover-up">View All</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Edit User Details</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('user.update', $user->id)}}">
                        @csrf
                        @method('patch')
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
                                <input type="text" placeholder="Type name" class="form-control" value="{{$user->name}}" name="name" id="name" required/>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" placeholder="Type email" class="form-control" value="{{$user->email}}" name="email" id="email" required/>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" placeholder="Type password" class="form-control" name="password" id="password" required/>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" placeholder="Type password" class="form-control" name="password_confirmation" id="password_confirmation" required/>
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
