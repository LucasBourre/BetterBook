

$(document).ready(function() {
$('button.followButton').on('click', function(e){
    e.preventDefault();
    var action="accc";
    $button = $(this);
    var cote = $(this).html();
    
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


    if ($(action).val() != 0) {
$.post("fonctions/PhpFollow.php", {
    variable:action
}, function(data) {
    if (data != "") {}
});
}

    //alert(action);
    //$.cookie("action",action,{ expires: 5 }); // set cookie

    
    /*
    $.ajax({
                    type: "POST",
                    url: 'fonctions/PhpFollow.php',
                    data:{action:action},
                    success: function(data)
                    {
                        alert(action) ; 
                                            
                    }
            });
      */      
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



