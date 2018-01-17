@inject('request', 'Illuminate\Http\Request') @extends('layouts.app') @section('content')

<div class="panel panel-default">

    <div class="panel-body">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="/images/large/img1.jpg">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img src="/images/users/genu.jpg" class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white">{{ $profile->name }}</h4>
                                <h5 class="text-white">{{ $profile->email }}</h5> </div>
                        </div>
                    </div>
                    <div class="user-btm-box">
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-purple"><i class="ti-facebook"></i></p>
                            <h1>5</h1> </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-blue"><i class="ti-twitter"></i></p>
                            <h1>125</h1> </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <p class="text-danger"><i class="ti-dribbble"></i></p>
                            <h1>556</h1> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <form class="form-horizontal form-material">
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" value="{{ $profile->name }}" placeholder="{{ $profile->name }}" class="form-control form-control-line"> </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" value="{{ $profile->email }}" placeholder="{{ $profile->email }}" class="form-control form-control-line" name="example-email" id="example-email"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Update Profile</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <a href="/change_password" class="btn btn-primary">Change Password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop @section('javascript')
<script>
    @can('user_delete')
    window.route_mass_crud_entries_destroy = '{{ route('
    admin.users.mass_destroy ') }}';
    @endcan
</script>
@endsection