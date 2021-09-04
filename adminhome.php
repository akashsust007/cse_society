<?php
	include_once 'includes/dbh.inc.php';
	

?>

<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CSE Socity</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
        <nav>

			<h1>CSE SOCIETY</h1>
			<div class="main-wrapper">
				<ul>
					<li><a href="adminhome.php">Home </a></li>
					<li><a href="logged_in_user_info.php">loggedInUser</a></li>
					<li><a href="adminhome.php">Notice</a></li>
					<?php if(isset($_SESSION['logged_in_adminname'])){
						echo '<li><a href="adminelection.php">Election</a></li>';
					} ?>

				</ul
			</div>
			<div class="nav-login">		
				<?php
					if(isset($_SESSION['logged_in_adminname'])){
						echo '<a href="#" style="font-size:14px;padding-right:10px; padding-left:0px;text-align:left;">'. $_SESSION['logged_in_adminname'] .' </a>';
						echo '<form action="includes/adminlogout.inc.php" method="POST">';

						echo '<button type="submit" name="submit">Logout</button>
						</form>';
					}
					else {
						echo '<form action="includes/adminlogin.inc.php" method="POST">
							<input type="text" name="username" placeholder="username">
							<input type="password" name="pwd" placeholder="password">
							<button type="submit" name="submit">login</button>
						</form> ';
					}
				?>
			</div>
		</nav>
	</header>
		<div class="divider"> </div>
		
        <div class="posting">
        	<form action="adminhome.php" method="post" id="postingform">
			<ul>
				<li><h1 style="text-align:left; padding-left:140px; color:#664B23">Write about update notice</h1></li>
           		<li><input type="text" name="titlenews" placeholder="Write a Title.." size="95"  required="required"></li>
				<li><textarea cols="83" rows="6" name="contentnews" placeholder="Write Description..."  ></textarea></li>
			
				<li><input type="submit" name="subnews" value="Submit here" style="text-align:left; font-size:20px;  background-color:#1F4FB7"/></li>
        	</ul>
        	</form><br>
        </div>

        <?php
				$con=mysqli_connect("localhost","root","","csesociety") or die("Connection was not Established");
					
					if(isset($_POST['subnews'])){
						$userid=$_SESSION['logged_in_adminid'];
					    $username=$_SESSION['logged_in_adminname'];
						$titleachv=addslashes($_POST['titlenews']);
						$contentachv=addslashes($_POST['contentnews']);
						if($contentachv==''||$username==''){
							echo "<h2>please enter topic description</h2>";
							header("Location: noachv.php?no topic details?$username");
							exit();
						}
						else{
						$insert="insert into tablenews
						( headline, story) values
						('$titleachv','$contentachv')";

						$run= mysqli_query($connct,$insert);
			            header("Location: adminhome.php?done_submition");
						unset($_POST['subnews']);
						}
					}
		?>
		<?php 
			$sql="SELECT * from tablenews ; ";
			$resultBlog = mysqli_query($connct,$sql);//this will excute the query
			$resultCheck =mysqli_num_rows($resultBlog);

		?>
        <h1 style="text-align:center; padding-left:0px; color:#664B23">Update notice About CSE,SUST</h1>

        
		<div class="showposts">
			<?php
			    while($rowBlog=mysqli_fetch_array($resultBlog)){

					

			    	echo '<div class="singlepost">';
						echo '<div class="posttitle">Title : ' . $rowBlog['headline'] . '</div>';
						$statusString=$rowBlog['story'];
						// if(strlen($statusString)>10)
						// {
						// 	$stringCut=substr($statusString,0,15);
						// 	$statusString=substr(($stringCut), 0,strpos($stringCut, ' ')) . '... <a  href="">read more</a>';
						// }
			        	echo "<p>" . $statusString . "</p>";
			        	echo '</div>';
				    } 

		    ?>   
		</div>

		<div style="margin-top:300px;">
		</div>

<?php
	include_once 'footer.php';
?>