var  trasDato;
trasDato = 5;

    $.ajax
    ({
        type:"POST",
        url:"../app/core/controlador/clientesControlador.php",
        data:'trasDato=' + trasDato,
        success: function(resp)
        {

            $('#resultado').append(resp);
           
            $('[id^=carousel-selector-]').click(function () {
                 var id_selector = $(this).attr("id");
                 try {
                     var id = /-(\d+)$/.exec(id_selector)[1];
                    // console.log(id_selector, id);
                     jQuery('#myCarousel').carousel(parseInt(id));
                 } catch (e) {
                     console.log('Regex failed!', e);
                 }
             });
                 // When the carousel slides, auto update the text
                 $('#myCarousel').on('slid.bs.carousel', function (e) {
                             var id = $('.item.active').data('slide-number');
                         $('#carousel-text').html($('#slide-content-'+id).html());
                 });
                $('#loader').modal('hide');
         
        }  
    });
jQuery(document).ready(function($) {

        
   
		   $('#myCarousel').carousel({
				   interval: 5000
		   });
	

		   
            
   });
