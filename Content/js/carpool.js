"use strict";
window.onload = function() {
  let userid = getCookie('userid');
  let username = getCookie('username');
  const chatmsg = document.getElementById('chat-display');
  
  const loc = window.location;
  const event_id = parseInt(/id=\d+/.exec(loc).toString().split('=')[1]);
  const filename = 'carpoolchat_n' + event_id.toString().padStart(5, '0') + '.xml';

  var xhr = new XMLHttpRequest();

  if(!xhr) {
    alert('Problem creating XML HTTP request');
    return false;
  }

  xhr.onreadystatechange = function(){
    try {
      if (xhr.readyState === xhr.DONE) {
        if (xhr.status === 200) {
          const doc = xhr.responseXML;
          var chat_nodes = doc.getElementsByTagName('chat');
          var old_date = new Date(1990, 1, 1);
          for (var i = 0; i < chat_nodes.length; i++){
            var c = chat_nodes[i].children[0].textContent;
            var d = parseInt(c.split('/')[0]);
            var m = parseInt(c.split('/')[1]) - 1;
            var y = parseInt(c.split('/')[2]);
            var curr_date = new Date(y, m, d);
            var date;
            if(new Date() == curr_date){
              date = 'Today';
            } else {
              date = curr_date.toDateString();
              var dd = date.split(' ');
              date = dd[0] + ' - ' + dd[1] + ' ' + dd[2] + ', ' + dd[3];
            }
            if (old_date.toDateString() !== curr_date.toDateString()){
              old_date = curr_date;
              chatmsg.innerHTML += "<p class='text-center chatmsg-date'>" + date + "</p>";
            }
            
            var uname_node = chat_nodes[i].children[2].textContent;
            var uname_node = uname_node.split(' ')[0][0].toUpperCase() + uname_node.split(' ')[0].substr(1) + ' ' + uname_node.split(' ').pop()[0].toUpperCase();
            console.log(uname_node);
            var msg_node = chat_nodes[i].children[3].textContent;
            var uid_attribute = chat_nodes[i].children[2].getAttribute('userId');
            if (userid == uid_attribute){
              chatmsg.innerHTML += "<div class='d-flex justify-content-end align-items-start flex-row mb-3'>"+
                        "<div class='col-md-8 px-2'><div class='p-2 chatmsg-chat'>" + msg_node + "</div></div>" +
                        "<div class='col-md-2 px-2'><div class='p-2 chatmsg-user'>" + uname_node + "</div></div>"+
                         "</div>";
            } else {
              chatmsg.innerHTML += "<div class='d-flex justify-content-start align-items-start flex-row mb-3'>"+
                        "<div class='col-md-2 px-2'><div class='p-2 chatmsg-user-other'>" + uname_node + "</div></div>"+
                        "<div class='col-md-8 px-2'><div class='p-2 chatmsg-chat-other'>" + msg_node + "</div></div>" + "</div>";
            }
          }

        } else {
          console.log('Connection was not successful');
        }
      }
    } catch (error) {
      console.log(error);
    }
  }

  xhr.open('POST', 'chats/' + filename, true);
  xhr.send();

  
}

function getCookie(name) {
  var name = name + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var cookieArray = decodedCookie.split(';');
  for(var i = 0; i < cookieArray.length; i++) {
    var c = cookieArray[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}