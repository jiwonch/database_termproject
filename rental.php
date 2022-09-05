 <?php
     $con = mysqli_connect("localhost", "jiwonch", "wldnjs9711!!", "jiwonch") or die("MySQL 접속 실패!!");
 
     $sql = "SELECT * FROM branchtbl";

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
    <form method="post" action="http://jiwonch.dothome.co.kr/database_termproject/rental_result.php">
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
  </div>
  </form>
  </div>
</body>
</html>