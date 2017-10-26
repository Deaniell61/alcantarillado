

function openModal(url){
	$('#myModal').modal();
    $('#imagenver1 > source').attr('src',url);
	document.getElementById('imagenver1').load();
	$('#btnInsertarP33').attr('href',url)
	
}

function openModalF(url){
	$('#myModal').modal();
    $('#imagenver1').attr('src',url);
	$('#btnInsertarP33').attr('href',url)
	
}

$('#loader').modal();
