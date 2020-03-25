<?php 
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->

    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <style>
        #footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-success">
                <div class="panel-heading" style="font-size: 20px;">
                    Data Rekapitulasi
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Masuk</th>
                                    <th>Jenis</th>
                                    <th>Keluar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 

                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM kas");
                                    while ($data = mysqli_fetch_assoc($sql)) {

                                ?>
                                    <tr class="odd gradeX">
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['kode']; ?>
                                        </td>
                                        <td>
                                            <?php echo date('d F Y', strtotime($data['tgl'])); ?>
                                        </td>
                                        <td>
                                            <?php echo $data['keterangan']; ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($data['jumlah']).",-"; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['jenis']; ?>
                                        </td>
                                        <td align="right">
                                            <?php echo number_format($data['keluar']).",-"; ?>
                                        </td>
                                    </tr>
                                    <?php 
                                    $total = $total+$data['jumlah'];
                                    $total_keluar = $total_keluar+$data['keluar'];

                                    $saldo_akhir = $total - $total_keluar;                      
                                    } 
                                ?>
                            </tbody>

                            <tr>
                                <td colspan="4" style="text-align: left; font-size: 16px; color: maroon;">Total Kas Masuk :</td>
                                <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo " Rp." . number_format($total).",-"; ?></font></td>
                            </tr>

                            <tr>
                                <td colspan="6" style="text-align: left; font-size: 16px; color: maroon;">Total Kas Keluar :</td>
                                <td style="font-size: 17px; text-align: right; "><font style="color: red;"><?php echo " Rp." . number_format($total_keluar).",-"; ?></font></td>
                            </tr>

                            <tr>
                                <td colspan="5" style="text-align: left; font-size: 16px; color: red;">Saldo Akhir :</td>
                                <th style="font-size: 17px; text-align: right;"><font style="color: purple;"><?php echo " Rp." . number_format($saldo_akhir).",-"; ?></font></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>