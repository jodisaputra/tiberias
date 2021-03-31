<!-- Masthead-->
<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center text-white">
            <a class="btn btn-primary js-scroll-trigger" href="#form">Daftar Ibadah</a>
        </div>
    </div>
</header>
<!-- Projects-->
<section class="projects-section bg-light" id="form">
    <div class="container">
        <h1 class="text-center">Form Pendaftaran Ibadah</h1>

        <div class="col-12">
            <form method="POST" action="" class="mt-5">
                
                <div class="form-group">
                    <label>Nama Jemaat</label>
                    <input type="text" name="nama_jemaat" value="" class="form-control">
                </div>

                <div class="form-group">
                    <label>Lokasi Ibadah</label>
                    <select class="form-control" name="tempat_ibadah" class="form-control">
                        <option>Tiberias Imperium</option>
                        <option>Tiberias Tembesi</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>No. Hp (<small class="text-danger"><i>Mohon untuk menggunakan Nomor Whatsapp agar mudah dihubungi oleh pengerja</i></small>)</label>
                    <input type="text" name="nama_jemaat" value="" class="form-control">
                </div>

                <div class="form-group">
                    <label>Jumlah Anggota Keluarga yang ibadah</label>
                    <input type="number" name="jumlah_anggota" class="form-control">
                </div>

                <div class="form-group">
                    <label>Sesi Ibadah</label>
                    <select class="form-control" name="waktu_ibadah" class="form-control">
                        <option>Sesi 1 - 08:00</option>
                        <option>Sesi 2 - 10:30</option>
                        <option>Sesi 3 - 17:00</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Simpan</button>

            </form>
        </div>

        
    </div>
</section>