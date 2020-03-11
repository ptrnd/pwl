<!-- <h1> ini user </h1> -->
<!-- <h1>Hello, <?php //echo $this->session->userdata('level'); ?> :3</h1> -->
<!-- <a class="nav-item nav-link" href="<?php //echo base_url(); ?>login/logout">Logout</a> -->

<?php //json_decode($mahasiswa); ?>
<div class="container" style="margin-top: 20px">
    <div class="col-md-12">
        <h1 style="text-align: center; margin-bottom: 30px;">Data Mahasiswa</h1>
    </div>
    <table class="table table-striped table-bordered" id="list_mhs">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($mahasiswa as $mhs) { ?>
            <tr>
                <td scope="row"><?= $no++; ?></td>
                <td><?= $mhs->nama; ?></td>
                <td><?= $mhs->email; ?></td>
                <td><?= $mhs->jurusan; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>