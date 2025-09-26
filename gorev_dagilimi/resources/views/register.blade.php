<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>

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
                <div class="col-xl-8 col-10 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                <img src="/app-assets/images/pages/register.jpg" alt="register image">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 p-2">
                                    <div class="card-header pt-50 pb-1">
                                        <h4 class="mb-0">Kayıt Ol</h4>
                                    </div>
                                    <p class="px-2">Yeni hesap oluşturun</p>

                                    <div class="card-content">
                                        <div class="card-body pt-0">
                                            <form method="POST" action="{{ route('kaydol.process') }}">
                                                @csrf

                                                <div class="form-label-group">
                                                    <input type="text" id="inputName" class="form-control" placeholder="Ad" name="name" value="{{ old('name') }}" required>
                                                    <label for="inputName">Ad</label>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-label-group">
                                                    <input type="text" id="inputSurname" class="form-control" placeholder="Soyad" name="surname" value="{{ old('surname') }}" required>
                                                    <label for="inputSurname">Soyad</label>
                                                    @error('surname')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-label-group">
                                                    <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                                    <label for="inputEmail">Email</label>
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-label-group">
                                                    <input type="password" id="inputPassword" class="form-control" placeholder="Şifre" name="password" required>
                                                    <label for="inputPassword">Şifre</label>
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-label-group">
                                                    <input type="password" id="inputConfPassword" class="form-control" placeholder="Şifre Tekrar" name="password_confirmation" required>
                                                    <label for="inputConfPassword">Şifre Tekrar</label>
                                                </div>

                                                <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Kaydol</button>
                                                <a href="" class="btn btn-outline-primary float-left btn-inline mb-50">Giriş Yap</a>
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

</body>
</html>
