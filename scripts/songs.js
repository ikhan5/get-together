$.getJSON("getAllSongs.php", function(data) {
  $.each(data, function(index, value) {
    let song = `<tr class="song_info">
        <td class="add-song"><i id=${
          value.song_id
        } class="fas fa-check-circle not-selected"></i><input class="song_id" type="hidden" value="${
      value.song_id
    }"/></td>
        <td>${value.title}</td>
        <td>${value.artist}</td>
        <td>${value.length}</td></tr>`;
    $("tbody").append(song);
  });

  $(".song_info").click(function() {
    $(this)
      .find("i")
      .toggleClass("selected")
      .toggleClass("not-selected");

    let songs = $(this).find("id");
  });

  $("#addform").submit(function(event) {
    event.preventDefault();
    let pid = $("#pid").val();

    $.ajax({
      url: "addSongToPlaylist.php",
      method: "POST",
      dataType: "text",
      data: {
        addsongs: 1,
        songs: songs_added,
        playlist_id: pid
      },
      success: function(response) {}
    });
  });
});
