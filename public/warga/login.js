console.log('login is running');

$('#form-login-warga').validate(
    {
        rules:
        {
            email: 
            {
                required: true,
                email: true
            },
            password:
            {
                required: true
            }
        },
        messages:
        {
            email: 
            {
                required: 'Email Tidak Boleh Kosong',
                email: 'Email Tidak Valid'
            },
            password:
            {
                required: 'Password Tidak Boleh Kosong'
            }
        },
        errorPlacement: function(error, element){
            error.css('color','red')
            error.css('fontWeight','bold')
            error.insertAfter(element)
        },
        submitHandler: function(form){
            $.ajax({
                url: `${BASE_URL}master/warga/Akun/login`,
                method: 'post',
                data: new FormData(form),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data){
                    var parse = JSON.parse(data);
                    if(parse.code === 200){
                        alert(parse.msg);
                    }else{
                        alert(parse.msg)
                    }
                }
            })
        }
    }
)