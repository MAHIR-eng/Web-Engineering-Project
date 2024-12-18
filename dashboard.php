<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location: ../");
   }

  
   $userdata = $_SESSION['userdata'];
   $groupsdata = $_SESSION ['groupsdata'];

   if($_SESSION['userdata']['status']==0){
    $status = '<b style="color:red">Not Voted</b>';
   }
   else{
    $status = '<b style="color:green">Voted</b>';
   }
 
?>



<html>
    <head>
        <title>Online Voting System - Dashboard</title>
        <link rel="stylesheet" href="../CSS/stylesheet.css">

</head>
<body>
<style>
    #backbtn{
        padding: 5px;
    border-radius: 5px;
background-color: blue; 
color: white;
float:left;
    }

    #loginbtn{
        padding: 5px;
    border-radius: 5px;
background-color: blue; 
color: white;
float:right;
    }

    #profile{
        background-color: white; 
        padding: 20px;
        width: 30%;
        float:left;
    }
    #Group{
        background-color: white; 
        padding: 20px;
        width: 60%;
        float:right;
    }

    #votebtn{
        padding: 5px;
    border-radius: 5px;
background-color: blue; 
color: white;
float:left;
    }

    </style>

    <div id="mainsection">
        <center>
        <a href="../"><button id="backbtn">Back</button></a>
        <a href="logout.php"><button id="loginbtn">Logout</button></a>
    <h1>Online Voting System</h1>
</center>
</div>
<hr>
    <div id="profile">
<center><img src="../uploads/<?php echo  $userdata['photo']?>"height='100' wigth='100'><br><br></center>
<b>Name:</b><?php echo  $userdata['name']?><br><br>
<b>Mobile:</b><?php echo  $userdata['mobile']?><br><br>
<b>Address:</b><?php echo  $userdata['address']?><br><br>
<b>Status:</b><?php echo   $status?><br><br>

    </div>
<div id="Group">
     <?php
        if($_SESSION ['groupsdata']){
           
            for($i=0; $i <count($groupsdata); $i++){
                ?>
                <div>
                    <img style="float: right"src="../uploads/<?php echo  $groupsdata[$i]['photo']?>" height="100" width="100">
                    <b>Group Name:</b><?php echo  $groupsdata[$i]['name']?><br><br>
                    <b>Votes:</b><?php echo  $groupsdata[$i]['votes']?><br><br>
                    <form action="../api/vote.php" method="POST">
                        <input type="hidden" name="gvotes" value="<?php echo  $groupsdata[$i]['votes']?>">
                        <input type="hidden" name="gid" value="<?php echo  $groupsdata[$i]['id']?>">
                        <input type="submit" name="votebtn" value="vote" id="votebtn"><br><br><hr>
                     </form>
                </div>
                 <?php
            }
        }
        else{
            echo 'No group here.';

        }
    ?>

</div>
    
</body>
</html>