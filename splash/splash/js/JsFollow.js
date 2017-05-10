/*		$("#buttonFollow").unbind('click').click(function(){
        var action="";
    	if($(this).attr('data-following') == 'false'){
        	$(this).attr('data-following', 'true');
        	$(this).text('Unfollow');
            action = "Follow";
    	}else if($(this).attr('data-following') == 'true'){
        	$(this).attr('data-following', 'false');
        	$(this).text('Follow');
            action = "Unfollow";
    	}

    

    		$.ajax({
                    type: "POST",
                    url: 'fonctions/PhpFollow.php',
                    data: {action:action},
                    success: function(data)
                    {
                    	alert(action) ; 
                        window.location="/fonctions/PhpFollow.php";                     
                    }
			});
	});
});
*/

$(document).ready(function() {
$('button.followButton').on('click', function(e){
    var action="accc";
    e.preventDefault();
    $button = $(this);
    
    if($button.hasClass('following')){
        
        //$.ajax(); Do Unfollow
        
        $button.removeClass('following');
        $button.removeClass('unfollow');
        $button.text('Follow');
        action = "Unfollow";
    } else {
        
        // $.ajax(); Do Follow
        
        $button.addClass('following');
        $button.text('Following');
        action = "Follow";
    }

    $.ajax({
                    type: "POST",
                    url: 'fonctions/PhpFollow.php',
                    data: {action:action},
                    success: function(data)
                    {
                        alert(action) ; 
                                            
                    }
            });
    });
});

$(document).ready(function() {
$('button.followButton').hover(function(){
     $button = $(this);
    if($button.hasClass('following')){
        $button.addClass('unfollow');
        $button.text('Unfollow');
    }
}, function(){
    if($button.hasClass('following')){
        $button.removeClass('unfollow');
        $button.text('Following');
    }
});

});