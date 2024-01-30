<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Histori Penjualan</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Penjualan</a>
                        </li>
                        <li class="breadcrumb-item active">Data Penjualan</li>
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
                    <h5>Data Penjualan</h5>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-hover">
                        <thead class="bg-blue">
                            <th>ID</th>
                            <th>Tanggal Penjualan</th>
                            <th>Pelanggan</th>
                            <th>Total Belanja</th>
                            <th>Aksi</th>
                        </thead>
                        <?php
             $sql="SELECT penjualan.*,pelanggan.NamaPelanggan FROM penjualan,pelanggan WHERE penjualan.PelangganID=pelanggan.PelangganID";
             $query=mysqli_query($koneksi,$sql);
             while ($kolom=mysqli_fetch_array($query)){   
            ?>
                
                        <tr>
                            <td><?= $kolom ['PenjualanID']; ?>
                            </td>
                            <td><?= $kolom ['TanggalPenjualan']; ?>
                            </td>
                            <td><?= $kolom ['NamaPelanggan']; ?>
                            </td>
                            <td><?= $kolom ['TotalHarga']; ?>
                            </td>
                            
                            <td>
                                <!-- tombol print nota -->
                                <a href="pdf/output/nota_jual.php?PenjualanID=<?=$kolom['PenjualanID']; ?>" target="_blank"><i class="fas fa-print"></i></a> |
                                <!-- tombol informasi -->
                                <a href="index.php?p=infojual&PenjualanID=<?=$kolom['PenjualanID']; ?>"><i class="fas fa-search"></i></a> |
                                <!-- tombol hapus-->
                                <a href="aksi/penjualan.php?aksi=hapus&PenjualanID=<?=$kolom['PenjualanID']; ?>" onclick="return confirm ('Yakin akan hapus data ini??')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <!-- modal ubah periode -->
                        <div
                            class="modal fade"
                            id="modalubah<?=$kolom['PenjualanID'];?>"
                            tabindex="-1"
                            role="dialog"
                            aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah penjualan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="aksi/penjualan.php" method="post">
                                            <input type="hidden" name="aksi" value="ubah">
                                            <input type="hidden" name="PenjualanID" value="<?=$kolom['PenjualanID']; ?>">

                                            <label for="PenjualanID">Id penjualan
                                            </label>
                                            <input
                                                type="text"
                                                name="PenjualanID"
                                                value="<?=$kolom['PenjualanID'];?>"
                                                class="form-control"
                                                required="required">

                                            <label for="TanggalPenjualan">Tanggal Penjualan
                                            </label>
                                            <input
                                                type="text"
                                                name="TanggalPenjualan"
                                                value="<?=$kolom['TanggalPenjualan'];?>"
                                                class="form-control"
                                                required="required">

                                            <label for="PelangganID">Pelanggan ID
                                            </label>
                                            <input
                                                type="text"
                                                name="PelangganID"
                                                value="<?=$kolom['PelangganID'];?>"
                                                class="form-control"
                                                required="required">

                                            <label for="TotalHarga">Total Harga
                                            </label>
                                            <input
                                                type="text"
                                                name="TotalHarga"
                                                value="<?= number_format($kolom['TotalHarga']);?>"
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
                    <a href="index.php?p=tambah">
                        <button class="btn btn-info btn-block"><i class="fas fa-plus">Tambah Penjualan Baru</i></button>
                    </a>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- modal tambah penjualan -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah penjuala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="aksi/penjualan.php" method="post">
                        <input type="hidden" name="aksi" value="tambah">
                        <!-- <label for="penjualanID"> ID </label> <input type="text" name="penjualanID"
                        class="form-control" required="required"> -->
                        

                        <label for="TanggalPenjualan">Nama penjualan
                        </label>
                        <input type="text" name="TanggalPenjualan" class="form-control" required="required">

                        <label for="Namapenjualan">Nama penjualan
                        </label>
                        <input type="text" name="Namapenjualan" class="form-control" required="required">

                        <label for="Harga">Harga
                        </label>
                        <input type="text" name="Harga" class="form-control" required="required">

                        <label for="TotalBelanja">Stok
                        </label>
                        <input type="text" name="Stok" class="form-control" required="required">
                        
                        
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