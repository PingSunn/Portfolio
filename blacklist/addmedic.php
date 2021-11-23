<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSMD Blacklist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>


</head>

<body>
    <div class="container">
        <div class="row my-5">
            <div class="col">
                <form method="POST" action="checkmd">
                    <div class="alert alert-success" role="alert">
                        สำหรับ Blacklist ของกรมการแพทย์ [TSMD]
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fi fi-rr-phone-call"></i></span>
                        <input type="text" class="form-control" placeholder="Tel" aria-label="Tel"
                            aria-describedby="basic-addon1" id="telMD" name ="telMD">
                        <input type="text" class="form-control" placeholder="สาเหตุ" aria-label="Cause"
                            aria-describedby="basic-addon1" id="causeMD" name="causeMD">
                        <input type="text" class="form-control" placeholder="ผู้บันทึก" aria-label="Filler name"
                            aria-describedby="basic-addon1" id="fillerNameMD" name="fillerNameMD">
                        <button class="btn btn-outline-secondary" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>






        <div id="carouselExampleFade" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="https://cdn.discordapp.com/attachments/841698420322598936/878737947950731334/2021-08-21_2.png"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://cdn.discordapp.com/attachments/841698420322598936/873927278340497418/unknown.png"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://cdn.discordapp.com/attachments/841698420322598936/872148416703127572/MELOVEYOU.png"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://cdn.discordapp.com/attachments/841698420322598936/869445465358368828/unknown.png"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://cdn.discordapp.com/attachments/841698420322598936/869625077782704158/unknown.png"
                        class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>