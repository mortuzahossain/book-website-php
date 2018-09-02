<?php
    include 'dbconfig.php';
?>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title><?php echo TITLE; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="files/style.css" rel="stylesheet" type="text/css">
</head>


<body>
    <div class="clear m_none t_none" style="margin: 0 0 25px 0"></div>

    <div class="container box" style="padding: 0px; border-top-right-radius: 10px; border-top-left-radius: 10px">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 left" style="padding: 20px 20px 30px 20px">
            <a href="index.php"><img border="0" class="logo" src="files/logo.png" width="100%" height="25%"></a>
            <BR>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center" style="padding: 0 0 25px 0">

            <form  style="margin: 25px 0 0 0" method="GET" action="search.php">
                <div style="width: 100%; float:right">
                    <input name="key" type="text" style="height: 30px; width: 50%" tabindex="1" value="" />
                    <input class="ui-button" type="submit" name="search" value="Search">
                </div>
            </form>

        </div>
        <div class="clear"></div>




        <div style="margin: 0 20px 0 20px; border-radius: 10px">
            <div id='cssmenu'>
                <ul>
<?php
    
    $sql = "SELECT menu FROM menus";
    $result = mysqli_query($con,$sql);

    $menu_count = mysqli_num_rows($result);

    if ($menu_count >0 ) {
        while ($row = mysqli_fetch_assoc($result)) {
            $menus[] = $row;
        }

    foreach ($menus as $key) {
    ?>

                    <li><a href="search.php?key=<?php echo $key['menu']; ?>"><?php echo $key['menu']; ?></a></li>

<?php    
    }
        }else {
        echo "Menu Not Added Yet !!";
    } 
    

?>
                    <li><a href="request.php">Create Book Request</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
