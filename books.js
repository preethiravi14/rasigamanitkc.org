
function myBookFunction(bookid,driveid){
  var username = getCookie("user");
  if (username != "") {
  $.ajax({
      url: "addDetails.php?bookid="+bookid+"&userid="+username,
      method: 'GET',
      type: 'json',
      success: function(data){
        window.location = "https://drive.google.com/open?id="+driveid;     
      }
    });
  } else {
    var modal = document.getElementById('myModal');
    modal.style.display = "block";
    var save = document.getElementById("save");
    save.onclick = function() {
      modal.style.display = "none";
      var myPhoneno = document.getElementById('password_textbox').value;
      console.log(" phone= "+myPhoneno);
      event.preventDefault();
      $.ajax({
        url: "searchForDb.php?phone="+myPhoneno,
        method: 'GET',
        type: 'json',
        success: function(data){
          console.log(data);
          if(data == 'success'){
            var username = getCookie("user");
            $.ajax({
                url: "addDetails.php?bookid="+bookid+"&userid="+username,
                method: 'GET',
                type: 'json',
                success: function(data){
                  window.location = "https://drive.google.com/open?id="+driveid;     
                }
              });

            //window.location.href = "http://rasigamanitkc.org/books1.html";
          }else{
            getPrompt(myPhoneno, driveid, bookid);
          }
        }
      }); 
    }
  }
}


function getPrompt(myPhoneno, id, bookid){
  var modal = document.getElementById('detailsModal');
  modal.style.display = "block";
  var save = document.getElementById("saveDetails");
  save.onclick = function() {
    modal.style.display = "none";
    var myName = document.getElementById('name').value;
    var myLocation = document.getElementById('location').value;
    var myEmail = document.getElementById('email').value;
    var otp = document.getElementById('otp').value;
    $.ajax({
      url: "saveToDb.php?email="+myEmail+"&name="+myName+"&location="+myLocation+"&phone="+myPhoneno+"&otp="+otp,
      method: 'GET',
      type: 'json',
      success: function(data){
        if(data == 'success'){
          var username = getCookie("user");
          $.ajax({
              url: "addDetails.php?bookid="+bookid+"&userid="+username,
              method: 'GET',
              type: 'json',
              success: function(data){
                window.location = "https://drive.google.com/open?id="+id;     
              }
            });
          //window.location.href = "http://rasigamanitkc.org/books1.html";
        }else{
          alert("Something went wrong. Please try again!");
          console.log("Something went wrong. Please try again!");
        }
      }
    });
  }
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

