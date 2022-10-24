@extends('layouts.master')

@section('title')
    Daftar Pengetahuan Siswa
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Daftar Pengetahuan Siswa</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Nama Pelajaran</th>
                        <th>Nama Siswa</th>
                        <th>Nilai Ujian Harian</th>
                        <th>Nilai Ujian Tengah Semester</th>
                        <th>Nilai Ujian Akhir Semester</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
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
                url: '{{ route('pengetahuan_member.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'nama_matkul'},
                {data: 'name'},
                {data: 'nilai_uh'},
                {data: 'nilai_uts'},
                {data: 'nilai_uas'},
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
        $('#modal-form .modal-title').text('Tambah Data Pengetahuan');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=id_pelajaran]').focus();
    }

    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Data Pengetahuan');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=id_pelajaran]').focus();

        $.get(url)
            .done((response) => {
                $('#modal-form [name=id_pelajaran]').val(response.id_pelajaran);
                $('#modal-form [name=id_siswa]').val(response.id_siswa);
                $('#modal-form [name=nilai_uh]').val(response.nilai_uh);
                $('#modal-form [name=nilai_uts]').val(response.nilai_uts);
                $('#modal-form [name=nilai_uas]').val(response.nilai_uas);
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