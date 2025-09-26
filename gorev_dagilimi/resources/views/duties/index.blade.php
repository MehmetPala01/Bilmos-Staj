@extends('layout.master')

@section('content')
<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Görevler</h4>
                <a href="{{route('duties.create')}}" class="btn btn-primary">Ekle</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped datatable" id="datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Görev</th>
                                    <th>Başlangıç Tarihi</th>
                                    <th>Bitiş Tarihi</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#datatable').DataTable({
        serverSide: true,
        processing: true,
        ajax: '{{ route("duties.index") }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'duty', name: 'duty' },
            {data: 'start_date',name: 'start_date'},
            {data: 'end_date',name: 'finish_ate'},
            {
                data: 'id',
                name: 'action',
                orderable: false,
                searchable: false,
                className: 'd-flex justify-content-center gap-1',
                render: function(id) {
                    var editUrl = "{{ route('duties.edit', ':id') }}".replace(':id', id);
                    var deleteUrl = "{{ route('duties.delete', ':id') }}".replace(':id', id);

                    return `
                        <a href="${editUrl}" class="btn btn-warning btn-sm">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form id="delete-form-${id}" action="${deleteUrl}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete(event, 'delete-form-${id}')" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    `;
                }
            }
        ]
    });
});
</script>
@endsection
