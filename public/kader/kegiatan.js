console.log('kegiatan is running');
load_kegiatan();

//fetch data kegiatan
function load_kegiatan()
{
  $.ajax({
    url: `${BASE_URL}master/kader/kegiatan/fetch`,
    method: 'get',
    dataType: 'json',
    success:function(data){
      var html = '', no = 1;
      if(data.length > 0){
        data.forEach(function(item) {
          html += `
            <tr>
              <td>${no++}</td>
              <td>${item.nama_kegiatan} </td>
              <td>${item.tanggal_kegiatan}</td>
              <td>${item.lokasi} </td>
              <td>${item.kode_panitia} </td>
              <td><button class="btn btn-danger btn-xs btn-delete" data-id="${item.no_kegiatan}"> Delete </button></td>
              <td><button class="btn btn-warning btn-xs btn-edit" data-id="${item.no_kegiatan}" data-nama_kegiatan="${item.nama_kegiatan}" data-tanggal_kegiatan="${item.tanggal_kegiatan}" data-lokasi="${item.lokasi}" > Edit </button></td>
            </tr>
          `;
        });
      }
      $('#show-kegiatan').html(html)
    }
  })
}



$(document).ready(function(){
  $('#show-kegiatan').on('click','.btn-delete', function() {
    var id = $(this).data('id');
    $('#targetID').val(id);
    $('#modalDeleteKegiatan').modal('show');
  });

  $('#form-delete-kegiatan').on('submit', function(e) {
    e.preventDefault();
    var confirm = $('#confirm').val();
    if($.trim(confirm) === "") return mynotifications('info','top left', 'Silahkan Konfirmasi sebelum di hapus');
    if(confirm !== 'confirm') return mynotifications('info','top left', 'Konfirmasi Tidak Sesuai');

    $.ajax({
      url: `${BASE_URL}master/kader/Kegiatan/delete`,
      method: 'post',
      data: new FormData(this),
      processData: false,
      contentType: false,
      cache: false,
      async: false,
      success: function(data){
        var parse = JSON.parse(data);
        if(parse.code === 200){
          $('#modalDeleteKegiatan').modal('hide');
          $('#confirm').val("")
          load_kegiatan();
          return mynotifications('success','top right', parse.msg);
        }else{
          return mynotifications('info', 'top right', parse.msg);
        }
      }
    })

  })


  $('#show-kegiatan').on('click','.btn-edit', function() {
    $('#no_kegiatan').val($(this).data('id'));
    $('#nama_kegiatan').val($(this).data('nama_kegiatan'));
    $('#tanggal_kegiatan').val($(this).data('tanggal_kegiatan'));
    $('#lokasi').val($(this).data('lokasi'));
    $('#modalEditKegiatan').modal('show')
  });


  $('#form-edit-kegiatan').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      url: `${BASE_URL}master/kader/Kegiatan/update`,
      method: 'post',
      data: new FormData(this),
      processData: false,
      contentType: false,
      cache: false,
      async: false,
      success: function(data){
        var parse = JSON.parse(data);
        if(parse.code === 200){
          $('#modalEditKegiatan').modal('hide')
          load_kegiatan();
          return mynotifications('success','top right', parse.msg);
        }else{
          return mynotifications('info','top right', parse.msg);
        }
      }
    })
  })

  $('#search__kegiatan').on('keyup', function() {
    if($(this).val() !== ""){

      $.ajax({
        url: `${BASE_URL}master/kader/kegiatan/fetch`,
        method: 'post',
        data: {query: $(this).val()},
        dataType: 'json',
        success: function(data){
          var html = '', no = 1;
          if(data.length > 0){
            data.forEach(function(item) {
              html += `
                <tr>
                  <td>${no++}</td>
                  <td>${item.nama_kegiatan} </td>
                  <td>${item.tanggal_kegiatan}</td>
                  <td>${item.lokasi} </td>
                  <td>${item.kode_panitia} </td>
                  <td><button class="btn btn-danger btn-xs btn-delete" data-id="${item.no_kegiatan}"> Delete </button></td>
                  <td><button class="btn btn-warning btn-xs btn-edit" data-id="${item.no_kegiatan}" data-nama_kegiatan="${item.nama_kegiatan}" data-tanggal_kegiatan="${item.tanggal_kegiatan}" data-lokasi="${item.lokasi}" > Edit </button></td>
                </tr>
              `;
            });
          }
          $('#show-kegiatan').html(html)
        }
      })


    }else{
      load_kegiatan()
    }
   
  })


})
