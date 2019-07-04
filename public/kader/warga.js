console.log('warga is running');



load_data();
function load_data(query)
{
  $.ajax({
    url: `${BASE_URL}master/kader/Warga/fetch`,
    method: 'post',
    data: {query: query},
    success: function(data){
      $('#warga-result').html(data)
    }
  })
}

$('#search').keyup(function() {
  var search = $(this).val();
  if(search !== ''){
    load_data(search);
  }else{
    load_data();
  }
});

$('#warga-result').on('click', '.btn-detail-warga', function() {
  alert('cliked ')
})
