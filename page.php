<?php
    include 'inc/header.php';

    if (!isset($_GET['id'])) {
        die('Unable To Access This Page');
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id = $id";
    $result = mysqli_query($con,$sql);
    $books_count = mysqli_num_rows($result);

    if ($books_count >0) {

        $book = $result->fetch_assoc();
        $updateValue = $book['rcount'] + 1;

        $updateSQL = "UPDATE books SET rcount = $updateValue WHERE id = $id";
        mysqli_query($con,$updateSQL);



?>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left all-book" style="padding: 20px 20px 30px 20px">
        <div class="left-part">
            <img src="thumbs/<?php echo $book['image']; ?>" alt="">
            <ul>
                <li>Name: <?php echo $book['name']; ?></li>
                <li>Writter: <?php echo $book['writter']; ?></li>
                <li>Reader Count: <?php echo $book['rcount']; ?></li>
                <li>Uploader: <?php echo $book['uploader']; ?></li>
                <li>File Size: <?php echo $book['size']; ?></li>
            </ul>

        </div>

        <div class="right-part">
            <p>
                <?php echo $book['description']; ?>
            </p>
        </div>
        <div class="center">
                <a href="<?php echo $book['download']; ?>" target="_blank"><img src="files/download.gif" alt=""></a>
            </div>
    </div>

<?php } else {
    echo "Book Details Not Available.";
} ?>

<?php
    include 'inc/footer.php';
?>