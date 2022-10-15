<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
    <div class="modal-dialog modal-lg" role="document">
        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="id_siswa" class="col-lg-2 col-lg-offset-1 control-label">Nama Siswa</label>
                        <div class="col-lg-6">
                            <select name="id_siswa" id="id_siswa" class="form-control" required>
                                <option value="">Pilih Nama Siswa</option>
                                @foreach ($data_siswa as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nilai_praktik" class="col-lg-2 col-lg-offset-1 control-label">Nilai Praktik</label>
                        <div class="col-lg-6">
                            <input type="text" name="nilai_praktik" id="nilai_praktik" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nilai_proyek" class="col-lg-2 col-lg-offset-1 control-label">Nilai Proyek</label>
                        <div class="col-lg-6">
                            <input type="text" name="nilai_proyek" id="nilai_proyek" class="form-control" required autofocus>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>