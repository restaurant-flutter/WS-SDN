<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
    <!-- Load File bootstrap.min.css yang ada difolder css -->
    <link href="<?= BASEURL ?>/data/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    .align-middle {
        vertical-align: middle !important;
    }
    </style>
</head>

<body>
    <!-- Membuat Menu Header / Navbar -->
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" style="color: white;"><b>Pencarian Dengan PHP dan AJAX</b></a>
            </div>
            <p class="navbar-text navbar-right hidden-xs" style="color: white;padding-right: 10px;">
                FOLLOW US ON
            </p>
        </div>
    </nav>
    <div style="padding: 0 15px;">
        <a href="<?= BASEURL ?>/dataSiswa/form-simpan">Tambah Data</a><br><br>

        <!-- Buat sebuah div dengan class row -->
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <!-- Input Group adalah salah satu komponen yang disediakan bootstrap -->
                <div class="input-group">
                    <!-- Buat sebuah textbox dan beri id keyword -->
                    <input type="text" class="form-control" placeholder="Pencarian..." id="keyword">
                    <span class="input-group-btn">
                        <!-- Buat sebuah tombol search dan beri id btn-search -->
                        <button class="btn btn-primary" type="button" id="btn-search">SEARCH</button>
                        <a href="index.php" class="btn btn-warning">RESET</a>
                    </span>
                </div>
            </div>
        </div>
        <br>
        <!-- Buat sebuah div dengan id="view" yang digunakan untuk menampung data yang ada pada tabel siswa di database -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">FOTO</th>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>JENIS KELAMIN</th>
                    <th>TELP</th>
                    <th>ALAMAT</th>
                    <th colspan="2">Aksi</th>
                </tr>
                <?php
        $no = 1;
        foreach ($data['siswa'] as $data) {
        ?>
                <tr>
                    <td class="align-middle text-center"><?php echo $no; ?></td>
                    <td class="align-middle text-center">
                        <img src="foto/<?php echo $data['foto']; ?>" width="80" height="80">
                    </td>
                    <td class="align-middle"><?php echo $data['nis']; ?></td>
                    <td class="align-middle"><?php echo $data['nama']; ?></td>
                    <td class="align-middle"><?php echo $data['jenis_kelamin']; ?></td>
                    <td class="align-middle"><?php echo $data['telp']; ?></td>
                    <td class="align-middle"><?php echo $data['alamat']; ?></td>
                    <td class="align-middle">
                        <a href="<?= BASEURL ?>/dataSiswa/form-ubah/<?= $data['id'] ?>">Ubah</a><br>
                        <a href="<?= BASEURL ?>/dataSiswa/proses_hapus/<?= $data['id'] ?>">Hapus</a>

                    </td>
                </tr>
                <?php
            $no++;
        }
        ?>
            </table>
        </div>
    </div>
    <!-- Load File jquery.min.js yang ada di folder js -->
    <script src="<?= BASEURL ?>/data/js/jquery.min.js"></script>
    <!-- Load File bootstrap.min.js yang ada di folder js -->
    <script src="<?= BASEURL ?>/data/js/bootstrap.min.js"></script>
    <!-- Load file ajax.js yang ada di folder js -->
    <script src="<?= BASEURL ?>/data/js/ajax.js"></script>
</body>

</html>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/admin/tambah-buku" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="judul">Judul Buku</label>
                                <input class="form-control" type="text" name="judul" id="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <select class="form-control" name="penerbit" id="penerbit" required>
                                    <option value="">--- Pilih Penerbit ---</option>
                                    <?php if ($data['penerbit'] != []) : ?>
                                    <?php foreach ($data['penerbit'] as $p) : ?>
                                    <option value="<?= $p['id'] ?>"><?= $p['nama_penerbit'] ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun Terbit</label>
                                <input class="form-control" type="number" name="tahun" id="tahun" required>
                            </div>
                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <input class="form-control" type="text" name="penulis" id="penulis" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cover">Cover Buku</label>
                                <input class="form-control" type="file" name="cover" id="cover" required>
                            </div>
                            <div class="form-group">
                                <label for="descripsi">Deskripsi</label>
                                <textarea class="form-control" type="text" name="descripsi" id="descripsi"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input class="form-control" type="text" name="isbn" id="isbn" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" name="kategori" id="kategori" required>
                                    <option value="">--- Pilih Kategori ---</option>
                                    <?php if ($data['kategori'] != []) : ?>
                                    <?php foreach ($data['kategori'] as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" name="submit">Tambah Buku</button>
                <button class="btn btn-danger" type="reset">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>