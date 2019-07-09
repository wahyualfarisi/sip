<div class="container-fluid">
    <div style="margin-top: 30px;" >
            <h3>ANTRIAN KUNJUNGAN</h3>
    </div>
    <div id="displayClock" class="text-center" ></div>
    
        <table class="table table-bordered">
            <tr>
                <th>No. Kegiatan</th>
                 <td class="bg-info"><?= $kegiatan->result()[0]->no_kegiatan ?></td>
            </tr>
            <tr>
                <th>Nama Kegiatan </th>
                 <td class="bg-info"><?= $kegiatan->result()[0]->nama_kegiatan ?></td>
            </tr>
            <tr>
                <th>Tanggal Kegiatan</th>
                <td class="bg-info"><?= $kegiatan->result()[0]->tanggal_kegiatan ?></td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td class="bg-info"><?= $kegiatan->result()[0]->lokasi ?></td>
            </tr>
        </table>
        
</div>

<div class="project-details-area mg-b-15">
 <div class="container-fluid">

    <div class="row">
         <div class="col-md-3">
               <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30" style="margin-top: 10px;">
                    <div class="income-title">
                        <div class="main-income-head">
                            <h2 class="text-center" >Dalam Antrian</h2>
                        </div>
                    </div>
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-adminpro-rate">
                                <h3 class="text-center"><span class="counter" id="dalam_antrian"></span></h3>
                            </div>
                            <div class="price-graph">
                                <span id="sparkline6"></span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30" style="margin-top: 10px;">
                    <div class="income-title">
                        <div class="main-income-head">
                            <h2 class="text-center" >Antrian Terlewat</h2>
                        </div>
                    </div>
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-adminpro-rate">
                                <h3 class="text-center"><span class="counter" id="total__antrian__terlewat">20</span></h3>
                            </div>
                            <div class="price-graph">
                                <span id="sparkline6"></span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

               
                <h4 class="text-center">TOTAL KUNJUNGAN</h4>
                <h1 class="text-center" style="font-size: 70px;" id="total_kunjungan" >50</h1>
        </div>

        <div class="col-md-3">
            <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30" style="margin-top: 10px;">
                    <div class="income-title">
                        <div class="main-income-head">
                            <h2 class="text-center">Dalam Proses</h2>
                        </div>
                    </div>
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-adminpro-rate">
                                <h3 class="text-center"><span class="counter"  id="total__antrian__proses" >20</span></h3>
                            </div>
                            <div class="price-graph">
                                <span id="sparkline6"></span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30" style="margin-top: 10px;">
                    <div class="income-title">
                        <div class="main-income-head">
                            <h2 class="text-center"  >Selesai</h2>
                        </div>
                    </div>
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-adminpro-rate">
                                <h3 class="text-center"><span class="counter" id="total__antrian__selesai" >20</span></h3>
                            </div>
                            <div class="price-graph">
                                <span id="sparkline6"></span>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

        </div>

        <div class="col-lg-6">
            <div class="charts-single-pro nt-mg-b-30">
                <div class="alert-title">
                </div>
                <div id="pie-chart">
                    <canvas id="piechart"></canvas>
                </div>
            </div>
        </div>


    </div>

     <div class="row">
         <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
             <div class="project-details-wrap shadow-reset">
                 <div class="row">
                     <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                         <div class="project-details-title">
                             <h2><span class="profile-details-name-nn">Antrian </span> 28, September 2018</h2>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="project-details-mg">
                             <div class="row">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     <div class="project-details-st">
                                         <span><strong>Status:</strong></span>
                                     </div>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                     <div class="btn-group project-list-ad">
                                         <button class="btn btn-white btn-xs" id="status_antrian" >----</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="project-details-mg">
                             <div class="row">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     <div class="project-details-st">
                                         <span><strong>No. Antri</strong></span>
                                     </div>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                     <div class="project-details-dt">
                                         <span id="no_antri_monitor" >-----</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="project-details-mg">
                             <div class="row">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     <div class="project-details-st">
                                         <span><strong>No. Kunjungan</strong></span>
                                     </div>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                     <div class="project-details-dt">
                                         <span id="no_kunjungan_monitor">-----</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="project-details-mg">
                             <div class="row">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     <div class="project-details-st">
                                         <span><strong>No. KK</strong></span>
                                     </div>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                     <div class="project-details-dt">
                                         <span id="no_kk_monitor">-----</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="project-details-mg">
                             <div class="row">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     <div class="project-details-st">
                                         <span><strong>No. BPJS</strong></span>
                                     </div>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                     <div class="project-details-dt">
                                         <span id="no_bpjs_monitor">-----</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="project-details-mg">
                             <div class="row">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     <div class="project-details-st">
                                         <span><strong>No. KMS</strong></span>
                                     </div>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                     <div class="project-details-dt">
                                         <a href="#" id="no_kms_monitor">-----</a>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="project-details-mg">
                             <div class="row">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     <div class="project-details-st">
                                         <span><strong>Nama Anak</strong></span>
                                     </div>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                     <div class="project-details-dt">
                                         <span id="nama_anak_monitor">-----</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                        
                         <div class="project-details-mg">
                             <div class="row">
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     <div class="project-details-st">
                                         <span><strong>Jenis Kelamin</strong></span>
                                     </div>
                                 </div>
                                 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                     <div class="project-details-dt">
                                         <span id="jk_monitor">-----</span>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="project-details-mg" style="margin-top: 70px;">
                             <div class="row">
                                <div class="col-lg-6">
                                    <button type="button" data-type="skip"  class="btn btn-info btn-block btn__antrian" name="button">Lewati Antrian</button>
                                </div>
                                <div class="col-lg-6">
                                    <button type="button" data-type="next" class="btn btn-warning btn-block btn__antrian" name="button">Antrian Selanjutnya</button>
                                </div>
                            </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <a href="#/addkunjungan/<?= $kegiatan->result()[0]->no_kegiatan ?>" class="btn btn-custome btn-block" name="button">Tambah Kunjungan</a>

             <div class="sparkline7-list shadow-reset" style="margin-top: 10px;" >
                 <div class="sparkline7-hd">
                     <div class="main-spark7-hd ">
                         <h1 class="text-center">No Antri </h1>
                         <div class="sparkline7-outline-icon">

                         </div>
                     </div>
                 </div>
                 <div class="sparkline7-graph project-details-price-hd">
                     <div class="single-skill">
                         <div class="progress-circular1 project-details-price">
                             <h2 style="font-size: 100px;" id="no_antri_current">-</h2>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>

