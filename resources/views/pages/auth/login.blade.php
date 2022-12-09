@extends('layout.auth.index')
@section('content')
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html">
                                <span><img src="assets/images/logo.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-caenter w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Đăng nhập</h4>
                            </div>

                            <form action="{{ url('/login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="emailaddress">Địa chỉ email:</label>
                                    <input class="form-control" type="email" id="emailaddress" required=""
                                        placeholder="Enter your email" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control"
                                            placeholder="Enter your password" name="password">
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary" type="submit"> Đăng nhập </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
