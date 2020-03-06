<h1> ini user </h1>
<h1>Hello, <?= $this->session->userdata('level'); ?> :3</h1>
<a class="nav-item nav-link" href="<?= base_url(); ?>login/logout">Logout</a>