<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="/">
                <!-- Logo icon image, you can use font-icon also -->
                <b>
                    {{--
                    <!--This is dark logo icon-->
                    <img src="/images/admin-logo.png" alt="home" class="dark-logo" /> --}} {{--
                    <!--This is light logo icon-->
                    <img src="/images/admin-logo-dark.png" alt="home" class="light-logo" /> --}}
                </b>
                <!-- Logo text image you can use text also -->
                <span class="hidden-xs">
                    <!--This is dark logo text-->
                    <img src="/images/logo-ef.jpg" alt="home" class="light-logo" style="max-width:180px" /> {{--
                    <!--This is light logo text-->
                    <img src="/images/admin-text-dark.png" alt="home" class="light-logo" /> --}}
                </span>
            </a>
        </div>
        <!-- /Logo -->
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
                <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href="">
                        <i class="fa fa-search"></i>
                    </a>
                </form>
            </li>
            <li class="">
                <a class="waves-effect waves-light" href="/messages" aria-expanded="false">
                    <i class="mdi mdi-gmail"></i>
                    <div class="notify">
                        @if(Auth::check() && Auth::user()->newThreadsCount())
                        <span class="heartbit"></span>
                        <span class="point"></span>
                        @endif
                    </div>
                </a>

                <!-- /.dropdown-messages -->
                <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-checkbox-blank-circle-outline"></i>
                            <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                        </a>
                        <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 2</strong> <span class="pull-right text-muted">20% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 3</strong> <span class="pull-right text-muted">60% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 4</strong> <span class="pull-right text-muted">80% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
            </li>
            <li>
                <a class="profile-pic" href="#">
                    @if(is_file(public_path('uploads/'.Auth::user()->avatar)))
                    <img src="/uploads/{{Auth::user()->avatar}}" alt="user-img" width="36" class="img-circle">
                    @else
                    <img src="/images/users/avatar-default.png" alt="user-img" width="36" class="img-circle">
                    @endif
                    <b class="hidden-xs">
                        @if(Auth::check())
                            {{Auth::user()->name}}
                        @endif
                    </b>
                </a>
            </li>
        </ul>
    </div>
</nav>