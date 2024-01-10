<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pelanggan</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Data Utama</a>
                        </li>
                        <li class="breadcrumb-item active">Data Pelanggan</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5>Data Pelanggan</h5>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-hover">
                        <thead class="bg-blue">
                            <th>Pelanggan ID</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Aksi</th>
                        </thead>
                        <?php
             $sql="SELECT * FROM pelanggan"; //biar ga keliatan di web ny klo di hapus tp msi kesimpen di database
             $query=mysqli_query($koneksi,$sql);
             while ($kolom=mysqli_fetch_array($query)){   
            ?>
                
                        <tr>
                            <td><?= $kolom ['PelangganID']; ?>
                            </td>
                            <td><?= $kolom ['NamaPelanggan']; ?>
                            </td>
                            <td><?= $kolom ['Alamat']; ?>
                            </td>
                            <td><?= $kolom ['NomorTelepon']; ?>
                            </td>
                            
                            <td>
            
                                <!-- tombol edit -->
                                <a href="#" data-toggle="modal" data-target="#modalubah<?=$kolom['PelangganID'];?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;<!-- untuk jarak -->
                                <!-- tombol hapus -->
                                <a
                                    onclick="return confirm('yakin akan mengahpus data ini?')"
                                    href="aksi/pelanggan.php?aksi=hapus&PelangganID=<?= $kolom['PelangganID']; ?> ">
                                    |
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- modal ubah periode -->
                        <div
                            class="modal fade"
                            id="modalubah<?=$kolom['PelangganID'];?>"
                            tabindex="-1"
                            role="dialog"
                            aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Pelanggan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="aksi/pelanggan.php" method="post">
                                            <input type="hidden" name="aksi" value="ubah">
                                            <input type="hidden" name="PelangganID" value="<?=$kolom['PelangganID']; ?>">

                                            <label for="PelangganID">Id Pelanggan
                                            </label>
                                            <input
                                                type="text"
                                                name="PelangganID"
                                                value="<?=$kolom['PelangganID'];?>"
                                                class="form-control"
                                                required="required">

                                            <label for="NamaPelanggan">Nama Pelanggan
                                            </label>
                                            <input
                                                type="text"
                                                name="NamaPelanggan"
                                                value="<?=$kolom['NamaPelanggan'];?>"
                                                class="form-control"
                                                required="required">

                                            <label for="Alamat">Alamat
                                            </label>
                                            <input
                                                type="text"
                                                name="Alamat"
                                                value="<?=$kolom['Alamat'];?>"
                                                class="form-control"
                                                required="required">

                                            <label for="NomorTelepon">Nomor Telepon
                                            </label>
                                            <input
                                                type="NomorTelepon"
                                                name="NomorTelepon"
                                                value="<?=$kolom['NomorTelepon'];?>"
                                                class="form-control"
                                                required="required">

                                            &nbsp;
                                            <button type="submit" class="btn bg-blue btn-block">
                                                <i class="fas fa-save"></i>
                                                simpan
                                            </button>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Send message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </table>
                    <button
                        type="button"
                        class="btn bg-blue btn-block mt-3"
                        data-toggle="modal"
                        data-target="#modaltambah">
                        <i class="fas fas-plus"></i>
                        Tambah Pelanggan Baru
                    </button>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- modal tambah Pelanggan -->
    <div
        class="modal fade"
        id="modaltambah"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="aksi/pelanggan.php" method="post">
                        <input type="hidden" name="aksi" value="tambah">
                        <!-- <label for="ProdukID"> ID </label> <input type="text" name="ProdukID"
                        class="form-control" required="required"> -->

                        <label for="NamaPelanggan">NamaPelanggan
                        </label>
                        <input type="text" name="NamaPelanggan" class="form-control" required="required">

                        <label for="Alamat">Alamat
                        </label>
                        <input type="text" name="Alamat" class="form-control" required="required">

                        <label for="NomorTelepon">NomorTelepon
                        </label>
                        <input type="text" name="NomorTelepon" class="form-control" required="required">
                        
                        
                        &nbsp;
                        <button type="submit" class="btn bg-blue btn-block">
                            <i class="fas fa-save"></i>
                            simpan
                        </button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
</div>            