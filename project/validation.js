function n(){
  var val_name= /^[A-Za-z]{2,20}$/;
  $name= document.getElementById('fname').value;


  if(!val_name.test($name)){
     alert("Name must be Alphabets only and should contain alleast 2 letter ");
     document.getElementById('fname').value='';
     $("#name").focus();
     return false;
   }
}
function ln(){
  var val_name= /^[A-Za-z]{1,20}$/;
  $name= document.getElementById('lname').value;


  if(!val_name.test($name)){
     alert("Name must be Alphabets only ");
     document.getElementById('lname').value='';
     $("#name").focus();
     return false;
   }
}
function tn(){
  var val_name= /^[A-Za-z]{2,20}$/;
  $name= document.getElementById('tname').value;


  if(!val_name.test($name)){
     alert("Name must be Alphabets only and should contain alleast 2 letter ");
     document.getElementById('tname').value='';
     $("#name").focus();
     return false;
   }
}

function p(){
  var val_phoneno= /^[0-9]{9,12}$/;
  $phoneno= document.getElementById('phone').value;


  if(!val_phoneno.test($phoneno)){
     alert("enter valid phoneno ");
     document.getElementById('phone').value='';
     $("#phoneno").focus();
     return false;
   }
}

function p1(){
  var val_phoneno= /^[0-9]{9,12}$/;
  $phoneno= document.getElementById('phone1').value;


  if(!val_phoneno.test($phoneno)){
     alert("enter valid phoneno ");
     document.getElementById('phone1').value='';
     $("#phoneno").focus();
     return false;
   }
}

function sc(){
  var val_s= /^[0-9]{1,3}$/;
  $s= document.getElementById('screen').value;


  if(!val_s.test($s)){
     alert("enter valid screen no ");
     document.getElementById('screen').value='';
     $("#s").focus();
     return false;
   }
   return true;
}


function u(){
  var val_username= /^[A-Za-z][A-Za-z0-9]{3,20}$/;
  $username= document.getElementById('username').value;


  if(!val_username.test($username)){
     alert("Enter valid Username");
     document.getElementById('username').value='';
     $("#username").focus();
     return false;
   }
}



function ps(){
  var val_password=  /^[A-Za-z]\w{5,14}$/;
  $password= document.getElementById('pass').value;


  if(!val_password.test($password)){
     alert("Enter valid password! first character must be a letter length");
     document.getElementById('pass').value='';
     $("#password").focus();
     return false;
   }
}





function em(){
  var val_email=  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  $email= document.getElementById('email').value;


  if(!val_email.test($email)){
     alert("Enter valid email");
     document.getElementById('email').value='';
     $("#emaild").focus();
     return false;
   }
}

function em1(){
  var val_email=  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  $email= document.getElementById('email1').value;


  if(!val_email.test($email)){
     alert("Enter valid email");
     document.getElementById('email1').value='';
     $("#emaild").focus();
     return false;
   }
}
function h(){
  var val_name= /^[A-Za-z]{2,20}$/;
  $name= document.getElementById('h1').value;


  if(!val_name.test($name)){
     alert("Name must be Alphabets only and should contain alleast 2 letter ");
     document.getElementById('h1').value='';
     $("#name").focus();
     return false;
   }
}
function ll(){
  var val_name= /^[A-Za-z]{2,20}$/;
  $name= document.getElementById('h2').value;


  if(!val_name.test($name)){
     alert("Name must be Alphabets only and should contain alleast 2 letter ");
     document.getElementById('h2').value='';
     $("#name").focus();
     return false;
   }
}
function l3(){
  var val_name= /^[A-Za-z]{2,20}$/;
  $name= document.getElementById('h3').value;


  if(!val_name.test($name)){
     alert("Name must be Alphabets only and should contain alleast 2 letter ");
     document.getElementById('h3').value='';
     $("#name").focus();
     return false;
   }
}
// wallet validation
function naa(){
  var val_na= /^[0-9]{2,8}$/;
  $na= document.getElementById('am').value;


  if(!val_na.test($na)){
     alert("enter valid amount ");
     document.getElementById('am').value='';
     $("#na").focus();
     return false;
   }
}
function na2(){
  var val_na= /^[0-9]{3}$/;
  $na= document.getElementById('cv').value;


  if(!val_na.test($na)){
     alert("please check your cvv no ");
     document.getElementById('cv').value='';
     $("#na").focus();
     return false;
   }
}
function na3(){
  var val_na= /^[0-9]{10}$/;
  $na= document.getElementById('cd').value;


  if(!val_na.test($na)){
     alert("please check your card no ");
     document.getElementById('cd').value='';
     $("#na").focus();
     return false;
   }
}