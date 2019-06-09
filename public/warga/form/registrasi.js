console.log('registrasi is running ');

$('#form-registrasi-warga').validate(
    {
        rules:
        {
            email: 
            {
                required: true,
                email: true
            },
            no_kk:
            {
                required: true,
                minlength: 16
            },
            password:
            {
                required: true,
                minlength: 5
            },
            password2:
            {
                required: true,
                minlength: 5
            }
        },
        messages:
        {
            email:
            {
                required: 'Email tidak boleh kosong',
                email: 'Silahkan masukan email yang valid'
            },
            no_kk:
            {
                required: 'No KK tidak boleh kosong',
                minlength: 'No KK Kurang dari 16 digits'
            },
            password:
            {
                required: 'Password tidak boleh kosong',
                minlength: 'Minimal Password 5 Karakter'
            },
            password2:
            {
                required: 'Konfirmasi password tidak boleh kosong'
            }

        },
        errorPlacement: function(error,element){
            error.css('color','red');
            error.css('fontWeight','bold')
            error.insertAfter(element);
        },
        submitHandler: function(form){
            var password = $('#password').val();
            var confirm  = $('#password2').val();
            if(password !== confirm){
                alert('Password tidak sama');
            }else{
                $.ajax({
                    url: `${BASE_URL}master/warga/Akun/registrasi`,
                    method: 'post',
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success:function(data){
                        var parse = JSON.parse(data);
                        localStorage.setItem('codeVerification', JSON.stringify(parse) );
                        if(parse.code === 200){
                            $('#form-verifikasi-akun').css('display','block');
                            $('#form-registrasi-warga').css('display','none');
                        }else{
                            alert(parse.msg)
                        }
                    }
                })
            }

           
        }
    }
)

$(document).ready(function() {
    $('#form-verifikasi-akun').css('display','none');

    $('#form-registrasi-warga').on('keypress','#no_kk', function(e) {
        if(e.which != 8 && e.which !=0 && (e.which < 48 || e.which > 57) ){
            return false
        }
    })

    $('#form-verifikasi-akun').on('submit', function(e) {
        e.preventDefault();
        var storage = localStorage.getItem('codeVerification');
        var parse = JSON.parse(storage);
        var inputCode = $('#code_confirmation').val();
        if(inputCode === parse.verifikasiCode.toString()){
            var newdata = {
                no_kk: parse.data.no_kk,
                email: parse.data.email,
                password: parse.data.password
            }
            $.ajax({
                url: `${BASE_URL}master/warga/Akun/simpanWarga`,
                method: 'post',
                data: newdata,
                success: function(data){
                    var parse = JSON.parse(data);
                    if(parse.code === 200){
                        alert('Verfikasi Berhasil');
                        location.hash = '#/login'
                    }else{
                        alert('Terjadi Masalah');
                    }
                }
            })
        }else{
            alert('kode konfirmasi salah')
        }
      
    })


});