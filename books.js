function myBookFunction(id){
  var myPhoneno = prompt("Please enter your number: ","");
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


function getPrompt(myPhoneno, id){
  var otp = prompt("otp Here:","");
  var myName = prompt("Name Here:","");
  var myEmail = prompt("Email Here:","");
  var myLocation = prompt("Location Here:",""); 
  $.ajax({
    url: "saveToDb.php?email="+myEmail+"&name="+myName+"&location="+myLocation+"&phone="+myPhoneno+"&otp="+otp,
    method: 'GET',
    type: 'json',
    success: function(data){
      console.log(data);
      if(data == 'success'){
        window.location.href = 'https://drive.google.com/open?id='+id;
    }else{
        console.log("Something went wrong. Please try again!");
    }
  }
});
}

