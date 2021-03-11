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
        $(document).ready(function() {
            var fname = 0;
            var fage = 0;
            var fgender = 0;
            var femail = 0;
            var fcity = 0;
            var faddress = 0;
            var fmobile = 0;
            var fhealth = 0;
            var flag3 = 0;
            $(document).ajaxStart(function() {
                $("#processing").show();
                $("#andhera").show();
            });
            $(document).ajaxStop(function() {
                $("#processing").hide();
                $("#andhera").hide();
            });
            $("#btnsubmit").click(function() {
                if (fname == 1 && fage == 1 && fgender == 1 && femail == 1 && fcity == 1 && faddress == 1 && fmobile == 1 && fhealth == 1 && flag3 == 1) {
                    var uid = $("#txtuid").val();
                    var name = $("#txtname").val();
                    var age = $("#txtage").val();
                    var gender = $("#gender").val();
                    var email = $("#txtemail").val();
                    var city = $("#txtcity").val();
                    var address = $("#txtaddress").val();
                    var mobile = $("#txtmob").val();
                    var health = $("#txthealth").val();
                    var url = "patientprofileprocess.php?uid=" + uid + "&name=" + name + "&age=" + age + "&gender=" + gender + "&email=" + email + "&city=" + city + "&address=" + address + "&mobile=" + mobile + "&problems=" + health;
                    $.get(url, function(response) {
                        $("#errinfo").html(response);

                    });
                } else {
                    alert("enter proper details");
                }
            })
            $("#btnfetch").click(function() {
                var uid = $("#txtuid").val();
                var url = "patientprofilefetch.php?uid=" + uid;
                $.getJSON(url, function(jsonarray) {

                    if (jsonarray.length == 0) {
                        alert("Details not found for this uid ");
                    } else {
                        $("#txtname").val(jsonarray[0].name);
                        $("#txtage").val(jsonarray[0].age);
                        $("#gender").val(jsonarray[0].gender);
                        $("#txtemail").val(jsonarray[0].email);
                        $("#txtcity").val(jsonarray[0].city);
                        $("#txtaddress").val(jsonarray[0].address);
                        $("#txtmob").val(jsonarray[0].contact);
                        $("#txthealth").val(jsonarray[0].problems);
                    }
                })
            })
            $("#btnupdate").click(function() {

                var uid = $("#txtuid").val();

                var name = $("#txtname").val();
                var age = $("#txtage").val();
                var gender = $("#gender").val();
                var email = $("#txtemail").val();
                var city = $("#txtcity").val();
                var address = $("#txtaddress").val();
                var mobile = $("#txtmob").val();
                var health = $("#txthealth").val();
                if (name != "" && age != "" && gender != "" && email != "" && city != "" && address != "" && mobile != "" && health != "") {
                    var url = "patientprofileupdate.php?uid=" + uid + "&name=" + name + "&age=" + age + "&gender=" + gender + "&email=" + email + "&city=" + city + "&address=" + address + "&mobile=" + mobile + "&problems=" + health;
                    $.get(url, function(response) {
                        $("#errinfo").html(response);

                    });
                } else {
                    alert("Enter the complete details");
                }

            })
            $("#txtname").blur(function() {
                if ($("#txtname").val() == "") {
                    fname = 0;
                } else {
                    fname = 1;
                }
            })
            $("#txtage").blur(function() {
                if ($("#txtage").val() == "") {
                    fage = 0;
                } else {
                    fage = 1;
                }
            })
            $("#gender").blur(function() {
                if ($("#gender").val() == "") {
                    fgender = 0;
                } else {
                    fgender = 1;
                }
            })
            $("#txtemail").blur(function() {
                if ($("#txtemail").val() == "") {
                    femail = 0;
                } else {
                    var r = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                    var email = $("#txtemail").val();
                    var result = r.test(email);
                    if (result == true) {
                        $("#erremail").removeClass("notok").addClass("ok");
                        $("#erremail").html("Valid");
                        femail = 0;
                        if (fmobile == 1) {
                            $("#btnsubmit").prop("disabled", false);
                            $("#btnupdate").prop("disabled", false);
                        } else {
                            $("#btnsubmit").prop("disabled", true);
                            $("#btnupdate").prop("disabled", true);
                        }



                    } else {
                        $("#erremail").removeClass("ok").addClass("notok");
                        $("#erremail").html("Invalid");

                        femail = 1;

                        $("#btnsubmit").prop("disabled", true);
                        $("#btnupdate").prop("disabled", true);
                    }
                }

            });
            //              $("#txtemail").blur(function() {
            //
            //                if ($("#txtemail").val() == "") {
            //                    $("#erremail").addClass("notok").removeClass("ok");
            //                    $("#erremail").html("enter the email-id");
            //                } else {
            //                    var r = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
            //                    var email = $("#txtemail").val();
            //                    var result = r.test(email);
            //                    if (result == true) {
            //                        $("#erremail").removeClass("notok").addClass("ok");
            //                        $("#erremail").html("Valid");
            //
            //                        $("#btnsubmit").prop("disabled", false);
            //                        $("#btnupdate").prop("disabled", false);
            //
            //
            //                    } else {
            //                        $("#erremail").removeClass("ok").addClass("notok");
            //                        $("#erremail").html("Invalid");
            //
            //                        $("#btnsubmit").prop("disabled", true);
            //                        $("#btnupdate").prop("disabled", true);
            //                    }
            //                }
            //            });
            $("#txtcity").blur(function() {
                if ($("#txtcity").val() == "") {
                    fcity = 0;
                } else {
                    fcity = 1;
                }
            });
            $("#txtaddress").blur(function() {
                if ($("#txtaddress").val() == "") {
                    faddress = 0;
                } else {
                    faddress = 1;
                }
            });
            $("#txtmob").blur(function() {
                if ($("#txtmobile").val() == "") {
                    fmobile = 0;
                } else {
                    fmobile = 1;
                }
            });
            $("#txthealth").blur(function() {
                if ($("#txthealth").val() == "") {
                    fhealth = 0;
                } else {
                    fhealth = 1;
                }
            });
            $("#txtmob").blur(function() {
                // alert();
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
                        if (femail == 0) {
                            $("#btnsubmit").prop("disabled", false);
                            $("#btnupdate").prop("disabled", false);
                        }
                    } else {
                        $("#errmob").removeClass("ok").addClass("notok");
                        $("#errmob").html("Invalid");
                        $("#btnsubmit").prop("disabled", true);
                        $("#btnupdate").prop("disabled", true);
                    }
                }
            });
        })

    </script>
    <style>
        #heading {
            margin-left: 640px;
            font-weight: bolder;
            font-size: 21px;
        }

        #btnfetch {
            margin-top: 30px;

        }



        fieldset {
            background-image: linear-gradient(to right, darkskyblue, white);

        }



        h1 {
            color: black;

            margin-right: 5%;
            margin-left: 30%;
            font-size: 70px;
            text-shadow: 5px 2px grey;
        }



        .bg-pink {
            background-color: hotpink;
        }

        legend {
            color: deepskyblue;
            font-weight: bold;
        }

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
            height: 1800px;
            background-color: darkgray;
            opacity: .5;
            position: absolute;
            z-index: 10;
            display: none;
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
</head>
<title>E-MEDICARE</title>
<link rel="icon" href="photos/unnamed.png" type="image/x-icon">

