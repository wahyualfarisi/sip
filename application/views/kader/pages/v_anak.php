<div class="container-fluid">
<div style="margin-top: 30px;" >
         <h3>Kelola Anak</h3>
</div>
</div>

<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                    <input type="text" placeholder="Cari Anak" id="search" name="search__anak" class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><span class="bread-blod">Cari Anak</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="static-table-area mg-b-15" style="margin-top: 50px;">
    <div class="container-fluid">
      
      <div class="row" style="margin-top: 15px;">
        <div class="col-lg-12 animated fadeIn">
            <div class="sparkline8-list shadow-reset">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Data Anak</h1>

                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr class="bg-warning">
                                    <th>No. </th>
                                    <th>No. KK</th>
                                    <th>No. BPJS</th>
                                    <th>Nama Ayah </th>
                                    <th>Nama Ibu</th>
                                    <th>Alamat</th>
                                    <th>No. Telp</th>
                                    <th>Nama Lengkap </th>
                                    <th>Jenis Kelamin</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="show__list__anak"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
<script src="<?= base_url('public/kader/anak.js') ?>"></script>



