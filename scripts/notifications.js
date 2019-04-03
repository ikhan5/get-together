$(document).ready(function() {
  $("#select-all").click(function() {
    $(".single_email").prop("selected", true);
  });

  $("#deselect-all").click(function() {
    $(".single_email").prop("selected", false);
  });

  $(".email_button").click(function() {
    let subject = $("#notification__subject").val();
    let content = $("#notification__message").val();
    let errorMsg = $("#errorMsg");
    var id = $(this).attr("id");
    var action = $(this).data("action");
    var user_info = [];

    $("#" + id).text("Send");
    $("#" + id).removeClass("btn-success");
    $("#" + id).addClass("btn-primary");

    $("#select_all").text("Notify Selected Users");
    $("#select_all").addClass("btn1");
    $("#select_all").css("background-color", "#05E5E5");

    if (subject == "" || content == "") {
      errorMsg.text("Enter all fields");
    } else {
      errorMsg.empty();
      if (action == "single") {
        user_info.push({
          email: $(this).data("email"),
          name: $(this).data("name"),
          event: $(this).data("event"),
          subject: subject,
          content: content
        });
      } else {
        $(".single_email").each(function() {
          if ($(this).prop("checked") == true) {
            user_info.push({
              email: $(this).data("email"),
              name: $(this).data("name"),
              event: $(this).data("event"),
              subject: subject,
              content: content
            });
          } else {
            errorMsg.html("Choose email(s) to send.");
          }
        });
      }
      $.ajax({
        url: "sendEmails.php",
        method: "POST",
        dataType: "text",
        data: { sendemail: 1, user_info: user_info },
        success: function(data) {
          if (data === "Success") {
            errorMsg.empty();
            if (id === "select_all") {
              $("#select_all").text("Sent");
              $("#select_all").removeClass("btn1");
              $("#select_all").css("background-color", "green");
            } else {
              $("#" + id).text("Sent");
              $("#" + id).addClass("btn-success");
            }
          } else {
            errorMsg.html("Choose email(s) to send.");
            if (id === "select_all") {
              $("#select_all").text("Error. Click to try again.");
              $("#select_all").removeClass("btn1");
              $("#select_all").css("background-color", "red");
            } else {
              $("#" + id).text("Error");
              $("#" + id).addClass("btn-danger");
            }
          }
          $("#" + id).attr("disabled", false);
        }
      });
    }
  });
});