<body>

    <div id="andhera"></div>
    <div id="processing"></div>


    <nav class="navbar navbar-light  bg">
        <span class="navbar-brand mb-0 h1">
            <h2 class="txt"><img src="photos/dev.png" id="icon" alt=""> PATIENT PROFILE</h2>
        </span>
    </nav>

    <div class="container mt-4">
        <!--
          <div id="andhera"></div>
    <div id="processing"></div>
-->



        <div class="row">
            <div class="col-md-12">
                <fieldset class="border border-dark p-4">
                    <legend class="w-auto">Personal Details</legend>
                    <div class="row">
                        <div class="col-md-4 form-group">

                            <label for="txtuid">UID</label>
                            <input type="text" name="uid" id="txtuid" class="form-control" value='<?php echo $_SESSION["activeuser"];?>' readonly>
                            <span id="erruid"></span>
                        </div>


                        <div class="col-md-2">
                            <input type="button" value="fetch" id="btnfetch" class="btn btn-outline-info" class="form-control">
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="txtcity">CITY</label>
                            <input type="text" id="txtcity" name="city" class="form-control">
                            <span id="errcity"></span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="txtname">NAME</label>
                            <input type="text" id="txtname" name="name" class="form-control">
                            <span id="errname"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="txtage">AGE</label>
                            <input type="text" id="txtage" name="age" class="form-control">
                            <span id="errage"></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="txtname">GENDER</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="none">-select-</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                                <option value="others">other</option>
                            </select>
                            <span id="errname"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="txtadd">ADDRESS</label>
                            <input type="text" id="txtaddress" name="address" class="form-control">
                            <span id="erradd"></span> </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <fieldset class="border border-dark p-4">
                    <legend class="w-auto">Contact Details</legend>
                    <div class="row">

                        <div class="col-md-6 form-group">

                            <label for="txtemail">EMAIL</label>
                            <input type="text" id="txtemail" name="email" class="form-control">
                            <span id="erremail"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="txtmob">MOBILE</label>
                            <input type="text" id="txtmob" name="mobile" class="form-control">
                            <span id="errmob"></span>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <fieldset class="border border-dark p-4">
                    <legend class="w-auto">Health Details</legend>
                    <div class="row mt-5">
                        <div class="col-md-8  form-group">
                            <label for="txthealth">HEALTH PROBLEMS</label>
                            <textarea name="problems" id="txthealth" cols="30" rows="10" class="form-control">

            </textarea>

                        </div>
                    </div>
                </fieldset>
            </div>
        </div>




        <div class="row">
            <div class="col-md-12 ">
                <center>
                    <input type="button" value="submit" id="btnsubmit" class="btn btn-outline-info mt-5 btn-lg">


                    <input type="button" value="update" id="btnupdate" class="btn btn-outline-info ml-5 mt-5 btn-lg">

                    <span id="errinfo" class="mt-5" style="color:black;font-size:22px;font-weight:bolder;margin-left:10%;margin-top:5%">*</span>
                </center>


            </div>

        </div>
    </div>

</body>

</html>
