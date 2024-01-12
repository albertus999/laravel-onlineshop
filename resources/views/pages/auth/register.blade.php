@extends('layouts.auth')

@section('title', 'Register CBT')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <form method="POST" action={{route('register')}}>
                @csrf
                <div class="form-group">
                    <label for="frist_name">Name</label>
                    <input id="frist_name"
                        type="text"
                        class="form-control @error('name') is_invalid
                        @enderror"
                        name="name"
                        autofocus>
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                </div>


                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email"
                        type="email"
                        class="form-control @error('email') is_invalid
                        @enderror"
                        name="email">

                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror

                </div>


                    <div class="form-group">
                        <label for="password"
                            class="d-block">Password</label>
                        <input id="password"
                            type="password"
                            class="form-control pwstrength"
                            @error('password') is_invalid
                            @enderror
                            data-indicator="pwindicator"
                            name="password">
                            @error('password')
                                <div id="pwindicator"
                                class="pwindicator">
                                    {{$message}}
                                </div>
                            @enderror

                            <div class="bar"></div>
                            <div class="label"></div>

                    </div>
                    <div class="form-group">
                        <label for="password2"
                            class="d-block">Password Confirmation</label>
                        <input id="password2"
                            type="password"
                            class="form-control @error('password_confirmation') is_invalid
                            @enderror"
                            name="password_confirmation">
                    </div>
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror


                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>
        <div class="text-muted mt-2 text-center">
            Already have an account? <a href="{{route('login')}}">Login now</a>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
@endpush
