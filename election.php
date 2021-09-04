<?php
        include_once 'includes/dbh.inc.php';
        

?>

<?php
        include_once 'header.php';
        $sql="SELECT * from election  ; ";
        $result = mysqli_query($connct,$sql);//this will excute the query
        $row=mysqli_fetch_assoc($result)
?>
                <div class="divider"> </div>
                
        <h1 style="text-align:center; padding-left:0px; color:#664B23"> Election of CSE society,SUST</h1>

        <?php
                if($row['publish']==0){
                        echo '<div style="float:center; margin: 0px auto; width:70% ;text-align:center; padding-left:0px; color:#664B23; background-color:powderblue;">
                                <h2>The society voting is still on going </h2><a href="goforvote.php">go for vote</a>
                                </div>';
                }
                else {
                        echo ' <div style="float:center; margin: 0px auto; width:70% ;text-align:center; padding-left:0px; color:#664B23; background-color:powderblue;">
                                <h2>The society election  ended </h2><a href="goforresult.php">show the election result</a>
                                </div>';
                }
        ?>


        
       



        <div style="margin-top:255px;">
                </div>

<?php
        include_once 'footer.php';
?>