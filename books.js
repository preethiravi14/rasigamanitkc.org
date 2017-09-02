
function myBookFunction(){
  var myPhoneno = prompt("Please enter your number: ","");
  console.log(" phone= "+myPhoneno);
  $.ajax({
    url: "searchForDb.php?phone="+myPhoneno,
    method: 'GET',
    type: 'json',
    success: function(data){
      if(data == 'success'){
        console.log("success");
      }else{
        console.log("Error on query!");
        getPrompt(myPhoneno);
      }
    }
  });
}

function auth(){
  var value = "; " + document.cookie;
  var parts = value.split("; PHPSESSID=");
  if (parts.length == 2){
   return parts.pop().split(";").shift();
  }else{
    myBookFunction();
  }
}

function getPrompt(myPhoneno){
  var myName = prompt("Name Here:","");
  var myEmail = prompt("Email Here:","");
  var myLocation = prompt("Location Here:",""); 
  var otp = prompt("otp Here:","");
  console.log("email= "+ myEmail+" name= "+myName+" location= "+myLocation+" phone= "+myPhoneno+" otp= "+otp);
  $.ajax({
    url: "saveToDb.php?email="+myEmail+"&name="+myName+"&location="+myLocation+"&phone="+myPhoneno+"&otp="+otp,
    method: 'GET',
    type: 'json',
    success: function(data){
      if(data == 'Success'){
        console.log("Thank you for subscribing again!");
        //location.href = "books1.html";
        return parts.pop().split(";").shift();
    }else{
        console.log("Error on query!");
        getPrompt(myPhoneno);

    }
  }
});
  alert("thank you the email= "+ myEmail+" name= "+myName+" location= "+myLocation+" phone= "+myPhoneno);
}