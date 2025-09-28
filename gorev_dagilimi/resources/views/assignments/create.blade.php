@extends('layout.master')

@section('content')
<form method="POST" action="{{ route('assignments.store') }}">
    @csrf

    <section class="select2-sizing">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Personele Görev Ata</h4>
            </div>

            <div class="card-content">
                <div class="card-body">

                    <div class="text-bold-600 font-medium-2 mb-2">
                        Görevler
                    </div>
                    <div class="form-group mb-3">
                        <select class="select2-size-lg form-control" id="large-select" name="duty_id" required>
                            <option value="">Seçiniz...</option>
                            @foreach ($duties as $duty)
                                <option value="{{ $duty->id }}"
                                        duty-start="{{ $duty->start_date }}"
                                        duty-finish="{{ $duty->end_date }}"
                                        {{ old('duty_id') == $duty->id ? 'selected' : '' }}>
                                    {{ $duty->duty }}
                                </option>
                            @endforeach
                        </select>
                        @error('duty_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <h4 class="mb-2">Personeller</h4>
                    <div class="form-group mb-3">
                        <label for="id_label_multiple"></label>
                        <select class="js-example-basic-multiple js-states form-control"
                                id="id_label_multiple"
                                name="users[]"
                                multiple="multiple">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ (is_array(old('users')) && in_array($user->id, old('users'))) ? 'selected' : '' }}>
                                    {{ $user->name }} {{ $user->surname }} - {{ $user->email }}
                                </option>
                            @endforeach
                        </select>
                        @error('users')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('#id_label_multiple').select2({
                                placeholder: "Seçiniz...",
                                allowClear: true
                            });
                        });
                    </script>

                    <div class="form-group mb-3">
                        <h4>Durum</h4>
                        <select class="select2-size-lg form-control" name="situation" required>
                            <option value="">Seçiniz...</option>
                            <option value="Başladı" {{ old('situation') == 'Başladı' ? 'selected' : '' }}>Başladı</option>
                            <option value="Devam Ediyor" {{ old('situation') == 'Devam Ediyor' ? 'selected' : '' }}>Devam Ediyor</option>
                            <option value="Tamamlandı" {{ old('situation') == 'Tamamlandı' ? 'selected' : '' }}>Tamamlandı</option>
                            <option value="Ertelendi" {{ old('situation') == 'Ertelendi' ? 'selected' : '' }}>Ertelendi</option>
                        </select>
                        @error('situation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="ag-btns d-flex flex-wrap">
                        <div class="btn-export">
                            <button type="submit" class="btn btn-primary ag-grid-export-btn">
                                Ekle
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</form>
@endsection
