inputFile.onchange = evt => {
    const [file] = inputFile.files
    if (file) {
      imgThumb.src = URL.createObjectURL(file)
    }
  };

$('.edit').click(function(){
  const id = $(this).data('id')

  $.ajax({
    url: 'http://10.200.98.28:8000/menu/'+id,
    dataType : 'json',
    success:function(data){
    $('#name').val(data.menu.nama_menu);
    $('#jenis').val(data.menu.jenis);
    $('#stock').val(data.menu.stok);
    $('#harga').val(data.menu.harga);
    $('#id_menu').val(data.menu.id_menu);
    $('#imgThumbEdit').attr('src','storage/'+data.menu.gambar)
    }
  })

});

$('.proses').click(function(){
  if ($(this).hasClass('proses')) {
    $(this).html('Selesaikan Pesanan')
    $(this).removeClass('proses')
    $(this).addClass('selesaikan')
    
  } else if ($(this).hasClass('selesaikan')) {
    const id = $(this).data('id')
    $(this).attr('href','deletePesanan/'+id)
  }
})