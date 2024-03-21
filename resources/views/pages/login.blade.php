@section('title', 'SFM - Freezer Management')
@include('layouts.header')

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <!-- Slider Login -->
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                          <img src="{{ asset('SB-Admin-2') }}/img/slider-1.png" class="d-block w-100">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="{{ asset('SB-Admin-2') }}/img/slider-4.png" class="d-block w-100">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="{{ asset('SB-Admin-2') }}/img/slider-2.png" class="d-block w-100">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="{{ asset('SB-Admin-2') }}/img/slider-5.png" class="d-block w-100">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="{{ asset('SB-Admin-2') }}/img/slider-3.png" class="d-block w-100">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-3">
                                    <div class="text-center">
                                        <img src="{{ asset('SB-Admin-2') }}/img/sreeya-icon.png" style="max-width: 50px">
                                        <h1 class="h4 text-gray-900 mb-4 font-weight-bold">SNOWMAN FREEZER MANAGEMENT</h1>
                                    </div>
                                    @include('component/message')
                                    <form class="user" action="" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" required>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block mt-4" name="submit" type="submit">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center mb-4">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <span class="small d-block">Transformation Office</span>
                                        <span class="small">PT Sreeya Sewu Indonesia, Tbk.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @include('layouts.js')
</body>

</html>