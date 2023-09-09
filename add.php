<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin-top: 40px;
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
</head>
<body class="body">
    <div class="container">
        <h2 align="center">FORM USER</h2>
    

    <form action="add.php" method="POST" name="addUser">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="mobile"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="add"></td>
            </tr>
            <tr>
                <td> <a href="index.php" class="button">Kembali</a></td>
            </tr>
        </table>
    </form>

    <!-- Handle permintaan POST dari form diatas -->
    <?php
        if(isset($_POST['Submit'])) {
            $name = $_POST['name'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];

            // Memanggil koneksi menuju database
            include_once("connection.php");

            // Query untuk insert data ke database
            $result = mysqli_query($mysqli, 
            "INSERT INTO users (name,email,mobile) VALUES ('$name','$email','$mobile')");

            echo "Berhasil menambah user. <a href='index.php'>Lihat User</a>";
        }
    ?>

    </div>
</body>
</html>