 <?php 
     $con = mysqli_connect("localhost", "cookUser", "1234", "termDB") or die("MySQL 접속 실패!!");
 
     $userID = $_POST["userID"];
     $userPW = $_POST["userPW"];
     $branchSelect = $_POST["branchSelect"];
     $toolSelect = $_POST["toolSelect"];

     $idcheck = "select userID, userPW from userTBL where userID='".$userID."' && userPW='".$userPW."' ;";
     $idresult = mysqli_query($con, $idcheck);
     $num = mysqli_num_rows($idresult);
     $toolcheck= "SELECT ".$toolSelect." FROM toolTBL where 연번=(select 연번 FROM branchtbl where 읍면동='".$branchSelect."')";
     $checkresult = mysqli_query($con, $toolcheck) or die("올바른 공구와 기관을 선택하세요");
     $updatetool= "update tooltbl set ".$toolSelect."='대여중' where 연번=(select 연번 FROM branchtbl where 읍면동='".$branchSelect."');";
     $insertuser= "insert into rentallist value('".$userID."','".$branchSelect."','".$toolSelect."');";


     $con = mysqli_connect("localhost", "cookUser", "1234", "termDB") or die("MySQL 접속 실패!!");
 
     $sql = "SELECT * FROM branchTBL";

     $column =  mysqli_query($con,"SHOW COLUMNS from tooltbl");

     $ret = mysqli_query($con, $sql);
     if($ret) { 
     $count = mysqli_num_rows($ret);
     } 
    else { 
       echo "userTBL 데이터 검색 실패!!!"."<br>";
       echo "실패 원인 :".mysqli_error($con);
       exit();
       }

        
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
  </style>
</head>
<body>
  <div class="header">
    <h2>Rental Service</h2>
  </div>
    <form method="post" action="https://localhost/rental_result.php">
    <div class="RentalService">
    <label>
    <input type="text" placeholder="  아이디" name="userID">
    <input type="password" placeholder="  비밀번호" name="userPW">
    <input type="text" list="branch" name="branchSelect"  placeholder="  지점선택">
    <datalist id="branch">
      <?php
        while($row = mysqli_fetch_array($ret)) {
              echo "<option value=",$row['읍면동'],">";
          }
         
    ?>
    </datalist>
    <input type="text" list="tool" name="toolSelect"  placeholder="  공구목록">
    <datalist id="tool">
      <?php
        while($row = mysqli_fetch_array($column)) {
              if($row['Field']=='연번') 
                continue;
              else
              echo "<option value=",$row['Field'],">";
          }

    ?>
    </datalist>
    </label>
    <label class="RentalServiceButton">
      <input type="submit" value="대여하기">
    </label>
    <?php
      if($num==0){
        echo "<H4>아이디 또는 비밀번호를 확인해주세요</H4>";
      }
      else if($num==1){
      while($row = mysqli_fetch_array($checkresult)) {
              if($row[$toolSelect]=='대여중'){
                echo "<BR>이미 대여중입니다";
              }
              else{
              echo "<BR>대여되었습니다";
              mysqli_query($con, $updatetool) or die("업데이트실패");
              mysqli_query($con, $insertuser) or die("입력실패");
              }
          }
        }
    ?>
  </div>
  </form>
  </div>
</body>
</html>