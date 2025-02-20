@extends('layouts.app')
@section('admin_content')



<section class="content-main mt-80 mb-80">
    <div class="card mx-auto card-login">
        <div class="card-body">
            <h4 class="card-title mb-4">Reset Password</h4>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" placeholder="Your email" type="email" name="email" id="email"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" placeholder="Password" type="password" name="password" id="password"/>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm password</label>
                    <input class="form-control" placeholder="Confirm password" type="password" name="password_confirmation" id="password_confirmation"/>
                </div>
                <!-- form-group// -->
                <div class="mb-3">
                    <p class="small text-center text-muted">By signing up, you confirm that you’ve read and accepted our User Notice and Privacy Policy.</p>
                </div>
                <!-- form-group  .// -->
                <div class="row">
                    <div class="col-md-12 mb-4 d-grid">
                        <button type="submit" class="btn btn-primary justify-content-center">Reset Password</button>
                    </div>
                </div>
                <!-- form-group// -->
            </form>
            <p class="text-center mb-2">Already have an account? <a href="{{route('login')}}">Sign in now</a></p>
        </div>
    </div>
</section>

@endsection
