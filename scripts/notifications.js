$(document).ready(function() {
  $("#all_guests").click(function() {
    $("input[name=single_email]").prop("checked", true);
  });

  $("#deselect_all").click(function() {
    $("input[name=single_email]").prop("checked", false);
  });

  function clearBulkSend() {
    $("#select_all").text("Notify Selected Users");
    $("#select_all").addClass("btn1");
    $("#select_all").css("background-color", "#05E5E5");
  }

  $(".email_button").click(function() {
    let subject = $("#notification__subject").val();
    let content = $("#notification__message").val();
    let host = $("#host").val();
    let errorMsg = $("#errorMsg");
    var id = $(this).attr("id");
    var action = $(this).data("action");
    var user_info = [];

    clearBulkSend();

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
          }
        });
      }
      $.ajax({
        url: "sendEmails.php",
        method: "POST",
        dataType: "text",
        data: { sendemail: 1, host: host, user_info: user_info },
        beforeSend: function(data) {
          $("#successMsg").html("Sending...");
        },
        success: function(data) {
          if (data === "Success") {
            errorMsg.empty();
            $("#successMsg").html(
              "Message(s) sent successfully! Click to send again."
            );
          } else {
            $("#successMsg").empty();
            if (id === "select_all") {
              errorMsg.html("Choose email(s) to send.");
              $("#select_all").text("Error. Click to try again.");
              $("#select_all").removeClass("btn1");
              $("#select_all").css("background-color", "red");
            } else {
              errorMsg.html(data);
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
