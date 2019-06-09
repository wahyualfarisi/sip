<article>
    <div class="content-1070 center-relative entry-content">
        <div class="content-900 center-relative">
            <h1 class="entry-title">Registrasi</h1>
            <div class="one_half" style="margin-top: 70px;">
                Tahap Registrasi Dilakukan dengan memverifikasi Email yang akan dikirim kan kepada email terdaftar<p></p>
                <br>
                <p>Pastikan email yang terdaftar masih aktif dan valid, agar proses pengiriman kode tidak terhambat</p>

                <p>Setelah Verifikasi berhasil, silahkan login dengan email yang terdaftar, lalu lengkapi data</p>
                <br>
                <div class="montserrat">
                    <span style="color: #adadad;">Oleh :</span>&nbsp;Posyandu, Kelurahan Slipi<br>
                </div>
            </div>
            <div class="one_half last" style="margin-top: 70px;">
                <div class="contact-form">
                    <form id="form-registrasi-warga" method="post">
                        <p><input id="email" type="email" name="email" placeholder="Masukan Email"></p>
                        <p><input id="no_kk" type="text" maxlength="16" name="no_kk"  placeholder="Masukan No. KK "></p>
                        <p><input id="password" type="password" name="password" placeholder="Masukan Password"></p>
                        <p><input id="password2" type="password" name="password2" placeholder="Konfirmasi Password"></p>
                        <div style="margin-top: 30px;" >
                            <p><input type="submit" value="Registrasi" /> </p>
                        </div>
                    </form>

                     <form id="form-verifikasi-akun" method="post">
                        <p><input type="text" name="code_confirmation" id="code_confirmation" placeholder="Masukan Verifikasi Kode"></p>
                        <div style="margin-top: 30px;" >
                            <p><input type="submit" value="Konfirmasi" /> </p>
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