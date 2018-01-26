@extends('layout.out')


@section('content')
<form method="POST" action="{{ url('auth/login') }}" class="form-vertical">
{!! csrf_field() !!}
                        <div class="module-head">
                            <h3>Sign In</h3>
                        </div>
                        <div class="module-body">
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="email" id="inputEmail" placeholder="Email" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls row-fluid">
                                    <input class="span12" type="password" id="inputPassword" placeholder="Password" name="password" >
                                </div>
                            </div>
                        </div>
                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-primary pull-right">Login</button>
                                    <label class="checkbox">
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
@endsection

