
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS & Javascript -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>QuickChat</title>
    <style>
  
    </style>
</head>
<body>
    
<!-- Image and text -->
<section class="bg-light p-3">

    
  
</section>

<section class="bg-light p-3">
    <div class="container">
        <div class="row align-items justify">
       
            <div class="col-md ">

                <h1 class="m-3"> QuickChat</h1>
                <div class="m-2">
                    <p> 
                        Chat With Thousands of Friends world wide.
                    </p>
                </div>
                
                <div style="width:70%;">
                    <h3 class="text-info p-1 text-center">Log In</h3>

                    <form name="login" action="./log_in.php" onsubmit="return validateForm()" method="post">      
                        <div class="form-group p-3 m-1">
                            <input type="text" class="form-control" name ="username" id="username" placeholder="Username" ;>
                        </div>

                        <div class="form-group p-3 m-1">
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                        </div>
                        <button type="submit"  name="submit" class="btn btn-primary" style="font-size: 2em; width: 100%; margin: 1em 0 1em 0;">Log In</button>
                        <div>

                           <button type="button" class="btn btn-success btn-lg text-info " data-bs-toggle="modal" data-bs-target="#myModal" style=" width: 100%;"> Create Account</button>

                        </div>

                    </form>
                </div>
            </div>
    
            <div class="col-md ">
           
                <img src="./img/together.svg" alt="" class="img-fluid ">
            
            </div>
        </div>
    </div>
</section>




<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
          <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Sign up</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                      <div>
                              
                                <div class="m-1">   
                              <h5 class="text-center text-muted"> It's Super Easy!.</h5> 
                                </div> 
                                  <!-- form for Creating an account-->
                              <form name="signUp" class="border border-top-muted p-3 needs-validation" action="./create.php" id="SignUpform"  onsubmit="return validateForm1()" method="post">
                                
                                  <div class="form-group  m-1" style="display:inline;">
                                      <input class="w-40" type="text" class="form-control" id="lname" placeholder="First Name">
                                      <input  class="w-40" type="text" class="form-control" id="fname" placeholder=" Last Name" style="margin-left: .5rem;"> 
                                  
                                    </div>

                                  <div class="form-group m-1">
                                      <input type="email" class="form-control" id="InputEmail" placeholder="Enter Email">
                                      <small class="form-text text-muted" id="emailHelp">We'll never share your email.</small>
                                  </div>
                                  

                                  <div class="form-group m-1">
                                      <label  class=""for="InputPassword">Create Password</label>
                                      <input  type="password" class="form-control" id="pass1" placeholder="Create Password">
                                      <input  type="password" class="form-control" id="pass2" placeholder="Retype Password">
                                      <small class="form-text text-muted" id="passwordHelp">Type the same password again.</small>

                                  </div>

                                  <button   name= "submit2" type="submit" class="btn btn-success">Submit</button>

                              </form>
                        </div>
                  
                   </div>    

                    <!-- Modal footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                  </div>
            </div>
      </div>
</div>





</body>

<!-- Validate Log in input -->
<script>

        
    function validateForm() {
        let username = document.forms["login"]["username"].value;
        let pass = document.forms["login"]["pass"].value;
        if (username == "" ) {
            alert("Username must be filled out");
            return false;
        }
        else if (pass == "" ) {
            alert("Please Enter Password");
            return false;
        }
    }


    function validateForm1() {

      let fname = document.getElementById('fname').value;
      let lname = document.getElementById('lname').value;
      let email = document.getElementById('InputEmail').value;
      let pass1 = document.getElementById('pass1').value;
      let pass2 = document.getElementById('pass2').value;
      var RegEx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/;
      var name = /^[a-zA-Z]+$/;
                                    // should contain at least one digit
                                 // should contain at least one lower case
                                 // should contain at least one upper case
                             // should contain at least 8 from the mentioned characters
                        

    

      //alert("variables: "+fname+ " "+lname+ " "+email+ " "+ " "+pass1+ " "+pass2);

      let empty = function( str ){
          return (!str || str.length === 0 || /^\s*$/.test(str)); //returns false if string is Not True, length <0, or  begins and imediately ends with white space
      }

      if(empty(fname)||empty(lname) || (name.test(fname)) ||  (/^[a-zA-Z]+$/.test(lname) )    ){
          alert("What is your name?");
        return false;
      }else if( empty(email) || (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) ) {
        alert("Please enter your email");
        return false;
      } else if ( empty(pass1) ||   empty(pass2) || pass_regex.test(pass1)) {
        alert("Please Create A Password.\n\n Password Must be at least 8 Characters.  \n Must conatain at least 1 digit.\n Must contain at least 1 upppercase and lowercase letter.\n"); 
        return false;  
      }else if( !(pass1.localeCompare(pass2) === 0)   ) {        
          alert("Password Does Not Match!"); 
          return false;
      }

      

    }



</script>

</html>


        
        


            


                              
