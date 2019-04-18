$(document).ready(function(){

    load_image_data();
    $("#edit_image_form").css("display","none");

    //show title & actions on photos
    $(".photo-sec").click(function(){
        $(".photo-info").slideDown("slow");
    });


    //photo list
    function load_image_data()
    {
        $.ajax({
            url:"listimages.php",
            method:"POST",
            success:function(data)
            {
                $('#image_table').html(data);
            }
        })
    }

    //upload photos
    $('#multiple_files').change(function(){
        var error = '';
        var dataform = new FormData();
        var files = $('#multiple_files')[0].files;
        if(files.length > 10)
        {
            error += 'Cannot upload more than 10 photos at a time.';
        }
        else
        {
            for(var i=0; i<files.length; i++)
            {
                var name = document.getElementById("multiple_files").files[i].name;
                var ext = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(ext,['gif','png','jpg','jpeg']) == -1)
                {
                    error += '<p>'+i+' invalid file</p>';
                }

                
                dataform.append('file[]',document.getElementById('multiple_files').files[i]);
            }
        }
        if(error == '')
        {
            $.ajax({
                url:"addimage.php",
                method:"POST",
                data:dataform,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function(){
                    $('#multiple_files_error').html('<br/><label class="text-primary">Uploading...</label>');
                },
                success:function(data){
                    $('#multiple_files_error').html('<br/><label class="text-success">Uploaded</label>');
                    load_image_data();
                }
            });
        }
        else
        {
            $('#multiple_files').val('');
            $('#multiple_files_error').html("<span class='text-danger'>"+error+"</span>");
            return false;
        }
    });


    //edit button
    $(document).on('click','.edit',function(){
        $("#edit_image_form").css("display","block");
        var id =$(this).attr("id");
        $.ajax({
            url:"edit.php",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data)
            {
                $('#imageModal').modal('show');
                $('#id').val(id);
                $('#title').val(data.title);
                $('#photo_name').val(data.photo_name);
            }
        })
    });

    //update image
    $('#edit_image_form').on('submit',function(event){
        event.preventDefault();
        if($('#photo_name').val() == '')
        {
            alert("Enter file name.");
        }
        else
        {
            $.ajax({
                url:"update.php",
                method:"POST",
                data:$('#edit_image_form').serialize(),
                success:function(data){
                    $('#imageModal').modal('hide');
                    load_image_data();
                }
            });
        }
    });

    //delete photos
    $(document).on('click', '.delete', function(){
        var id = $(this).attr("id");
        var photo_name = $(this).data("photo_name");
        if(confirm("Are you sure you want to remove it?"))
        {
            $.ajax({
                url:"delete.php",
                method:"POST",
                data:{id:id, photo_name:photo_name},
                success:function(data)
                {
                load_image_data();
                }
            });
        }
    }); 

});