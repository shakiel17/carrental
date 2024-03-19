
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DOM RENT A CAR | ADMIN PORTAL</title>

    <!-- Bootstrap -->
    <link href="<?=base_url();?>design/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url();?>design/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url();?>design/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=base_url();?>design/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url();?>design/admin/build/css/custom.min.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="<?=base_url();?>design/admin/images/logo.jpg">
  </head>

  <body class="login">
    <div>    
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?=form_open(base_url()."admin_authentication");?>
              <h1>Admin Login Portal</h1>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required=""  name="password" />
              </div>
              <div class="form-group">             
                <input type="submit" class="btn btn-primary btn-sm" value="Log in" style="width:270px;">
              </div>
              <div class="clearfix"></div>

              <div class="separator">                

                <div class="clearfix"></div>
                <br />
              </div>
            <?=form_close();?>
          </section>
        </div>      
      </div>
    </div>
  </body>
</html>
