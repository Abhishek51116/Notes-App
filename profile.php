<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Profile</title>
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
          <li class="nav-item">
             <a class="btn  btn-sm green button" href="#" role="button">Logout</a>
            </li>
           
        </ul>
  </div>
</nav>     
   <!--Container-->
      
      <div class="container">
      <div class="row">
          <div class="offset-md-3 col-md-6">
              
              <h2>General Account Settings</h2>
              <table class="table table-hover">
  
  <tbody>
    <tr data-target="#updateUsernameModal" data-toggle="modal">
      
      <td>Username</td>
      <td>Otto</td>
     
    </tr>
    <tr data-target="#updateEmailModal" data-toggle="modal">
    
      <td>Email</td>
      <td>Thornton</td>
      
    </tr>
    <tr data-target="#updatePasswordModal" data-toggle="modal">
      
      <td>Password</td>
      <td>the Bird</td>
      
    </tr>
  </tbody>
</table>
          </div>
          </div>
      </div>
      
      
      <!-- update Username Form -->
      <form methord="POST" id="updateUsernameForm">
          <div class="modal" tabindex="-1" role="dialog" id="updateUsernameModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update User Name:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!--Username from php file -->
          <div id=""> </div>
        
          <div class="form-group">
    <label for="updateUsername" class="sr-only" >Update Username</label>
    <input type="text" class="form-control" id="updateUsername"  placeholder="value" name="updateUsername" maxlength="30">
        </div>
           
                    
      
         
         </div>
      <div class="modal-footer">
          
        
        <button type="button" class="btn btn-primary" value="submit" name="submit">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           
      </div>
    </div>
  </div>
</div>
      
      </form>

      <!-- update Email Form -->
      <form methord="POST" id="updateEmailForm">
          <div class="modal" tabindex="-1" role="dialog" id="updateEmailModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Email:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!--Email from php file -->
          <div id="">
          </div>
        
          <div class="form-group">
    <label for="updateEmail" class="sr-only" >Update Email</label>
    <input type="text" class="form-control" id="updateEmail"  placeholder="value" name="updateEmail" maxlength="30">
        </div>
         </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" value="submit" name="submit">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      
      </form>
<!-- update Password Form -->
      <form methord="POST" id="updatePasswordForm">
          <div class="modal" tabindex="-1" role="dialog" id="updatePasswordModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Password:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!--password from php file -->
          <div id=""> 
          </div>
        
          <div class="form-group">
    <label for="updatePassword1" class="sr-only" >Update Password old</label>
    <input type="password" class="form-control" id="updatePasswordold"  name="updatePasswordold" placeholder="Your current password" maxlength="30">
        </div>
          <div class="form-group">
    <label for="updatePasswordnew" class="sr-only" >Update Password new</label>
    <input type="password" class="form-control" id="updatePassword2"  name="updatePassword2" placeholder="Your new password" maxlength="30">
        </div>
         </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" value="submit" name="submit">Submit</button>
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