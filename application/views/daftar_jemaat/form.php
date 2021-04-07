<!-- Masthead-->
<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center text-white">
            <div class="col-12">
                <img src="<?= base_url('assets/images/tiberias_main_logo_white.png') ?>" width="10%">
                <p style="margin-top: 30px; font-size: 26px; font-weight: bold;">Mempersiapkan Jemaat yang Kudus, Misionaris, dan Siap ke Sorga</p>
            </div>
        </div>
    </div>
</header>
<section class="projects-section bg-light" id="form">
    <div class="container">
        <h1 class="text-center mb-5">Form Daftar Jemaat</h1>



        <form method="POST" action="<?= $action ?>">
            
            <div class="col-12">

                <div class="form-group">
                    <label>Nama Lengkap Jemaat</label>
                    <input type="text" name="nama" value="<?= $nama ?>" class="form-control" autofocus>
                    <?= form_error('nama') ?>
                </div>

                <div class="form-group">
                    <label>No. Telepon / No. Whatsapp</label>
                    <input type="text" name="no_telp" value="<?= $no_telp ?>" class="form-control">
                    <?= form_error('no_telp') ?>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                        <option value="laki-laki" <?= $jenis_kelamin == 'laki-laki' ? 'selected' : null ?>>Laki Laki</option>
                        <option value="perempuan" <?= $jenis_kelamin == 'perempuan' ? 'selected' : null ?>>Perempuan</option>
                    </select>
                    <?= form_error('jenis_kelamin') ?>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Simpan</button>

            </div>

        </form>


        
    </div>
</section>