@extends('layout.master')

@section('content')
<body>
    <form method="POST" action="{{ route('users.store') }}">
    @csrf

            <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Personel</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Ad</label>
                                                    <input type="text" class="form-control" id="basicInput" placeholder="Ad" name="name" value="{{ old('name') }}">
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="basicInput">Soyad</label>
                                                    <input type="text" class="form-control" id="basicInput" placeholder="Soyad" name="surname" value="{{ old('surname') }}">
                                                    @error('surname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <label for="basicInput">E-posta</label>
                                                    <input type="text" class="form-control" id="basicInput" placeholder="Email" name="email" value="{{ old('email') }}">
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
                                                <fieldset class="form-group">
                                                 <label for="basicInput">Pozisyon</label>
                                                <select class="select2-size-lg form-control" name="position" required>

                                                <option value="">Seçiniz...</option>
                                                <option value="Stajer" {{ old('position') == 'Stajer' ? 'selected' : '' }}>Stajer</option>
                                                <option value="Personel" {{ old('position') == 'Personel' ? 'selected' : '' }}>Personel</option>
                                                <option value="Yönetici" {{ old('position') == 'Yönetici' ? 'selected' : '' }}>Yönetici</option>

                                                </select>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                @error('position')
                                                        <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                <label for="role">Role</label>
                                                <select class="select2-size-lg form-control" name="role_id" required>
                                                <option value="">Seçiniz...</option>
                                                @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                                </select>

                                                </fieldset>
                                            </div>
                                        </div>
                                            <div class="ag-btns d-flex flex-wrap">
                                                <div   div class="btn-export">
                                                    <button type="submit" class="btn btn-primary ag-grid-export-btn">
                                                        Ekle
                                                    </button>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </section>


    </form>
@endsection

