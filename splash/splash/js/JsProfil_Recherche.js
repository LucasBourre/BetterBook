$(document).ready(function() {
			$(".pseudoClassement").unbind('click').click(function(){
			var pseudo1 = $(this).html();
			var url1="Profil_Recherche.php?pseudo="+pseudo1;
			url= url1.replace(/\s+/g, '');
			//var url=url1.replace('%20','');
		
			$.ajax({
                    type: "GET",
                    url: '/Profil_Recherche.php',
                    data: {pseudo:pseudo1},
                    success: function(data)
                    {

                   	 window.location=url;
                       
                    }
			});
		

			});
		});
		