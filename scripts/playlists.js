/*Gets all the playlists from the Get_Together Database
add appends each playlist to the playlists container in the
playlists.php file.
*/
$.getJSON("getAllPlaylists.php", function(data) {
  $.each(data, function(index, value) {
    let playlist = `<div class="playlist">
                    <input type="hidden" name="playlistID" class="playlistID" value=${
                      value.playlist_id
                    }>
                    <div class="playlist_item playlist__image">
                        <i class="fas fa-headphones-alt playlist-icon"></i>
                    </div>
                    <a href="javascript:void(0);" class="playlist_item playlist__info">
                    <div>
                        <p class="playlist__title">${value.name}</p>
                        <p class="playlist__song-count">Number of Songs</p>
                    </div>
                    </a>
                    <div class="playlist_item playlist__options"> <a href="javascript:void(0);"><i class="fas fa-ellipsis-v"></i></a>
                        <div class="playlist__options_dropdown">
                        
                        <form action='editplaylist.php' method='post'>
                        <input type="hidden" name="playlistID" class="playlistID" value=${
                          value.playlist_id
                        }>
                        <input class="nostyle" type='submit' value='Edit Playlist' name='editplaylist' /></form>
                        
                        <form action='deleteplaylist.php' method='post'>
                        <input type="hidden" name="playlistID" class="playlistID" value=${
                          value.playlist_id
                        }>
                        <input class="nostyle" type='submit' value='Delete Playlist' name='deleteplaylist' /></form>
                        
                        </div>
                    </div>
                </div> `;
    $("#playlists").append(playlist);
  });
  /*The ID is hidden within the playlist
for use when the user clicks on a playlist, they are able to see
the songs that respective playlist contains*/
  $(".playlist").click(function() {
    $("#songs").empty();
    var id = $(this)
      .find(".playlistID")
      .val();
    $("#songs").append(
      `<form method="get" action="addSongToPlaylist.php">
          <input type="hidden" name="pid" value=${id} />
          <button type="submit" class='btn'>Add Songs</button>
        </form>`
    );
    /*Gets all the songs from the Get_Together Database
add appends each song to the songs container in the
playlists.php file.
*/
    $.ajax({
      url: "getSongsByID.php",
      method: "POST",
      dataType: "json",
      data: {
        getsongs: 1,
        playlist_id: id
      },
      success: function(response) {
        var data = response;
        $.each(data, function(index, value) {
          let song = `<div class="song" data-playlist=${id} data-index="${
            value.song_id
          }" data-position="${value.position}">
          <div class="song_item song__image">
              <i class="fas fa-headphones-alt playlist-icon"></i>
          </div>
          <a href="javascript:void(0);" class="song_item song__info">
              <div>
                  <p class="song__title">${value.title}</p>
                  <p class="song__artist">${value.artist}</p>
                  <p class="song__time">${value.length}</p>
              </div>
          </a>
          <div class="song_item song__options"> <a href="javascript:void(0);"><i class="fas fa-ellipsis-v"></i></a>
              <div class="song__options_dropdown">
                  <a href="javascript:void(0);">Song Info</a>
                  <a href="javascript:void(0);">Remove Song</a>
              </div>
          </div>
      </div>`;
          $("#songs").append(song);
        });

        $(".song__options").on("click", function() {
          $(this)
            .find(".song__options_dropdown")
            .toggle(150);
        });
      },
      error: function(response) {
        console.log(response);
      }
    });
  }); //end of playlist click event

  /*Makes the songs sortable, i.e can be dragged around to change the order of the playlist*/
  $(".sortable").sortable({
    update: function(event, ui) {
      $(this)
        .children()
        .each(function(index) {
          if ($(this).attr("data-position") != index + 1) {
            $(this)
              .attr("data-position", index + 1)
              .addClass("updated");
          }
        });

      newPosition(
        $(this)
          .children()
          .attr("data-playlist")
      );
    }
  });

  $(".playlist__info").click(function() {});

  $(".playlist-page__create").on("click", function() {
    $("#playlistForm").toggle();
  });

  $(".close").on("click", function() {
    $("#playlistForm").hide();
  });

  $(".create_button").on("click", function() {
    $("#playlistForm").hide();
  });

  //Search Bar
  // $(".searchbar__input").on("keyup", function() {
  //   var playlist = $(this)
  //     .val()
  //     .toLowerCase();
  //   $("#playlists").filter(function() {
  //     $(this).toggle(
  //       $(this),
  //       text()
  //         .toLowerCase()
  //         .indexOf(playlist) > -1
  //     );
  //   });
  // });

  //set active playlist
  $(".playlist").bind("click", function() {
    $(".active").removeClass("active");
    $(this).addClass("active");
  });

  $(".playlist").on("click", function() {
    $(this)
      .find(".to-songs")
      .toggle(150);
  });

  //playlist options
  $(".playlist__options").on("click", function(event) {
    $(this)
      .find(".playlist__options_dropdown")
      .toggle(150);
  });
});

$("#playlistForm").on("submit", function(event) {
  event.preventDefault();
  var name = $("#playlist__name").val();
  var desc = $("#playlist__desc").val();
  var today = new Date();
  var date =
    today.getFullYear() + "-" + (today.getMonth() + 1) + "-" + today.getDate();
  var event = 2;

  $.ajax({
    url: "addplaylist.php",
    method: "POST",
    dataType: "json",
    data: {
      name: name,
      desc: desc,
      date: date,
      event: event
    },
    success: function(response) {
      console.log(response);
    },
    error: function(response) {
      console.log(response);
    }
  });
});

function newPosition(playlist_id) {
  var positions = [];
  $(".updated").each(function() {
    positions.push([
      playlist_id,
      $(this).attr("data-index"), //song_id
      $(this).attr("data-position")
    ]);
    $(this).removeClass("updated");
  });

  $.ajax({
    url: "editSongOrder.php",
    method: "POST",
    dataType: "text",
    data: {
      update: 1,
      positions: positions
    },
    success: function(response) {},
    error: function(response) {}
  });
}
