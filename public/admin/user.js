var userDom = {
  formAdd: '#form-add-user',
  showData: '#show-user',
  modalUserDelete: '#modalUserDelete',
  formDelete: '#form-delete-user',
  targetID: '#targetID',
  modalEdit: '#modalEditDelete',
}

class User {
  constructor(kode_panitia, name, password, akses)
  {
    this.kode_panitia = kode_panitia;
    this.name = name;
    this.password = password;
    this.akses = akses;
  }

}


var userEventListener = (function() {

    var loadUser = function(){
      $.ajax({
        url: `${BASE_URL}master/admin/User/getuser`,
        method: 'post',
        dataType: 'json',
        beforeSend: function(){
              $(userDom.showData).html('loading ...');
        },
        success: function(data){
          var html,no;
          no = 1;
          if(data.length > 0)
          {
            data.forEach(function(item) {
              html += `
                <tr>
                  <td>${no++}</td>
                  <td>${item.kode_panitia}</td>
                  <td>${item.nama_panitia}</td>
                  <td>${item.username}</td>
                  <td>${item.akses}</td>
                  <td>${item.login_terakhir}</td>
                  <td><button class="btn btn-custome btn-sm btn-delete" data-id="${item.kode_panitia}" > <span class="fa fa-trash"></span> </button> </td>
                  <td><a href="#/edituser/${item.kode_panitia} " class="btn btn-custome btn-sm btn-edit"
                       >
                       <span class="fa fa-pencil"></span> </a>
                  </td>
                </tr>
              `;
            })

          }
          $(userDom.showData).html(html);
        }
      });
    }

    //action delete user
    $(userDom.showData).on('click', '.btn-delete', function() {
      var targetID = $(this).data('id');
      $(userDom.modalUserDelete).modal('show');
      $(userDom.targetID).val(targetID)

    });
    $(userDom.formDelete).on('submit', function(e) {
      e.preventDefault()
      var confirmVal = $('#confirm').val();
      if($.trim(confirmVal) === "") return mynotifications('error','top right', `Silahkan konfirmasi untuk melanjutkan`);
      if(confirmVal !== 'confirm') return mynotifications('warning','top right', `Konfirmasi tidak sesuai`);
      $.ajax({
        url: `${BASE_URL}master/admin/User/deleteUser`,
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
            $(userDom.modalUserDelete).modal('hide');
            loadUser()
            return mynotifications('success','top right', `${parse.msg}`);
          }else{
            $('#confirm').val("")
            $(userDom.modalUserDelete).modal('hide');
            return mynotifications('error','top right', `${parse.msg}`);
          }
        }
      })
    });


    // action edit user

    return {
      init: function(){
        console.log('event is fired !')
        loadUser();
      }
    }
})();


userEventListener.init();
