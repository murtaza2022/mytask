<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'links.php';
    ?>
    <title>Update</title>
</head>

<?php
include 'connection.php';


$id = $_GET['updateid'];

$select_query = "select * from add_user where id = $id";
$result_of_select = mysqli_query($connection, $select_query);
$row = mysqli_fetch_assoc($result_of_select);
$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$password = $row['password'];


if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $number_in_stock = $_POST['number in stock'];
    $rate = $_POST['rate'];

    $update_query = "update movie_form set
        title = '$title', genre = '$genre', number in stock = '$number_in_stock', rate = '$rate'
        where id = $id";

    $result = mysqli_query($connection, $update_query);

    if ($result) {
        header('location: display.php');
    } else {
?>
        <script>
            alert('Please try again..')
        </script>
<?php
    }
}
?>

<body>
    <div class="container my-5">
        <form method="POST">
            <!-- Title input -->
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value=<?php echo $title ?> ><br>
            </div>
            <!-- Genre input -->
            <div class="mb-3">
                <label class="form-label">Genre</label>
                <input type="text" class="form-control" name="genre" value=<?php echo $genre ?>><br>
            </div>
            <!-- Number_in_Stock input -->
            <div class="mb-3">
                <label class="form-label">Number in Stock</label>
                <input type="text" class="form-control" name="number in stock" value=<?php echo $number_in_stock ?>><br>
            </div>
            <!-- Rate Input -->
            <div class="mb-3">
                <label class="form-label">Rate</label>
                <input type="float" class="form-control" name="rate" value=<?php echo $rate ?>><br>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>