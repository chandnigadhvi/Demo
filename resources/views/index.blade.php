@extends('layouts.main')
@push('title')
<title>Create User - Demo Project</title>
@endpush
@section('main-section')
<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <h1 class="d-none d-lg-block text-primary">Demo Project</h1>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>

                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            @endif

                                <form action="{{ url('student') }}" method="post" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    <div class="col-12">
                                        <label for="name" class="form-label">Your Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                        <div class="invalid-feedback">Please, enter your name!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="address" class="form-label">Your Address</label>
                                        <textarea name="address" id="address" class="form-control" cols="30" rows="2" required></textarea>
                                        <div class="invalid-feedback">Please, enter your Address!</div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label for="mobile" class="form-label">Your Mobile</label>
                                        <input type="text" name="mobile" class="form-control" id="mobile" required>
                                        <div class="invalid-feedback">Please, enter your Mobile!</div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label for="photo" class="form-label">Your Image</label>
                                        <input class="form-control" name="photo" type="file" id="photo">
                                        <div class="invalid-feedback">Please, upload your image!</div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" value="Save" type="submit">Create Account</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->
@endsection
