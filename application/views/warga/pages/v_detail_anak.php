<h3 class="text-center">Detail Anak</h3>
<div class="container">

    <div class="row" style="margin-top: 80px;">
        <div class="col-md-6">
            <table class="table">
                <tbody>
                    <tr class="bg-success">
                        <th>No. BPJS</th>
                        <td id="show__no__bpjs"></td>
                    </tr>
                    <tr class="bg-success">
                        <th>Nama Anak</th>
                        <td id="show__nama__anak"></td>
                    </tr>
                    <tr class="bg-success">
                        <th>Jenis Kelamin</th>
                        <td id="show__jk" ></td>
                    </tr>
                    <tr class="bg-success">
                        <th>Umur</th>
                        <td id="show__umur"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <table class="table">
                <tbody>
                    <tr class="bg-success">
                        <th>No. KMS</th>
                        <td id="show__kms"></td>
                    </tr>
                    <tr class="bg-success">
                        <th>Tanggal Terdaftar</th>
                        <td id="show__tgl__terdaftar"></td>
                    </tr>
                    <tr class="bg-success">
                        <td>Panjang badan lahir</td>
                        <td id="show__pb"></td>
                    </tr>
                    <tr class="bg-success">
                        <th>Berat Badan Lahir</th>
                        <td id="show__bb"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>

    <h6 class="text-left">Jejak Rekam Medis</h6>

     <ul class="nav nav-tabs" style="margin-top: 40px;">
        <li class="active"><a data-toggle="tab" href="#home">Kunjungan</a></li>
        <li><a data-toggle="tab" href="#imunisasi">Imunisasi</a></li>
        <li><a data-toggle="tab" href="#tumbuhanak">Pertumbuhan</a></li>
    </ul>

           <div class="tab-content" style="margin-top: 40px;">
                    <div id="home" class="tab-pane fade in active">
                        <h3>Kunjungan</h3>
                        <table class="table table">
                            <thead>
                                <tr >
                                    <th class="bg-info">No. Kunjungan</th>
                                    <th class="bg-info">No Antri</th>
                                    <th class="bg-info">Status</th>
                                    <th colspan="2" class="text-center bg-warning">Imunisasi</th>
                                    <th colspan="4" class="text-center bg-danger">Pertumbuhan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="bg-info" ></th>
                                    <th class="bg-info"></th>
                                    <th class="bg-info"></th>
                                    <th class="text-center bg-warning">No. Cek Imunisasi</th>
                                    <th class="text-center bg-warning">Nama Imunisasi</th>
                                    <th class="text-center bg-danger">No. Cek Pertumbuhan</th>
                                    <th class="text-center bg-danger">BB (kg)</th>
                                    <th class="text-center bg-danger">PB (cm)</th>
                                    <th class="text-center bg-danger">Hasil</th>

                                </tr>
                            </tbody>
                            <tbody id="show__kunjungan">
                                
                            </tbody>
                        </table>
                    </div>
                    <div id="imunisasi" class="tab-pane fade">
                        <h3>Imunisasi</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No. Cek Imunisasi</th>
                                    <th>Nama Imunisasi</th>
                                    <th>Umur</th>
                                    <th>Tanggal Cek</th>
                                    <th>Catatan Imunisasi</th>
                                </tr>
                            </thead>
                            <tbody id="show__list__imunisasi" ></tbody>
                        </table>
                    </div>
                    <div id="tumbuhanak" class="tab-pane fade">
                        <h3>Pertumbuhan</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No. Cek Pertumbuhan</th>
                                    <th>Umur</th>
                                    <th>Panjang Badan</th>
                                    <th>Berat Badan</th>
                                    <th>Hasil</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody id="show__list__pertumbuhan"></tbody>
                        </table>
                    </div>
                
            </div>
    </div>

</div>
<script>
    var PARAMS = '<?= $this->uri->segment(3) ?>';
</script>
<script src="<?= base_url('public/warga/detail_anak.js') ?>" ></script>

