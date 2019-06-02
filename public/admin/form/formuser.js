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
            }else{
              return mynotifications('error', 'top left', parse.msg);
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
      alert('submited');
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
        $('#nama_panitia_edit').val(data[0].nama_panitia);
        $('#akses_edit').val(data[0].akses);
    }
  });
}


$(document).ready(function() {
  get_data();

});
