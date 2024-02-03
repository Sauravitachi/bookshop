<?php
    include_once "../connect.php";
    if(!isset($_SESSION['admin'])){
        echo "<script>window.open('../login.php','_self')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mannage Books | Admin | Bookshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <?php include_once "./admin_header.php";  ?>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-2">
                <?php include_once "sidebar.php"; ?>
            </div>

            <div class="col-10">
                <table class="table bg-light table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Title</th>
                            <th>author</th>
                            <th>ISBN</th>
                            <th>Create</th>
                            <th>image</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $callingBooks = mysqli_query($connect,"SELECT * FROM books");
                            while($data = mysqli_fetch_array($callingBooks)):
                        ?>

                        <tr>
                            <td><?= $data['id']  ?></td>
                            <td><?= $data['title']  ?></td>
                            <td><?= $data['author']  ?></td>
                            <td><?= $data['isbn']  ?></td>
                            <td><?= $data['discount_price'] ?> <del><?= $data['price']  ?> </del></td>
                            <td>
                                <img width="30px" src="../images/<?= $data['cover_image']  ?>" alt="">
                            </td>
                            <td>
                                    <a href="" class="btn btn-danger">X</a>
                                    <a href="" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-success">View</a>
                            </td>

                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    
</body>
</html>