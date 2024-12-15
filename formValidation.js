function loginFormvalidation() {
    const email = document.forms["myform"]["email"].value;
    const password = document.forms["myform"]["pass"].value;
var mail;
var pass;
if (email === "" && password === ""){
    mail='*Enter your email';
       
    document.getElementById('email').innerHTML=mail;
    document.getElementById('email').style.color='red';
    pass='*Enter your password';
    document.getElementById('pass').innerHTML=pass;
    document.getElementById('pass').style.color='red';
    return false;
}
    if (email === "") {
        mail='*Enter your email';
       
        document.getElementById('email').innerHTML=mail;
        document.getElementById('email').style.color='red';

        return false;
    }
    if (password === "") {
      
         pass='*Enter your password';
        document.getElementById('pass').innerHTML=pass;
        document.getElementById('pass').style.color='red';
        return false;
    }

    return true; 
}
function signupFormvalidation() {
    const email = document.forms["signupform"]["email"].value;
    const firstName = document.forms["signupform"]["name"].value;
    const password = document.forms["signupform"]["password"].value;
    const confirmPassword = document.forms["signupform"]["confirmpass"].value;
    var mail;
var pass;
var confirmpass;
var name;
    if (email === "" && password === "" && firstName === ""  ){
        mail='*Enter your email';
        document.getElementById('email').innerHTML=mail;
        document.getElementById('email').style.color='red';
        pass='*Enter your password';
        document.getElementById('pass').innerHTML=pass;
        document.getElementById('pass').style.color='red';
        name='*Enter your name';
        document.getElementById('name').innerHTML=name;
        document.getElementById('name').style.color='red';
   
        return false;
    }
    if(email==="" && firstName === ""){
        mail='*Enter your email';
        document.getElementById('email').innerHTML=mail;
        document.getElementById('email').style.color='red';
        name='*Enter your name';
        document.getElementById('name').innerHTML=name;
        document.getElementById('name').style.color='red';
    }
    if( password === "" && firstName === "" ){
        pass='*Enter your password';
        document.getElementById('pass').innerHTML=pass;
        document.getElementById('pass').style.color='red';
        name='*Enter your name';
        document.getElementById('name').innerHTML=name;
        document.getElementById('name').style.color='red';
    }
    if(email === "" && password === "" ){
        mail='*Enter your email';
        document.getElementById('email').innerHTML=mail;
        document.getElementById('email').style.color='red';
        pass='*Enter your password';
        document.getElementById('pass').innerHTML=pass;
        document.getElementById('pass').style.color='red';
    }
    if (email === "") {
   
        mail='*Enter your email';
        document.getElementById('email').innerHTML=mail;
        document.getElementById('email').style.color='red';
        return false;
    }
    if (password === "") {
      
        pass='*Enter your password';
        document.getElementById('pass').innerHTML=pass;
        document.getElementById('pass').style.color='red';
        return false;
    }
    if (confirmPassword === "") {
     
        p='*Confirm your password'
        document.getElementById('confirmpass').innerHTML=p;
        document.getElementById('confirmpass').style.color='red';
        return false;
    }
    if (confirmPassword!=password && password!="") {
   
        confirmpass='*password does not match';
        document.getElementById('confirmpass').innerHTML=confirmpass;
        document.getElementById('confirmpass').style.color='red';
        return false;
    }
    if (firstName === "") {
   
        name='*Enter your name';
        document.getElementById('name').innerHTML=name;
        document.getElementById('name').style.color='red';
        return false;
    }

    return true; 
}
