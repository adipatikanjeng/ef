@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="user-bg">
                        <img width="100%" alt="user" src="/images/large/img1.jpg">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)">
                                    @if(is_file(public_path('uploads/'.Auth::user()->avatar)))
                                    <img src="/uploads/{{Auth::user()->avatar}}" alt="user-img" class="thumb-lg img-circle"> @else
                                    <img src="/images/users/avatar-default.png" alt="user-img" class="thumb-lg img-circle"> @endif
                                </a>
                                <h4 class="text-white">{{ $profile->name }}</h4>
                                <h5 class="text-white">{{ $profile->email }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <ul class="nav nav-tabs tabs customtab">
                        <li class="tab active">
                            <a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Activity</span> </a>
                        </li>
                        <li class="tab">
                            <a href="#messages" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Messages</span> </a>
                        </li>
                        <li class="tab">
                            <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <div class="steamline">
                                <div class="sl-item">
                                    <div class="sl-left">
                                        <img src="/images/users/genu.jpg" alt="user" class="img-circle">
                                    </div>
                                    <div class="sl-right">
                                        <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <p>assign a new task <a href="#"> Design weblayout</a></p>
                                            <div class="m-t-20 row"><img src="/images/img1.jpg" alt="user" class="col-md-3 col-xs-12"> <img src="/images/img2.jpg"
                                                    alt="user" class="col-md-3 col-xs-12"> <img src="/images/img3.jpg" alt="user"
                                                    class="col-md-3 col-xs-12"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="/images/users/sonu.jpg" alt="user" class="img-circle"> </div>
                                    <div class="sl-right">
                                        <div class="m-l-40"> <a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <div class="m-t-20 row">
                                                <div class="col-md-2 col-xs-12"><img src="/images/img1.jpg" alt="user" class="img-responsive"></div>
                                                <div class="col-md-9 col-xs-12">
                                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec
                                                        odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla
                                                        quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent
                                                        mauris. Fusce nec tellus sed augue semper porta. Mauris massa</p>
                                                    <a href="#" class="btn btn-success"> Design weblayout</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sl-item">
                                    <div class="sl-left"> <img src="/images/users/ritesh.jpg" alt="user" class="img-circle"> </div>
                                    <div class="sl-right">
                                        <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent
                                                libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum
                                                imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue
                                                semper </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="sl-item">
                                    <div class="sl-left">
                                        <img src="/images/users/govinda.jpg" alt="user" class="img-circle">
                                    </div>
                                    <div class="sl-right">
                                        <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                            <p>assign a new task <a href="#"> Design weblayout</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                    <br>
                                    <p class="text-muted">Johnathan Deo</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted">(123) 456 7890</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">johnathan@admin.com</p>
                                </div>
                                <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                    <br>
                                    <p class="text-muted">London</p>
                                </div>
                            </div>
                            <hr>
                            <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut,
                                imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer
                                tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
                                Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                                of type and scrambled it to make a type specimen book. It has survived not only five centuries
                                </p>
                            <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                                and more recently with desktop publishing software like Aldus PageMaker including versions
                                of Lorem Ipsum.</p>
                            <h4 class="font-bold m-t-30">Skill Set</h4>
                            <hr>
                            <h5>Wordpress <span class="pull-right">80%</span></h5>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                    style="width:80%;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                            <h5>HTML 5 <span class="pull-right">90%</span></h5>
                            <div class="progress">
                                <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
                                    style="width:90%;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                            <h5>jQuery <span class="pull-right">50%</span></h5>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                    style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                            <h5>Photoshop <span class="pull-right">70%</span></h5>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                    style="width:70%;"> <span class="sr-only">50% Complete</span> </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="messages">
                            <div class="message-center">
                                <a href="#">
                                    <div class="user-img">
                                        <img src="/images/users/pawandeep.jpg" alt="user" class="img-circle">
                                        <span class="profile-status online pull-right"></span>
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5>
                                        <span class="mail-desc">Just see the my admin!</span>
                                        <span class="time">9:30 AM</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="user-img">
                                        <img src="/images/users/sonu.jpg" alt="user" class="img-circle">
                                        <span class="profile-status busy pull-right"></span>
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5>
                                        <span class="mail-desc">I've sung a song! See you at</span>
                                        <span class="time">9:10 AM</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="user-img">
                                        <img src="/images/users/arijit.jpg" alt="user" class="img-circle">
                                        <span class="profile-status away pull-right"></span>
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit Sinh</h5>
                                        <span class="mail-desc">I am a singer!</span>
                                        <span class="time">9:08 AM</span>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="user-img">
                                        <img src="/images/users/pawandeep.jpg" alt="user" class="img-circle">
                                        <span class="profile-status offline pull-right"></span>
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5>
                                        <span class="mail-desc">Just see the my admin!</span>
                                        <span class="time">9:02 AM</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            {!! Form::model($profile, ['method' => 'PUT', 'route' => ['profile.update', $profile->id], 'files' => true,'class' => 'form-horizontal form-material']) !!}
                                <div class="form-group">
                                    <label class="col-md-12">Name</label>
                                    <div class="col-md-12">
                                        <input type="text" value="{{ $profile->name }}" name="name" placeholder="Name" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" value="{{ $profile->email }}" disabled   placeholder="Nickname" class="form-control form-control-line"
                                            name="example-email" id="example-email">                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Surname</label>
                                    <div class="col-md-12">
                                        <input type="text" name="surname" value="{{ $profile->surname }}" placeholder="Surname" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Nickname</label>
                                    <div class="col-md-12">
                                        <input type="text" name="nickname" value="{{ $profile->nickname }}" placeholder="Nickname" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone Number</label>
                                    <div class="col-md-12">
                                        <input type="text" name="phone_number" value="{{ $profile->phone_number }}" placeholder="Phone Number" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Grade (Student Only)</label>
                                    <div class="col-md-12">
                                        <input type="text" name="grade" value="{{ $profile->grade }}" placeholder="Grade" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">School (Student Only)</label>
                                    <div class="col-md-12">
                                        <input type="text" name="school" value="{{ $profile->school }}" placeholder="School" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Avatar</label>
                                    <div class="col-md-12">
                                        <input type="file" name="avatar" value="{{ $profile->avatar }}" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="submit">Update Profile</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <a href="/change_password" class="btn btn-primary">Change Password</a>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('javascript')
@endsection