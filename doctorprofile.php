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

        function showppreview(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#y').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }
        $(document).ready(function() {
            $("#btnfetch").click(function() {
                var uid = $("#txtuid").val();
                var url = "jsonfetchdoctor.php?uid=" + uid;
                $.getJSON(url, function(jsonarray) {

//                    alert(JSON.stringify(jsonarray));
                    if (jsonarray.length == 0) {
                        alert("details not found for this uid ");
                    } else {
                        $("#txtuid").val(jsonarray[0].uid);
                        $("#txtname").val(jsonarray[0].name);
                        $("#txtmob").val(jsonarray[0].contact);
                        $("#txtemail").val(jsonarray[0].email);
                        $("#txtweb").val(jsonarray[0].website);
                        $("#txtsp").val(jsonarray[0].sp);
                        $("#txtqual").val(jsonarray[0].qual);
                        $("#txtst").val(jsonarray[0].st);
                        $("#txtwe").val(jsonarray[0].we);
                        $("#txtadd").val(jsonarray[0].address);
                        $("#txtcity").val(jsonarray[0].city);
                        $("#txtinfo").val(jsonarray[0].info);
                        $("#jasus").val(jsonarray[0].ppic);
                        $("#jasuss").val(jsonarray[0].cpic);
                        $("#x").prop("src", "uploads/" + jsonarray[0].ppic);
                        $("#y").prop("src", "uploads/" + jsonarray[0].cpic);
                    }
                });


            });
            //            $("#btnsignup").click(function() {
            //                var name = $("txtname").val();
            //                if (name == "") {
            //                    alert("fill the data ");
            //                }
            //
            //            })
            $("#txtmob").blur(function() {

                if ($("#txtmob").val() == "") {
                    $("#errmob").addClass("notok").removeClass("ok");
                    $("#errmob").html("enter the mobile no.");
                } else {
                    var r = /^[6-9]{1}[0-9]{9}$/; //reg. expression
                    var number = $("#txtmob").val();
                    var result = r.test(number);
                    if (result == true) {
                        $("#errmob").removeClass("notok").addClass("ok");
                        $("#errmob").html("Valid");


                        $("#btnsubmit").prop("disabled", false);
                        $("#btnupdate").prop("disabled", false);

                    } else {
                        $("#errmob").removeClass("ok").addClass("notok");
                        $("#errmob").html("Invalid");

                        $("#btnsubmit").prop("disabled", true);
                        $("#btnupdate").prop("disabled", true);
                    }
                }
            });
            $("#txtemail").blur(function() {

                if ($("#txtemail").val() == "") {
                    $("#erremail").addClass("notok").removeClass("ok");
                    $("#erremail").html("enter the email-id");
                } else {
                    var r = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                    var email = $("#txtemail").val();
                    var result = r.test(email);
                    if (result == true) {
                        $("#erremail").removeClass("notok").addClass("ok");
                        $("#erremail").html("Valid");

                        $("#btnsubmit").prop("disabled", false);
                        $("#btnupdate").prop("disabled", false);


                    } else {
                        $("#erremail").removeClass("ok").addClass("notok");
                        $("#erremail").html("Invalid");

                        $("#btnsubmit").prop("disabled", true);
                        $("#btnupdate").prop("disabled", true);
                    }
                }
            });
            $("#txtcity").blur(function() {

                if ($("#txtcity").val() == "") {
                    $("#errcity").addClass("notok").removeClass("ok");
                    $("#errcity").html("enter the email-id");
                } else {
                    var r = /^[a-zA-z] ?([a-zA-z]|[a-zA-z] )*[a-zA-z]$/;
                    var city = $("#txtcity").val();
                    var result = r.test(city);
                    if (result == true) {
                        $("#errcity").removeClass("notok").addClass("ok");
                        $("#errcity").html("Valid");

                        $("#btnsubmit").prop("disabled", false);
                        $("#btnupdate").prop("disabled", false);


                    } else {
                        $("#errcity").removeClass("ok").addClass("notok");
                        $("#errcity").html("Invalid");

                        $("#btnsubmit").prop("disabled", true);
                        $("#btnupdate").prop("disabled", true);
                    }
                }
            });

        });

    </script>
</head>

<title>E-Medicare</title>

<link rel="icon" href="photos/unnamed.png" type="image/x-icon">


<style>
    #certificate {
        margin-top: 15%;
        color: black;
        font-weight: bolder;
        size: 30px;

    }

    .bg {
        background-color: deepskyblue;
    }

    #txt {
        color: white;

    }

    #icon {
        border-radius: 50%;
        height: 80px;
    }

    .ok {
        color: green;
        font-weight: bolder;
        font-size: 16px;
    }

    .notok {
        color: red;
        font-weight: bolder;
        font-size: 16px;
    }

</style>

