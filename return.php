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
    <h2>Return Service</h2>
  </div>
    <form method="post" action="http://jiwonch.dothome.co.kr/database_termproject/return_result.php">
    <div class="RentalService">
    <label>
    <input type="text" placeholder="  아이디" name="userID">
    <input type="password" placeholder="  비밀번호" name="userPW">
    </label>
    <label class="RentalServiceButton">
      <input type="submit" value="조회하기">
    </label>
  </div>
  </form>
  </div>
</body>
</html>