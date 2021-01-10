
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="<?php echo  $url['css']  ?>" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <style>
    body{
    background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR8aUWSpMbLa6KRN4clMt4Pk-ITBX4sr05WYQ&usqp=CAU);
    background-repeat: no-repeat;
    background-size: cover;
    }
    </style>
    <body class="background">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-2">Sign in</h3></div>
                                    <div class="card-body">
                                        <form method="post" id="loginfrom" action="<?php echo $url['login_check'] ; ?>">
                                             <span class="" id="response"></span>
                                            <div class="form-group">
                                                <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" placeholder="Enter email address"  />
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password"  />
                                            </div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <input class="btn btn-primary px-4 text-white" value="Login" type="submit">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="card-footer text-center">
                                        <div class="small"><a href="<?php echo $url['register'] ;?>">Need an account? Sign up!</a></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
            </div>
        </div>
  
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?Php echo $url['js'] ;?>scripts.js"></script>
    </body>
</html>
<script>

$("#loginfrom").submit(function(event){
event.preventDefault();
var post_url = $(this).attr("action"); 
var request_method = $(this).attr("method"); 
var form_data = $(this).serialize(); 

$.ajax({
    url : post_url,
    type: request_method,
    dataType:"json",
    data : form_data, 
}).done(function(response){ 

    if(response.error == false){
        $(location).attr('href', response.msg);
    }
    if(response.error == true){
        $('#response').html(response.msg);
    }
    if(response.form== true){
        $('#response').html(response.msg);
    }
});
});
</script>