		var obj = [];
		var int =1;
		$(document).ready(function() {
		$(".bouton,.boutonX,.bouton2").on('click', function(){
			if( $(this).hasClass("active")) {
  				$(this).toggleClass("active");
  				var cote = parseFloat ($( this ).val());
  				var cotetotal = parseFloat($("#cotetotal").html())
			 	if (cotetotal == 0 ) {cotetotal =1;}
			 	$("#cotetotal").html(cotetotal /cote);

			 	var elem = $(this).closest("p").attr("value");
				index = obj.findIndex(x => x.idmatch==elem);
				if (index > -1) {
    				obj.splice(index, 1);
				}
			 	
  			}
  			else{
  				var elem = $(this).closest("p").attr("value");
				index = obj.findIndex(x => x.idmatch==elem);
					if (index > -1) {
    					alert("erreur vous avez deja choisi ce match");
					}
					else{
			 	
  				

  				$(this).toggleClass("active");
		 		var cote = parseFloat ($( this ).val());
		 		var cotetotal = parseFloat($("#cotetotal").html())
			 	if (cotetotal == 0 ) {cotetotal =1;}
			 	$("#cotetotal").html(cotetotal *cote);
			 	
			 	obj.push({
       			 idmatch: $(this).closest("p").attr("value"),
       			 resultat: $(this).closest("span").attr("value"),
        		 cote: $(this).val() 
    			});
    			
			
			 	
			 }
			}
			 
			
				});
		});


		$(document).ready(function() {
			$("#BoutonValider").unbind('click').click(function(){
	
			dataString = obj ; 
			var jsonString = JSON.stringify(dataString);
			var cote = $("#cotetotal").html();
			var mise = $('input[name="mise"]').val();
			$.ajax({
                    type: "POST",
                    url: 'Php/PhpPronostiqueInserer.php',
                    data: {cote:cote , mise:mise, pari:jsonString},
                    success: function(data)
                    {
                    	alert("Merci d'avoir parier")
                       location.reload();
                    }
			});

			});
		});
		





















