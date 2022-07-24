<?php
session_start();
include '../dbconnect.php';

$itungcust = mysqli_query($conn, "select count(userid) as jumlahcust from login where role='Member'");
$itungcust2 = mysqli_fetch_assoc($itungcust);
$itungcust3 = $itungcust2['jumlahcust'];

$itungorder = mysqli_query($conn, "select count(idcart) as jumlahorder from cart where status not like 'Selesai' and status not like 'Canceled'");
$itungorder2 = mysqli_fetch_assoc($itungorder);
$itungorder3 = $itungorder2['jumlahorder'];

$itungtrans = mysqli_query($conn, 'select count(orderid) as jumlahtrans from konfirmasi');
$itungtrans2 = mysqli_fetch_assoc($itungtrans);
$itungtrans3 = $itungtrans2['jumlahtrans'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Panel - Yadabagasket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">

    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li><a href="index.php"><span>Home</span></a></li>
                            <li><a href="../"><span>Kembali ke Toko</span></a></li>
                            <li>
                                <a href="manageorder.php"><i class="ti-package"></i><span>Kelola Pesanan</span></a>
                            </li>
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Laporan
                                    </span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="totalpenjualan.php" class="active">Total Penjualan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola
                                        Toko
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="kategori.php">Kategori</a></li>
                                    <li><a href="produk.php">Produk</a></li>
                                    <li><a href="pembayaran.php">Metode Pembayaran</a></li>
                                </ul>
                            </li>
                            <li><a href="customer.php"><span>Kelola Pelanggan</span></a></li>
                            <li><a href="user.php"><span>Kelola Staff</span></a></li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>

                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li>
                                <h3>
                                    <div class="date">
                                        <script type='text/javascript'>
                                            <!--
                                            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
                                                'November', 'Desember'
                                            ];
                                            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                            var date = new Date();
                                            var day = date.getDate();
                                            var month = date.getMonth();
                                            var thisDay = date.getDay(),
                                                thisDay = myDays[thisDay];
                                            var yy = date.getYear();
                                            var year = (yy < 1000) ? yy + 1900 : yy;
                                            document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                            //
                                            -->
                                        </script></b>
                                    </div>
                                </h3>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- header area end -->
            <?php
            /*
                                                				$periksa_bahan=mysqli_query($conn,"select * from stock_brg where stock <10");
                                                				while($p=mysqli_fetch_array($periksa_bahan)){	
                                                					if($p['stock']>=1){	
                                                						?>
            ?>
            ?>
            ?>
            ?>
            <script>
                $(document).ready(function() {
                    $('#pesan_sedia').css("color", "white");
                    $('#pesan_sedia').append("<i class='ti-flag'></i>");
                });
            </script>
            <?php
						echo "<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button>Stok  <strong><u>".$p['nama']. "</u> <u>".($p['jenis'])."</u></strong> yang tersisa kurang dari 10</div>";		
					}
				}
				
				*/
				?>


            <!-- page title area end -->
            <div class="main-content-inner">

                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h2>Laporan Total Penjualan <?php echo date('F Y'); ?></h2>
                                </div>
                                <div class="data-tables datatable-dark">
                                    <table class="datatables" style="width:100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Total Penjualam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
											$result=mysqli_query($conn,"SELECT DORD.idproduk, P.namaproduk, SUM(DORD.qty) total 
                                            FROM detailorder DORD INNER JOIN produk P ON DORD.idproduk = P.idproduk
                                            INNER JOIN cart C ON c.orderid = DORD.orderid
                                            WHERE C.status = 'Selesai' AND MONTH(tglorder) = MONTH(NOW()) AND  YEAR(tglorder) = YEAR(NOW())
                                            GROUP BY DORD.idproduk");
											$no=1;
											while($res = mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><strong><?php echo $res['namaproduk']; ?></strong></td>
                                                <td><?php echo $res['total']; ?> Pcs</td>
                                            </tr>
                                            <?php 
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                                <br/>
                                <h6>Penjualan Berdasarkan Wilayah</h6>
                                <div class="data-tables datatable-dark">
                                    <table class="datatables" style="width:100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Provinsi</th>
                                                <th>Kota</th>
                                                <th>Nama Barang</th>
                                                <th>Total Penjualam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
											$result=mysqli_query($conn,"SELECT DORD.idproduk, P.namaproduk, MK.city_name, MP.province_name, SUM(DORD.qty) total 
                                                                        FROM detailorder DORD INNER JOIN produk P ON DORD.idproduk = P.idproduk
                                                                        INNER JOIN cart C ON c.orderid = DORD.orderid
                                                                        INNER JOIN login L ON C.userid = L.userid
                                                                        LEFT JOIN master_kota MK ON L.kota = MK.city_id
                                                                        LEFT JOIN master_provinsi MP ON MK.province_id = MP.province_id
                                                                        WHERE C.status = 'Selesai' AND MONTH(C.tglorder) = MONTH(NOW()) AND YEAR(C.tglorder) = YEAR(NOW())
                                                                        GROUP BY DORD.idproduk, MK.city_name, MP.province_name");
											$no=1;
											while($res = mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><strong><?php echo $res['province_name']; ?></strong></td>
                                                <td><strong><?php echo $res['city_name']; ?></strong></td>
                                                <td><strong><?php echo $res['namaproduk']; ?></strong></td>
                                                <td><?php echo $res['total']; ?> Pcs</td>
                                            </tr>
                                            <?php 
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="datapesanan.php" target="_blank" class="btn btn-info">Export Data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row area start-->
        </div>
    </div>
    <!-- main content area end -->



    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p>by Arya B</p>
        </div>
    </footer>
    <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            $('.datatables').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ]
            });
        });
    </script>
</body>

</html>
