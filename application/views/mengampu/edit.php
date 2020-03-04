<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Edit Data
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $mengampu['id_mengampu']; ?>">
                        <div class="form-group">
                            <label for="mahasiswa">Nama Mahasiswa</label>
                            <select class="form-control" id="mahasiswa" name="mahasiswa">
                                <option value="0">Pilih Mahasiswa</option>
                                <?php foreach ($mahasiswa as $mhs) : ?>
                                    <?php if ($mhs['id'] == $mahasiswa1['id']) : ?>
                                        <option value="<?= $mhs['id'] ?>" selected><?= $mhs['nama'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $mhs['id'] ?>"><?= $mhs['nama'] ?></option>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Nama Kelas</label>
                            <select class="form-control" id="kelas" name="kelas">
                                <option value="0">Pilih kelas</option>
                                <?php foreach ($kelas as $kls) : ?>
                                    <?php if ($kls['id_kelas'] == $kelas1['id_kelas']) : ?>
                                        <option value="<?= $kls['id_kelas'] ?>" selected><?= $kls['nama_kelas'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $kls['id_kelas'] ?>"><?= $kls['nama_kelas'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="matkul">Nama Mata Kuliah</label>
                            <select class="form-control" id="matkul" name="matkul">
                                <option value="0">Pilih Mata Kuliah</option>
                                <?php foreach ($matakuliah as $mtk) : ?>
                                    <?php if ($mtk['id_matkul'] == $matakuliah1['id_matkul']) : ?>
                                        <option value="<?= $mtk['id_matkul'] ?>" selected><?= $mtk['nama_matkul'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $mtk['id_matkul'] ?>"><?= $mtk['nama_matkul'] ?></option>
                                    <?php endif; ?>
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