<!doctype html>
<html lang="en">

<head>
    <?php
    include 'links.php'
    ?>
    <title>Display users</title>
</head>

<body>
    <div class="container my-5">
        <button class="btn btn-primary mb-5">
            <a href="add_user.php" style="text-decoration: none;" class="text-light">Add User</a>
        </button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S #</th>
                    <th scope="col">Title</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Number in Stock</th>
                    <th scope="col">Rate</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
            <?php
    include 'connection.php';

    $select_query = "select * from movie_form";
    $result = mysqli_query($connection,$select_query);

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $title = $row['title'];
            $genre = $row['genre'];
            $number_in_stock = $row['number in stock'];
            $rate = $row['rate'];

            echo "
            <tr>
            <th scope='row'>$id</th>
            <td>$title</td>
            <td>$genre</td>
            <td>$number_in_stock</td>
            <td>$rate</td>
            <td>
                <button class='btn btn-primary btn-sm'>
                    <a 
                        class='text-light'
                        style='text-decoration: none;'
                        href='update.php?updateid=$id'>Update
                    </a>
                </button>
                <button class='btn btn-danger btn-sm'>
                    <a 
                        class='text-light' 
                        style='text-decoration: none;' 
                        href='delete.php?deleteid=$id'>Delete
                    </a>
                </button>
            </td>
        </tr>
            ";
        }
    }
?>
            </tbody>
        </table>
    </div>
</body>
</html>
