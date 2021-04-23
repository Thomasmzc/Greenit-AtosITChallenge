$(document).ready(function(){
    $('.gotosign').click(function(){
        $ip = "<?php echo $_GET['ip']; ?>";
        console.log($ip);
        $.ajax({
            url: "includes/traitement_POST_verifAnswer.php",
            type: 'post',
            dataType: "json",
            data: {
                ip: $ip
            },
            success: function(json) {
               $.each(json, function(index, value){
                if(value == "200"){
                    displaySuccess(value);
                }
                else if(value == "405"){
                     displayErrors(value);
                }
                else if(value == "401"){
                     displayErrors(value);
                }
               });
            }
        });
    });
});