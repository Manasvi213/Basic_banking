<?php
include 'conn.php';

if(isset($_POST['submit']))
{
    $from = $_GET['cid'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users1 where cid = $from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 
    
    $sql = "SELECT * from users1 where cid = $to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);
    
   


    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {

      
        
                
                $newbalance = $sql1['Balance'] - $amount;
                $sql = "UPDATE users1 set Balance=$newbalance where cid=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['Balance'] + $amount;
                $sql = "UPDATE users1 set Balance=$newbalance where cid=$to";
                mysqli_query($conn,$sql);
                
                
                $sender = $sql1['cName'];
                $receiver = $sql2['cName'];
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `Balance`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transaction.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./st.css"/>


    <style type="text/css">
    	
		button{
			border:none;
			background: rgb(41, 194, 181);
		}
	    button:hover{
			background-color:red;
			transform: scale(1.1);
			color:white;
		}
         
    </style>
</head>

<body>
 
<img class="bg" src="bank1.jpg" alt="iit">

	<div class="container-fluid">
        <h2 class="text-center pt-4">Transaction</h2>
            <?php
                include 'conn.php';
                if(isset($_REQUEST['cid'])){

                 $sid=$_GET['cid'];
                $sql = "SELECT * FROM  users1 where cid=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            }
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div class="container-fluid">
            <table class="table table-dark table-striped ">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
               <tr>
                    
                    <td class="py-2"><?php echo (isset($rows['cid']) ? $rows['cid'] : '') ; ?></td>
                    <td class="py-2"><?php echo (isset($rows['cName']) ? $rows['cName'] : '');?></td>
                    <td class="py-2"><?php echo (isset($rows['E-mail']) ? $rows['E-mail'] : '') ;?></td>
                    <td class="py-2"><?php echo (isset($rows['Balance']) ? $rows['Balance'] : '') ; ?></td>
                </tr>
            </table>
     </div>
        <br><br><br>
        <label for="to">Transfer To:</label>
        <select id="to" name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'conn.php';
                $sid = $_GET['cid'];
                $sql = "SELECT * FROM users1 where cid!=$sid";
                $result = mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['cid'];?>" >
                
                    <?php echo $rows['cName'] ;?> (Balance: 
                    <?php echo $rows['Balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
      </select>
     <br>
     <br>
    <label for="amount">Amount:</label>
    <input type="number" class="form-control" name="amount" id="amount" required>   
    <br><br>
    <div class="text-center" >
            <button class="btn mt-3 wave effect waves-light" name="submit" type="submit" id="myBtn">Transfer</button>
    </div>
  </form>
 </div>

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>