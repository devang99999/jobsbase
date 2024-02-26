<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <input type="text" name="page" id=""><br>
        <input type="checkbox" value="No Bugs" name="bugs" id=""> bugs<br>
        <input type="checkbox" value="No Designe Issues" name="designe" id="">designes<br>
        <input type="submit" value="submit">
    </form>
    <?php
    
    $page = $_POST['page'];
    $bugs = $_POST['bugs'];
    $designe = $_POST['designe'];

    $sql = "INSERT INTO pages (pagename, bugs, designe) VALUES ('$page', '$bugs', '$designe')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "success";
    } else {
        echo "failed";
    }

    $query = "SELECT * FROM pages";
    $result2 = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($result2)) {?>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
<?php
    }

    
    ?>
</body>
</html>