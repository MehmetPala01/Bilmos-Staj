@extends('layout.master')

@section('content')
<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Personele Atanan Görevler</h4>
                <a href="{{ route('assignments.create') }}" class="btn btn-primary">Ekle</a>
            </div>

            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped datatable" id="datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Adı</th>
                                    <th>E-posta</th>
                                    <th>Görev</th>
                                    <th>Başlangıç Tarihi</th>
                                    <th>Bitiş Tarihi</th>
                                    <th>Durum</th>
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
        ajax: '{{ route("assignments.index") }}',
        columns: [
            { data: 'id', name: 'id' },
            {data: 'user',name: 'user',render: function(user) {
                    return user ? user.name + ' ' + user.surname : '';
                }
            },
            { data: 'user.email', name: 'user.email', defaultContent: '' },
            { data: 'duty.duty', name: 'duty.duty', defaultContent: '' },
            { data: 'start_date', name: 'start_date' },
            { data: 'end_date', name: 'end_date' },
            {
                data: 'situation',
                name: 'situation',
                render: function(situation) {
                    switch(situation){
                        case 'Başladı': return '<span class="badge bg-success">'+situation+'</span>';
                        case 'Tamamlandı': return '<span class="badge bg-primary">'+situation+'</span>';
                        case 'Devam Ediyor': return '<span class="badge bg-warning text-dark">'+situation+'</span>';
                        case 'Ertelendi': return '<span class="badge bg-danger">'+situation+'</span>';
                        default: return situation;
                    }
                }
            },
            {
                data: 'id',
                name: 'action',
                orderable: false,
                searchable: false,
                className: 'text-center',
                render: function(id, type, row) {
                    var editUrl = "{{ route('assignments.edit', ':id') }}".replace(':id', id);
                    var deleteUrl = "{{ route('assignments.delete', ':id') }}".replace(':id', id);

                    return `
                        <div class="d-flex justify-content-center gap-1">
                            <a href="${editUrl}" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form id="delete-send-duty-${id}" action="${deleteUrl}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(event, 'delete-send-duty-${id}')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    `;
                }
            }
        ]
    });
});
</script>
@endsection
