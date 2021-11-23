<?php 
    $telToAdd = $_POST['telMD'];
    $cause = $_POST['causeMD'];
    $fillerName = $_POST['fillerNameMD'];
?>

<?php
    require('connect.php');
    $sql = "SELECT * FROM blacklist_tsmd;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) { 
    while($row = mysqli_fetch_assoc($result)) {
        if ($telToAdd == $row['tel']){
            if ($row['status'] == 1) {
                $addTel = mysqli_query($conn, "UPDATE blacklist_tsmd SET status=2 WHERE tel=$telToAdd");
                break;
            } elseif ($row['status'] == 2) {
                    $addTel = mysqli_query($conn, "UPDATE blacklist_tsmd SET status=3 WHERE tel=$telToAdd");
                    break;
        }
            break;
        } else {
            $addTel = mysqli_query($conn, "INSERT INTO blacklist_tsmd (tel) VALUES ('$telToAdd')");
        }
    }} 
?>
<?php
$webhookurl = "";
date_default_timezone_set("Asia/Bangkok");
$timestamp = date("D j M Y h:i A", strtotime("now"));

$json_data = json_encode([
    // Message
    "content" => "```" . "> ... TwoSis Medic Department ... < " . "\nเพิ่ม " . $telToAdd . " ลงรายชื่อ Blacklist เรียบร้อยแล้ว \n" .">>> $timestamp" . "\nโดย $fillerName" . " ด้วยสาเหตุ $cause".
     "\n----------------------------------" . "```",
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// If you need to debug, or find out why you can't send message uncomment line below, and execute script.
// echo $response;
curl_close( $ch );

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add <?php echo $telToAdd;?> To Blacklist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

</head>

<body>
    <div class="container">
        <div class="alert alert-success mt-5" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>คุณได้ทำการเพิ่ม <strong><span class="fw-bolder"> <?php echo $telToAdd;?></span></strong> ลง Blacklist
                เรียบร้อยแล้ว</p>
            <hr>

            <div class="row">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                            href="#a" role="tab" aria-controls="a">ทำร้ายร่างกายเจ้าหน้าที่</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                            href="#b" role="tab" aria-controls="a">ก่อความวุ่นวายบริเวณสถานีตำรวจ</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                            href="#c" role="tab" aria-controls="a">วางเพลิงรถเจ้าหน้าที่</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                            href="#d" role="tab" aria-controls="a">พูดบัพเจ้าหน้าที่ต่อหน้า/ผ่านโทรศัพท์</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                            href="#e" role="tab" aria-controls="a">กดเรียกเคสเพื่อก่อกวนเจ้าหน้าที่(แบบ GPS และตัว C
                            )</a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="a" role="tabpanel" aria-labelledby="list-home-list">
                            ค่าปลด Blacklist 30,000 บาท</div>
                        <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="list-profile-list">ค่าปลด
                            Blacklist 50,000 บาท</div>
                        <div class="tab-pane fade" id="c" role="tabpanel" aria-labelledby="list-messages-list">ค่าปลด
                            Blacklist 20,000 บาท</div>
                        <div class="tab-pane fade" id="d" role="tabpanel" aria-labelledby="list-settings-list">ค่าปลด
                            Blacklist 20,000 บาท</div>
                        <div class="tab-pane fade" id="e" role="tabpanel" aria-labelledby="list-settings-list">ค่าปลด
                            Blacklist 50,000 บาท</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button href="#" type="button" class="btn btn-outline-secondary btn-block" onclick="gotohomepage()">View
                    Blacklist</button>
            </div>
            <div class="col-6">
                <button href="#" type="button" class="btn btn-danger btn-block" onclick="gotoaddepage()">Add
                    BLacklist</button>
            </div>

        </div>

        <script>
        function gotohomepage() {
            location.href = "index";
        }
        </script>

        <script>
        function gotoaddepage() {
            location.href = "addmedic";
        }
        </script>
    </div>



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