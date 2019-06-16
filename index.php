<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Chat Together</title>
    <script>
        function ajax(){
            var req = new XMLHttpRequest();
            req.onreadystatechange = function(){
                if(req.readyState==4 && req.status == 200){
                    document.getElementById('chat').innerHTML = req.responseText;
                }
            }
        req.open('GET','chat.php', true);
        req.send();
        }
        setInterval(function(){ajax()}1000);
    </script>
    <link rel="stylesheet" href="style.css" medial="all">
    </head>
    <body onload="ajax();">
        <div id='container'>
            <div id="chat"></div>
        </div>
        <form method="POST" action="index.php">
            <input type="text" name="name" placeholder="Write your name"/>
            <textarea name="enter message" placeholder="Start typing"></textarea>
            <input type='submit' name='submit' value="Send"/>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $msg = $_POST['msg'];
                $query = "INSERT INTO chat(name,msg) values('$name', '$msg')";
                $run = $con->query($query);

                 if ($run){
                    echo "<embed loop='false" src='beep.wav' hidden='true'/>;
                 }
            }
        ?>

        </div>
    </body>
</html>