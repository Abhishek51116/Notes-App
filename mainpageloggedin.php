<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>My Notes</title>
     <link href="styling.css" rel="stylesheet" type="text/css">
       <link href="https://fonts.googleapis.com/css?family=Chilanka&display=swap" rel="stylesheet">
      <style>
          .container{
              margin-top: 100px;
          }
          #done, #allNotes, #notePad{
              display: none;
          }
          #buttons{
              margin-bottom: 20px;
          }
          textarea{
              width: 100%;
              max-width: 100%;
              font-size:16px;
              line-height: 1.5em;
              border-left-width: 20px;
              padding: 20px;
          }
      </style>
  </head>
  <body>
    <!-- Navigation BAR -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Online Notes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Help</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>
        <li class="nav-item active">
        <a class="nav-link" href="#">My Notes <span class="sr-only">(current)</span></a>
      </li>
    </ul>
        <ul class="nav navbar-nav navbar-right">
             <li class="nav-item">
        <a class="nav-link" href="#">Logged in as <b>username</b></a>
      </li>
          <li class="nav-item"><form method="get">
             <a href="index.php?logout=1" class="btn  btn-sm green button" role="button">Logout</a></form>
            </li>
           
        </ul>
  </div>
</nav>     
   <!--Container-->
      
      <div class="container">
      <div class="row">
          <div class="offset-md-3 col-md-6">
              <div id="buttons">
                  <button type="button" class="btn btn-primary btn-lg" id="addNote">Add Note</button>
                  <button type="button" class="btn btn-primary btn-lg " id="edit" style="float:right;" >Edit</button>
                  <button type="button" class="btn green btn-lg" id="done" style="float:right;">Done</button>
                  <button type="button" class="btn btn-primary btn-lg" id="allNotes">All Notes</button>
              </div>
              <div id="notePad">
              <textarea rows="10">
                  
                  </textarea>
            </div>
              <div class="notes">
                  <!-- Notes made by the user-->
                  
              </div>
              
          </div>
          </div>
      </div>
      
      
      <!-- Login Form -->
      <form methord="POST" id="loginForm">
          <div class="modal" tabindex="-1" role="dialog" id="loginModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- login message from php file -->
          <div id="loginMessage"> </div>
        
          <div class="form-group">
    <label for="loginEmail" class="sr-only" >Login Email</label>
    <input type="email" class="form-control" id="loginEmail"  placeholder="Enter Email" name="loginEmail" maxlength="30">
        </div>
           <div class="form-group">
    <label for="loginPassword" class="sr-only">Login Password</label>
    <input type="password" class="form-control" id="loginLassword"  placeholder="Enter your password" name="loginPassword" maxlength="30">
        </div>
          <div class="checkbox">
              <label>
              <input type="checkbox" name="rememberMe" id="rememberMe">Remember Me
              </label>
              <a style="cursor:pointer;color:blue" class="float-right" data-dismiss="modal" data-target="#forgotPasswordModal" data-toggle="modal">Forgot Password?
          </a>
          </div>
          
      
         
         </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary mr-auto" data-target="#signupModal" data-toggle="modal" data-dismiss="modal">Register</button>
        
        <button type="button" class="btn btn-primary" value="login" name="login">Login</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           
      </div>
    </div>
  </div>
</div>
      
      </form>

      
      <!-- sign up form -->
      <form methord="POST" id="singupForm">
          <div class="modal" tabindex="-1" role="dialog" id="signupModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sign up today and start using the app!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Sign up message from php file -->
          <div id="signupMessage"> </div>
        <div class="form-group">
    <label for="username" class="sr-only">Username</label>
    <input type="text" class="form-control" id="username"  placeholder="Username" maxlength="30">
        </div>
          <div class="form-group">
    <label for="email" class="sr-only" >Email</label>
    <input type="email" class="form-control" id="email"  placeholder="Enter Email" name="email" maxlength="30">
        </div>
           <div class="form-group">
    <label for="password" class="sr-only">password</label>
    <input type="password" class="form-control" id="password"  placeholder="Choose a password" name="password" maxlength="30">
        </div>
          <div class="form-group">
    <label for="rePassword" class="sr-only">Re-password</label>
    <input type="password" class="form-control" id="rePassword"  placeholder="Confirm password" name="rePassword" maxlength="30">
        </div>
          
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" value="signUp" name="signUp">Sign up!</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
      
      </form>
      <!-- Forgot password form-->
       <form methord="POST" id="forgotPasswordForm">
          <div class="modal" tabindex="-1" role="dialog" id="forgotPasswordModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Enter your email address:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- forgot password message from php file -->
          <div id="forgotPasswordMessage"> </div>
        
          <div class="form-group">
    <label for="forgotEmail" class="sr-only" >Forgot Email</label>
    <input type="email" class="form-control" id="fogotPasswordEmail"  placeholder="Enter Email" name="forgotPasswordEmail" maxlength="30">
        </div>

         </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary mr-auto" data-target="#signupModal" data-toggle="modal" data-dismiss="modal">Register</button>
        
        <button type="button" class="btn btn-primary" value="Submit" name="forgotPasswordSubmit">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           
      </div>
    </div>
  </div>
</div>
      
      </form>
      <!-- Footer -->
      <div class="footer">
      <div class="container">
          <p><b>
          &copy; Abhishek Aggarwal 2018- <?php 
              $year = date("Y-m-d");
              echo $year;
              ?>
              </b>
          </p>
          </div>
      </div>
          
      

      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>