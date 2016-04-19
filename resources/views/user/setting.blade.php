@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Thay đổi thông tin</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/setting/change_avatar') }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-md-4 control-label">Ảnh đại diện</label>
                                <div class="col-md-6">
                                    <label class="btn btn-default">
                                        <i class="fa fa-folder-open"></i>
                                        <input name="avatar" id="uploadBtn" type="file" style="display: none"/>
                                    </label>
                                    <button id="submit" type="submit" class="btn btn-primary">
                                        <i class="fa fa-upload"></i> Tải lên
                                    </button>
                                </div>
                            </div>
                        </form>

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/setting/delete_avatar') }}">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <div class="form-group">
                                <div class="col-md-4 control-label">
                                    <button type="submit" class="btn btn-danger">
                                        Xóa ảnh
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <div style="width: 140px;">
                                        @if ($user['avatar']=='' || $user['avatar']==null)
                                            <img class="" src="{{asset('img/avatar1.jpg')}}">
                                        @else
                                            <img class="" src="{{asset('upload/avatar/'.$user['avatar'])}}" width="100%">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/setting/change_name') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Tên</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{$user['name']}}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Đổi tên
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/setting/change_password') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Mật khẩu</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Xác nhận mật khẩu</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Đổi mật khẩu
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
        }
    </script>
@endsection
