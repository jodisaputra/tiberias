<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Jadwal Ibadah</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header text-right">
                    <a href="<?= base_url('JadwalIbadah') ?>" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <a href="<?= base_url('DetailJadwalIbadah/tambah/' . $this->uri->segment(3)) ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Cabang</th>
                                    <th>Sesi</th>
                                    <th>Kapasitas</th>
                                    <th width="40%">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $no = 1;
                                    foreach($list as $l) :
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $l->cb_namacabang ?></td>
                                    <td><?= $l->ss_namasesi ?></td>
                                    <td><?= $l->sjd_kapasitas ?></td>
                                    <td>
                                        <a href="<?= base_url('DetailJadwalIbadah/ubah/' . $l->sjd_id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                        <a href="<?= base_url('DetailJadwalIbadah/hapus/' . $l->sjd_id . '/' . $this->uri->segment(3)) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>

                                        <a href="<?= base_url('SubJadwalIbadah/ubah/' . $l->jd_id) ?>" class="btn btn-info btn-sm"><i class="fas fa-users"></i> Lihat Jemaat</a>
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
        </div>

    </div>

</div>