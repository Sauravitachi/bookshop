<?php
include_once "../connect.php";
if (!isset($_SESSION['admin'])) {
    echo "<script>window.open('../login.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mannage Books | Admin | Bookshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-secondary">
    <?php include_once "./admin_header.php";  ?>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-3">
                <?php include_once "sidebar.php"; ?>
            </div>

            <div class="col-9">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-9">
                        <table class="table bg-light table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>cat_title</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $callingCategories = mysqli_query($connect, "SELECT * FROM categories");
                                while ($data = mysqli_fetch_array($callingCategories)) :
                                ?>

                                    <tr>
                                        <td><?= $data['cat_id']  ?></td>
                                        <td><?= $data['cat_title']  ?></td>
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

        </div>
    </div>

</body>

</html>