<div class="welcome-adminpro-area" style="margin-top: 50px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="welcome-wrapper shadow-reset res-mg-t mg-b-30">

                    <div class="adminpro-message-list">
                        <ul class="message-list-menu">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="dashboard-line-chart shadow-reset mg-b-30">
                    <div class="flot-chart dashboard-chart">
                        <canvas id="myChartsrs1" width="400" height="170"></canvas>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="linechart-dash-rate">
                                <h2>$5,000</h2>
                                <p>Sales report</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="linechart-dash-rate">
                                <h2>$7,000</h2>
                                <p>Annual Sales</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="linechart-dash-rate">
                                <h2>$3,000</h2>
                                <p>revenue Sales</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
<script type="text/javascript">
  var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url().'public/admin/dashboard.js'  ?> "></script>
