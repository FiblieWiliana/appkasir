<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Produk</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Data Utama</a>
                        </li>
                        <li class="breadcrumb-item active">Data Produk</li>
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
                    <h5>Data User</h5>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-hover">
                        <thead class="bg-blue">
                            <th>Produk ID</th>
                            <th>Barcode</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </thead>
                        <?php
             $sql="SELECT * FROM produk"; //biar ga keliatan di web ny klo di hapus tp msi kesimpen di database
             $query=mysqli_query($koneksi,$sql);
             while ($kolom=mysqli_fetch_array($query)){   
            ?>
                
                        <tr>
                            <td><?= $kolom ['ProdukID']; ?>
                            </td>
                            <td><?= $kolom ['Barcode']; ?>
                            </td>
                            <td><?= $kolom ['NamaProduk']; ?>
                            </td>
                            <td><?= $kolom ['Harga']; ?>
                            </td>
                            <td><?= $kolom ['Stok']; ?>
                            </td>
                            
                            <td>
            
                                <!-- tombol edit -->
                                <a href="#" data-toggle="modal" data-target="#modalubah<?=$kolom['ProdukID'];?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                &nbsp;<!-- untuk jarak -->
                                <!-- tombol hapus -->
                                <a
                                    onclick="return confirm('yakin akan mengahpus data ini?')"
                                    href="aksi/produk.php?aksi=hapus&ProdukID=<?= $kolom['ProdukID']; ?> ">
                                    |
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- modal ubah periode -->
                        <div
                            class="modal fade"
                            id="modalubah<?=$kolom['ProdukID'];?>"
                            tabindex="-1"
                            role="dialog"
                            aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Produk</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="aksi/produk.php" method="post">
                                            <input type="hidden" name="aksi" value="ubah">
                                            <input type="hidden" name="ProdukID" value="<?=$kolom['ProdukID']; ?>">

                                            <label for="ProdukID">Id Produk
                                            </label>
                                            <input
                                                type="text"
                                                name="ProdukID"
                                                value="<?=$kolom['ProdukID'];?>"
                                                class="form-control"
                                                required="required">

                                            <label for="Barcode">Barcode
                                            </label>
                                            <input
                                                type="text"
                                                name="Barcode"
                                                value="<?=$kolom['Barcode'];?>"
                                                class="form-control"
                                                required="required">

                                            <label for="NamaProduk">Nama Produk
                                            </label>
                                            <input
                                                type="text"
                                                name="NamaProduk"
                                                value="<?=$kolom['NamaProduk'];?>"
                                                class="form-control"
                                                required="required">

                                            <label for="Harga">Harga
                                            </label>
                                            <input
                                                type="text"
                                                name="Harga"
                                                value="<?= number_format($kolom['Harga']);?>"
                                                class="form-control"
                                                required="required">

                                            <label for="Stok">Stok
                                            </label>
                                            <input
                                                type="text"
                                                name="Stok"
                                                value="<?=$kolom['Stok'];?>"
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
                        Tambah Produk Baru
                    </button>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- modal tambah produk -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="aksi/produk.php" method="post">
                        <input type="hidden" name="aksi" value="tambah">
                        <!-- <label for="ProdukID"> ID </label> <input type="text" name="ProdukID"
                        class="form-control" required="required"> -->
                        <label for="Barcode">Barcode
                        </label>
                        <input type="text" name="Barcode" class="form-control" required="required">

                        <label for="NamaProduk">Nama Produk
                        </label>
                        <input type="text" name="NamaProduk" class="form-control" required="required">

                        <label for="Harga">Harga
                        </label>
                        <input type="text" name="Harga" class="form-control" required="required">

                        <label for="Stok">Stok
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