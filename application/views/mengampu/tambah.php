<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data
                </div>
                <div class="card-body">
                    <?php if($invalid == "") : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $invalid; ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="mahasiswa">Nama Mahasiswa</label>
                            <select class="form-control" id="mahasiswa" name="mahasiswa">
                                <option value="0">Pilih Mahasiswa</option>
                                <?php foreach ($mahasiswa as $mhs) : ?>
                                    <option value="<?= $mhs['id'] ?>"><?= $mhs['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Nama Kelas</label>
                            <select class="form-control" id="kelas" name="kelas">
                                <option value="0">Pilih kelas</option>
                                <?php foreach ($kelas as $kls) : ?>
                                    <option value="<?= $kls['id_kelas'] ?>"><?= $kls['nama_kelas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="matkul">Nama Mata Kuliah</label>
                            <select class="form-control" id="matkul" name="matkul">
                                <option value="0">Pilih Mata Kuliah</option>
                                <?php foreach ($matakuliah as $mtk) : ?>
                                    <option value="<?= $mtk['id_matkul'] ?>"><?= $mtk['nama_matkul'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>