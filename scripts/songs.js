$.getJSON("getAllSongs.php", function(data) {
  $.each(data, function(index, value) {
    let song = `<tr>
        <td class="add-song"><i class="fas fa-check not-selected"></i><input class="song_id" type="hidden" value="${
          value.song_id
        }"/></td>
        <td>${value.title}</td>
        <td>${value.artist}</td>
        <td>${value.length}</td>`;
    $("tbody").append(song);
  });
  $(".add-song").click(function() {
    $(this)
      .find("i")
      .toggleClass("selected")
      .toggleClass("not-selected");

    let id = $(this)
      .find(".song_id")
      .val();

    $.ajax({
      url: "addSongToPlaylist.php",
      method: "POST",
      dataType: "text",
      data: {
        getsongs: 1,
        playlist_id: id
      },
      success: function(response) {}
    });
  });
});
