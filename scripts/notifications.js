$("#select-all").click(function() {
  $("#notifications__guests option").prop("selected", true);
});

$("#deselect-all").click(function() {
  $("#notifications__guests option").prop("selected", false);
});
