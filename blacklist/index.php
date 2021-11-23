<?php 
    $url = "index";
    $sec = "600";
    header("Refresh: $sec; url=$url");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blacklist TSPD & TSMD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>



</head>

<body>

    <div class="container">
        <!-- Title -->
        <div class="alert alert-info mt-3" role="alert">
            <p class="text-center my-auto mx-auto">
                รายชื่อ <strong> Blacklist </strong> TSPD
            </p>
        </div>

        <!-- TABLE -->
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <caption>TwoSis Police Department... 👮👮👮</caption>
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Tel.</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    require('connect.php');
                    $sql = "SELECT * FROM blacklist_tspd ORDER BY status DESC;";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <from action="" method="POST">
                            <td class="text-center"><?php echo $row["tel"]; ?></td>
                            <td class="text-center"<?php echo $row["name"]; ?></td>
                            <td class="text-center"><?php 
                                if ($row["status"] == 1) {
                                    echo "ครั้งที่ 1";
                                } elseif ($row["status"] == 2) {
                                    echo "ครั้งที่ 2";
                                } elseif ($row["status"] == 3) {
                                    echo "ครั้งที่ 3 🟥";
                                } else {
                                    echo "-";
                                }
                            ?></td>
                        </from>
                        <?php } ?>

                    </tr>
                </tbody>
            </table>
        </div>

        <!-- MEDICCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCCC -->
        <div class="alert alert-success mt-3" role="alert">
            <p class="text-center my-auto mx-auto">
                รายชื่อ <strong> Blacklist </strong> TSMD
            </p>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <caption>TwoSis Medic Department.... ​🧑‍⚕️​🩺​</caption>
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Tel.</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    require('connect.php');
                    $sql = "SELECT * FROM blacklist_tsmd ORDER BY status DESC;";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <from action="" method="POST">
                            <td class="text-center"><?php echo $row["tel"]; ?></td>
                            <td class="text-center"><?php echo $row["name"]; ?></td>
                            <td class="text-center"><?php 
                                if ($row["status"] == 1) {
                                    echo "ครั้งที่ 1";
                                } elseif ($row["status"] == 2) {
                                    echo "ครั้งที่ 2";
                                } elseif ($row["status"] == 3) {
                                    echo "ครั้งที่ 3 🟥";
                                } else {
                                    echo "-";
                                }
                            ?></td>
                        </from>
                        <?php } ?>

                    </tr>
                </tbody>
            </table>
        </div>


    </div>

    <!-- Title -->




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>

<?php mysqli_close($conn); ?>