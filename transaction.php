<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transaction History</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fi">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  <!--stylesheet-->
    <link rel="stylesheet" href="./sty.css"/>
    <link rel="stylesheet" href="./st.css"/>
    <link rel="stylesheet" href="./sty2.css"/>
    
   <style>
        .mt-0 {
            padding: 1px;
            top: 0;
            align:center;

        }

        * {
            font-family: Poppins;
        }
    </style>
</head>

<body>

<div class="header">
        <a href="#default" class="fas fa-landmark">Money Bank</a>
        <div class="header-right">
         <a class=" glyphicon glyphicon-home" href="index.php">Home</a>
          <a class="glyphicon glyphicon-user" href="transfer.php">Customers</a>
          <a  class="active glyphicon glyphicon-credit-card" href="./transaction.php">Transaction</a>
          
        </div>
      </div>

      <img class="bg" src="bank3.jpg" alt="iit">
    <div class="center" >
        <h3><b>Transaction History</b></h3>
    </div>
    <div class="container" >
        <br>
        <div class="container-fluid table-responsive-sm" >
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Sr No.</th>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Recipient</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include './conn.php';

                    $sql = "SELECT * from transaction";

                   $query = mysqli_query($conn, $sql);
                
                    while ($rows = mysqli_fetch_assoc($query)) {


                    ?>

                        <tr>
                            <td class="center py-2"><?php echo $rows['srno.']; ?></td>
                            <td class="center py-2"><?php echo $rows['sender']; ?></td>
                            <td class="center py-2"><?php echo $rows['receiver']; ?></td>
                            <td class="center py-2"><?php echo $rows['Balance']; ?> </td>
                            <td class="center py-2"><?php echo $rows['date_time']; ?> </td>

                        <?php
                    }
                    mysqli_close($conn);
                        ?>
                </tbody>
            </table>

        </div>
    </div>
    <div class="footer">
      <h1>Stay Connected</h1>
        <p>FIND US ON SOCIAL MEDIA</p>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <i class="social-icon fa fa-facebook-square" aria-hidden></i>
        <i class="social-icon fa fa-twitter" aria-hidden="true"></i>
        <i class="social-icon fa fa-linkedin" aria-hidden="true"></i>
        <i class="social-icon fa fa-instagram" aria-hidden="true"></i>
  
        <p>&copy JULY 2021. Made by <b>MANASVI DWIVEDI</b>
        <p> At The Sparks Foundation</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>