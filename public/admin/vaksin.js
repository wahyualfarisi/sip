console.log('vaksin is running');

var vaksinDOM = {
  showData: '#show-imunisasi'
}

var UIVaksin = (function() {
  return {
    retrieveData: function(data){
        var html, no;
        no = 1;
        if(data.length > 0){
          data.forEach(function(item) {
            html += `
              <tr>
                  <td>${no++}</td>
                  <td>${item.nama_imunisasi}</td>
                  <td>${item.dari_usia}</td>
                  <td>${item.sampai_usia}</td>
                  <td><button class="btn btn-custome btn-delete" data-id="${item.id_imunisasi}"><span class="fa fa-trash"></span></button></td>
                  <td><a href="#/editvaksin/${item.id_imunisasi}" class="btn btn-custome btn-edit"><span class="fa fa-pencil"></span></a></td>
              </tr>

            `;
          });
        }
        $(vaksinDOM.showData).html(html);
    }
  }
})();



var vaksinEventListener = (function(UI) {
  $(vaksinDOM.showData).on('click','.btn-delete', function() {
    var id = $(this).data('id');
    $('#modalDeleteVaksin').modal('show');
    $('#targetID').val(id);
  });

  $('#form-delete-vaksin').on('submit', function(e) {
    e.preventDefault();
    var confirmVal = $('#confirm').val();
    if($.trim(confirmVal) === "") return mynotifications('error','top right', `Silahkan konfirmasi untuk melanjutkan`);
    if(confirmVal !== 'confirm') return mynotifications('warning','top right', `Konfirmasi tidak sesuai`);
    $.ajax({
      url: `${BASE_URL}master/admin/Vaksin/deletevaksin`,
      method: 'post',
      data: new FormData(this),
      processData: false,
      contentType: false,
      cache: false,
      async: false,
      success: function(data){
        var parse;
        parse = JSON.parse(data);
        if(parse.code === 200){
          $('#confirm').val("")
          $('#modalDeleteVaksin').modal('hide');
          vaksinEventListener.loadVaksin();
          return mynotifications('success','top right', `${parse.msg}`);
        }else{
          $('#confirm').val("")
          $('#modalDeleteVaksin').modal('hide');
          return mynotifications('error','top right', `${parse.msg}`);
        }
      }
    })
  });



  return {
    loadVaksin: function(){
      $.ajax({
        url: `${BASE_URL}master/admin/Vaksin/getAll`,
        method: 'get',
        dataType: 'json',
        success: function(data){
          UI.retrieveData(data);
        }
      })
    }
  }


})(UIVaksin)


$(document).ready(function() {
  vaksinEventListener.loadVaksin();
});
