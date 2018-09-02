<?php
    include 'inc/header.php';
?>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left all-book" style="padding: 20px 20px 30px 20px">
 
<?php

    if (isset($_GET['p']) && $_GET['p'] < 0) {
        $startpage = 1;
    } elseif (isset($_GET['p']) ){
        $startpage = ($_GET['p'] * POST_PER_PAGE) - POST_PER_PAGE;
    } else {
        $startpage = 0;
    }


    $sql = "SELECT id,name,writter,rcount,size,image FROM books LIMIT $startpage,".POST_PER_PAGE;
    $result = mysqli_query($con,$sql);

    $books_count = mysqli_num_rows($result);

    if ($books_count >0 ) {
        while ($row = mysqli_fetch_assoc($result)) {
            $books[] = $row;
        }

    foreach ($books as $key) {
?> 


      <div class="bookDiv" style="float:left; margin: 0 0 35px 0">
            <a href="page.php?id=<?php echo $key['id']; ?>">
                <div><img src="thumbs/<?php echo $key['image']; ?>" border="0" style="width: 90%; height: 300px; border: 1px solid #ee5b2b; border-left: 12px solid #ee5b2b; border-bottom-left-radius: 12px"></div>
            </a>
            <div style="margin: 10px 0 5px 0"><b><?php echo $key['name']; ?></b></div>
            <div style="font-size: 14px; color: #aaaaaa"><?php echo $key['writter']; ?></div>
            <div style="font-size: 14px; color: #aaaaaa">Read Count : <?php echo $key['rcount']; ?></div>
            <div style="font-size: 14px; color: #aaaaaa">File Size : <?php echo $key['size']; ?>Mb</div>
        </div>
<?php
    }
        } else {
            echo "No Books available :(.";
        }

?>


    </div>


    <!-- For Pagination -->
    <div class="pagination center">

<?php
    $sql = "SELECT id FROM books";
    $total = mysqli_num_rows(mysqli_query($con,$sql));
    $total = ceil($total/POST_PER_PAGE);

    for ($i=1; $i <= $total ; $i++) { 
?>
        <a href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a>

<?php } ?>

    </div>

<?php
    include 'inc/footer.php';
?>