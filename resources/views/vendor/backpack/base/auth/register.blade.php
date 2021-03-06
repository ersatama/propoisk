@extends(backpack_view('layouts.plain'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-4">
            <h3 class="text-center mb-4">{{ trans('backpack::base.register') }}</h3>
            <div class="card">
                <div class="card-body">
                    <form class="col-md-12 p-t-10" role="form" method="POST" action="{{ route('backpack.auth.register') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="control-label" for="{{\App\Domain\Contracts\UserContract::NAME}}">{{ trans('backpack::base.name') }}</label>
                            <div>
                                <input type="text" class="form-control{{ $errors->has(\App\Domain\Contracts\UserContract::NAME) ? ' is-invalid' : '' }}" name="{{\App\Domain\Contracts\UserContract::NAME}}" id="{{\App\Domain\Contracts\UserContract::NAME}}" value="{{ old(\App\Domain\Contracts\UserContract::NAME) }}">
                                @if ($errors->has(\App\Domain\Contracts\UserContract::NAME))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first(\App\Domain\Contracts\UserContract::NAME) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="{{\App\Domain\Contracts\UserContract::SURNAME}}">{{ trans('backpack::base.surname') }}</label>
                            <div>
                                <input type="text" class="form-control{{ $errors->has(\App\Domain\Contracts\UserContract::SURNAME) ? ' is-invalid' : '' }}" name="{{\App\Domain\Contracts\UserContract::SURNAME}}" id="{{\App\Domain\Contracts\UserContract::SURNAME}}" value="{{ old(\App\Domain\Contracts\UserContract::SURNAME) }}">
                                @if ($errors->has(\App\Domain\Contracts\UserContract::SURNAME))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first(\App\Domain\Contracts\UserContract::SURNAME) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="{{\App\Domain\Contracts\UserContract::PHONE}}">{{ trans('backpack::base.phone') }}</label>
                            <div>
                                <input type="text" class="form-control{{ $errors->has(\App\Domain\Contracts\UserContract::PHONE) ? ' is-invalid' : '' }}" name="{{\App\Domain\Contracts\UserContract::PHONE}}" id="{{\App\Domain\Contracts\UserContract::PHONE}}" value="{{ old(\App\Domain\Contracts\UserContract::PHONE) }}">
                                @if ($errors->has(\App\Domain\Contracts\UserContract::PHONE))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first(\App\Domain\Contracts\UserContract::PHONE) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="{{\App\Domain\Contracts\UserContract::PASSWORD}}">{{ trans('backpack::base.password') }}</label>
                            <div>
                                <input type="password" class="form-control{{ $errors->has(\App\Domain\Contracts\UserContract::PASSWORD) ? ' is-invalid' : '' }}" name="{{\App\Domain\Contracts\UserContract::PASSWORD}}" id="{{\App\Domain\Contracts\UserContract::PASSWORD}}">
                                @if ($errors->has(\App\Domain\Contracts\UserContract::PASSWORD))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first(\App\Domain\Contracts\UserContract::PASSWORD) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label class="control-label" for="password_confirmation">{{ trans('backpack::base.confirm_password') }}</label>

                            <div>
                                <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>-->

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ trans('backpack::base.register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (backpack_users_have_email() && config('backpack.base.setup_password_recovery_routes', true))
                <div class="text-center"><a href="{{ route('backpack.auth.password.reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a></div>
            @endif
            <div class="text-center"><a href="{{ route('backpack.auth.login') }}">{{ trans('backpack::base.login') }}</a></div>
        </div>
        <script>
            $("#phone").mask("+79999999999");
        </script>
    </div>
@endsection
