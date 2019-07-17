<h3 class="text-center site-title">Detail Anak</h3>
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

    <h6 class="text-left site-title">Jejak Rekam Medis</h6>

     <ul class="nav nav-tabs" style="margin-top: 40px;">
        <li class="active"><a data-toggle="tab" href="#home" style="color: red">Kunjungan</a></li>
        <li><a data-toggle="tab" href="#imunisasi"  style="color: red">Imunisasi</a></li>
        <li><a data-toggle="tab" href="#tumbuhanak"  style="color: red">Pertumbuhan</a></li>
    </ul>

           <div class="tab-content" style="margin-top: 40px;">
                    <div id="home" class="tab-pane fade in active">
                        <h3 class="site-title">Kunjungan</h3>
                        <table class="table table" style="color: #fff">
                            <thead>
                                <tr >
                                    <th style="background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);">No. Kunjungan</th>
                                    <th style="background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);">No Antri</th>
                                    <th style="background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);">Status</th>
                                    <th colspan="2" style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);" class="text-center">Imunisasi</th>
                                    <th colspan="4" class="text-center" style="background-image: linear-gradient(to top, #0ba360 0%, #3cba92 100%);" >Pertumbuhan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);"></th>
                                    <th style="background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);"></th>
                                    <th style="background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);"></th>
                                    <th style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);">No. Cek Imunisasi</th>
                                    <th style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);">Nama Imunisasi</th>
                                    <th class="text-center" style="background-image: linear-gradient(to top, #0ba360 0%, #3cba92 100%);">No. Cek Pertumbuhan</th>
                                    <th class="text-center" style="background-image: linear-gradient(to top, #0ba360 0%, #3cba92 100%);">BB (kg)</th>
                                    <th class="text-center" style="background-image: linear-gradient(to top, #0ba360 0%, #3cba92 100%);" >PB (cm)</th>
                                    <th class="text-center" style="background-image: linear-gradient(to top, #0ba360 0%, #3cba92 100%);">Hasil</th>

                                </tr>
                            </tbody>
                            <tbody id="show__kunjungan">
                                
                            </tbody>
                        </table>
                    </div>
                    <div id="imunisasi" class="tab-pane fade">
                        <h3 class="site-title">Imunisasi</h3>
                        <table class="table" style="color: #fff">
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
                        <h3 class="site-title">Pertumbuhan</h3>
                        <table class="table" style="color: #fff">
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

