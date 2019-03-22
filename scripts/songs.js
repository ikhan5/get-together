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
    var songs_added = [];
    $.each($("input[name='songs']:checked"), function() {
      songs_added.push($(this).val());
    });
    console.log(songs_added);
    $.ajax({
      url: "addSongsToPlaylist.php",
      method: "POST",
      dataType: "text",
      data: {
        addsongs: 1,
        songs_added: songs_added
      }
    });
  });
});
