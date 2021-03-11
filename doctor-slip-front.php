<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">

    <script src="js/jquery-1.8.2.min.js">

    </script>

    <script src="js/bootstrap.min.js">
    </script>
    <script>
        function showpreview(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#x').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }

        }
        //        $(document).ready(function() {
        //
        // $(document).ajaxStart(function() {
        // $("#processing").show();
        // $("#andhera").show();
        // });
        // $(document).ajaxStop(function() {
        // $("#processing").hide();
        // $("#andhera").hide();
        // });
        // }

    </script>
</head>
<title>MEDICARE</title>
<link rel="icon" href="photos/unnamed.png" type="image/x-icon">
<style>
    .bg {
        background-color: deepskyblue;
    }

    .txt {
        color: white;
    }

    #icon {
        border-radius: 50%;
        height: 80px;
    }

    /*
    #processing {
        background-image: url(photos/Pulse-1s-200px.gif);
        width: 150px;
        height: 150px;
        border: 1px gray solid;
        background-size: contain;
        position: absolute;
        margin-left: 45%;
        margin-top: 20%;
        z-index: 10;
        display: none;
    }

    #andhera {
        width: 100%;
        height: 100%;
        background-color: darkgray;
        opacity: .5;
        position: absolute;
        z-index: 10;
        display: none;
    }
*/

</style>

<body id="outer">
    <div id="andhera"></div>
    <div id="processing"></div>

    <nav class="navbar navbar-light  bg">
        <span class="navbar-brand mb-0 h1">

            <h2 class="txt"><img src="photos/slippppp.jpg" alt="" id="icon"> DOCTOR SLIP</h2>
        </span>
    </nav>
    <div class="bdy">

        <div class="container mt-5" id="bdy">
            <form action="doctorslipprocess.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="txtuid">PATIENT UID</label>
                        <input type="text" id="txtuid" name="patientuid" class="form-control" value='<?php echo $_SESSION["activeuser"];?>' readonly>
                        <span id="erruid"></span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="txtdname">DOCTOR NAME</label>
                        <input type="text" id="txtdoctorname" name="doctorname" class="form-control" placeholder="DOCTOR NAME" required>
                        <span id="errdname"></span>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="txtdov">DATE OF VISIT</label>
                        <input type="date" id="txtdov" name="dovisit" class="form-control" placeholder="DATE OF VISIT" required>
                        <span id="errdovisit"></span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="txtnextdov">NEXT DATE OF VISIT</label>
                        <input type="date" id="txtnextdov" name="nextdov" class="form-control" placeholder="NEXT DATE OF VISIT" required>
                        <span id="errnextdov"></span>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="txtdov">HOSPITAL NAME (if any)</label>
                        <input type="text" id="txthospital" name="hospital" class="form-control" placeholder="HOSPITAL NAME" required>
                        <span id="errhospital"></span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="txtnextdov">CITY</label>
                        <input type="text" id="txtcity" name="city" class="form-control" placeholder="CITY" required>
                        <span id="errcity"></span>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">

                        <label for="txtdiscussion">DISCUSSION (with doctor, medicine etc .)</label>
                        <textarea name="discussion" id="txtdiscussion" cols="30" rows="10" class="form-control" required></textarea>
                        <span id="errdovisit"></span>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="txtproblem">PROBLEM</label>
                                <input type="text" id="txtproblem" name="problem" class="form-control" placeholder="PROBLEM" required>
                                <span id="errproblem"></span>
                            </div>
                            <div class="col-md-12">
                                <label for="">UPLOAD SLIP PIC </label>
                                <input type="file" id="slippic" name="slippic" value="upload slip" class="mt-3" onchange="showpreview(this)">
                                <img src="photos/certificate.png" alt="" id="x" height="200" width="200">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="submit" class="btn-success btn-lg">
                </div>

            </form>
        </div>
    </div>
</body>

</html>
