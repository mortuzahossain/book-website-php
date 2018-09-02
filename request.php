<?php
    include 'inc/header.php';

    if (isset($_POST['book_name']) && isset($_POST['writer'])) {
      if ($_POST['book_name'] == "" && $_POST['writer'] == "") {
        echo "Please Fill The Form And submit again";
      } else{
        // Save data into database

        $book_name = $_POST['book_name'];
        $writer = $_POST['writer'];

        $sql = "INSERT INTO requests (name,writter) VALUES ('$book_name','$writer')";

        if(mysqli_query($con,$sql)){
          echo "Request Acceped :)";
        } else {
          echo "Server ERROR Please try again!!!";
        }
      }
    }

?>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left all-book" style="padding: 20px 20px 30px 20px">
          <div class="center requestdiv" >
            <form method="post" action="">
              Book Name : <input name="book_name" type="text" ><br>
              Writer Of the Book : <input name="writer" type="text" ><br>
              <input type="submit" value="Submit" name="submit"><br>
            </form>
          </div>
        </div>

<?php
    include 'inc/footer.php';
?>