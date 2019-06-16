<?php
    include 'db.php';
            $query = "SELECT * FROM chat ORDER BY id DESC";
            $run = $con->query($query);
            while($row = $run->fetch_array()):
            ?>
        <div id='chat_box'>
        <div id ="chat_data">
        <span style="color:green;">User:<?php echo $row['name'];?> </span>
        <span style="color:brown;"><?php echo $row['msg'];?></span>
        <span style="float:right;"><?php echo formatDate($row['date']);?>me</span>
        </div>
            <?php endwhile;?>