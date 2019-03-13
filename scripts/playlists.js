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

$(".close").click(function () {
    $("#createPlaylist").hide();
});

$(".create_button").click(function () {
    $("#createPlaylist").hide();
});

//Search Bar
$(".searchbar__input").on("keyup", function () {
    var playlist = $(this).val().toLowerCase();
    $("#playlists").filter(function () {
        $(this).toggle($(this), text().toLowerCase().indexOf(playlist) > -1)
    });
});

//set active playlist
$('.playlist').bind('click', function() {
    $('.active').removeClass('active');
    $(this).addClass('active');
});

$('.playlist').on('click', function () {
    $(this).find('.to-songs').toggle(150);
});

//Playlist create
$('#createplaylist').submit(function (event) {
    event.preventDefault();
    var title = $("#playlist__name").val();
    var playlist = "";
    playlist = `<div class="playlist">
    <div class="playlist_item playlist__image">
            <i class="fas fa-headphones-alt playlist-icon"></i>
        </div>
        <a href="#" class="playlist_item playlist__info">
            <div>
                <p class="playlist__title">${title}</p>
                <p class="playlist__song-count">Number of Songs</p>
            </div>
        </a>
        <div class="playlist_item playlist__options"> <a href="#"><i class="fas fa-ellipsis-v"></i></a>
            <div class="playlist__options_dropdown">
                <a href="#">Edit Playlist</a>
                <a href="#">Delete Playlist</a>
            </div>
        </div>
        <i class="fas fa-arrow-circle-right to-songs"></i>
    </div>`;
    $("#playlists").append(playlist);
});

//playlist options
$('.playlist__options').on('click', function () {
    $(this).find('.playlist__options_dropdown').toggle(150);
});

$('.song__options').on('click', function () {
    $(this).find('.song__options_dropdown').toggle(150);
});