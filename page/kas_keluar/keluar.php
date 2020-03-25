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
            span {
                font-size: 22px;
            }
        </style>
    </head>

    <body>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <span>Data Kas Masuk</span>
                        <span title="Tambah Data"><button style="float: right;" class="btn-md btn btn-success"data-toggle="modal" data-target="#myModal">
                            <b>+ Tambah</b>
                    </button></span>
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
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 

                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM kas WHERE jenis = 'keluar' ");
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
                                                <?php echo number_format($data['keluar']).",-"; ?>
                                            </td>
                                            <td>
                                                <a id="edit_data" data-toggle="modal" data-target="#edit" data-id="<?php echo $data['kode']; ?>" data-ket="<?php echo $data['keterangan']; ?>" data-tgl="<?php echo $data['tgl']; ?>" data-jml="<?php echo $data['keluar']; ?>" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"> </i></a>
                                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="?page=keluar&aksi=hapus&id=<?php echo $data['kode'];?>" class="btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash"> </i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                    $total = $total+$data['keluar'];
                                    } 
                                ?>
                                </tbody>

                                <tr>
                                    <td colspan="4" style="text-align: left; font-size: 17px; color: maroon;">Total Kas Keluar :</td>
                                    <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo " Rp." . number_format($total).",-"; ?></font></td>
                                </tr>
                            </table>
                        </div>

                        <!--  Halaman Tambah-->
                        <div class="panel-body">
                            <!-- <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
                            + Tambah
                        </button> -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Tambah Data</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="POST">
                                                <div class="form-group">
                                                    <label>Kode</label>
                                                    <input class="form-control" name="kode" placeholder="Input Kode" />
                                                </div>
                                                <div>
                                                    <label>Keterangan</label>
                                                    <textarea class="form-control" rows="3" name="ket"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input class="form-control" type="date" name="tgl" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah</label>
                                                    <input class="form-control" type="number" name="jml" />
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                    if(isset($_POST['simpan'])) {
                        $kode = $_POST['kode'];
                        $tgl = $_POST['tgl'];
                        $ket = $_POST['ket'];
                        $jml = $_POST['jml'];

                        $sql = mysqli_query($koneksi, "INSERT INTO kas (kode, keterangan, tgl, jumlah, jenis, keluar) VALUES ('$kode', '$ket', '$tgl', 0, 'keluar', '$jml')");

                        if($sql) {
                            echo "
                                <script>
                                alert('Data Berhasil Ditambahkan');
                                document.location.href = '';
                                </script>";       
                        }
                    }
                ?>
                            <!-- Akhir Halaman Tambah -->

                            <!-- Halaman Ubah -->
                            <div class="panel-body">
                                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Form Ubah Data</h4>
                                            </div>
                                            <div class="modal-body" id="modal_edit">
                                                <form role="form" method="POST">
                                                    <div class="form-group">
                                                        <label>Kode</label>
                                                        <input class="form-control" name="kode" placeholder="Input Kode" id="kode" readonly />
                                                    </div>
                                                    <div>
                                                        <label>Keterangan</label>
                                                        <textarea class="form-control" rows="3" name="ket" id="ket"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <input class="form-control" type="date" name="tgl" id="tgl" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jumlah</label>
                                                        <input class="form-control" type="number" name="jml" id="jml" />
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                                                </form>

                                                <?php 
                                        if(isset($_POST['ubah'])) {
                                            $kode = $_POST['kode'];
                                            $ket = $_POST['ket'];
                                            $tgl = $_POST['tgl'];
                                            $jml = $_POST['jml'];

                                            $sql = mysqli_query($koneksi, "UPDATE kas SET keterangan = '$ket', tgl = '$tgl', jumlah = 0, jenis = 'keluar', keluar = '$jml' WHERE kode = '$kode' ");
                                            if($sql) {
                                                echo "
                                                    <script>
                                                    alert('Data Berhasil Diubah');
                                                    document.location.href = '';
                                                    </script>";       
                                            }
                                        }
                                    ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Halaman Ubah -->
                    </div>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>

        <script type="text/javascript">
            $(document).on("click", "#edit_data", function() {
                var kode = $(this).data('id');
                var ket = $(this).data('ket');
                var tgl = $(this).data('tgl');
                var jml = $(this).data('jml');

                $("#modal_edit #kode").val(kode);
                $("#modal_edit #ket").val(ket);
                $("#modal_edit #tgl").val(tgl);
                $("#modal_edit #jml").val(jml);

            })
        </script>

    </body>

    </html>