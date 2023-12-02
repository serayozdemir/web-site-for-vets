@extends('app')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Ayarlar
                    </div>
                    <div class="list-group list-group-flush">
                        <a href="{{ route('user-profile-information.edit') }}" class="list-group-item list-group-item-action @if(request()->routeIs('user-profile-information.edit')) active @endif">Profil</a>
                        <a href="{{ route('settings.change-password.show') }}" class="list-group-item list-group-item-action @if(request()->routeIs('settings.change-password.show')) active @endif">Şifre</a>
                        <a href="{{ route('auth.2fa_settings') }}" class="list-group-item list-group-item-action @if(request()->routeIs('auth.2fa_settings')) active @endif">İki Faktörlü Kimlik Doğrulama</a>
    
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>İki Faktörlü Doğrulama</strong></div>
                    <div class="card-body">
                        <p>İki faktörlü kimlik doğrulama (2FA), kimliğinizi doğrulamak için iki yöntem (faktör olarak da adlandırılır) gerektirerek erişim güvenliğini güçlendirir. İki faktörlü kimlik doğrulama, kimlik avı, sosyal mühendislik ve parola kaba kuvvet saldırılarına karşı koruma sağlar ve oturum açma bilgilerinizi zayıf veya çalınmış kimlik bilgilerinden yararlanan saldırganlardan korur.</p>
                        
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        {{-- @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif --}}

                        @if($data['user']->loginSecurity == null)
                            <form class="form-horizontal" method="POST" action="{{ route('generate2faSecret') }}">
                                {{ csrf_field() }} 
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        2FA'yı Etkinleştirmek için Gizli Anahtar Oluşturun
                                    </button>
                                </div>
                            </form>
                        @elseif(!$data['user']->loginSecurity->google2fa_enable)
                            1. Bu QR kodunu Google Authenticator Uygulamanız ile tarayın. Alternatif olarak, kodu kullanabilirsiniz: <code>{{ $data['secret'] }}</code><br/>
                            {!! $data['google2fa_url'] !!} 
                            <br/><br/>

                            2. Google Authenticator uygulamasından pini girin:<br/><br/>
                            <form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
                                    <label for="secret" class="control-label">Kimlik Doğrulayıcı Kodu</label>
                                    <input id="secret" type="password" class="form-control col-md-4" name="secret" required>
                                    @if ($errors->has('verify-code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('verify-code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    2FA'yı Aktif Et 
                                </button>
                            </form>
                        @elseif($data['user']->loginSecurity->google2fa_enable)
                            <div class="alert alert-success">
                                2FA şu anda hesabınızda <strong>etkin</strong> durumdadır.
                            </div>
                            <p>İki Faktörlü Kimlik Doğrulamayı devre dışı bırakmak istiyorsanız. Lütfen şifrenizi onaylayın ve 2FA'yı Devre Dışı Bırak düğmesine tıklayın.</p>
                            <form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label for="change-password" class="control-label">Geçerli Şifre</label>
                                        <input id="current-password" type="password" class="form-control col-md-4" name="current-password" required>
                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <button type="submit" class="btn btn-primary ">2FA'yı devre dışı bırak</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection