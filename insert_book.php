<?php include_once "connect.php";

if(!isset($_SESSION['account'])){
    echo "<script>window.open('login.php','_self')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php include_once "header.php";?>
 <div class="container mt-5">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5>Insert Book Details</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                   <div class="row">
                   <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                    </div>
                   <div class="mb-3 col-6">
                            <label for="author">Author</label>
                            <input type="text" name="author" id="author" class="form-control">
                        </div>
                     <div class="mb-3 col-6">
                            <label for="no_of_pages">No_of_page</label>
                            <input type="text" name="no_of_pages" id="no_of_pages" class="form-control">
                        </div>
                   </div>
                    
                    <div class="row">
                        
                    <div class="mb-3 col">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" class="form-control">
                        </div>

                        <div class="mb-3 col">
                            <label for="discount_price">Discount_price</label>
                            <input type="text" name="discount_price" id="discount_price" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                    <div class="mb-3 col">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="science">Category Here</option>
                                
                                <!-- Add more categories as needed -->
                                <?php
                                $query =mysqli_query($connect,"select *from categories");
                                while($row = mysqli_fetch_array($query)){
                                    $cat_id =$row['cat_id'];
                                    $cat_title =$row['cat_title'];
                                    echo "<option value ='$cat_id'>$cat_title</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col">
                            <label for="qty">Qty</label>
                            <input type="text" name="qty" id="qty" class="form-control">
                        </div>
                        <div class="mb-3 col">
                            <label for="cover_image">Cover_image</label>
                            <input type="file" name="cover_image" id="cover_image" class="form-control">
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="isbn">isbn</label>
                            <input type="text" name="isbn" id="isbn" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description">description</label>
                            <textarea rows ="4" type="text" name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="create_book" class="btn btn-outline-success w-100" value="Insert Book">
                        </div>
                        <!-- Add more fields for book details here -->
                    </form>

                    
                    <?php
                        if(isset($_POST['create_book'])){
                            $title = $_POST['title'];
                            $author = $_POST['author'];
                            $isbn = $_POST['isbn'];
                            $description = $_POST['description'];
                            $price = $_POST['price'];
                            $discount_price = $_POST['discount_price'];
                            $category = $_POST['category'];
                            $qty = $_POST['qty'];
                            $no_of_pages = $_POST['no_of_pages'];

                            // Image handling
                            $cover_image = $_FILES['cover_image']['name'];
                            $tmp_cover_image = $_FILES['cover_image']['tmp_name'];
                            move_uploaded_file($tmp_cover_image, "images/$cover_image");

                            $query = mysqli_query($connect, "INSERT INTO books (title, author, isbn, description, price, discount_price, category, qty, no_of_pages, cover_image) VALUES ('$title', '$author', '$isbn', '$description', '$price', '$discount_price', '$category', '$qty', '$no_of_pages', '$cover_image')");

                            if($query){
                                echo "<script>window.open('index.php','_self')</script>"; // Added the closing parenthesis for window.open
                            } else {
                                echo "<script>alert('Failed')</script>";
                            }
                        }
                    ?>

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5>Insert Category Details</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="cat_title">Category title</label>
                            <input type="text" name="cat_title" id="cat_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="create_category" class="btn btn-primary w-100" value ="Insert Category">
                        </div>
                        <!-- Add more fields for category details here -->
                    </form>
                    <?php
                        if(isset($_POST['create_category'])){
                            $cat_title = $_POST['cat_title'];
                            $query = mysqli_query($connect, "INSERT INTO categories (cat_title) VALUES ('$cat_title')");
                            if($query){
                                echo "<script>window.open('insert_book.php','_self')</script>"; // Added the closing parenthesis for window.open
                            }else{
                                echo "<script>alert('Failed')</script>";
                            }
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>