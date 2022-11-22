<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="16">
            </span>
            <span class="topnav-logo-sm">
                <img src="assets/images/logo_sm_dark.png" alt="" height="16">
            </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">


            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop"
                    href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">{{ Auth::user()->name }}</span>
                        <span class="account-position">{{ App\Models\Role::find(Auth::user()->role_id)->name }}</span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                    aria-labelledby="topbar-userdrop">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle mr-1"></i>
                        <span>Tài khoản</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-edit mr-1"></i>
                        <span>Cài đặt</span>
                    </a>

                    <!-- item-->
                    <a style="cursor:pointer;" class="dropdown-item notify-item" data-toggle="modal"
                        data-target="#exampleModalCenter">
                        <i class="mdi mdi-lifebuoy mr-1"></i>
                        <span>Hỗ trợ</span>
                    </a>

                    <!-- item-->
                    <a href="{{ url('/logout') }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout mr-1"></i>
                        <span>Đăng xuất</span>
                    </a>

                </div>
            </li>

        </ul>
        <a class="navbar-toggle" data-toggle="collapse" data-target="#topnav-menu-content">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <div class="app-search dropdown">

            <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                <!-- item-->

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="uil-cog font-16 mr-1"></i>
                    <span>User profile settings</span>
                </a>

                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                </div>

                <div class="notification-list">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="media">
                            <img class="d-flex mr-2 rounded-circle" src="assets/images/users/avatar-2.jpg"
                                alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="m-0 font-14">Erwin Brown</h5>
                                <span class="font-12 mb-0">UI Designer</span>
                            </div>
                        </div>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="media">
                            <img class="d-flex mr-2 rounded-circle" src="assets/images/users/avatar-5.jpg"
                                alt="Generic placeholder image" height="32">
                            <div class="media-body">
                                <h5 class="m-0 font-14">Jacob Deo</h5>
                                <span class="font-12 mb-0">Developer</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hỗ trợ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('zoom.support') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Họ Tên</label>
                        <div class="col-sm-10">
                            <input type="text" name="topic" class="form-control" id="pwd1"
                                placeholder="Enter name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="pwd1">Class</label>
                        <div class="col-sm-10">
                            <input type="text" name="class" class="form-control" id="pwd1"
                                placeholder="Enter name">
                        </div>
                    </div>
                    <div class="form-group row" style="display:none">
                        <label class="control-label col-sm-2 align-self-center mb-0" for="email">Loại phòng</label>
                        <div class="col-sm-10">
                            <input type="text" name="type" class="form-control" id="email"
                                value="1">
                        </div>
                    </div>
                    <div class="form-group" style="display:none">
                        <label for="exampleInputdatetime">Thời gian bắt đầu</label>
                        <input type="text" name="start_time" class="form-control" id="exampleInputdatetime">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var today = new Date();
        var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        $(document).ready(function() {
            $("button").click(function() {
                $("#exampleInputdatetime:text").val(function(n, c) {
                    return date + ' ' + time;
                });
            });
        });
    </script>
@endpush
