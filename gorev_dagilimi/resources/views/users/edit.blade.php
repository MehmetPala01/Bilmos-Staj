
@extends('layout.master')

@section('content')
<body>
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Personel Düzenle</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf


                                <div class="row">
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Ad</label>
                                                    <input type="text" class="form-control" id="basicInput" value="{{ old('name', $user->name) }}" name="name">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Soyad</label>
                                                    <input type="text" class="form-control" id="basicInput" value="{{ old('surname', $user->surname) }}" name="surname">
                                                    @error('surname')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="basicInput">E-posta</label>
                                                    <input type="text" class="form-control" id="basicInput" value="{{ old('email', $user->email) }}" name="email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                </fieldset>

                                            </div>
                                             <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Şifre</label>
                                                    <input type="password" class="form-control" id="basicInput" placeholder="Şifre" name="password">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </fieldset>
                                                <label for="basicInput">Pozisyon</label>
                                                <select class="select2-size-lg form-control" name="position" required>

                                                <option value="">Seçiniz...</option>
                                                <option value="Stajer" {{ $user->position == 'Stajer' ? 'selected' : '' }}>Stajer</option>
                                                <option value="Personel" {{ $user->position == 'Personel' ? 'selected' : '' }}>Personel</option>
                                                <option value="Yönetici" {{ $user->position == 'Yönetici' ? 'selected' : '' }}>Yönetici</option>

                                                </select>
                                                 @error('position')
                                                        <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                <button type="submit" class="btn btn-primary">Güncelle</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
