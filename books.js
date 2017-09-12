
function myBookFunction(id){
  var modal = document.getElementById('myModal');
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
      modal.style.display = "none";
  }
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
        if(data == 'success'){
          window.location.href = 'https://drive.google.com/open?id='+id;
        }else{
          getPrompt(myPhoneno, id);
        }
      }
    }); 
  }
}


function getPrompt(myPhoneno, id){
  var modal = document.getElementById('detailsModal');
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() {
      modal.style.display = "none";
  }
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
        console.log(data);
        if(data == 'success'){
          window.location.href = 'https://drive.google.com/open?id='+id;
        }else{
          alert("Something went wrong. Please try again!");
          console.log("Something went wrong. Please try again!");
        }
      }
    });
  }
}

