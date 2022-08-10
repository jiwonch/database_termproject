 <?php 
     $con = mysqli_connect("localhost", "cookUser", "1234", "termDB") or die("MySQL 접속 실패!!");
 
     $sql = "SELECT * FROM branchTBL";
 	
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
<title>DB TermProject</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>
     function login(){
         var url = "https://localhost/login.php";
         var name = "login test";
         var option = "width = 350, height = 300, top = 100, left = 200, location = no"
         window.open(url, name, option);
    }
</script>
<script>
     function CreateAccount(){
         var url = "https://localhost/CreateAccount.php";
         var name = "CreateAccount test";
         var option = "width = 350, height = 500, top = 100, left = 200, location = no"
         window.open(url, name, option);
    }
</script>
<script>
     function RentalService(){
         var url = "https://localhost/rental.php";
         var name = "RentalService test";
         var option = "width = 350, height = 500, top = 100, left = 200, location = no"
         window.open(url, name, option);
    }
</script>
<script>
     function ReturnService(){
         var url = "https://localhost/return.php";
         var name = "RentalService test";
         var option = "width = 350, height = 500, top = 100, left = 200, location = no"
         window.open(url, name, option);
    }
</script>

<style>
	* {
  box-sizing: border-box;
}
	body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}
.header {
  padding: 80px;
  text-align: center;
  color: black;
  background-image: url(tool2.jpg)
}
.header h1{
	color: #FFF;
	font: italic sans-serif;
}
.navbar {
  overflow: hidden;
  background-color: #333;
}
.navbar a{
	float:right;
	display:inline-block;
	color:white;
	text-align: center;
	text-decoration: none;
	padding: 14px 20px;
}
.navbar a.left{
	float: left;
}
.row {
  display: flex;
  flex-wrap: wrap;
}
.side {
  flex: 15%;
  background-color: #f1f1f1;
  padding: 20px;
}
.main {
  margin:30px;
  flex: 80%;
  background-color: white;
  padding: 20px;
  border: 2px solid #BFBFBF;
  border-collapse: collapse;
}
.main img{
	height: 200px;
	transition: height 0.5s;
}
.main img:hover{
	height: 230px;
}
.main thead td{
	text-align: center;
}
.main tbody td{
	border: 1px solid #BFBFBF;
	padding-top: 15px;
	text-align: center;
	width: 300px;
	height: 50px;
}
.main tbody td:hover{
	background-color: #ddd;
}
.main tbody a{
	text-decoration: none;
	display: block;
}
.main tbody a:visited{
	color: black;
}
.main tbody a:hover{
	color: blue;
}
.category a,h4{
	text-align: left;
	text-decoration: none;
	display: block;
	padding: 20px;
	color: black;
	font-weight: 999;
	font-size: 20px;
	border-bottom: 2px solid #BFBFBF;
}
.category a:visited{
	color: black;
}
.category a:focus{
	background: red:;
}
.category p{
	display: inline;
	color: gray;
	font: italic medium Arial;
}
</style>
</head>
<body>

<div class="header">
	<h1>공구 대여소</h1>
</div>
<div class="navbar">
  <a href="#" class="left">RENTAL SERVICE</a>
  <a href="javascript:CreateAccount()">회원가입</a>
</div>
<div class="row">
	<div class="side">
	<h4 style="padding:0; color:#672C2C; text-align: center;">카테고리</h4>
	<div class="category">
		<a href="https://localhost/branchinfo.php">지점확인<p>	Branch</p></a>
		<a href="https://localhost/branch.php">공구확인<p>  Tool</p></a>
		<a href="javascript:RentalService()">대여하기<p>  Rental</p></a>
		<a href="javascript:ReturnService()">조회 / 반납하기<p>  Return</p></a>
	</div>
	</div>
	<div class="main">
		<form method="post" action="https://localhost/branchSelect.php">
		<input type="text" list="branch" name="branchSelect"  placeholder="지점선택">
		<datalist id="branch">
			<?php
				while($row = mysqli_fetch_array($ret)) {
      				echo "<option value=",$row['읍면동'],">";
  				}
  				
		?>
		</datalist>
		<input type="submit" value="검색">
		</form>
	<table>
		<thead>
		<td><h2>지점을 선택해주세요</h2></td>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	</div>
	</div>
</body>
</html>