<?php
session_start();
if(isset($_SESSION["activeuser"])==false)
{
 header("location:index.php");
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Medicare</title>
    <link rel="icon" href="photos/unnamed.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet">

    <script src="js/jquery-1.8.2.min.js">

    </script>

    <script src="js/bootstrap.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $(document).ajaxStart(function() {
                $("#processing").show();
                $("#andhera").show();
            });
            $(document).ajaxStop(function() {
                $("#processing").hide();
                $("#andhera").hide();
            });
            $("#btnbp").click(function() {
                var uid = $("#txtuid").val();

                var dateofrecord = $("#txtdateofrecord").val();

                var pulse = $("#txtpulse").val();

                var dia = $("#txtdia").val();

                var syst = $("#txtsyst").val();
                if (syst < 120 && dia < 80) {
                    alert("NORMAL");
                } else
                if ((syst >= 120 || syst <= 129) && dia < 80) {
                    alert("ELEVATED");
                } else
                if ((syst >= 130 || syst <= 139) && (dia >= 80 || dia < 89)) {
                    alert("HIGH BLOOD PRESSURE (hypertension stage 1)")
                } else
                if (syst >= 140 && dia >= 90) {
                    alert("HIGH BLOOD PRESSURE (hypertension stage 2)")
                } else {
                    alert("seek emergency care");
                }

                var url = "bpprocess.php?uid=" + uid + "&dateofrecord=" + dateofrecord + "&pulse=" + pulse + "&dia=" + dia + "&syst=" + syst;
                $.get(url, function(response) //callback function
                    {
                        //alert(response);
                        $("#errinfo").html(response);
                    });



            });
            $("#patientprofile").click(function() {
                $(".info1").slideDown(1000);


            });
            $("#patientprofile").dblclick(function() {
                $(".info1").slideUp(1060);
            });
            $("#doctorslips").click(function() {
                $(".info2").slideDown(1000);


            });
            $("#doctorslips").dblclick(function() {
                $(".info2").slideUp(1060);
            });
            $("#recordbp").click(function() {
                $(".info3").slideDown(1000);


            });
            $("#recordbp").dblclick(function() {
                $(".info3").slideUp(1060);
            });
            $("#recordsugar").click(function() {
                $(".info4").slideDown(1000);


            });
            $("#recordsugar").dblclick(function() {
                $(".info4").slideUp(1060);
            });
            $("#bphistory").click(function() {
                $(".info5").slideDown(1000);


            });
            $("#bphistory").dblclick(function() {
                $(".info5").slideUp(1060);
            });
            $("#sugarhistory").click(function() {
                $(".info6").slideDown(1000);


            });
            $("#sugarhistory").dblclick(function() {
                $(".info6").slideUp(1060);
            });
            $("#searchdoctors").click(function() {
                $(".info7").slideDown(1000);


            });
            $("#searchdoctors").dblclick(function() {
                $(".info7").slideUp(1060);
            });
            $("#record").click(function() {
                alert();
                var uid = $("#txtuidsugar").val();

                var dateofrecord = $("#txtdors").val();

                var timerecord = $("#txttime").val();

                var meal = $("#txtmeal").val();

                var resultb = $("#txtresultb").val();

                var medintake = $("#txtmedicinal").val();

                var resultu = $("#txtresultu").val();
                var url = "ajaxrecordsugar.php?uid=" + uid + "&dateofrecord=" + dateofrecord + "&timerecord=" + timerecord + "&meal=" + meal + "&resultb=" + resultb + "&medintake=" + medintake + "&resultu=" + resultu;
                $.get(url, function(response) {
                    //                    alert(response);
                    $("#err").html(response);
                });



            });



        });

    </script>
    <style>
        /*
        body {
        background-image: linear-gradient(to right, deepskyblue, white);
        }
*/

        #patientimg {
            //*  background-color: #333;*/
            background-image: image("fas fa-procedures");
            width: 100px;
            height: 200px;
        }

        #image {
            background-color: lightpink;
        }

        /*
        .dashboard {
            color: white;
            font-family: fantasy;
            font-size: 100px;
            margin-left: 25%;
            text-shadow: 5px 10px grey;
            border-bottom: 5px solid grey;
            margin-right: 5%;




        }
*/

        .brder1 {
            margin-left: 22%;
            border-bottom: 5px solid grey;
            margin-right: 5%;
        }

        /*
        .brder2 {
        margin-left: 25%;
        border-bottom: 5px solid grey;
        margin-right: 5%;
        }
*/

        .info1 {
            display: none;
        }

        .info2 {
            display: none;
        }

        .info3 {
            display: none;
        }

        .info4 {
            display: none;
        }

        .info5 {
            display: none;
        }

        .info6 {
            display: none;
        }

        .info7 {
            display: none;
        }

        #patientprofile:hover {
            cursor: pointer;

        }

        #doctorslips:hover {
            cursor: pointer;
        }

        #recordbp:hover {
            cursor: pointer;
        }

        #recordsugar:hover {
            cursor: pointer;
        }

        .card {
            border-radius: 50%;
        }

        #logout {
            float: right;
            margin-top: 20px;
            margin-right: 10px;
        }

        .bg {
            background-color: deepskyblue;
        }

        .txt {
            color: white;
        }

        #icon {
            border-radius: 50%;
            height: 70px;
            width: 90px;
        }

        #processing {
            background-image: url(photos/Pulse-1s-200px.gif);
            width: 100px;
            height: 100px;
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

        legend {
            color: deepskyblue;
            font-weight: bold;
        }

    </style>
