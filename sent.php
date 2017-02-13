 <html lang="fa" dir="rtl">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Bootstrap 101 Template</title>

     <link href="css/bootstrap.min.css" rel="stylesheet">
  	<link href="css/rtl-bootstrap.min.css" rel="stylesheet">
 	<link href="css/style1.css" rel="stylesheet">
   </head>
   <body>

<?php
		  if(isset($_POST['btnsend']))
		  {
		  $Username=trim($_POST['username']);
		  $Password=trim($_POST['password']);
		  $Repass=trim($_POST['repass']);
		  $Name=trim($_POST['firstname']);
		  $Family=trim($_POST['lastname']);
      $Email=trim($_POST['email']);
      $Content=trim($_POST['content']);
       }
       
    if ($Password!=$Repass){
          echo "کلمه عبور با تکرار آن مطابقت ندارد!";
          $check_error = 1;
      }
      elseif (preg_match('/^[a-zA-Z0-9 _-]+$/', $Username) == 0){
          echo "نام کاربری دارای کاراکترهای غیر مجاز است!";
          $check_error = 1;
      }
				else
				{
          include "config.php";
          $sql="INSERT INTO register (Username, Password, Name, Family, Email, Content) VALUES (?, ?, ?, ?,?,?)";
          $result = $connect->prepare($sql);
          $result->bindValue(1,$Username);
          $result->bindValue(2,$Password);
          $result->bindValue(3,$Name);
          $result->bindValue(4,$Family);
          $result->bindValue(5,$Email);
          $result->bindValue(6,$Content);
          if ($result->execute())
          {
            header("location:index.php");
          }
          else {
            header("location:index.php");
          }

        }
		  ?>
</body>
</html>
