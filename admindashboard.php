<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MEDICARE</title>
    <link rel="icon" href="photos/unnamed.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">

    <script src="js/jquery-1.8.2.min.js">

    </script>

    <script src="js/bootstrap.min.js">
    </script>
    <style>
        body {
            background-color: #333;
            border-top: 20px solid grey;
            border-left: 20px solid grey;
            border-right: 20px solid grey;
            border-bottom: 20px solid grey;
            position: relative;

        }



        .dashboard {
            color: white;
            font-family: fantasy;
            font-size: 100px;
            margin-left: 25%;
            text-shadow: 5px 10px grey;
            border-bottom: 2px solid yellow;
            margin-right: 5%;




        }

        .brder1 {
            margin-left: 22%;
            border-bottom: 2px solid pink;
            margin-right: 5%;
        }


        .brder2 {
            margin-left: 25%;
            border-bottom: 2px solid green;
            margin-right: 5%;
        }

        #btn {
            height: 100px;
            width: 100%;
            font-family: cursive;
            font-weight: bolder;
            font-size: 24px;
            color: chartreuse;
            background-color: palevioletred;

        }

    </style>
</head>

<body>
    <div class="row" id="r">
        <div class="col-md-12">
            <p class="dashboard">ADMIN DASHBOARD</p>
            <p class="brder1"></p>
            <p class="brder2"></p>

        </div>
        <div class="row">
            <div class="col-md-3 offset-3">
                <div class="card">
                    <img src="photos/download%20(1).jpg" class="card-img-top" alt="..." height="200">
                    <div class="card-body" style="background-color:yellow">

                        <a href="doctormanager.php" class="btn" id="btn" target="_blank">DOCTOR MANAGER</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 offset-2">
                <div class="card">
                    <img src="photos/10-104785_hospital-bed-patient-clip-art-hospital-bed.png" class="card-img-top" height="200" alt="...">
                    <div class="card-body" style="background-color:yellow">

                        <a href="patientmanager.php" class="btn" id="btn" target="_blank">PATIENT MANAGER</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12"></div>
        </div>
    </div>
</body>

</html>
