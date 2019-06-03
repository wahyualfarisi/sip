console.log('form vaksin is running');


$('#form-add-vaksin').validate(
  {
    rules:
    {
      nama_imunisasi:
      {
        required: true
      },
      kriteria_usia:
      {
        required: true
      }
    },
    messages:
    {
      nama_imunisasi:
      {
        required: 'Nama imunisasi harus diisi'
      },
      kriteria_usia:
      {
        required: 'Kriterua Usia tidak boleh kosong'
      }
    },
    errorPlacement: function(error, element){
      error.css('color','red');
      error.css('fontWeight', 'bold');
      error.insertAfter(element.parent() );
    },
    submitHandler: function(form){
      $.ajax({
        url: `${BASE_URL}master/admin/Vaksin/addvaksin`,
        method: 'post',
        data: new FormData(form),
        contentType: false,
        processData: false,
        cache: false,
        async: false,
        success: function(data){
          var parser = JSON.parse(data);
          if(parser.code === 200){
            location.hash = '#/imunisasi';
            return mynotifications('success', 'top left', parser.msg);
          }else{
            return mynotifications('error', 'top left', parser.msg);
          }

        }
      })
    }
  }
);


$('#form-edit-vaksin').validate(
  {
    rules:
    {
      nama_imunisasi:
      {
        required: true
      },
      kriteria_usia:
      {
        required: true
      }
    },
    messages:
    {
      nama_imunisasi:
      {
        required: 'Nama imunisasi harus diisi'
      },
      kriteria_usia:
      {
        required: 'Kriterua Usia tidak boleh kosong'
      }
    },
    errorPlacement: function(error, element){
      error.css('color','red');
      error.css('fontWeight', 'bold');
      error.insertAfter(element.parent() );
    },
    submitHandler: function(form){
      $.ajax({
        url: `${BASE_URL}master/admin/Vaksin/updatevaksin`,
        method: 'post',
        data: new FormData(form),
        contentType: false,
        processData: false,
        cache: false,
        async: false,
        success: function(data){
          var parser = JSON.parse(data);
          if(parser.code === 200){
            location.hash = '#/imunisasi';
            return mynotifications('success', 'top left', parser.msg);
          }else{
            return mynotifications('error', 'top left', parser.msg);
          }

        }
      })
    }
  }
);