<body id="outer">
    <nav class="navbar navbar-light bg" id="heading">
        <span class="navbar-brand mb-0 h1">
            <h1 id="txt">
                <center><img src="photos/download%20(2).png" id="icon" alt="">DOCTOR PROFILE</center>
            </h1>

        </span>
    </nav>
    <center>
        <h3 class="mt-2"><?php echo "Welcome ".$_SESSION["activeuser"];?></h3>
    </center>

    <div class="container bg-light" id="bdy">

        <form action="doctorprofileprocess.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="jasus" name="jasus">
            <input type="hidden" id="jasuss" name="jasuss">
            <div class="form-row mt-5">
                <div class="col-md-4">
                    <label for="txtuid">DOCTOR UID</label>
                    <input type="text" id="txtuid" name="uid" class="form-control
                " value='<?php echo $_SESSION["activeuser"];?>'>
                    <span id="erruid"></span>
                </div>
                <div class="col-md-4">
                    <input type="button" id="btnfetch" value="fetch" class="bg btn-lg" style="margin-top:30px">
                </div>
                <div class=" col-md-4">
                    <img src="photos/user.png" alt="" height="100" width="100" id="x">

                </div>
            </div>
            <div class="row">
                <div class="col-md-3 offset-8 mt-2">
                    <input type="file" onchange="showpreview(this);" id="ppic" name="ppic">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="txtname">NAME</label>
                    <input type="text" id="txtname" name="name" class="form-control" required>
                    <span id="errname"></span>
                </div>

                <div class="col-md-6 form-group">
                    <label for="txtmob">CONTACT NO.</label>
                    <input type="text" id="txtmob" name="contact" class="form-control" required>
                    <span id="errmob"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="txtemail">EMAIL</label>
                    <input type="text" id="txtemail" name="email" class="form-control" required placeholder="eg : john123@gmail.com">
                    <span id="erremail"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="txtweb">WEBSITE</label>
                    <input type="text" id="txtweb" name="website" class="form-control" required>
                    <span id="errweb"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="txtsp">SPECIALIZATION</label>
                    <select name="sp" id="txtsp" class="form-control" required>
                        <option value="none">select</option>
                        <option value="general surgery">general surgery</option>
                        <option value="Cardiothoracic Surgery ">Cardiothoracic Surgery </option>
                        <option value="Vascular Surgery">Vascular Surgery</option>
                        <option value="Cosmetic and Reconstructive Surgery">Cosmetic and Reconstructive Surgery</option>
                        <option value="Transplant Surgery">Transplant Surgery</option>
                        <option value="Orthopedic Surgery">Orthopedic Surgery</option>
                        <option value="Neurosurgery">Neurosurgery</option>
                        <option value="Urology">Urology </option>
                        <option value="ENT">ENT</option>
                        <option value="Ophthalmology">Ophthalmology</option>
                        <option value="Gynecology"> Gynecology</option>
                        <option value="Dermatology">Dermatology</option>
                        <option value="Neurology">Neurology</option>
                        <option value="Pathology">Pathology</option>
                        <option value="Radiology">Radiology</option>
                        <option value="Pediatrics">Pediatrics </option>
                        <option value="Optometrists">Optometrists</option>
                        <option value="Psychiatry">Psychiatry</option>
                    </select>
                    <span id="errsp"></span>
                </div>

                <div class="col-md-6">
                    <label for="txtqual">QUALIFICATION</label>
                    <input type="text" id="txtqual" name="qual" class="form-control" required>
                    <span id="errqual"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <label for="txtst">STUDIED FROM</label>
                    <input type="text" id="txtst" name="st" class="form-control" required>
                    <span id="errst"></span>
                </div>
                <div class="col-md-6">
                    <label for="txtwe">WORK EXPERIENCE</label>
                    <input type="text" id="txtwe" name="we" class="form-control" required>
                    <span id="errwe"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <label for="txtadd">ADDRESS</label>
                    <input type="text" id="txtadd" name="add" class="form-control" required>
                    <span id="erradd"></span>
                </div>
                <div class="col-md-6">
                    <label for="txtcity">CITY</label>
                    <input type="text" id="txtcity" name="city" class="form-control" required>
                    <span id="errcity"></span>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6" id="certificate">
                    <h3> UPLOAD UR CERTIFICATE</h3>
                </div>
                <div class="col-md-6 mt-4 ">
                    <img src="photos/certificate.png" id="y" alt="" width="500" height="300" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 offset-8 mt-2">
                    <input type="file" onchange=" showppreview(this);" id="cpic" name="cpic">
                </div>
            </div>


            <div class="form-row">
                <div class="col-md-12 form-group">
                    <label for="txtinfo">OTHER INFORMATION</label>
                    <textarea name="info" id="txtinfo" cols="50" rows="6" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="col-md-6 offset-5">
                    <input type="submit" value="submit" name="btn" class=" btn-lg btn-outline-info" id="btnsubmit">
                    <input type="submit" value="update" name="btn" class="btn-lg ml-5 btn-outline-info" id="btnupdate">
                    <span id="err" class="mt-5 ml-2"></span>

                </div>

            </div>
        </form>
    </div>
</body>

</html>
