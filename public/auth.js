console.log('auth is running');

var domLogin = {
  formLogin: '#form-login-panitia',
  checkPassword: '#show-password',
  fieldPassword: '#password'
}


$(domLogin.formLogin).validate(
  {
    rules:
    {
      username:
      {
        required: true
      },
      password:
      {
        required: true
      },
      akses:
      {
        required: true
      }
    },
    messages:
    {
      username:
      {
        required: 'Masukan Username anda'
      },
      password:
      {
        required: 'Silahkan masukan kata sandi anda'
      },
      akses:
      {
        required: 'Silahkan pilih akses login'
      }
    },
    errorPlacement: function(error, element)
    {
      error.css('color','black');
      error.css('fontWeight','bold');
      error.insertAfter(element.parent());
    },
    submitHandler: function(form){
      $.ajax({
        url: `${BASE_URL}/Login/process`,
        method: 'POST',
        data: new FormData(form),
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(data){
          var parse = JSON.parse(data)
          if(parse.code === 400){
            return mynotifications('error','top right', `${parse.msg}`);
          }else if(parse.code === 200){
            mynotifications('success','top right', parse.msg);
            setTimeout(function() {
              return location.href = `${BASE_URL}${parse.location}/#/dashboard`;
            }, 3500)
          }
        }
      });
    }
  }
)




$(document).ready(function() {
  $(domLogin.checkPassword).click(function() {
    if($(this).is(':checked')){
      $(domLogin.fieldPassword).attr('type','text');
      // mynotifications('error','top left', 'yeaay');
    }else{
      $(domLogin.fieldPassword).attr('type','password');
    }
  });
});
