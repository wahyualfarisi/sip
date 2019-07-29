

var UIWargaDetail = (function() {

    const getAge = (tgl_lahir) => {
        const today = new Date();
        const birthday = new Date(tgl_lahir);
       
        let year = 0
        if(today.getMonth() < birthday.getMonth() ){
          year = 1
        }else if( (today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate() ){
          year = 1
        }
        
        let age = today.getFullYear() - birthday.getFullYear() - year;
       
        if(age === 0){
          if( (today.getFullYear() === birthday.getFullYear()) && today.getMonth() === birthday.getMonth() ){
            console.log(today.getDate() - birthday.getDate() , ' - hari');
          }else{
            console.log('holla')
          }
        }else{
          console.log(age, ' tahun')
        }
      
        

    }


    return {
      retriveDetailWarga: function(data){
        
        var html = '';
        if(data.length > 0){
          data.forEach(function(item) {
              html += `
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 animated fadeInUp ">
                      <div class="user-profile-wrap shadow-reset">
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="row">
                                      <div class="col-lg-9">
                                          <div class="user-profile-content">
                                              <h2>${item.no_kk}</h2>
                                              <p class="profile-founder"><strong> Tanggal Terdaftar </strong>: ${item.tanggal_terdaftar} </strong>
                                              </p>
                                              <p class="profile-des"><strong>Alamat</strong> : ${item.alamat}</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-3">
                                  <div class="user-profile-social-list">
                                      <table class="table small m-b-xs">
                                          <tr>
                                            <th>Nama Ayah</th>
                                            <td>${item.nama_ayah}</td>
                                          </tr>
                                          <tr>
                                            <th>Nama Ibu</th>
                                            <td>${item.nama_ibu}</td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                              <div class="col-lg-3">
                                  <div class="analytics-sparkle-line user-profile-sparkline">
                                      <div class="analytics-content">
                                          <h5>Setting</h5>
                                          <button type="button" class="btn btn-custome btn-edit-warga" data-id="${item.no_kk}" data-email="${item.email}" data-nama_ayah="${item.nama_ayah}" data-nama_ibu="${item.nama_ibu}" data-password="${item.password}" data-alamat="${item.alamat}" data-no_telp="${item.no_telp}" name="button">Edit Warga</button>
                                          <button type="button" class="btn btn-danger btn-delete-warga" data-id="${item.no_kk}" name="button">Hapus Warga</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              `;
          });
        }else{
          html = 'tidak ada data'
        }
        $('#show-warga-detail').html(html);
      },

      retriveAnak: function(data){
        var html = '';
        html += `
          <div class="user-profile-about shadow-reset animated fadeInLeft">
               <h2>ANAK</h2>
               <button class="btn btn-custome btn-block btn-tambah-anak">Tambah Anak</button>
           </div>
        `;
        if(data.length > 0){
          data.forEach(function(item) {
            var out = '';
            var arrayUmur = item.umur.split(' ')
            if(arrayUmur[1] === 'Tahun') {
              out += arrayUmur[0] +' '+ arrayUmur[1];
            }else if(arrayUmur[1] === 'Bulan'){
              out += arrayUmur[0] +' '+ arrayUmur[1];
            }else if(arrayUmur[1] === 'Hari'){
              out += arrayUmur[0] +' '+ arrayUmur[1]
            }
            
            html += `
              <div class="widget-flot-bg shadow-reset mg-t-30 animated fadeInLeft">
                  <div class="admin-widget-flot-ch">
                      <h1>${item.nama_depan} ${item.nama_belakang}</h1>
                      <div style="margin-top: 30px;">
                        <p><strong> No.BPJS </strong>: ${item.no_bpjs}</p>
                        <p><strong> Jenis Kelamin </strong>: ${item.jenis_kelamin}</p>
                        <p><strong> Tanggal Lahir </strong>: ${item.tgl_lahir}</p>
                        <p><strong> Umur </strong>: ${out}</p>
                      </div>
                      <button class="btn btn-danger btn-xs btn-delete-anak" data-id="${item.no_bpjs}"> Hapus </button>
                      <button class="btn btn-warning btn-xs btn-edit-anak" data-id="${item.no_bpjs}" data-nama_depan="${item.nama_depan}" data-nama_blkg="${item.nama_belakang}" data-jenis_kelamin="${item.jenis_kelamin}" data-tgl_lahir="${item.tgl_lahir}"> Edit </button>
                  </div>
              </div>
            `;
          });
        }else{
          html = `
          <div class="user-profile-about shadow-reset animated fadeInLeft">
               <h2>ANAK</h2>
               <button class="btn btn-custome btn-block btn-tambah-anak">Tambah Anak</button>
           </div>
          `;
        }
        $('#show-anak').html(html);
      },
      getAge: (date) => getAge(date)



    }//end







})();



var SetupEventWargaDetail = (function(UI) {

    var load_warga = function(){
      $.ajax({
        url: `${BASE_URL}master/kader/Warga/get_detail_warga/${PARAMS}`,
        method: 'get',
        dataType: 'json',
        success: function(data){
          console.log(data)
          UI.retriveDetailWarga(data);
        }
      })
    }

    var load_anak = function(){
      $.ajax({
        url: `${BASE_URL}master/kader/Warga/get_anak/${PARAMS}`,
        method: 'get',
        dataType: 'json',
        success: function(data){
          console.log(data)
          UI.retriveAnak(data)
        }
      })
    }



    //modal show
    $('#show-anak').on('click', '.btn-tambah-anak', function(){
      $('#no_kk').val(PARAMS);
      $('#modalAddAnak').modal('show');
    })
    $('#show-anak').on('click', '.btn-delete-anak', function(){
      var id = $(this).data('id');
      $('#targetID').val(id);
      $('#modalDelete').modal('show')
    });
    $('#show-anak').on('click', '.btn-edit-anak', function() {
      $('#no_kk_edit').val(PARAMS);
      $('#no_bpjs_edit').val($(this).data('id'))
      $('#nama_depan_edit').val($(this).data('nama_depan') )
      $('#nama_belakang_edit').val($(this).data('nama_blkg') )
      $('#jenis_kelamin_edit').val($(this).data('jenis_kelamin') )
      $('#tgl_lahir_edit').val($(this).data('tgl_lahir'))
      $('#modalEditAnak').modal('show');
    });
    $('#show-warga-detail').on('click', '.btn-delete-warga', function(){
      var id = $(this).data('id')
      $('#targetIDWarga').val(id);
      $('#modalDeleteWarga').modal('show');
    })


    $('#form-add-anak').on('keypress','#no_bpjs', function(e) {
      if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) ){
        return false;
      }
    })
    //action form add anak-------------------------
    $('#form-add-anak').validate({
      rules:{
        no_bpjs: {
          required: true,
          maxlength: 13,
          minlength: 13
        },
        nama_depan: {
          required: true
        },
        jenis_kelamin:{
          required: true
        },
        tgl_lahir: {
          required: true
        }
      },
      messages:{
        no_bpjs:{
          required: 'No Bpjs tidak boleh kosong',
          minlength: 'No BPJS kurang dari 13 Digits'
        },
        nama_depan:{
          required: 'Nama Depan Tidak boleh kosong'
        },
        jenis_kelamin: {
          required: 'Jenis Kelamin harus di pilih'
        },
        tgl_lahir: {
          required: 'Tanggal Lahir Tidak Boleh Kosong'
        }
      },
      errorPlacement: function(error, element){
        error.css('color','red');
        error.css('fontWeight', 'bold');
        error.insertAfter(element.parent());
      },
      submitHandler: function(form){
        $.ajax({
          url: `${BASE_URL}master/kader/Anak/add`,
          method: 'post',
          data: new FormData(form),
          processData: false,
          contentType: false,
          cache: false,
          async: false,
          success: function(data){
            var parse = JSON.parse(data);
            if(parse.code === 200){
              $('#modalAddAnak').modal('hide');
              $('#form-add-anak')[0].reset();
              load_anak();
              return mynotifications('success','top right', parse.msg)
            }else{
              return mynotifications('info', 'top left', parse.msg)
            }
          }
        })
      }
    });
    //end action form-add-anak


    $('#form-edit-anak').validate({
      rules:{
        no_bpjs: {
          required: true,
          maxlength: 13,
          minlength: 13
        },
        nama_depan: {
          required: true
        },
        jenis_kelamin:{
          required: true
        }
      },
      messages:{
        no_bpjs:{
          required: 'No Bpjs tidak boleh kosong',
          minlength: 'No BPJS kurang dari 13 Digits'
        },
        nama_depan:{
          required: 'Nama Depan Tidak boleh kosong'
        },
        jenis_kelamin: {
          required: 'Jenis Kelamin harus di pilih'
        }
      },
      errorPlacement: function(error, element){
        error.css('color','red');
        error.css('fontWeight', 'bold');
        error.insertAfter(element.parent());
      },
      submitHandler: function(form){
        $.ajax({
          url: `${BASE_URL}master/kader/Anak/update`,
          method: 'post',
          data: new FormData(form),
          processData: false,
          contentType: false,
          cache: false,
          async: false,
          success: function(data){
            var parse = JSON.parse(data);
            if(parse.code === 200){
              load_anak();
              $('#modalEditAnak').modal('hide');
              return mynotifications('success','top right', parse.msg);
            }else{
              return mynotifications('info','top right', parse.msg);
            }
          }
        })
      }
    })

    //action form delete => anak
    $('#form-delete').on('submit', function(e) {
      e.preventDefault();
      var confirm = $('#confirm').val();
      if($.trim(confirm) === "") return mynotifications('info', 'top left', 'Silahkan Konfirmasi untuk menghapus');
      if(confirm !== 'confirm') return mynotifications('info','top left', 'Verifikasi gagal');

      $.ajax({
        url: `${BASE_URL}master/kader/Anak/delete`,
        method: 'post',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data){
          var parse = JSON.parse(data);
          if(parse.code === 200){
            $('#confirm').val('');
            $('#modalDelete').modal('hide');
            load_anak();
            return mynotifications('success','top right', parse.msg);
          }else{
            return mynotifications('info', 'top right', parse.msg);
          }
        }
      })
    });

    $('#form-delete-warga').on('submit', function(e){
      e.preventDefault();
      var confirm = $('#confirm_warga').val();
      if($.trim(confirm) === "") return mynotifications('info', 'top left', 'Silahkan Konfirmasi untuk menghapus');
      if(confirm !== 'confirm') return mynotifications('info','top left', 'Verifikasi gagal');

      $.ajax({
        url: `${BASE_URL}master/kader/Warga/delete`,
        method: 'post',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success:function(data){
          var parse = JSON.parse(data);
          if(parse.code === 200){
            $('#modalDeleteWarga').modal('hide')
            $('#confirm_warga').val('')
            location.hash = '#/listwarga';
            return mynotifications('success', 'top right', parse.msg)
          }else{
            return mynotifications('info', 'top right', parse.msg)
          }
        }
      })
    })

    $('#show-warga-detail').on('click', '.btn-edit-warga', function() {
      var id = $(this).data('id')
      var email = $(this).data('email')
      var nama_ayah = $(this).data('nama_ayah')
      var nama_ibu = $(this).data('nama_ibu')
      var password = $(this).data('password')
      var alamat = $(this).data('alamat')
      var no_telp = $(this).data('no_telp')
      $('.no_kk_edit').val(id)
      $('#email_warga_edit').val(email)
      $('#nama_ayah_edit').val(nama_ayah)
      $('#nama_ibu_edit').val(nama_ibu)
      $('#password_edit').val(password)
      $('#alamat_edit').val(alamat)
      $('#no_telp_edit').val(no_telp)
      $('#modalEditWarga').modal('show')
    })

    $('#form-edit-warga').validate({
      rules : {
        email: {
          required: true,
          email: true
        },
        nama_ibu: {
          required: true
        },
        password: {
          required: true
        },
        alamat: {
          required: true
        },
        no_telp: {
          required: true
        }
      },
      messages: {
        email: {
          required: 'Email Tidak Boleh Kosong',
          email: 'Email Tidak Valid'
        },
        nama_ibu: {
          required: 'Nama Ibu Tidak Boleh Kosong'
        },
        password: {
          required: 'password tidak boleh kosong'
        },
        alamat: {
          required: 'ALamat Tidak Boleh Kosong'
        },
        no_telp: {
          required: 'No Telp Tidak Boleh Kosong'
        }
      },
      errorPlacement: function (error, element){
        error.css('color','red')
        error.insertAfter(element)
      },
      submitHandler: function(form){
        $.ajax({
          url: `${BASE_URL}master/kader/Warga/update`,
          method: 'post',
          data: new FormData(form),
          processData: false,
          contentType: false,
          async: false,
          cache: false,
          success: function(data){
            var parse = JSON.parse(data);
            if(parse.code === 200){
              load_warga()
              load_anak()
              $('#modalEditWarga').modal('hide')
              return mynotifications('success', 'top right', parse.msg)
            }
          }
        })
      }
    })






    return {
      init: function(){
        load_warga()
        load_anak()
      }
    }


})(UIWargaDetail);

$(document).ready(function() {
  SetupEventWargaDetail.init();
})
