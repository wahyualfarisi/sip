console.log('form kegiatan is running')

$('#form-add-kegiatan').validate({
  rules:
  {
    nama_kegiatan:
    {
      required: true
    },
    tanggal_kegiatan:
    {
      required: true
    },
    lokasi:
    {
      required: true
    }

  },
  messages:
  {
    nama_kegiatan:
    {
      required: 'Nama Kegiatan tidak boleh kosong'
    },
    tanggal_kegiatan:
    {
      required: 'Tanggal Kegiatan tidak boleh kosong'
    },
    lokasi:
    {
      required: 'Lokasi Tidak Boleh Kosong'
    }
  },
  errorPlacement: function(error, element){
    error.css('color','red')
    error.css('fontWeight','bold')
    error.insertAfter(element);
  },
  submitHandler: function(form){
    $.ajax({
      url: `${BASE_URL}master/kader/Kegiatan/add`,
      method: 'post',
      data: new FormData(form),
      processData: false,
      contentType: false,
      cache: false,
      async: false,
      success: function(data){
        var parse = JSON.parse(data);
        if(parse.code === 200){
          location.hash = '#/jadwalkegiatan'
          return mynotifications('success','top right', parse.msg )
        }
      }
    })
  }
})
