console.log('form user is running')
$('#form-add-user').validate(
  {
      rules:
      {
        kode_panitia:
        {
          required: true,
          minlength: 5
        },
        username:
        {
          required: true
        },
        nama_panitia:
        {
          required: true
        },
        password:
        {
          required: true,
          minlength: 6
        },
        akses:
        {
          required: true
        }
      },
      messages:
      {
        kode_panitia:
        {
          required: 'Kode panitia tidak boleh kosong',
          minlength: 'Masukan minimal 5 karakter'
        },
        username:
        {
          required: 'Username tidak boleh kosong'
        },
        nama_panitia: 'Nama Panitia tidak boleh kosong',
        password:
        {
          required: 'Password tidak boleh kosong',
          minlength: 'Password minimal 8 karakter'
        },
        akses:
        {
          required: 'Akses login harus di pilih'
        }
      },
      errorPlacement: function(error, element)
      {
        error.css('color','red');
        error.css('fontWeight', 'bold')
        error.insertAfter(element.parent());
      },
      submitHandler: function(form){
        $.ajax({
          url: `${BASE_URL}master/admin/User/adduser`,
          method: 'post',
          data: new FormData(form),
          contentType: false,
          processData: false,
          cache: false,
          async: false,
          success: function(data){
            var parse = JSON.parse(data);
            if(parse.code === 200){
              location.hash = '#/user';
              return mynotifications('success', 'top left', parse.msg);
            }else if(parse.code === 500) {
              return mynotifications('info', 'top left', parse.msg);
            }else{
              return mynotifications('info', 'top left', parse.msg);
            }
          }
        })
      }
  }
)


$('#form-edit-user').validate(
  {
    rules:
    {
      kode_panitia_edit:
      {
        required: true
      },
      nama_panitia_edit:
      {
        required: true
      },
      akses_edit:
      {
        required: true
      }
    },
    messages:
    {
      kode_panitia_edit:
      {
        required: 'Kode Panitia harus diisi'
      },
      nama_panitia_edit:
      {
          required: 'Nama Panitia harus diisi'
      },
      akses_edit:
      {
        required: 'Akses Harus diisi'
      }
    },
    errorPlacement: function(error, element){
      error.css('color','red');
      error.css('fontWeight','bold');
      error.insertAfter(element.parent() );
    },
    submitHandler: function(form){
      $.ajax({
        url: `${BASE_URL}master/admin/User/update`,
        method: 'post',
        data: new FormData(form),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data){
          var parse = JSON.parse(data);
          if(parse.code === 200){
            location.hash = '#/user';
            return mynotifications('success', 'top right', parse.msg);
          }else{
            return mynotifications('info', 'top right', parse.msg)
          }
        }
      })
    }
  }
)




function get_data()
{
  $.ajax({
    url: `${BASE_URL}master/admin/User/fetch_user/${PARAMS}`,
    method: 'post',
    dataType: 'json',
    success: function(data){
        $('#kode_panitia_edit').val(data[0].kode_panitia);
        $('#username_edit').val(data[0].username)
        $('#nama_panitia_edit').val(data[0].nama_panitia);
        $('#akses_edit').val(data[0].akses);
    }
  });
}


$(document).ready(function() {
  get_data();

  $('#show-password').on('click', function() {
      if($(this).is(':checked') ){
        $('#password').attr('type','text')
      }else{
        $('#password').attr('type','password')
      }
  })

});
