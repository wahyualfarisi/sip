<div class="container-fluid">
    <div style="margin-top: 30px;" >
            <h3>Detail KMS</h3>
    </div>
</div>

<div class="static-table-area mg-b-15" style="margin-top: 50px;">
    <div class="container-fluid">
            <div class="sparkline8-list shadow-reset">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                    
                    </div>
                </div>
            </div>
    </div>
</div>




//

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
