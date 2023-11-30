@extends("layouts/mainLogin")
@section('judul')
    Dashboard
@endsection
@section("container")
{{--<form action="/Dashboard" method="get">--}}
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <form action="/login" method="POST">
                    @csrf
                    
                <h3 class="mb-5">Sign in (Demo[tanpa DB])</h3>
                <div class="form-outline mb-4">
                    <input type="text" id="typeEmailX-2" class="form-control form-control-lg" name="username" />
                    <label class="form-label" for="typeEmailX-2">Username</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password"/>
                    <label class="form-label" for="typePasswordX-2">Password</label>
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-start mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                    <label class="form-check-label" for="form1Example3"> Remember password </label>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit" >Login Admin</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        </div>
    </section>
{{--</form>--}}
@endsection
