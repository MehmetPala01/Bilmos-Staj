<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/authentication.css">
</head>
<body class="vertical-layout 1-column bg-full-screen-image blank-page">
    <div class="app-content content">
        <div class="content-wrapper">
            <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="/app-assets/images/pages/login.png" alt="Giriş görseli">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <h4 class="mb-0">Giriş Yap</h4>
                                    </div>
                                    <p class="px-2">Hesabınıza giriş yapın.</p>
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form method="post" action="{{ route('giris.process') }}">
                                                @csrf


                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                                    <div class="form-control-position">
                                                        <i class="fa-solid fa-envelope"></i>
                                                    </div>
                                                    <label for="email">Email</label>
                                                     @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </fieldset>

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Şifre" required>
                                                    <div class="form-control-position">
                                                        <i class="fa-solid fa-lock"></i>
                                                    </div>
                                                    <label for="password">Şifre</label>
                                                    @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </fieldset>

                                                <div class="form-group d-flex justify-content-between align-items-center">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" name="remember">
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="fa-solid fa-check"></i>
                                                            </span>
                                                        </span>
                                                        <span>Beni Hatırla</span>
                                                    </div>
                                                    <a href="#" class="card-link">Şifremi Unuttum?</a>
                                                </div>

                                                <a href="#" class="btn btn-outline-primary float-left btn-inline">Kayıt Ol</a>
                                                <button type="submit" class="btn btn-primary float-right btn-inline">Giriş Yap</button>
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
    </div>

    <script src="/app-assets/vendors/j">
