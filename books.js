function myBookFunction(){

var myPhoneno = prompt("Please enter your registered number: ","");
console.log("&phone="+myPhoneno);
xhttp = new XMLHttpRequest();
xhttp.open("GET", "searchForDB.php?phone="+myPhoneno ,true);
xhttp.send();

}

function getPrompt(){
  var myName = prompt("Name Here:","");
  var myEmail = prompt("Email Here:","");
  var myLocation = prompt("Location Here:",""); 
  var myPhoneno = prompt("phoneno Here:","");
  console.log(myEmail+"&name="+myName+"&location="+myLocation+"&phone="+myPhoneno);
  xhttp = new XMLHttpRequest();
  xhttp.open("GET", "saveToDb.php?email="+myEmail+"&name="+myName+"&location="+myLocation+"&phone="+myPhoneno ,true);
  xhttp.send();

  alert("thank you "+ myEmail+"&name="+myName+"&location="+myLocation+"&phone="+myPhoneno);
}