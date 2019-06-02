console.log('dasdhboard is running');

var DashboardListener = (function() {

  return {
    loadAllUser: function(){
      $.ajax({
        url: `${BASE_URL}master/admin/User/getuser`,
        method: 'post',
        dataType: 'json',
        success: function(data){
          var html = '', no;
          no = 1;
          if(data.length > 0)
          {
            data.forEach(function(item) {
              html += `
                  <li>
                    <span class="message-serial message-cl-one">${no++}</span>
                    <span class="message-info">${item.nama_panitia}</span>
                    <span class="message-time">${item.akses}</span>
                  </li>
              `;
            });
          }

          $('.message-list-menu').html(html);
        }
      })
    }
  }


})();


$(document).ready(function() {
  DashboardListener.loadAllUser();
});
