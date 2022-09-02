 <?php 
     $con = mysqli_connect("localhost", "root", "root", "termDB") or die("MySQL 접속 실패!!");
 
     $branchSelect = $_POST["branchSelect"];
     $toolSelect = $_POST["toolSelect"];

     $rentalcheck = "select * from rentallist where 읍면동='".$branchSelect."' and tool='".$toolSelect."';";
     $rentalresult = mysqli_query($con, $rentalcheck);
     $num = mysqli_num_rows($rentalresult);
     $updatetool = "update tooltbl set ".$toolSelect."='대여가능' where 연번=(select 연번 FROM branchtbl where 읍면동='".$branchSelect."');";
     $updatelist = "delete from rentallist where 읍면동='".$branchSelect."' and tool='".$toolSelect."';";
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
    .RentalService{
      text-align: center;
    }
    .RentalService input{
      border: 2px solid #ddd;
      width: 70%;
      height: 40px;
      margin-bottom: 5px;
    }
    .RentalServiceButton input{
      text-align: center;
      color: #FFF;
      background: #333;
    }
    .radiobutton{
       text-align: center;
       font-size: 1em;
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>Return Service</h2>
  </div>
    <form method="post" action="https://localhost/return_result.php">
    <div class="RentalService">
    <label>
    <input type="text" placeholder="  아이디" name="userID">
    <input type="password" placeholder="  비밀번호" name="userPW">
    </label>
    <label class="RentalServiceButton">
      <input type="submit" value="조회하기">
    </label>
    <?php
     if($num==0){
        echo "<H4>선택하신 공구를 확인할 수 없습니다<H4>";
        exit();
      }
     else if($num==1){
      echo "<BR>반납되었습니다<BR>";
      echo "<BR>반납 지점 : ".$branchSelect;
      echo "<BR>반납 물품 : ".$toolSelect;
      mysqli_query($con, $updatetool) or die("Tool 업데이트실패");
      mysqli_query($con, $updatelist) or die("List 업데이트실패");
    }
    ?>
    </div>
    </form>
  
</body>
</html>