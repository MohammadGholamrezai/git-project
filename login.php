<?php
include ("config.php");
?>

<html lang="fa" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> آموزش طراحی وب</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
 	<link href="css/rtl-bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrapValidator.min.css" rel="stylesheet">
	<link href="css/style1.css" rel="stylesheet">

  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrapValidator.min.js"></script>

  </head>
  <body>


   <div class="container">
 	 <div class="row">
 	 <div class="col-lg-12">

 	 <nav class="navbar navbar-default navbar-fixed-top">
 	 <div class="container-fluid">

 	 <div class="navbar-header">
 	 <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false">
 	 <span class="icon-bar"></span>
 	 <span class="icon-bar"></span>
 	 <span class="icon-bar"></span>
 	 </button>
 	 </div>

 	 <div class="collapse navbar-collapse" id="navbar1">
 	 <ul class="nav navbar-nav">
 	    <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
 		<li><a href="#">انجمن سایت</a></li>
 		<li><a href="#">اخبار وب و مقالات</a></li>
 		<li><a href="#">دوره های آموزشی</a></li>
 		<li><a href="#">درباره ما</a></li>
 	 </ul>
 	 </div>

 	 </div>
 	 </nav>
      </div>
 	 </div>

<div class="row"> <!-- logo and tiser -->
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <img class="logo" src="image/logo1.jpg" />
    <img class="banner pull-left hidden-sm hidden-xs" src="image/banner.png" />

  </div>
</div> <!-- end of logo and tiser -->

<div class="row"> <!-- second menu -->
  <div class="col-lg-12">

  <nav class="navbar navbar-default second-menu">
  <div class="container-fluid">

  <div class="navbar-header">
  <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false">
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  </button>
  </div>

  <div class="collapse navbar-collapse" id="navbar2">
  <ul class="nav navbar-nav">
   <li><a href="#">اخبار وب<span class="caret"></span></a></li>
   <li><a href="#">برنامه نویسی<span class="caret"></span></a></li>
   <li><a href="#">وردپرس<span class="caret"></span></a></li>
   <li><a href="#">طراحی وب<span class="caret"></span></a></li>
  </ul>

  <div class="input-group in-g1 pull-left">
      <input type="text" class="form-control" placeholder="کلمه مورد نظر را تایپ کنید..." aria-describedby="ig1">
   <span class="input-group-btn" id="ig1">
     <button type="button" class="btn btn-info">جستجو</button>
   </span>
  </div>
  </div>
  </div>
  </nav>
     </div>
</div>   <!-- end of second menu -->

<div class="row"> <!-- middle body of site (sidebar, middle content, sidebar) -->



  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
    <div class="box"><span class="glyphicon glyphicon-user"></span>
صفحه ورود به سایت
    <div class="hr"></div>

<br/>
<br/>


<form id="loginForm" method="post" action="" class="form-horizontal">

    <div class="form-group">
        <label class="col-md-3 control-label">نام کاربری</label>
        <div class="col-lg-3">
            <input type="text" class="form-control" name="loginuser" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">کلمه عبور</label>
        <div class="col-lg-3">
            <input type="password" class="form-control" name="loginpass" />
        </div>
    </div>

    <!-- #messages is where the messages are placed inside -->
    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <div id="messages"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-3 col-md-offset-3">


          <script>
          $(document).ready(function() {
              $('#loginForm').bootstrapValidator({
                  container: '#messages',
                  feedbackIcons: {
                      valid: 'glyphicon glyphicon-ok',
                      invalid: 'glyphicon glyphicon-remove',
                      validating: 'glyphicon glyphicon-refresh'
                  },
                  fields: {



                      loginuser: {
                          validators: {
                              notEmpty: {
                                  message: 'لطفا نام کاربری خود را وارد نمایید'
                              }
                          }
                      },
                      loginpass: {
                          validators: {
                              notEmpty: {
                                  message: 'لطفا کلمه عبور خود را وارد نمایید'
                              }
                          }
                      },
                  }
              });
          });

          </script>



            <button type="submit" name="btnlogin" style="width:100px" class="btn btn-info text-center" aria-label="Right Align">ورود</button>
        </div>
    </div>
</form>
<!--      -->
<?php
 if(isset($_POST['btnlogin']))
  {
   $username=trim($_POST['loginuser']);
   $password=trim($_POST['loginpass']);
   $EN="enable";
   $sql="select * from register
   WHERE status='$EN'";
   $result=mysql_query($sql) or die(mysql_error());
   $i=0;
   while ($row=mysql_fetch_assoc($result))
   {
     $i++;
	 $userid[$i]=trim($row['cloob_id']);
	 $pass[$i]=trim($row['password']);
     $farsi_name[$i]=trim($row['fname']);
     $farsi_lname[$i]=trim($row['lname']);
     $s_image[$i]=trim($row['image']);
   }
   //check cloob_id and pass
   $flag=0;
   $counter=0;
   for($k=1;$k<=$i;$k++)
   {
     if($username==$userid[$k] && $password==$pass[$k])
	 {
	   $flag=1;

	   //register on session
	   $counter=$counter+1;
	   $farsiname=$farsi_name[$k];
	   $farsilname=$farsi_lname[$k];
	   $user_id=$userid[$k];
	   $image=$s_image[$k];
	   session_register("user_id");
	   session_register("farsiname");
	   session_register("farsilname");
	   session_register("image");
	   session_register("password");
	   session_register("counter");
	 }//end of if
   }//end of for
   //**********************
   if($flag==0)
   {
    $badlogin=1;
	session_register("badlogin");
   /* die('<script language="javascript">window.location.href="Login.php"</script>'); */
	die("<br/> <table width=\"100%\" align=\"center\" bgcolor=\"#FFE400\" widrh=\"100%\" style=\"border: 1px solid #B19C00;\"  >
	     <tr>
		 <td  height=\"25\" align=\"right\" dir=\"rtl\" style=\"font-family:tahoma;font-size:12px\">
	      نام کاربری یا رمز عبور وارد شده اشتباه می باشد.
	     </td>
	  <td width=\"5%\" align=\"center\"><img src=Image\IMG\message-error.gif width=\"24\" height=\"24\"></tr></table>");

	}
	else
	{
	die('<script language="javascript">window.location.href="Userprofile.php"</script>');
	}
}//end of if


?>


<!--      __>




    </div>
  </div>

</div>  <!-- end of middle body of site (sidebar, middle content, sidebar) -->

<div class="row"> <!-- footer -->
</div>  <!-- end of footer -->



 	 </div> <!-- end container-->

  </body>
</html>
