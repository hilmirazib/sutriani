@extends('layouts.master')

@section('title')
    Daftar Data Nilai Sikap
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Data Nilai Sikap</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <button onclick="addForm('{{ route('data-nilai-sikap.store') }}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah</button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama Siswa</th>
                        <th>Jujur</th>
                        <th>Disiplin</th>
                        <th>Tanggung Jawab</th>
                        <th>Sopan Santun</th>
                        <th>Gotong Royong</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@includeIf('datansikap.form')
@endsection

@push('scripts')
<script>
    let table;

    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('data_n_sikap.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'name'},
                {data: 'jujur'},
                {data: 'disiplin'},
                {data: 't_jawab'},
                {data: 's_santun'},
                {data: 'g_royong'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });


        $('#modal-form').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.ajax({
                    url: $('#modal-form form').attr('action'),
                    type: 'post',
                    data: $('#modal-form form').serialize()
                })
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        alert(response);
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            }
        });
    });

    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Data Nilai Sikap');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=id_siswa]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Data Nilai Sikap');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=id_siswa]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=id_siswa]').val(response.id_siswa);
                $('#modal-form [name=jujur]').val(response.jujur);
                $('#modal-form [name=disiplin]').val(response.disiplin);
                $('#modal-form [name=t_jawab]').val(response.t_jawab);
                $('#modal-form [name=s_santun]').val(response.s_santun);
                $('#modal-form [name=g_royong]').val(response.g_royong);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }

    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }
</script>
@endpush