<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Mata Kuliah
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $matkul['id_matkul']; ?>">
                        <div class="form-group">
                            <label for="matkul">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" id="matkul" name="matkul" value="<?= $matkul['nama_matkul']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun Ajaran</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $matkul['tahun_ajaran']; ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>