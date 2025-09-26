@extends('layout.master')

@section('content')
<div class="row" id="basic-table">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Personeller</h4>
                <a href="{{route('users.create')}}" class="btn btn-primary">Ekle</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped datatable" id="datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Ad</th>
                                    <th>Soyad</th>
                                    <th>E-posta</th>
                                    <th>Pozisyon</th>
                                    <th>Kayıt Tarihi</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
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
            ajax:{
                url:'{{route("users.index")}}'
            },
            columns:[
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'surname', name: 'surname' },
                { data: 'email', name: 'email' },
                { data: 'position', name: 'position' },
                { data: 'created_at', name: 'created_at' },
                {
                    data: 'id',
                    name: 'action',
                    className: 'text-center',
                    orderable: false,
                    searchable: false,
                    render: function(id, type, row) {
                        var editUrl = "{{ route('users.edit', ':id') }}".replace(':id', id);
                        var deleteUrl = "{{ route('users.delete', ':id') }}".replace(':id', id);

                        return `
                        <div class="d-flex justify-content-center gap-1">
                            <a href="${editUrl}" class="btn btn-warning btn-sm ">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form id="delete-form-${id}" action="${deleteUrl}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete(event, 'delete-form-${id}')" class="btn btn-danger btn-sm ">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        `;
                    },

                },
            ]
        });
    });
</script>
@endsection