</head>


<body>

    <!-- Button trigger modal -->
    <div class="row" id="r">
        <div class="col-md-12">

            <!--            <a href="logout.php" class="btn btn-dark btn-lg " target="_blank" id="logout">LOGOUT</a>-->
            <!--
            <p class="dashboard">DASHBOARD</p>

            <p class="brder1"></p>
            <p class="brder2"></p>
-->

            <nav class="navbar navbar-light  bg">
                <span class="navbar-brand mb-0 h1 ">
                    <h1 class="txt">DASHBOARD</h1>
                </span>
                <a href="logout.php" class="btn btn-dark btn-lg " id="logout">LOGOUT<i class="fas fa-power-off"></i></a>
            </nav>
        </div>
    </div>



    <div class="row">
        <div class="col-md-2 offset-2 mt-5">

            <div class="card" style="width:260px;border-radius:50%">
                <div id="image">
                    <img src="photos/6468221_preview.png" alt="" style="width:100%;height:200px">
                </div>

            </div>
        </div>
        <div class="col-md-3 offset-2 mt-5 card-body">
            <h2 style="color:black; border-bottom:2px solid grey; text-shadow: 2px 2px white" id="patientprofile">Patient Profile</h2>
            <p style="color:grey" class="info1">Patient has to enter his personal details and about his/her medical condition .Kindly mention ur correct information as this data may be used later</p>
            <a href="Profile-patient.php" class="btn btn-dark btn-lg info1" target="_blank">PATIENT PROFILE</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 offset-2 mt-3">

            <div class="card" style="width:260px">
                <div id="image">
                    <img src="photos/images.jpg" alt="" style="width:100%;height:200px">
                </div>

            </div>
        </div>
        <div class="col-md-3 offset-2 mt-5 card-body">
            <h2 style="color:black; border-bottom:2px solid grey ; text-shadow: 2px 2px white" id="doctorslips">Doctor slips</h2>
            <p style="color:grey" class="info2">This is an excellent feature wherin u can keep records of all the doctor slips .
                This will help u to keep a reminder for when to visit to doctor again and so on . check out this option !!</p>
            <a href="doctor-slip-front.php" class="btn btn-dark btn-lg info2">DOCTOR SLIPS</a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-2 offset-2 mt-3">

            <div class="card" style="width:260px">
                <div id="image">
                    <img src="photos/download.jpg" alt="" style="width:100%;height:200px">
                </div>

            </div>
        </div>
        <div class="col-md-3 offset-2 mt-5 card-body">
            <h2 style="color:black; border-bottom:2px solid grey; text-shadow: 2px 2px white" id="recordbp">Record blood pressure</h2>
            <p style="color:grey" class="info3">Keep a record of ur blood pressure for routine check up .</p>
            <button type="button" class="btn btn-dark btn-lg info3" data-toggle="modal" data-target="#btnchkbp">
                RECORD BLOOD PRESSURE
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 offset-2 mt-3">

            <div class="card" style="width:260px">
                <div id="image">
                    <img src="photos/73303000-the-syringe-and-bottle-of-insulin-medicines-for-the-treatment-of-diabetes-diabetes-single-icon-in-ca.jpg" alt="" style="width:100%;height:200px">
                </div>

            </div>

        </div>
        <div class="col-md-3 offset-2 mt-5 card-body">
            <h2 style="color:black; border-bottom:2px solid grey; text-shadow: 2px 2px white" id="recordsugar">Record sugar</h2>
            <p style="color:grey" class="info4">KEEP THE RECORD OF UR SUGAR .THIS INCLUDES BOTH BLOOD SUGAR AS WELL AS URINE SUGAR</p>
            <button type="button" class="btn btn-dark info4 btn-lg" data-toggle="modal" data-target="#btnchksugar">
                RECORD SUGAR
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 offset-2 mt-3">

            <div class="card" style="width:260px">
                <div id="image">
                    <img src="photos/bphistory.jpg" alt="" style="width:100%;height:200px">
                </div>

            </div>
        </div>
        <div class="col-md-3 offset-2 mt-5 card-body">
            <h2 style="color:black; border-bottom:2px solid grey ; text-shadow: 2px 2px white" id="bphistory">BP History</h2>
            <p style="color:grey" class="info5">CHECK UR BP HISTORY</p>
            <a href="history-bp.php" class="btn btn-dark btn-lg info5">BP HISTORY</a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-2 offset-2 mt-3">

            <div class="card" style="width:260px">
                <div id="image">
                    <img src="photos/download%20(2).jpg" alt="" style="width:100%;height:200px">
                </div>

            </div>
        </div>
        <div class="col-md-3 offset-2 mt-5 card-body">
            <h2 style="color:black; border-bottom:2px solid grey ; text-shadow: 2px 2px white" id="sugarhistory">Sugar History</h2>
            <p style="color:grey" class="info6">CHECK UR SUGAR HISTORY </p>
            <a href="history-sugar.php" class="btn btn-dark btn-lg info6">SUGAR HISTORY </a>

        </div>
    </div>

    <div class="row">
        <div class="col-md-2 offset-2 mt-3">

            <div class="card" style="width:260px">
                <div id="image">
                    <img src="photos/serdoc.png" alt="" style="width:100%;height:200px">
                </div>

            </div>
        </div>
        <div class="col-md-3 offset-2 mt-5 card-body">
            <h2 style="color:black; border-bottom:2px solid grey ; text-shadow: 2px 2px white" id="searchdoctors">Search doctors</h2>
            <p style="color:grey" class="info7">U CAN EASILY SEARCH DOCTORS IN ANY CITY</p>
            <a href="doctor-search-front.php" class="btn btn-dark btn-lg info7">SEARCH DOCTORS</a>

        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="btnchkbp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div id="andhera"></div>
        <div id="processing"></div>


        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg">
                    <h5 class="modal-title txt" id="exampleModalLabel"><img src="photos/timer.png" alt="" id="icon"> RECORD BP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 offset-3 form-group">
                            <label for="txtuid">USER ID </label>
                            <input type="text" id="txtuid" name="uid" class="form-control" value='<?php echo $_SESSION["activeuser"];?>' readonly>
                            <span id="erruid"></span>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="txtdateofrecord">DATE OF RECORD</label>
                            <input type="date" id="txtdateofrecord" name="dateofrecord" class="form-control" required>
                            <span id="errdateofrecord"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="txtpulse">PULSE</label>
                            <input type="text" id="txtpulse" name="pulse" class="form-control" required placeholder="PULSE">
                            <span id="errpulse"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="txtdia">DIASTOLIC</label>
                            <input type="text" id="txtdia" name="dia" class="form-control" placeholder="DIASTOLIC" required>
                            <span id="errdia"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="txtsyst">SYSTOLIC</label>
                            <input type="text" id="txtsyst" name="syst" class="form-control" placeholder="SYSTOLIC" required>
                            <span id="errsyst"></span>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <span id="errinfo">*</span>
                    <input type="button" value="submit" id="btnbp" class="btn-info btn-lg">
                </div>
            </div>
        </div>
    </div>

    <!--modal sugar-->
    <div class="modal" id="btnchksugar" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg">
                    <h5 class="modal-title txt"><img src="photos/sugarr.png" alt="" id="icon"><b> RECORD SUGAR</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="txtuidsugar">USER ID</label>
                            <input type="text" id="txtuidsugar" name="uidsugar" class="form-control" value='<?php echo $_SESSION["activeuser"];?>' readonly>
                            <span id="erruidsugar"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="txtdors">DATE OF RECORD</label>
                            <input type="date" id="txtdors" name="dors" class="form-control" required>
                            <span id="errdors"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="txttime">TIME OF RECORD</label>
                            <input type="time" id="txttime" name="times" class="form-control" required>
                            <span id="errtime"></span>
                        </div>
                    </div>
                    <fieldset class="border border-dark p-4">
                        <legend class="w-auto">BLOOD SUGAR</legend>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="txtmeal">MEAL</label>
                                <select name="meal" id="txtmeal" class="form-control">
                                    <option value="">-select-</option>
                                    <option value="FASTING">Fasting</option>
                                    <option value="BEFORE MEAL">Before Meal</option>
                                    <option value="AFTER MEAL">After Meal</option>
                                    <option value="BEFORE EXCERCISE">Before Exercise</option>
                                    <option value="BED TIME">Bed Time</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="txtage">AGE</label>
                                <input type="text" id="txtage" name="agesugar" class="form-control">
                                <span id="errage" required placeholder="AGE"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="txtresultb">RESULT</label>
                                <input type="text" id="txtresultb" name="resultb" class="form-control" required placeholder="RESULT">
                                <span id="errresultb"></span>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="border border-dark p-4">
                        <legend class="w-auto">URINE SUGAR</legend>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="txtmedicinal">MEDICINAL INTAKE</label>
                                <input type="text" id="txtmedicinal" name="medicinal" class="form-control" required placeholder="MEDICINAL INTAKE">
                                <span id="errmedicinal"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="txtresultu">RESULT</label>
                                <input type="text" id="txtresultu" name="resultu" class="form-control" required placeholder="URINE SUGAR RESULT">
                                <span id="errresultu"></span>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">

                    <span id="err">*</span>
                    <input type="button" class=" btn-outline-info btn-lg" value="record" id="record">

                </div>
            </div>
        </div>
    </div>
</body>

</html>
