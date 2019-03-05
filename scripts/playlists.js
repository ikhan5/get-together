$(document).ready(function () {
    $(".sortable").sortable();

    $('.playlist__info').click(function () {
        if ($('#songs').css('visibility') == 'hidden')
            $('#songs').css('visibility', 'visible');
        else
            $('#songs').css('visibility', 'hidden');
    });


    $(".playlist-page__create").click(function () {
        $("#createPlaylist").toggle();
    });

    $(".close").click(function(){
        $("#createPlaylist").hide();
    });

});