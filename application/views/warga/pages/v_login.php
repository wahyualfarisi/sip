<div id="blog-wrapper">
    <div class="blog-holder center-relative">

        <article id="post-1" class="blog-item-holder featured-post">
            <div class="entry-content relative">
                <div class="content-1170 center-relative">
                    <h2 class="entry-title">
                        <a href="#/login" style="text-decoration:none; color: #fff" class="site-title">Login</a>
                    </h2>
                    <div class="clear"></div>
                </div>
            </div>
        </article>

        <article id="post-2" class="blog-item-holder">
            <div class="entry-content relative">
                <div class="content-1170 center-relative">
                    <form id="form-login-warga" method="post">
                      <div class="form-group">
                        <label class="site-title">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Alamat Email">
                      </div>
                      <div class="form-group">
                        <label class="site-title">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
                      </div>
                      
                      <button type="submit" class="btn btn-danger btn-block" name="button">Login</button>
                    </form>
                    <div class="clear" ></div>
                </div>
            </div>
        </article>

        <div style="margin-top: 30px;">
          <p style="color: #fff">Belum punya akun ?  <a href="#/register" style="text-decoration: none; color: #fff">Daftar disini</a>  </p>
        </div>



    </div>
    <div class="clear"></div>
</div>

<div class="featured-image-holder">
    <div class="featured-post-image" style="background-image: url(<?= base_url().'assets/users/images/cover-1.png' ?>); background-size:cover;"></div>
</div>
<div class="clear"></div>
<script>
var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url('public/warga/login.js') ?> "></script>