@extends('layout.master')

@section('content')
<body>
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Personel Görevini Düzenle</h2>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('assignments.update', $sendDuty->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <h3>Görevler</h3>
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ $sendDuty->duty?->duty }}"
                                                   disabled>
                                            @error('duty_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>

                                    <h4>Personeller</h4>
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ $sendDuty->user?->name }} {{ $sendDuty->user?->surname }}"
                                                   disabled>
                                            @error('users')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>

                                    <h4>Durum</h4>
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <select class="form-control" name="situation" required>
                                                <option value="Başladı"
                                                    {{ $sendDuty->situation == 'Başladı' ? 'selected' : '' }}>
                                                    Başladı
                                                </option>
                                                <option value="Tamamlandı"
                                                    {{ $sendDuty->situation == 'Tamamlandı' ? 'selected' : '' }}>
                                                    Tamamlandı
                                                </option>
                                                <option value="Devam Ediyor"
                                                    {{ $sendDuty->situation == 'Devam Ediyor' ? 'selected' : '' }}>
                                                    Devam Ediyor
                                                </option>
                                                <option value="Ertelendi"
                                                    {{ $sendDuty->situation == 'Ertelendi' ? 'selected' : '' }}>
                                                    Ertelendi
                                                </option>
                                            </select>
                                            @error('situation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
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
