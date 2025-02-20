@extends('layouts.app')
@section('admin_content')
<section class="content-main pt-200">
    <div class="card mx-auto card-login">
        <div class="card-body">
            <h4 class="card-title mb-4">Forgot Password</h4>
            <form action="{{ route('password.email')}}" method="post">
                @csrf
                <div class="mb-3">
                    <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                </div>

                <div class="mb-3">
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

                <!-- form-group// -->
                <div class="mb-3">
                    <input class="form-control" placeholder="Email" type="email" name="email" id="email"/>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-4 d-grid">
                        <button type="submit" class="btn btn-primary justify-content-center">Email Password Reset Link</button>
                    </div>
                </div>
                <!-- form-group// -->
            </form>

            <p class="text-center mb-4">Already have an account? <a href="{{route('login')}}">Sign In Now</a></p>
        </div>
    </div>
</section>
@endsection
