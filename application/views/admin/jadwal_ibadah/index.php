<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal Ibadah</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header text-right">
                    <a href="<?= base_url('JadwalIbadah/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ibadah</th>
                                    <th>Tanggal</th>
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
                                    <td><?= $l->jd_nama_ibadah ?></td>
                                    <td><?= tgl_indo($l->jd_tanggal) ?></td>
                                    <td>
                                        <a href="<?= base_url('JadwalIbadah/ubah/' . $l->jd_id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                        <a href="<?= base_url('JadwalIbadah/hapus/' . $l->jd_id) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>

                                        <a href="<?= base_url('SubJadwalIbadah/ubah/' . $l->jd_id) ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Detail Jadwal Ibadah</a>
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