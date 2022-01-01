<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?= base_url() ?>assets/img/logoamikom.png" type="image/png">
  <title>Uji Akurasi</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <!-- <link rel="stylesheet" href="<?//= base_url() ?>assets/css/bootstrap.css"> -->
  <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">


</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3"></div>
      </a>


     <!-- Divider -->
    <hr class="sidebar-divider my-0">
     <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url() ?>guru/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>guru/datasiswa">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Siswa</span></a>
          </li>  

        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>guru/dataguru">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Guru</span></a>
          </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Prediksi</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!-- <h6 class="collapse-header">Prediksi:</h6> -->
                    <a class="collapse-item" href="kriteria">Kriteria</a>
                    <a class="collapse-item" href="datatrining">Data Training</a>
                    <a class="collapse-item" href="datatesting">Data Testing</a>
                    <a class="collapse-item" href="uji_akurasi">Hasil Perhitungan</a>
                    <a class="collapse-item" href="<?= base_url("guru/hasil") ?>">Hasil Pengujian</a>
                </div>
            </div>
        </li>
        
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      </ul>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button> 

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat Datang, <b><?php echo $this->session->userdata("nama") ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/img/340br.jpg">
              </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?php echo base_url() ?>admin/logout" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Log Out
          </a>
        </div>
      </li>

    </ul>

  </nav>
  <!-- End of Topbar -->

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
      <div class="text-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-black-800">Hasil Perhitungan Algoritma Naive Bayes</h1>
      </div>
  <!-- Content Row -->
  <div class="row">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php
        //object database class
       //$db_object = new database();

        $pesan_error = $pesan_success = "";
        if (isset($_GET['pesan_error'])) {
            $pesan_error = $_GET['pesan_error'];
        }
        if (isset($_GET['pesan_success'])) {
            $pesan_success = $_GET['pesan_success'];
        }

        if (isset($_POST['submit'])) {
            // if(!$input_error){
            $data = new Spreadsheet_Excel_Reader($_FILES['file_uji_akurasi']['tmp_name']);

            $baris = $data->rowcount($sheet_index = 0);
            $column = $data->colcount($sheet_index = 0);
            //import data excel dari baris kedua, karena baris pertama adalah nama kolom
            // $temp_date = $temp_produk = "";
            for ($i=2; $i<=$baris; $i++) {
//                for($c=1; $c<=$column; $c++){
//                    $value[$c] = $data->val($i, $c);
//                }
                if(!empty($data->val($i, 2))){
                    $value = "(\"".$data->val($i, 2)."\", '".$data->val($i, 3)."', "
                            .$data->val($i, 4).", '".$data->val($i, 5)."', "
                            .$data->val($i, 6).", ".$data->val($i, 7).", "
                            .$data->val($i, 8).", ".$data->val($i, 9).", '".$data->val($i, 10)."')";
                    $sql = "INSERT INTO uji_akurasi "
                        . " (nama_siswa, jenkel, pengetahuan, ketrampilan, spiritual, sosial, predikat_asli)"
                        . " VALUES ".$value;
                    $result = $this->db->query($sql);
                }
            }
            //$values = implode(",", $value);
            
            if($result){
                ?>
                <script> location.replace("?guru=uji_akurasi&pesan_success=Data berhasil disimpan");</script>
                <?php
            }
            else{
                ?>
                <script> location.replace("?guru=uji_akurasi&pesan_error=Data gagal disimpan");</script>
                <?php
            }
        }

        if (isset($_POST['delete'])) {
            $sql = "TRUNCATE uji_akurasi";
            $db_object->db_query($sql);
            ?>
            <script> location.replace("?guru=uji_akurasi&pesan_success=Data uji berhasil dihapus");</script>
            <?php
        }
        
        $sql = "SELECT * FROM uji_akurasi";
        $query = $this->db->query($sql)->result_array();
        $jumlah = count($query);
        ?>
 <div class="row">
    <div class="col-md-12">
            <div class="form-group">
                
                <a href="<?= base_url('guru/uji_akurasi/naivebayes') ?>" class="btn btn-secondary active font-weight-bold">
                    <i class="fa fa-check"></i> View Hasil Perhitungan
                </a>
                <a href="<?php echo site_url('guru/uji_akurasi/add') ?>" class="btn btn-success">
                    <i class="fas fa-plus"> Test Predict</i>
                </a>
                <a href="<?= base_url('guru/uji_akurasi/delete') ?>" class="btn btn-danger">
                    <i class="fa fa-trash-o"></i> Delete Data
                </a>
            </div>
        </form>
                <?php
                if (!empty($pesan_error)) {
                    display_error($pesan_error);
                }
                if (!empty($pesan_success)) {
                    display_success($pesan_success);
                }
                

                echo "Jumlah data: " . count($uji_akurasi) . "<br>";
                if ($jumlah == 0) {
                    echo "Data kosong...";
                } 
                else {
                    ?>
                    <table class='table table-bordered table-striped  table-hover'>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Jenkel</th>
                            <th>Pengetahuan</th>
                            <th>Ketrampilan</th>
                            <th>Spiritual</th>
                            <th>Sosial</th>
                            <th>Predikat Asli</th>
                            <th>Prediksi</th>
                            <th>Value Sangat Baik</th>
                            <th>Value Baik</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($uji_akurasi as $row) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row['nama_siswa'] . "</td>";
                            echo "<td>" . $row['jenkel'] . "</td>";
                            echo "<td>" . $row['pengetahuan'] . "</td>";
                            echo "<td>" . $row['ketrampilan'] . "</td>";
                            echo "<td>" . $row['spiritual'] . "</td>";
                            echo "<td>" . $row['sosial'] . "</td>";
                            echo "<td>" . $row['predikat_asli'] . "</td>";
                            echo "<td>" . $row['predikat_hasil'] . "</td>";
                            echo "<td>" . $row['nilai_sangatbaik'] . "</td>";
                            echo "<td>" . $row['nilai_baik'] . "</td>";
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                    </table>
                    <?php
                }
                
                if(isset($_POST['uji_akurasi'])){
                    //proses menghitung naive bayes
                    //loop data uji nya
                    $sql_hit = "SELECT * FROM datatesting ";
                    $res = $this->db->query($sql_hit)->result_array();
                    $aa=1;
                    foreach($res as $row){
                        echo "<center>";
                        echo "<b>Data Testing ke-".$aa."</b>";
                        echo "<br>"
                        . "<strong>"."Jenis kelamin: "."</strong>".$row['jenkel']." - "
                                . "<strong>"."Pengetahuan: "."</strong>".$row['pengetahuan']." - "
                                . "<strong>"."Ketrampilan: "."</strong>".$row['ketrampilan']." - "
                                . "<strong>"."Spiritual: "."</strong>".$row['spiritual']." - "
                                . "<strong>"."sosial: "."</strong>".$row['sosial']." - "
                                ;
                        ProsesNaiveBayes($db_object, $row['id_datatesting'], $row['jenkel'], $row['pengetahuan'], $row['ketrampilan'], 
                                $row['spiritual'], $row['sosial']);
                        $aa++;
                        //echo "<br><br>";
                    }
                    
                    //perhitungan akurasi
                    $que = $db_object->db_query("SELECT * FROM datatesting");
                    $jumlah_testing=$db_object->db_num_rows($que);
                    //$TP=0; $FN=0; $TN=0; $FP=0; $kosong=0;
                    $TP = $FP =
                    $FN = $TN = 0;
                    ?>
                    <strong>Hasil:</strong>
                    <table class='table table-bordered table-striped  table-hover'>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Jenkel</th>
                            <th>Pengetahuan</th>
                            <th>Ketrampilan</th>
                            <th>Spiritual</th>
                            <th>Sosial</th>
                            <th>Predikat Asli</th>
                            <th>Predikat Hasil</th>
                            <th>Akurasi</th>
                            <th></th>
                        </tr>
                    <?php
                    $no = 1;
                    while($row=$db_object->db_fetch_array($que)){
                            $asli=$row['predikat_asli'];
                            $prediksi=$row['predikat_hasil'];
                            if($row['predikat_asli']==$row['predikat_hasil']){
                         $ketepatan="Benar";
                            }else{
                                $ketepatan="Salah";
                            }
                            
                            echo "<tr>";
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row['id_hasil'] . "</td>";
                            echo "<td>" . $row['nama_siswa'] . "</td>";
                            echo "<td>" . $row['jenkel'] . "</td>";
                            echo "<td>" . $row['pengetahuan'] . "</td>";
                            echo "<td>" . $row['ketrampilan'] . "</td>";
                            echo "<td>" . $row['spiritual'] . "</td>";
                            echo "<td>" . $row['sosial'] . "</td>";
                            echo "<td>" . $row['predikat_asli'] . "</td>";
                            echo "<td>" . $row['predikat_hasil'] . "</td>";
                            echo "<td>" . $row['akurasi'] . "</td>";
                            echo "<td>" . $ketepatan . "</td>";
                            echo "</tr>";
                            $no++;
                            
                            if($asli=='Sangat Baik' & $prediksi=='Sangat Baik'){
                                    $TP++;
                            }
                            else if($asli=='Sangat Baik' & $prediksi=='Baik'){
                                    $FN++;
                            }
                            else if($asli=='Baik' & $prediksi=='Baik'){
                                    $TN++;
                            }
                            else if($asli=='Baik' & $prediksi=='Sangat Baik'){
                                    $FP++;
                            }
                            else if($prediksi==''){
                                    $kosong++;
                            }
                    }
                    ?>
                    </table>
                    <?php
                    $tepat=($TP+$TN);
                    $tidak_tepat=($FP+$FN+$kosong);
                    $akurasi=($tepat/$jumlah_uji)*100;
                    $precision=($TP/($TP+$FP))*100;
                    $recall=($TP/($TP+$FN))*100;
                    $laju_error=($tidak_tepat/$jumlah_uji)*100;

                    $akurasi = round($akurasi,2);
                    $precision = round($precision,2);
                    $recall = round($recall,2);   
                    $laju_error = round($laju_error,2);
                    


                    echo "<br><br>";
                    echo "<center><h4>";
                    echo "Jumlah prediksi: $jumlah_uji<br>";
                    echo "Jumlah tepat: $tepat<br>";
                    echo "Jumlah tidak tepat: $tidak_tepat<br>";
                    if($kosong!=0){ echo "Jumlah data yang prediksinya kosong: $kosong<br></h4>"; }
                    echo "<h2>AKURASI = $akurasi %<br>";
                    echo "LAJU ERROR = $laju_error %<br></h2>";
                    
                    echo "<h4>TP: $TP | TN: $TN | FP: $FP | FN: $FN<br></h4>";
                    echo "<table>";
                        echo "<tr>";
                            echo "<td>Recall</td> <td>=</td> <td>(TP / (TP + FN) ) x 100</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>&nbsp;</td> <td>=</td> <td>($TP / ($TP + $FN) ) x 100</td>";
                        echo "</tr>";
                        $TP_plus_FN = $TP+$FN;
                        echo "<tr>";
                            echo "<td>&nbsp;</td> <td>=</td> <td>($TP / ($TP_plus_FN) ) x 100</td>";
                        echo "</tr>";
                        $last = $TP/($TP+$FN);
                        echo "<tr>";
                            echo "<td>&nbsp;</td> <td>=</td> <td>($last) x 100</td>";
                        echo "</tr>";
                    echo "</table>";

                    echo "<h2>RECALL = $recall %<br></h2>";
                    $precision=($TP/($TP+$FP))*100;
                    echo "<table>";
                        echo "<tr>";
                            echo "<td>precision</td> <td>=</td> <td>(TP / (TP + FP) ) x 100</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>&nbsp;</td> <td>=</td> <td>(TP / (TP + FP) ) x 100</td>";
                        echo "</tr>";
                        $TP_plus_FP = $TP+$FP;
                        echo "<tr>";
                            echo "<td>&nbsp;</td> <td>=</td> <td>($TN / ($FP_plus_FP) ) x 100</td>";
                        echo "</tr>";
                        $last1 = $TP/($TP+$FP);
                        echo "<tr>";
                            echo "<td>&nbsp;</td> <td>=</td> <td>($last1) x 100</td>";
                        echo "</tr>";
                    echo "</table>";
                    echo "<h2>PRECISON = $precision %<br>";
                    echo "</h2>";
                    echo "</center>";
                     
                }
                ?>
            </div>
        </div>
    </div>
</div>
 </div>
<!-- /.container-fluid -->
</div>

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url() ?>Dashboard/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
<!-- Footer -->
 <footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>&copy;  <?=date('Y');?> - Sistem Prediksi - All Right Reservered</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script>
<script>
$(document).ready(function(){
    $("#uji_akurasi").on("click", function(){
        $.ajax({
            url: "<?= site_url('admin/Uji_akurasi/naivebayes') ?>"
        })
    })
}) 
</script>
</body>

</html>
