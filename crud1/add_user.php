<!doctype html>
<html lang="en">
  <head>
    <?php
        include 'links.php'
    ?>
    <title>Hamza</title>
  </head>
  <body>
  <div class="container my-5">
    <form method="POST">
        <h1> Movie Form </h1>
        <!-- Name input -->
        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <!-- Email input -->
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre">
        </div>
        <!-- Name input -->
        <div class="mb-3">
            <label for="Number in Stock" class="form-label">Number in Stock</label>
            <input type="text" class="form-control" id="number in stock" name="number in stock">
        </div>
        <!-- Password Input -->
        <div class="mb-3">
            <label for="rate" class="form-label">Rate</label>
            <input type="float" class="form-control" id="rate" name="rate">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

  </body>
</html>

<?php
    include 'connection.php';

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $number_in_stock = $_POST['number in stock'];
        $rate = $_POST['rate'];

        $insert_query = "insert into movie_form(title, genre, number in stock, rate)
        values('$title', '$genre', '$number_in_stock', '$rate')";

        $result = mysqli_query($connection, $insert_query);

        if($result){
           header('location: display.php');
        }else {
            ?>
                <script>
                    alert('Data does not insert successfully')
                </script>
            <?php
        }
    }
?>