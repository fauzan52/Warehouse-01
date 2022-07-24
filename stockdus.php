<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stock Barang</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            .zoomable{
                width: 100px;
            }
            .zoomable:hover{
                transform: scale(2.5);
                transition: 0.3s ease;
            }
        </style>

    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Camille Warehouse</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">Gudang</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-cubes' style='font-size:24px'></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-cloud-download-alt' style='font-size:24px'></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-cloud-upload-alt' style='font-size:24px'></i></div>
                                Barang Keluar
                            </a>
                            <div class="sb-sidenav-menu-heading">Support</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class='fas fa-dolly' style='font-size:24px'></i></div>
                                Stock Tim Support
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="stockdus.php">Stock Barang</a>
                                    <a class="nav-link" href="stockmasuk.php">Barang Masuk</a>
                                    <a class="nav-link" href="stockdus.php">Barang Keluar</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-user-cog' style='font-size:24px'></i></div>
                                Kelola Admin
                            </a>
                            <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class='fas fa-sign-out-alt' style='font-size:24px'></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Stock Support</h1>
                        <ol class="breadcrumb mb-4">
                            
                        </ol>
                       
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                            Tambah Barang
                                        </button>
                                        <a href="export.php" class="btn btn-info">Export Data</a>
                            </div>
                            <div class="card-body">

                            <?php
                                $ambildatastockd = mysqli_query($conn,"select * from stockdus where stock < 1");

                                while($fetch=mysqli_fetch_array($ambildatastockd)){
                                    $dus = $fetch['namadus'];


                                

                            ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Perhatian!</strong> Stock <?=$barang;?> Telah Habis
                            </div>

                            <?php
                                }
                            ?>


                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Deskripsi</th>
                                                <th>Stock</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>

                                            <?php
                                            $ambilsemuadatastockd = mysqli_query($conn,"select * from stockdus");
                                                $i = 1;
                                            while($data=mysqli_fetch_array($ambilsemuadatastockd)){
                                                
                                                $namabarangd = $data['namadus'];
                                                $deskripsi = $data['deskripsi'];
                                                $stock = $data['stock'];
                                                $idd = $data['iddus'];

                                                 //cek ada gambar atau tidak
                                                 //$gambar = $data['image']; //ambil gambar
                                                 //if($gambar==null){
                                                      //jika tidak ada gambar   
                                                   //   $img = 'No Photo';    
                                                 //} else {
                                                     //jika ada gambar
                                                   //  $img = '<img src="images/'.$gambar.'" class="zoomable">';
                                                 //}
                                        
                                            
                                            ?>

                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$namabarangd;?></td>
                                                <td><?=$deskripsi;?></td>
                                                <td><?=$stock;?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idd;?>">
                                                            Edit
                                                    </button>
                                                    
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idd;?>">
                                                            Delete
                                                    </button>

                                                </td>
                                            </tr>

                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="edit<?=$idd;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Edit Barang</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <form method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                        <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" required>
                                                        <br>
                                                        <input type="text" name="deskripsi" value="<?=$deskripsi;?>" class="form-control" required>
                                                        <br>
                                                        <input type="file" name="file" class="form-control">
                                                        <br>
                                                        <input type="hidden" name="idd" value="<?=$idd;?>">
                                                        <button type="submit" class="btn btn-primary" name="updatebarang">Submit</button>
                                                        </div>
                                                        </form>
                                                        
                                                        
                                                        
                                                    </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="delete<?=$idb;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Barang?</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                        Apakah Anda Yakin Ingin Menghapus <?=$namabarang;?>?
                                                        <input type="hidden" name="idb" value="<?=$idb;?>">
                                                        <br>
                                                        <br>
                                                        <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus</button>
                                                        </div>
                                                        </form>
                                                        
                                                        
                                                        
                                                    </div>
                                                    </div>
                                                </div>

                                            <?php
                                            };

                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Camille Beauty 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
      <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Barang</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <input type="text" name="namadus" placeholder="Nama Dus" class="form-control" required>
            <br>
            <input type="text" name="deskripsi" placeholder="Deskripsi Barang" class="form-control" required>
            <br>
            <input type="number" name="stock" class="form-control" placeholder="Stock Awal" required>
            <br>
            <button type="submit" class="btn btn-primary" name="addnewdus">Submit</button>
            </div>
            </form>
            
            
            
        </div>
        </div>
    </div>
</html>
