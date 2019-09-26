//Once the user submits the form
$("#signupForm").submit(function(event){
    //Prevent the php processing
    event.preventDefault();
    //collect data from user
    var datatopost = $("#signupForm").serializeArray();
    console.log(datatopost);
    //Ajax call
    $.ajax({
        url : "signup.php",
        type : "POST",
        data : datatopost,
        success: function(data){
            if(data){
                $("#signupMessage").html(data);
            }
      },
        error : function(){
            $("#signupMessage").html("<p>Problem with the AJAX CAll</p>");
        }
    
    }); 
});
//once user clicks the login button
$("#loginForm").submit(function(event){
    //Prevent the php processing
    event.preventDefault();
    //collect data from user
    var datatopost = $("#loginForm").serializeArray();
    console.log(datatopost);
    //Ajax call
    $.ajax({
        url : "login.php",
        type : "POST",
        data : datatopost,
        success: function(data){
            if(data == "success"){
                window.location = "mainpageloggedin.php"
            }else{
            $("#loginMessage").html(data);
            }
      }
    
    }); 
});