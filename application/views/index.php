<!-- Masthead-->
<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center text-white">
            <div class="col-12">
                <img src="<?= base_url('assets/images/tiberias_main_logo_white.png') ?>" width="10%">
                <p style="margin-top: 30px; font-size: 26px; font-weight: bold;">Mempersiapkan Jemaat yang Kudus, Misionaris, dan Siap ke Sorga</p>
            </div>
            <br>
            <a class="btn btn-primary js-scroll-trigger" href="#form">Daftar Ibadah</a>
        </div>
    </div>
</header>
<!-- Projects-->
<section class="projects-section bg-light" id="form">
    <div class="container">
        <h1 class="text-center mb-5">Jadwal Ibadah</h1>

        <div class="col-12">

            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Hari / Tanggal</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $no = 1;
                            foreach($jadwal as $j) :
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?= $j->jd_nama_ibadah . ', ' . tgl_indo($j->jd_tanggal) ?>
                            </td>
                            <td class="text-center">

                                <?= $html ?>

                            </td>
                        </tr>

                        <?php  
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

        
    </div>
</section>