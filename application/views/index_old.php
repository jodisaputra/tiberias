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

                                <?php 
                                    $sub_jadwal = $this->DetailJadwalIbadah_model->list($j->jd_id);
                                    foreach($sub_jadwal as $s) : 
                                ?>

                                <?php 
                                    $nama_cabang = ''; 
                                    if($s->sjd_cabang == 1)
                                    {
                                        $nama_cabang = 'Tiberias Imperium';
                                        $get = $this->DaftarIbadah_model->get($s->sjd_jadwal, $s->sjd_sesi, $s->sjd_cabang);
                                        $total_jemaat = $this->DaftarIbadah_model->total_jemaat($s->sjd_id);

                                        if($total_jemaat >= $get['sjd_kapasitas'])
                                        {
                                ?>

                                    <a href="" class="btn btn-danger btn-sm mb-2"><i class="fas fa-times"></i> <?= $s->ss_namasesi . ' - ' . $nama_cabang . ' Sudah Penuh' ?></a> <br>


                                <?php  
                                        }
                                        else
                                        {
                                ?>


                                    <a href="<?= base_url('DaftarIbadah/daftar/' . $s->sjd_jadwal . '/' . $s->sjd_sesi . '/' . $s->sjd_cabang . '/' . $s->sjd_id) ?>" class="btn <?php if($s->sjd_sesi == 1) { echo 'btn-primary btn-sm mb-2'; } elseif($s->sjd_sesi == 2) { echo 'btn-info btn-sm mb-2'; } else { echo 'btn-warning btn-sm mb-2'; } ?>"><i class="fab fa-wpforms"></i> <?= $s->ss_namasesi . ' - ' . $nama_cabang ?></a> <br>

                                <!-- end validasi pendaftaran penuh -->
                                <?php  
                                        }
                                ?> 

                                <?php  
                                    }
                                    else
                                    {
                                        $nama_cabang = 'Tiberias Tembesi';
                                        $get = $this->DaftarIbadah_model->get($s->sjd_jadwal, $s->sjd_sesi, $s->sjd_cabang);
                                        $total_jemaat = $this->DaftarIbadah_model->total_jemaat($s->sjd_id);

                                        if($total_jemaat >= $get['sjd_kapasitas'])
                                        {
                                ?>

                                    <hr>


                                    <a href="" class="btn btn-danger btn-sm mb-2"><i class="fas fa-times"></i> <?= $s->ss_namasesi . ' - ' . $nama_cabang . ' Sudah Penuh' ?></a> <br>


                                <?php  
                                        }
                                        else
                                        {
                                ?>

                                        <hr>


                                    <a href="<?= base_url('DaftarIbadah/daftar/' . $s->sjd_jadwal . '/' . $s->sjd_sesi . '/' . $s->sjd_cabang . '/' . $s->sjd_id) ?>" class="btn <?php if($s->sjd_sesi == 1) { echo 'btn-primary btn-sm mb-2'; } elseif($s->sjd_sesi == 2) { echo 'btn-info btn-sm mb-2'; } else { echo 'btn-warning btn-sm mb-2'; } ?>"><i class="fab fa-wpforms"></i> <?= $s->ss_namasesi . ' - ' . $nama_cabang ?></a> <br>

                                <!-- end validasi pendaftaran penuh -->
                                    
                                <?php  
                                        }
                                ?>


                                <?php  
                                    }
                                ?>

                                <?php  
                                    endforeach;
                                ?>
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