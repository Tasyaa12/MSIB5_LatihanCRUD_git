<?php

// Memanggil koneksi menuju database
include_once("connection.php");

// Memanggil data dari database
$result = mysqli_query($mysqli, 'SELECT * FROM users');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 40px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      border-radius: 8px;
      background-color: #fff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #8DA242;
    }

    .button{
      background-color: #A7BC5B;
      color: white; 
      padding: 0.7rem;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      text-decoration :none;
    }

    table, td, th {
      border: 2px solid;
      margin-top: 20px;
      text-align: center;
      height: 40px; 
    }

    table {
      width: 100%;
      border: 1px solid; 
      text-align: center;
      height: 35px;
    }

    tr:nth-child(even) {
      background-color: #f5f5f5;
    }

    td a {
      color: #A7BC5B;
    }
  </style>
</head>
<body class="body">
  <div class="container">
    <h2 align="center">DATA USER</h2>
    <a href="add.php" class="button">Tambah User</a>

    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php
            while($user_data = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $user_data['name']; ?></td>
            <td><?php echo $user_data['mobile']; ?></td>
            <td><?php echo $user_data['email']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $user_data['id']; ?>">Edit</a> | <a href="delete.php?id=<?php echo $user_data['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
    </div>

</body>
</html>

