@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">E-Mail Address</label>

                            <div class="col-md-7">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Password</label>

                            <div class="col-md-7">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <div class="row">
                                    <div class="col-xs-6 text-left">
                                        <div class="checkbox checkbox-inline checkbox-styled">
                                            <label>
                                                <input type="checkbox" name="remember"> <span>Ghi nhớ</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <button class="btn btn-primary btn-raised" type="submit">
                                            <i class="fa fa-btn fa-sign-in"></i> Đăng nhập
                                        </button>
                                    </div>
                                </div>
                                <div class="row"><a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
