<?php

    include_once("connection.php");

    // Update
    if (isset($_POST['update'])) {
        $id = $_POST['id'];

        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        // query untuk update data
        $query = mysqli_query($mysqli,
        "UPDATE users SET name='$name', email='$email', mobile='$mobile' WHERE id='$id' ");

        header('Location: index.php');
    }

    // Ambil data user
    $id = $_GET['id'];

    $query = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$id'");

    while($user_data = mysqli_fetch_array($query)) {
        $name = $user_data['name'];
        $email = $user_data['email'];
        $mobile = $user_data['mobile'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat User</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin-top: 20px;
        padding: 0;
    }

    .container {
         max-width: 700px;
            text-align: center;
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
    

    

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table td {
        padding: 10px;
    }

    input[type="text"] {
         width: 35vw;
            margin: 0.5rem 0;
            padding: 0.4rem 0.1rem;
            outline: 1px solid #000;
            border-radius: 5px;
            text-align: left;
    }

    input[type="submit"] {
         background-color: #373A36;
            width: 30vw;
            margin-top: 10px;
            padding: 10px 20px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #696969;
    }
</style>

<body class="body">
    <div class="container">
        <h2>FORM UPDATE USER</h2>
    


    <form action="edit.php" method="POST" name="editUser">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="name" value="<?= $name ?>"></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="mobile" value="<?= $mobile ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?= $email ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
            <tr>
                <td><a href="index.php" class="button">Kembali</a></td>
            </tr>
        </table>
    </form>
</body>
</html>