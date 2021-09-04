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

<?php
        $sql="SELECT * from election  ; ";
        $result = mysqli_query($connct,$sql);//this will excute the query
        $row=mysqli_fetch_assoc($result);
?>
                <div class="divider"> </div>
                
        <h1 style="text-align:center; padding-left:0px; color:#664B23"> Election of CSE society,SUST</h1>

        <?php
                if($row['publish']==0 && isset($_SESSION['logged_in_adminname'])){

                        echo '<div style="float:center; margin: 0px auto; width:70% ;text-align:center; padding-left:0px; color:#664B23; background-color:powderblue;">
                                                <form action="includes/changeelection.inc.php" method="POST">
                                                        <button type="submit" name="submitelectionfromadmin">publish the result</button>
                                                </form>
                                </div>';
                }
                else if(isset($_SESSION['logged_in_adminname'])){
                        echo '<div style="float:center; margin: 0px auto; width:70% ;text-align:center; padding-left:0px; color:#664B23; background-color:powderblue;">
                                                <form action="includes/changeelection.inc.php" method="POST">
                                                        <button type="submit" name="submitelectionfromadmin">start voting</button>
                                                </form>
                                </div>';
                }
        ?>


        
       



        <div style="margin-top:255px;">
                </div>

<?php
        include_once 'footer.php';
?>