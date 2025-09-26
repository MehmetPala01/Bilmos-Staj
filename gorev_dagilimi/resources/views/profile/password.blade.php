@extends('layout.master')

@section('content')

<div class="content-body">

    <section id="page-account-settings">
        <div class="row">
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" href="{{route('profile.index')}}">
                            <i class="fa-solid fa-user"></i>
                            Profil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75 active" href="{{ route('password.edit', Auth::id()) }}">
                        <i class="fa-solid fa-lock"></i>
                            Şifre Yenile
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <form method="POST" action="{{ route('password.update', Auth::id()) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-password">
                                        <div class="media mb-2">
                                            <a href="javascript: void(0);">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" class="rounded mr-75" alt="profile image" height="64" width="64">
                                            </a>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-old-password">Eski Şifre</label>
                                                        <input type="password" name="oldPassword" class="form-control" id="account-old-password" required placeholder="Eski Şifre">
                                                        @error('oldPassword')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-new-password">Yeni Şifre</label>
                                                        <input type="password" name="newPassword" id="account-new-password" class="form-control" placeholder="Yeni Şifre" required minlength="6">
                                                        @error('newPassword')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-retype-new-password">Yeni Şifre Tekrar</label>
                                                        <input type="password" name="newPassword_confirmation" class="form-control" placeholder="Yeni Şifre Tekrar" required id="account-retype-new-password" minlength="6">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Kaydet</button>
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
    </section>

</div>

@endsection
