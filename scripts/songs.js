$.getJSON("getAllSongs.php", function(data) {
  $.each(data, function(index, value) {
    let song = `<tr>
        <td><input type="hidden" value="${value.song_id}" /></td>
        <td>${value.title}</td>
        <td>${value.artist}</td>
        <td>${value.length}</td>`;
  });
});
