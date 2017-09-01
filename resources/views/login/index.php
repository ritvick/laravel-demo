<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Demo | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?=URL::to("/");?>/public/asset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=URL::to("/");?>/public/asset/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=URL::to("/");?>/public/asset/plugins/iCheck/square/blue.css">
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?=URL::to("/");?>/"><b>Laravel Demo</b> Admin</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form  method="post" id="form-validate">
			<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
          <div class="form-group has-feedback">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		  
		  
          <div class="row">
            <div class="col-xs-4 pull-right">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div>
			<div class="col-xs-12 pull-left">			
				<div id="error_msg" style="display:none;" class="form-group text-danger">Invalid user name</div>
			</div>
          </div>
		 
          </div>
        </form>		
      </div>
    </div>
    <script src="<?=URL::to("/");?>/public/asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?=URL::to("/");?>/public/asset/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=URL::to("/");?>/public/asset/js/jquery.form.js"></script>
	<script src="<?=URL::to("/");?>/public/asset/js/jquery.validate.js"></script>
	<script>
		$(document).ready(function() {
			var vRules = {
				username:{required:true},
				password:{required:true}
			};
			var vMessages = {
				username:{required:"Please enter Username"},
				password:{required:"Please enter password"}
			};

			$("#form-validate").validate({
				rules: vRules,
				messages: vMessages,
				submitHandler: function(form) {	
				$(form).ajaxSubmit({
					url:"<?=URL::to("/");?>/login/validate", 
						type: 'post',
						dataType:'json',
						cache: false,
						clearForm: false,
						success: function (response) {               
							if(response.status=="success")
							{
								window.location.href="<?=URL::to("/");?>/employee";
							}
							else
							{	
								$("#error_msg").html(response.msg);
								$("#error_msg").show();
								return false;
							}
						}

					});
				}
			});
		});
	</script>
  </body>
</html>