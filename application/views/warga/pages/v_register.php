<article>
    <div class="content-1070 center-relative entry-content">
        <div class="content-900 center-relative">
            <h1 class="entry-title" style="color: #fff">Registrasi</h1>
            <div class="one_half" style="margin-top: 70px; color: #fff">
                Tahap Registrasi Dilakukan dengan memverifikasi Email yang akan dikirim kan kepada email terdaftar<p></p>
                <br>
                <p>Pastikan email yang terdaftar masih aktif dan valid, agar proses pengiriman kode tidak terhambat</p>

                <p>Setelah Verifikasi berhasil, silahkan login dengan email yang terdaftar, lalu lengkapi data</p>
                <br>
                <div class="montserrat">
                    <span style="color: #adadad;">Oleh :</span>&nbsp;Posyandu, Kelurahan Slipi<br>
                </div>
                <p>Sudah punya akun ? <a href="#/login" style="text-decoration: none; color: #fff">Login disini</a> </p>
            </div>
            <div class="one_half last" style="margin-top: 70px;">
                <div class="">
                    <form id="form-registrasi-warga" method="post">
                        <div class="form-group" >
                            <label class="site-title">Email</label>
                            <input id="email" type="email" class="form-control" name="email" placeholder="Masukan Email">
                        </div>

                        <div class="form-group">
                            <label class="site-title">No. Kartu Keluarga</label>
                             <input id="no_kk" type="text" maxlength="16" name="no_kk" class="form-control"  placeholder="Masukan No. KK ">
                        </div>
                        <div class="form-group">
                            <label class="site-title">Password</label>
                            <input id="password" type="password" name="password" class="form-control showpassword" placeholder="Masukan Password">
                        </div>   

                        <div class="form-group">
                            <label class="site-title">Konfirmasi Password</label>
                            <input id="password2" type="password" name="password2" class="form-control showpassword" placeholder="Konfirmasi Password">
                        </div>

                        

                        <div style="margin-top: 30px;" >
                            <p><input type="submit" id="btn-submit-register" class="btn btn-danger btn-block" value="Registrasi" /> </p>
                        </div>
                    </form>

                     <form id="form-verifikasi-akun" method="post">
                         <div class="form-group" >
                              <input type="text" name="code_confirmation" class="form-control" id="code_confirmation" placeholder="Masukan Verifikasi Kode">
                         </div>
                        <div style="margin-top: 30px;" >
                            <p><input type="submit" class="btn btn-danger btn-block" value="Konfirmasi" /> </p>
                        </div>
                    </form>

                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</article>
<script>
 var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url('public/warga/form/registrasi.js') ?>"></script>