@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {!! $post->title !!}
            <div class="panel-action">
                @if($post->user_id == auth()->user()->id)
                    <a href="{{ route('posts.edit', [$post->id]) }}"><i class="mdi mdi-pencil-box mdi-24px"></i></a>
                    <a href="{{ route('posts.delete', [$post->id]) }}"><i class="mdi mdi-delete mdi-24px"></i></a>
                @endif
            </div>
        </div>

        <div class="panel-body">

            <div class="row">
                @if(is_file(public_path('uploads/'.$post->image)))
                <div class="col-md-3">
                    <img style="width:100%" src="/uploads/{!! $post->image !!}">
                </div>
                @endif
                <div class="col">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    <div class="panel-footer">
            <div class="comment-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>
                        <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="comments-logout">
                            <ul class="media-list">
                              <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg" alt="profile">
                                </a>
                                <div class="media-body">
                                  <div class="well well-lg">
                                      <h4 class="media-heading text-uppercase reviews">Marco </h4>
                                      <ul class="media-date text-uppercase reviews list-inline">
                                        <li class="dd">22</li>
                                        <li class="mm">09</li>
                                        <li class="aaaa">2014</li>
                                      </ul>
                                      <p class="media-comment">
                                        Great snippet! Thanks for sharing.
                                      </p>
                                      <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                      <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyOne"><span class="glyphicon glyphicon-comment"></span> 2 comments</a>
                                  </div>
                                </div>
                                <div class="collapse" id="replyOne">
                                    <ul class="media-list">
                                        <li class="media media-replied">
                                            <a class="pull-left" href="#">
                                              <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/ManikRathee/128.jpg" alt="profile">
                                            </a>
                                            <div class="media-body">
                                              <div class="well well-lg">
                                                  <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> The Hipster</h4>
                                                  <ul class="media-date text-uppercase reviews list-inline">
                                                    <li class="dd">22</li>
                                                    <li class="mm">09</li>
                                                    <li class="aaaa">2014</li>
                                                  </ul>
                                                  <p class="media-comment">
                                                    Nice job Maria.
                                                  </p>
                                                  <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                              </div>
                                            </div>
                                        </li>
                                        <li class="media media-replied" id="replied">
                                            <a class="pull-left" href="#">
                                              <img class="media-object img-circle" src="https://pbs.twimg.com/profile_images/442656111636668417/Q_9oP8iZ.jpeg" alt="profile">
                                            </a>
                                            <div class="media-body">
                                              <div class="well well-lg">
                                                  <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> Mary</h4></h4>
                                                  <ul class="media-date text-uppercase reviews list-inline">
                                                    <li class="dd">22</li>
                                                    <li class="mm">09</li>
                                                    <li class="aaaa">2014</li>
                                                  </ul>
                                                  <p class="media-comment">
                                                    Thank you Guys!
                                                  </p>
                                                  <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                              </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                              </li>
                              <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kurafire/128.jpg" alt="profile">
                                </a>
                                <div class="media-body">
                                  <div class="well well-lg">
                                      <h4 class="media-heading text-uppercase reviews">Nico</h4>
                                      <ul class="media-date text-uppercase reviews list-inline">
                                        <li class="dd">22</li>
                                        <li class="mm">09</li>
                                        <li class="aaaa">2014</li>
                                      </ul>
                                      <p class="media-comment">
                                        I'm looking for that. Thanks!
                                      </p>
                                      <div class="embed-responsive embed-responsive-16by9">
                                          <iframe class="embed-responsive-item" src="//www.youtube.com/embed/80lNjkcp6gI" allowfullscreen></iframe>
                                      </div>
                                      <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                  </div>
                                </div>
                              </li>
                              <li class="media">
                                <a class="pull-left" href="#">
                                  <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/lady_katherine/128.jpg" alt="profile">
                                </a>
                                <div class="media-body">
                                  <div class="well well-lg">
                                      <h4 class="media-heading text-uppercase reviews">Kriztine</h4>
                                      <ul class="media-date text-uppercase reviews list-inline">
                                        <li class="dd">22</li>
                                        <li class="mm">09</li>
                                        <li class="aaaa">2014</li>
                                      </ul>
                                      <p class="media-comment">
                                        Yehhhh... Thanks for sharing.
                                      </p>
                                      <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                      <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyTwo"><span class="glyphicon glyphicon-comment"></span> 1 comment</a>
                                  </div>
                                </div>
                                <div class="collapse" id="replyTwo">
                                    <ul class="media-list">
                                        <li class="media media-replied">
                                            <a class="pull-left" href="#">
                                              <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jackiesaik/128.jpg" alt="profile">
                                            </a>
                                            <div class="media-body">
                                              <div class="well well-lg">
                                                  <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> Lizz</h4>
                                                  <ul class="media-date text-uppercase reviews list-inline">
                                                    <li class="dd">22</li>
                                                    <li class="mm">09</li>
                                                    <li class="aaaa">2014</li>
                                                  </ul>
                                                  <p class="media-comment">
                                                    Classy!
                                                  </p>
                                                  <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                              </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                              </li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="add-comment">
                            <form action="#" method="post" class="form-horizontal" id="commentForm" role="form">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Comment</label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" name="addComment" id="addComment" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="uploadMedia" class="col-sm-2 control-label">Upload media</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                          <div class="input-group-addon">http://</div>
                                          <input type="text" class="form-control" name="uploadMedia" id="uploadMedia">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        <a href="/home" class="btn btn-default">@lang('global.posts.back')</a>
    </div>
    </div>
@stop