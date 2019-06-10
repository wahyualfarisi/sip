console.log('form profile is running');


$('#form-update-warga').validate(
    {
        rules:
        {
            email:
            {
                required: true,
                email: true
            },
            nama_ayah:
            {
                required: true
            },
            nama_ibu:
            {
                required: true
            },
            alamat:
            {
                required: true
            },
            no_telp:
            {
                required: true
            }
        },
        messages:
        {
            email:
            {
                required: 'Email tidak boleh kosong',
                email: 'Email tidak valid'
            },
            nama_ayah:
            {
                required: 'Nama Ayah Tidak boleh kosong'
            },
            nama_ibu:
            {
                required: 'Nama Ibu tidak boleh kosong'
            },
            alamat:
            {
                required: 'Alamat Tidak Boleh Kosong'
            },
            no_telp:
            {
                required: 'No Telp Tidak Boleh kosong'
            }
        },
        errorPlacement: function(error, element){
            error.css('color','red');
            error.css('fontWeight','bold');
            error.insertAfter(element)
        },
        submitHandler: function(form){
            $.ajax({
                url: `${BASE_URL}master/warga/Akun/updateprofile`,
                method: 'post',
                data: new FormData(form),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data){
                   var parse = JSON.parse(data);
                   if(parse.code === 200){
                       localStorage.clear();
                       $.notify(parse.msg, 'success');
                       location.hash = '#/dashboard';
                   }else{
                       $.notify(parse.msg, 'info');
                   }
                }
            })
        }
    }
)