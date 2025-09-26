@extends('layout.master')

@section('content')
<div class="content-body">
    <section id="page-account-settings">
        <div class="row">
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75 active"
                           href="{{ route('profile.index') }}" aria-expanded="true">
                            <i class="fa-solid fa-user"></i>
                            Profil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75"
                           href="{{ route('password.edit', Auth::id()) }}" aria-expanded="false">
                            <i class="fa-solid fa-lock"></i>
                            Şifre Yenile
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general">
                                    <div class="media">
                                        <a href="javascript:void(0);">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg"
                                                 class="rounded mr-75" alt="profile image" height="64" width="64">
                                        </a>
                                    </div>
                                    <hr>
                                    <form method="POST" action="{{ route('profile.update') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-username">Adı</label>
                                                        <input type="text" class="form-control" name="name"
                                                               id="account-username"
                                                               value="{{ old('name', $user->name) }}">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-name">Soyad</label>
                                                        <input type="text" class="form-control" name="surname" id="account-name"
                                                               value="{{ old('surname', $user->surname) }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-e-mail">E-posta</label>
                                                        <input type="email" class="form-control" name="email" id="account-e-mail"
                                                               value="{{ old('email', $user->email) }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Kaydet</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
