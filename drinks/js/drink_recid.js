$('.recPost').submit( function (event){
        event.preventDefault();
            
        let rec_id = $(this).find('.rec_id').val();
            
         $.post('drinks_function/addrecdrink.php',
             { rec_id: rec_id },
             function(data){
                location.reload();
                console.log(data);
             }
         )

       })