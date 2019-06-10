console.log('jadwal is running');


function load_jadwal()
{
    $.ajax({
        url: `${BASE_URL}master/warga/Anak/fetch_jadwal`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            var html = '';
            if(data.length > 0){
                data.forEach(function(item) {
                    html += `
                    <div style="margin-top: 20px;" >
                        <div class="card" style="width: 28rem;">
                            <div class="card-body">
                                <h5 class="card-title">${item.nama_kegiatan}</h5>
                                <p class="card-text">${item.lokasi}</p>
                            </div>
                        </div>
                    </div>
                `;
                })
                
            }
            $('#show-jadwal').html(html);
        }
    })
}


$(document).ready(function(){
    load_jadwal();
})