@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<div class="navbar-default sidebar slimscrollsidebar" role="navigation">
    <div class="sidebar-nav">
        <div class="sidebar-head">
            <h3>
                <span class="fa-fw open-close">
                    <i class="ti-close ti-menu"></i>
                </span>
                <span class="hide-menu">Navigation</span>
            </h3>
        </div>
        <div class="user-profile">
            <div class="dropdown user-pro-body">
                <div>
                    @if(is_file(public_path('uploads/'.Auth::user()->avatar)))
                    <img src="/uploads/{{Auth::user()->avatar}}" alt="user-img" class="img-circle">
                    @else
                    <img src="/images/users/avatar-default.png" alt="user-img" class="img-circle">
                    @endif
                </div>
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    @if(Auth::check())
                    {{ Auth::user()->name }}
                    @endif
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu animated flipInY">
                    <li>
                        <a href="/profile">
                            <i class="ti-user"></i> My Profile</a>
                    </li>
                    <li>
                        <a href="/messages">
                            <i class="ti-email"></i> Inbox</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li onclick="$('#logout').submit();">
                        <a href="#">
                            <i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="nav" id="side-menu">
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a class="waves-effect" href="{{ url('/home') }}">
                    <i class="mdi mdi-home fa-fw"></i>
                    <span class="hide-menu">@lang('global.home.title')</span>
                </a>
            </li>

            @can('course_access')
            <li>
                <a class="waves-effect {{ $request->segment(1) == 'courses' || $request->segment(2) == 'courses' ? 'active' : '' }}" href="{{ auth()->user()->isStudent() ? route('courses.index') : route('admin.courses.index') }}">
                    <i class="mdi mdi-book-multiple fa-fw"></i>
                    <span class="hide-menu">@lang('global.courses.title')</span>
                </a>
            </li>
            @endcan
            @can('lesson_access')
            <li class="{{ $request->segment(2) == 'lessons' ? 'active' : '' }}">
                <a class="waves-effect" href="{{ route('admin.lessons.index') }}">
                    <i class="mdi mdi-book-open fa-fw"></i>
                    <span class="hide-menu">@lang('global.lessons.title')</span>
                </a>
            </li>
            @endcan
            @can('question_access')
            <li class="{{ $request->segment(2) == 'questions' ? 'active' : '' }}">
                <a class="waves-effect" href="{{ route('admin.questions.index') }}">
                    <i class="fa fa-question fa-fw"></i>
                    <span class="hide-menu">@lang('global.questions.title')</span>
                </a>
            </li>
            @endcan @can('questions_option_access')
            <li class="{{ $request->segment(2) == 'questions_options' ? 'active' : '' }}">
                <a class="waves-effect" href="{{ route('admin.questions_options.index') }}">
                    <i class="fa fa-gears fa-fw"></i>
                    <span class="hide-menu">@lang('global.questions-options.title')</span>
                </a>
            </li>
            @endcan
            @can('test_access')
            <li>
                <a class="waves-effect {{ $request->segment(2) == 'tests' ? 'active' : '' }}" href="{{ route('admin.tests.index') }}">
                    <i class="mdi mdi-border-color fa-fw"></i>
                    <span class="hide-menu">@lang('global.tests.title')</span>
                </a>
            </li>
            @endcan
            @can('user_management_access')
            <li class="treeview {{ in_array($request->segment(2), ['permissions', 'roles', 'users']) ? 'active' : '' }}">
                <a class="waves-effect {{ in_array($request->segment(2), ['permissions', 'roles', 'users']) ? 'active' : '' }}" href="#">
                    <i class="mdi mdi-account-settings-variant fa-fw"></i>
                    <span class="hide-menu"> @lang('global.user-management.title')
                        <span class="fa arrow"></span>
                    </span>
                </a>
                <ul class="nav nav-second-level collapse treeview-menu">

                    @can('permission_access')
                    <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a class="waves-effect {{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}" href="{{ route('admin.permissions.index') }}">
                            <i class="mdi mdi-account-key fa-fw"></i>
                            <span class="hide-menu">
                                @lang('global.permissions.title')
                            </span>
                        </a>
                    </li>
                    @endcan
                    @can('role_access')
                    <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a class="waves-effect {{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}" href="{{ route('admin.roles.index') }}">
                            <i class="mdi mdi-account-check fa-fw"></i>
                            <span class="hide-menu">
                                @lang('global.roles.title')
                            </span>
                        </a>
                    </li>
                    @endcan
                    @can('user_access')
                    <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a class="waves-effect {{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}" href="{{ route('admin.users.index') }}">
                            <i class="mdi mdi-account-multiple fa-fw"></i>
                            <span class="hide-menu">
                                @lang('global.users.title')
                            </span>
                        </a>
                    </li>
                    @endcan
                    @can('class_access')
                    <li class="{{ $request->segment(2) == 'classes' ? 'active active-sub' : '' }}">
                        <a class="waves-effect {{ $request->segment(2) == 'classes' ? 'active active-sub' : '' }}" href="{{ route('admin.classes.index') }}">
                            <i class="mdi mdi-account-network fa-fw"></i>
                            <span class="hide-menu">
                                @lang('global.classes.title')
                            </span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan {{--
            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a class="waves-effect" href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="hide-menu">Change password</span>
                </a>
            </li> --}}

        </ul>
        {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
        <button type="submit">@lang('global.logout')</button> {!! Form::close() !!}
    </div>
</div>