@extends('layouts.app')
@section('admin_content')
<section class="content-main">
    <div class="row">
        <div class="col-12">
            <div class="content-header">
                <h2 class="content-title">Add New Permission</h2>
                <div>
                    <a href="{{route('permission.index')}}" class="btn btn-md rounded font-sm hover-up">View All</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Enter Role Details</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('permission.store')}}">
                        @csrf
                            {{-- @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif --}}

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
                                <input type="text" placeholder="Type name" class="form-control" name="name" id="name" required/>
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
