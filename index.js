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