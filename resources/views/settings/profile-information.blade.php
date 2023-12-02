@extends('app')

@section('title', 'Vet | Profilim')

@section('content')

    <div class="container">
      <div class="row">
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
        </div><!-- /.col-md-3 -->

        <div class="col-md-9">
          <form action="{{ route('settings.profile.information') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="card">
                <div class="card-header card-title">
                  <strong>Profili Düzenle</strong>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                        @if (session('status') === 'profile-information-updated')
                            <div class="alert alert-success">Profil güncellendi.</div>
                        @endif
                      <div class="form-group">
                        <label for="name">İsim</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" id="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" id="phone" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{ old('address', $user->address) }}" id="address"  class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="birthday">Doğum Tarihi</label>
                        <input type="date" name="birthday" value="{{ old('birthday', $user->birthday) }}" id="birthday" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="gender">Cinsiyet</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="male" {{ old('gender', $user->gender) === 'male' ? 'selected' : '' }}>Erkek</option>
                            <option value="female" {{ old('gender', $user->gender) === 'female' ? 'selected' : '' }}>Kadın</option>
                            <option value="other" {{ old('gender', $user->gender) === 'other' ? 'selected' : '' }}>Diğer</option>
                        </select>
                    </div>
                    </div> 


                    <div class="offset-md-1 col-md-3">
                      <div class="form-group">
                          <label for="profile_picture">Profil fotoğrafı</label>
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new img-thumbnail" style="width: 150px; height: 150px;">
                                  @if ($user->profile_picture)
                                      <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profil Fotoğrafı">
                                  @else
                                      <img src="https://via.placeholder.com/150x150" alt="Profil Fotoğrafı">
                                  @endif
                              </div>
                              <div class="fileinput-preview fileinput-exists img-thumbnail"
                                   style="max-width: 150px; max-height: 150px;"></div>
                              <div class="mt-2">
                                  <span class="btn btn-outline-secondary btn-file">
                                      <span class="fileinput-new">Resim Seç</span>
                                      <span class="fileinput-exists">Değiştir</span>
                                      <input type="file" name="profile_picture">
                                  </span>
                                  <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                     data-dismiss="fileinput">Kaldır</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  
                  
                  


                  </div>
                  
                  
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                          <button type="submit" class="btn btn-success">Profili Güncelle</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@endsection

@push('styles')
<link href="{{ asset('css/jasny-bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
@endpush