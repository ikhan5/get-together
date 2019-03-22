$.getJSON("getAllSongs.php", function(data) {
  $.each(data, function(index, value) {
    let song = `<tr class="song_info">
        <td class="add-song"><input type="checkbox" value=${
          value.song_id
        } name="songs"> </td>
        <td>${value.title}</td>
        <td>${value.artist}</td>
        <td>${value.length}</td></tr>`;
    $("tbody").append(song);
  });

  $("#addToPlaylist").submit(function(event) {
    event.preventDefault();
    let playlist_id = $("#pid").val();
    var songs_added = [];
    $.each($("input[name='songs']:checked"), function() {
      songs_added.push($(this).val());
    });

    $.ajax({
      type: "POST",
      url: "addSongsToPlaylist.php",
      data: {
        pid: playlist_id,
        songs: songs_added
      },
      success: function(data) {
        $(".confirmation").html("Song(s) added Successfully!");
      },
      error: function(data) {
        $(".confirmation").html("Problem adding songs, please try again!");
      }
    });
  });
});