<div class="container-fluid">
        <div class="sparkline8-list shadow-reset">
            <div class="sparkline8-hd">
                <div class="main-sparkline8-hd">
                    <h1>Daftar Antrian </h1>
                </div>
            </div>
            <div class="sparkline8-graph">
                <div class="static-table-list">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No. Kunjungan</th>
                                <th>No. Antri</th>
                                <th>No. KMS</th>
                                <th>No. BPJS</th>
                                <th>Nama Anak</th>
                                <th>Berat Badan Lahir</th>
                                <th>Panjang Badan Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="show__daftar__kunjungan"></tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

<div id="modalNextAntrian" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <form id="form-next-antri" method="post">
                    <div class="form-group">
                      <label>Konfirmasi Untuk Antrian Selanjutnya ? </label>
                      <input type="hidden" class="no_kunjungan" name="no_kunjungan">
                    </div>
                    <button type="submit" class="btn btn-info" name="button">Konfirmasi</button>
                </form>

            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cancel</a>
            </div>
        </div>
    </div>
</div>

<div id="modalSkipAntrian" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <form id="form-skip-antri" method="post">
                    <div class="form-group">
                      <label>Konfirmasi Untuk Melewati Antrian ? </label>
                      <input type="hidden" class="no_kunjungan" name="no_kunjungan">
                    </div>
                    <button type="submit" class="btn btn-info" name="button">Konfirmasi</button>
                </form>

            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cancel</a>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url().'public/mynotif.js'?>"></script>
<script>
    var ID = '<?= $kegiatan->result()[0]->no_kegiatan ?>';
</script>
<script src="<?= base_url('public/ex/chart_kunjungan.js') ?>" ></script>
<script src="<?= base_url('public/kader/antrian.js') ?>" ></script>
