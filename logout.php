
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">

</head>
<body>
    
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="assets/js/sweetalert.min.js"></script>

<?php
session_start();



session_destroy();
?>

<script>

swal('Logout successful!', '', 'success');

var s = setTimeout(showalert, 1000 );
function showalert(){
    location.replace("login.php");

}

</script>
<?php
exit();
?>

</body>
</html>