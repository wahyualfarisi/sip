<div class="container-fluid">
<div style="margin-top: 30px;" >
         <h3>DASHBOARD</h3>
</div>
</div>

<div class="income-order-visit-user-area" style="margin-top: 20px;" >
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="income-dashone-total income-monthly shadow-reset nt-mg-b-30">
                <div class="income-title">
                    <div class="main-income-head">
                        <h2>Kunjungan </h2>
                    </div>
                </div>
                <div class="income-dashone-pro">
                    <div class="income-rate-total">
                        <div class="price-adminpro-rate">
                            <h3><span></span><span class="counter" id="total__kunjungan">320</span></h3>
                        </div>
                        <div class="price-graph">
                            <span id="sparkline1"></span>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30">
                <div class="income-title">
                    <div class="main-income-head">
                        <h2>Warga</h2>
                        
                    </div>
                </div>
                <div class="income-dashone-pro">
                    <div class="income-rate-total">
                        <div class="price-adminpro-rate">
                            <h3><span class="counter" id="total__warga">72320</span></h3>
                        </div>
                        <div class="price-graph">
                            <span id="sparkline6"></span>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="income-dashone-total visitor-monthly shadow-reset nt-mg-b-30">
                <div class="income-title">
                    <div class="main-income-head">
                        <h2>KMS</h2>
                    </div>
                </div>
                <div class="income-dashone-pro">
                    <div class="income-rate-total">
                        <div class="price-adminpro-rate">
                            <h3><span class="counter" id="total__kms">7888200</span></h3>
                        </div>
                        <div class="price-graph">
                            <span id="sparkline2"></span>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="income-dashone-total user-monthly shadow-reset nt-mg-b-30">
                <div class="income-title">
                    <div class="main-income-head">
                        <h2>Jadwal Kegiatan (2019) </h2>
                    </div>
                </div>
                <div class="income-dashone-pro">
                    <div class="income-rate-total">
                        <div class="price-adminpro-rate">
                            <h3><span class="counter" id="total__jadwal__kegiatan" >88200</span></h3>
                        </div>
                        <div class="price-graph">
                            <span id="sparkline5"></span>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="col-lg-12">
    <div class="charts-single-pro shadow-reset nt-mg-b-30">
        <div class="alert-title">
            <h2 class="text-center">Kunjungan Posyandu</h2>
        </div>
        <div id="basic-chart">
            <canvas id="basiclinechart" width="1050" height="295"></canvas>
        </div>
    </div>
</div>


<div class="container-fluid" style="margin-top: 20px;">
<div class="row">
<div class="col-lg-12">
    <div class="sparkline8-list shadow-reset">
        <div class="sparkline8-hd">
            <div class="main-sparkline8-hd">
                <h1>Kunjungan Hari ini</h1> 
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
                        </tr>
                    </thead>
                    <tbody id="show__list__kunjungan" ></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



</div>


<script src="<?= base_url('public/myLib.js') ?>" ></script>
<script src="<?= base_url('public/dashboard.js') ?>" ></script>
<!-- <script src="<?= base_url().'assets/js/charts/line-chart.js' ?> "></script> -->
<script>
 var storeLabel = [];
 var dataTotal = [];
 load_total_kunjungan()
 function load_total_kunjungan()
 {
     getResource(BASE_URL+'master/Dashboard/kunjungan_per_tgl_kegiatan', undefined, data => {
         if(data.length > 0){
             data.forEach(item => {
                 storeLabel.push(item.tanggal_kegiatan)
                 dataTotal.push(item.totalKunjungan)
             })
         }
         
         get_chart()
     })
     
     
 }

 function get_chart()
 {
    var ctx = document.getElementById('basiclinechart');
            new Chart(ctx, {
            type: 'line',
            data: {
                labels: storeLabel,
                datasets: [{
                    label: "steppedLine",
                    data: dataTotal ,
                    borderColor: '#07C',
                    pointBackgroundColor: "#FFF",
                    pointBorderColor: "#07C",
                    pointHoverBackgroundColor: "#07C",
                    pointHoverBorderColor: "#FFF",
                    pointRadius: 4,
                    pointHoverRadius: 4,
                    fill: false,
                    tension: 0.15
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text:'Kunjungan',
                },
                tooltips: {
                    displayColors: true,
                    callbacks: {
                        label: function(e, d) {
                            return;
                        },
                        title: function() {
                            return;
                        }
                    }
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            max: 50
                        }
                    }]
                }
            }
    });

 }


  



</script>