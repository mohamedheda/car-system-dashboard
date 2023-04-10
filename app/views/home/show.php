<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Cars</title>
</head>
<body>
<?php  
require_once('sidebar.php');
?>
<!-- ... page content ... -->
<div style="margin-left:25%">
    <div class="container ">
    <table class="table table-hover">
    <thead class="bg-light">
        <td>Name</td>
        <td>Cost</td>
        <td>Discription</td>
    </thead>
  <tr>
  <?php 
    foreach($cars as $car){ ?>
<td>
        <?= $car['name'] ?>
        
    </td>

    <td>
        <?= $car['cost'] ?>

    </td>

    <td>
        <?= $car['discription'] ?>

    </td>
    <td>
        <a href="/home/edit/?id=<?=$car['id'] ?>" class="btn btn-primary">Edit</a>
</td>
    <td>
        <a href="/home/delete/?id=<?=$car['id'] ?>" class="btn btn-danger">Delete</a>
</td>

  </tr>
   <?php }
    ?>
</table>

        </div>
</div>

</body>
</html>