
var setupEventListener = (function() {

    $('#form-add-warga').validate(
      {
        rules:
        {
          no_kk:
          {
            required: true,
            minlength: 16,
            maxlength: 16
          },
          nama_ayah:
          {
            required: true
          },
          nama_ibu:
          {
            required: true
          },
          no_telp:
          {
            required: true
          },
          alamat:
          {
            required: true
          },
          no_bpjs:
          {
            required: true
          }
        },
        messages:
        {
          no_kk:
          {
            required: 'No KK harus di isi',
            minlength: 'No KK Kurang dari 16 Angka'
          },
          nama_ayah:
          {
            required: 'Nama Ayah Tidak boleh kosong'
          },
          nama_ibu:
          {
            required: 'Nama Ibu Tidak Boleh Kosong'
          },
          no_telp:
          {
            required: 'No Telp Tidak Boleh Kosong'
          },
          alamat:
          {
            required: 'Alamat Tidak Boleh Kosong'
          },
          no_bpjs:
          {
            required: 'No BPJS harus diisi'
          }
        },
        errorPlacement: function(error, element){
          error.css('color','red');
          error.css('fontWeight', 'bold');
          error.insertAfter(element);
        },
        submitHandler: function(form){
          var error = []

          $('.item_bpjs').each(function() {
            if($(this).val() == ''){
              error.push('Kolom BPJS belum diisi');
              return false;
            }
          });

          $('.item_nama_depan').each(function() {
            if($(this).val() == ''){
              error.push('Kolom Nama Depan belum diisi');
              return false;
            }
          });

          $('.item_nama_blkg').each(function() {
            if($(this).val() == ''){
              error.push('Kolom Nama Belakang belum diisi');
              return false;
            }
          });

          $('.item_umur').each(function() {
            if($(this).val() == ''){
              error.push('Kolom Umur belum diisi');
              return false;
            }
          });

          $('.item_jk').each(function() {
            if($(this).val() == ''){
              error.push('Kolom JK belum diisi');
              return false;
            }
          });




          if(error.length > 0){
            error.forEach(function(item) {
              return mynotifications('info','top right', item);
            })
          }else{
            $.ajax({
              url: `${BASE_URL}master/kader/Warga/addData`,
              method: 'post',
              data: new FormData(form),
              processData: false,
              contentType: false,
              cache: false,
              async: false,
              success: function(data){
                console.log(JSON.parse(data))
              }
            });
          }

        }
      }
    );






    $('.btn-add-anak').on('click', function() {
      var html = '';
      html += '<tr>';
              html += '<td><input type="text" name="no_bpjs[]" class="form-control item_bpjs" /> </td>';
              html += '<td><input type="text" name="nama_depan[]" class="form-control item_nama_depan" /> </td>';
              html += '<td><input type="text" name="nama_blkg[]" class="form-control item_nama_blkg "  /> </td>';
              html += '<td><input type="text" name="umur[]" class="form-control item_umur"  /> </td>';
              html += '<td>';
                    html += '<select name="jk[]" class="form-control item_jk">';
                          html += '<option value=""> </option>';
                          html += '<option value="P"> Perempuan </option>';
                          html += '<option value="L"> Laki - Laki</option>';
                    html += '</select>';
              html += '</td>';
              html += '<td><button type="button" name="remove" class="btn btn-custome btn-remove"><span class="fa fa-minus"></span></button></td>';
      html += '</tr>';
      $('#item_anak').append(html);
    });

    $('#item_anak').on('click', '.btn-remove', function(){
      $(this).closest('tr').remove();
    });


    //event keypress
    $('#form-add-warga').on('keypress','#no_kk', function(e) {
      if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57 ) ){
        return false;
      }
    });
    $('#form-add-warga').on('keypress','#no_telp', function(e) {
      if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57 ) ){
        return false;
      }
    });
    $('#item_anak').on('keypress', '.item_bpjs', function(e) {
      if(e.which != 0 && e.which != 0 && (e.which < 48 || e.which > 57 ) ){
        return false;
      }
    });
    $('#item_anak').on('keypress', '.item_umur', function(e) {
      if(e.which != 0 && e.which != 0 && (e.which < 48 || e.which > 57 ) ){
        return false;
      }
    });


    return {
      init: function(){
        console.log('event is fired ');
      }
    }
})();








$(document).ready(function() {
  setupEventListener.init();

});
