 <?php 
     $con = mysqli_connect("localhost", "root", "root", "termDB") or die("MySQL 접속 실패!!");
 
     $userID = $_POST["userID"];
     $userPW = $_POST["userPW"];
     $rentalcheck = "select 읍면동, tool from rentallist where userid='".$userID."';";
     $rentalresult = mysqli_query($con, $rentalcheck);

     $idcheck = "select userID, userPW from userTBL where userID='".$userID."' && userPW='".$userPW."' ;";
     $idresult = mysqli_query($con, $idcheck);
     $num = mysqli_num_rows($idresult)

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
    .ReturnService{
      text-align: center;
    }
    .ReturnService input{
      border: 2px solid #ddd;
      width: 70%;
      height: 40px;
      margin-bottom: 5px;
    }
    .ReturnServiceButton input{
      text-align: center;
      color: #FFF;
      background: #333;
    }
    
  </style>
</head>
<body>
  <div class="header">
    <h2>Return Service</h2>
  </div>
    <form method="post" action="https://localhost/return_result.php">
    <div class="ReturnService">
    <label>
    <input type="text" placeholder="  아이디" name="userID">
    <input type="password" placeholder="  비밀번호" name="userPW">
    </label>
    <label class="ReturnServiceButton">
      <input type="submit" value="조회하기">
    </label>
    </div>
    </form>
    <div class="ReturnService">
     <?php
     if($num==0){
        echo "<H4>아이디 또는 비밀번호를 확인해주세요</H4>";
        exit();
      }
      ?>
    </div>
    <form method="post" action="https://localhost/return_result2.php" class="ReturnService">
     <h3>회원님이 대여중인 상품</h3>

    <?php
      while($row = mysqli_fetch_array($rentalresult)) {
              echo "<h5>", $row['읍면동']," : ",$row['tool'],"</h5>";
          }
      ?>
    <input type="text" list="branch" name="branchSelect"  placeholder="지점선택">
    <datalist id="branch">
      <?php
        while($row = mysqli_fetch_array($rentalresult)) {
              echo "<option value=",$row['읍면동'],">";
          }
      ?>
    </datalist>
   <input type="text" list="tool" name="toolSelect"  placeholder="공구선택">
    <datalist id="tool">
      <?php
        while($row = mysqli_fetch_array($rentalresult)) {
              echo "<option value=",$row['tool'],">";
          }
      ?>
    </datalist>
    <div class="ReturnService">
       <input type="submit" value="반납하기">
    </div>
    </form>
</body>
</html>