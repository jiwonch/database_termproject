 <?php 
     $con = mysqli_connect("localhost", "cookUser", "1234", "termDB") or die("MySQL 접속 실패!!");
 
     $userID = $_POST["userID"];
     $userName = $_POST["userName"];
     $userPW = $_POST["userPW"];
     $email = $_POST["email"];
     $mobile = $_POST["mobile"];
 
   $sql =" INSERT INTO userTBL VALUES ('".$userID."','".$userName."','".$userPW."','".$email."','".$mobile."')";
 
   $ret = mysqli_query($con, $sql);
 
 ?>
 <!DOCTYPE html>
<html>
<head>
  <title>.</title>
  <style>
    body{
      overflow: hidden;
      height: 100%;
      background: #f5f6f7;
      margin:0;
      padding: 0;
      display: block;
    }
    .header{
      background: #333;
      color: #FFF;
      text-align: center;
    }
    .CreateAccount{
      text-align: center;
    }
    .CreateAccount input{
      border: 2px solid #ddd;
      width: 70%;
      height: 40px;
      margin-bottom: 5px;
    }
    .CreateAccountButton input{
      text-align: center;
      color: #FFF;
      background: #333;
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>Create Account</h2>
  </div>
    <form method="post" action="https://localhost/insert_result.php">
    <div class="CreateAccount">
    <label>
    <input type="text" placeholder="  이름" name="userName">
    <input type="text" placeholder="  아이디" name="userID">
    <input type="password" placeholder="  비밀번호" name="userPW">
    <input type="email" placeholder="  name@domain.com" name="email">
    <input type="tel" placeholder="  010-1234-5678" name="mobile">
    </label>
    <label class="CreateAccountButton">
      <input type="submit" value="회원가입">
    </label>
    <?php
     if($ret) { 
     echo "<H4>회원가입 완료!</H4>";
     echo "아이디 : ".$userID."<BR>비밀번호 : ".$userPW;
   } 
   else { 
   echo "<BR>회원가입 실패!"."<BR>";
   echo "<BR>실패 원인 :".mysqli_error($con);
   } 
   ?>
  </div>
  </form>
  </div>
</body>
</html>