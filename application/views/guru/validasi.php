

<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span>Kinerja dan Validasi Sistem</h2>
</div>
<!-- END PAGE TITLE -->
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                                <!-- START TABS -->
                                <div class="panel panel-default tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Kinerja Sistem</a></li>
                                    <li><a href="#tab-second" role="tab" data-toggle="tab">Tabel Validasi Data</a></li>
                                </ul>
                                <div class="panel-body tab-content">
                                    <div class="tab-pane active" id="tab-first">
                                    <div class="row">
                                     <!-- START DEFAULT DATATABLE -->

                            <div class="panel panel-default">

                                <div class="panel-body">
                                <h4>Total Data = <?php echo $jml_total['jml'] ;?> </h4>
                                <hr>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="20%">Keterangan</th>
                                                <th class="50%" >Jumlah</th>
                                                <th class="50%" >Persentase</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>SESUAI</td>
                                                <td><?php echo $jml_sesuai['jml'] ;?></td>
                                                <td><?php echo round($persen_sesuai,2);?>%</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>TIDAK SESUAI</td>
                                                <td><?php echo $jml_tdk_sesuai['jml'] ;?></td>
                                                <td><?php echo round($persen_tdk_sesuai,2);?>%</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><b><b>TOTAL</b></td>
                                                <td><b><?php echo $jml_total['jml'] ;?></b></td>
                                                <td><b>100%</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h3> Kesimpulan : </h3>
                                    <h4>Kinerja Sistem mencapai <b><?php echo round($persen_sesuai,2);?>% </b> </h3>
                                </div>
                            <!-- END DEFAULT DATATABLE -->
                                </div>
                              </div>
                              </div>
                              </div>

                                <div class="tab-pane" id="tab-second">
                                    <div class="row">

                                      <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   <div class="btn-group"><a href="<?php echo base_url(); ?>admin/validasi/generate_tb_validasi"  class="btn btn-default" role="button" data-toggle="tooltip" title="Generate Tabel Validasi"><i class="fa fa-refresh"></i>Generate Tabel Validasi</a></div>
                                   <div class="btn-group"><a href="<?php echo base_url(); ?>admin/validasi/edit_tb_validasi"  class="btn btn-success" role="button" data-toggle="tooltip" title="Edit Validasi Data"><i class="fa fa-pencil"></i>Validasi Data</a></div>
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th width="3%">No</th>
                                                <th width="10%">Tanggal Test</th>
                                                <th width="10%">Tanggal</th>
                                                <th width="10%">Waktu</th>
                                                <th width="10%">Z Total</th>
                                                <th width="10%">Nama Kondisi</th>
                                                <th width="10%">Validasi Pakar</th>
                                                <th width="10%">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        foreach($data_kesimpulan->result_array() as $op)
                                        {
                                        if ($op['keterangan']=='SESUAI'){
                                            echo '<tr class="success">';
                                        }else{
                                            echo '<tr>';
                                        }
                                        ?>

                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $op['tgl_test'];?></td>
                                                <td>
												<?php $variabel=$op['waktu'];
													foreach ($data_waktu->result_array()  as $op2) {
														if($op2['id_waktu']==$variabel){
															$tanggal=$op2['tanggal'];
															echo $tanggal;

														}
													}
												?>
												</td>
                                                <td>
                                                <?php $variabel=$op['waktu'];
													foreach ($data_waktu->result_array()  as $op2) {
														if($op2['id_waktu']==$variabel){
															$waktu=$op2['waktu'];
															echo $waktu;
														}
													}
												?>
												</td>
                                                <td><?php echo $op['z_total'];?></td>
                                                <td><?php echo $op['nama_kondisi'];?></td>
                                                <td><?php echo $op['validasi_pakar'];?></td>
                                                <td><?php echo $op['keterangan'];?></td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            <!-- END TABS -->

                        </div>
                    </div>

                </div>
                <!-- PAGE CONTENT WRAPPER -->
