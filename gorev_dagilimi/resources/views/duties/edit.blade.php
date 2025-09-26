
@extends('layout.master')

@section('content')
<body>
    <section id="basic-input">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Güncelle</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('duties.update', $duty->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset class="form-group">
                                            <h5 class="text-bold-500">Görev</h5>
                                            <input type="text" class="form-control" id="basicInput" value="{{ old('duty', $duty->duty) }}" name="duty">
                                            @error('duty')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-1">
                                        <h5 class="text-bold-500">Başlangıç Tarihi</h5>

                                            <input type='date' class="form-control format-picker" name="start_date" value ="{{ old('start_date', $duty->start_date) }}">
                                            @error('start_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                    </div>
                                    <div class="col-md-6 col-12 mb-1">
                                        <h5 class="text-bold-500">Bitiş Tarihi</h5>
                                            <input type='date' class="form-control format-picker" name="end_date" value ="{{ old('end_date', $duty->end_date) }}">
                                            @error('end_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>


                                <div class="ag-btns d-flex flex-wrap">
                                    <div class="btn-export">
                                        <button class="btn btn-primary ag-grid-export-btn">
                                            Güncelle
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
