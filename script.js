var form;
var firstname;
var lastname;
var organization ;var email;var mobile;
var firstnameValue;
var lastnameValue;
var organizationValue ;var emailValue;var mobileValue;let small;let formControl;let emailReg;let mobileReg;
addEventListener("submit",(e) =>{
 form= document.getElementById("form");
 firstname= document.getElementById("firstname");

 lastname= document.getElementById("lastname");
 organization = document.getElementById("org");
 email = document.getElementById("email");
 mobile = document.getElementById("mobile");
    ;
    e.preventDefault();
    checkInputs();
});

function checkInputs(){
     firstnameValue = firstname.value.trim();
     lastnameValue = lastname.value.trim();
     organizationValue = organization.value.trim();
     emailValue = email.value.trim();
     mobileValue = mobile.value.trim();
     
// firstname validation
    if(firstnameValue ===""){
        setErrorFor(firstname,"please enter firstname");
    }
    else if(firstname.selectionEnd <4){
        setErrorFor(firstname,"field is atleast four charcters");
    }
    else{
        setSuccessFor(firstname);
    }

// organization validation 
    if(organizationValue===""){
        setSuccessFor(organization);
    }
    else if(organization.selectionEnd <4){
        setErrorFor(organization,"field is atleast four charcters");
    }
    else{
        setSuccessFor(organization);
    }
// email validation 
   emailReg =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(emailValue===""){
        setErrorFor(email,"please enter email");
    }
    
    else if(emailReg.test(emailValue) === false){
        setErrorFor(email,"Please enter a valid email");
    }
    else{
        setSuccessFor(email);
    }

//mobile validation
  mobileReg= /^\d{10}$/
  if(mobileValue ===""){
    setErrorFor(mobile,"please enter mobile");
  }
 
  else if(!mobileReg.test(mobileValue)){
    setErrorFor(mobile,"Please enter a valid number");
  }
  else{
    setSuccessFor(mobile);
  }


// setError function
    function setErrorFor(input,message){
         formControl = input.parentElement;
         
         small = formControl.querySelector('small');

        small.innerText = message;
          

    }
    function setSuccessFor(input){
        formControl = input.parentElement;
        small = formControl.querySelector('small');

        small.innerText = null;
    }
}