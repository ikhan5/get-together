$(document).ready(function() {
  $("#all_guests").click(function() {
    $("input:checkbox").prop("checked", this.checked);
  });

  function clearAllButtonStylings() {
    $("#select_all").text("Notify Selected Users");
    $("#select_all").addClass("btn1");
    $("#select_all").css("background-color", "#05E5E5");

    $(".single_buttons").text("Send");
    $(".single_buttons").removeClass("btn-success");
    $(".single_buttons").removeClass("btn-error");
    $(".single_buttons").addClass("btn-primary");
  }

  function clearAllSingleSend() {
    $(".single_buttons").text("Send");
    $(".single_buttons").removeClass("btn-success");
    $(".single_buttons").removeClass("btn-error");
    $(".single_buttons").addClass("btn-primary");
  }

  function clearBulkSend() {
    $("#select_all").text("Notify Selected Users");
    $("#select_all").addClass("btn1");
    $("#select_all").css("background-color", "#05E5E5");
  }

  function clearSingleSend(id) {
    $("#" + id).text("Send");
    $("#" + id).removeClass("btn-success");
    $("#" + id).addClass("btn-primary");
  }

  $("#deselect_all").click(function() {
    clearAllSingleSend();
  });

  $(".email_button").click(function() {
    let subject = $("#notification__subject").val();
    let content = $("#notification__message").val();
    let errorMsg = $("#errorMsg");
    var id = $(this).attr("id");
    var action = $(this).data("action");
    var user_info = [];

    clearSingleSend(id);
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
        data: { sendemail: 1, user_info: user_info },
        success: function(data) {
          if (data === "Success") {
            errorMsg.empty();
            if (id === "select_all") {
              $("#select_all").text("Sent. Click to send again!");
              $("#select_all").removeClass("btn1");
              $("#select_all").css("background-color", "green");
            } else {
              $("#" + id).text("Sent");
              $("#" + id).addClass("btn-success");
            }
          } else {
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
