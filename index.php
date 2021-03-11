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
            var flag1 = 0;
            var flag2 = 0;
            var flag3 = 0;
            var flag1l = 0;
            var flag2l = 0;



            //            $('#btnsignup').keypress(function(event) {
            //
            //                var keycode = (event.keyCode ? event.keyCode : event.which);
            //                if (keycode == '13' && flag == 1 && flag2 == 1 && flag3 == 1) {
            //                    var uid = $("#txtuid").val();
            //                    var password = $("#txtpass").val();
            //                    var mobile = $("#txtmob").val();
            //                    if ($("#doctor").prop("checked") == true) {
            //                        var category = $("#doctor").val();
            //                    } else {
            //                        var category = $("#patient").val();
            //                    }
            //                    var url = "ajaxsignup.php?uid=" + uid + "&password=" + password + "&mobile=" + mobile + "&category=" + category;
            //                    $.get(url, function(response) {
            //                        $("#errinfo").html(response);
            //                        //                                alert(response);
            //
            //
            //                    });
            //                } else {
            //                    alert("oops!!! there must be some problem kindly check to it ");
            //
            //                    $("#txtuid").val("");
            //                    $("#txtpass").val("");
            //                    $("#txtmob").val("");
            //                    $("#erruid").html("");
            //                    $("#errpass").html("");
            //                    $("#errmob").html("");
            //                }
            //
            //            });
            $("#btnsignup").click(function() {
                // alert();


                if (flag1 == 1 && flag2 == 1 && flag3 == 1) {
                    var uid = $("#txtuid").val();
                    var password = $("#txtpass").val();
                    var mobile = $("#txtmob").val();
                    if ($("#doctor").prop("checked") == true) {
                        var category = $("#doctor").val();
                    } else {
                        var category = $("#patient").val();
                    }
                    var url = "ajaxsignup.php?uid=" + uid + "&password=" + password + "&mobile=" + mobile + "&category=" + category;
                    $.get(url, function(response) {
                        $("#errinfo").html(response);
                        // alert(response);


                    });
                } else {
                    alert("oops!!! there must be some problem kindly check to it ");
                    //
                    $("#txtuid").val("");
                    $("#txtpass").val("");
                    $("#txtmob").val("");
                    $("#erruid").html("");
                    $("#errpass").html("");
                    $("#errmob").html("");
                }

            });
            $("#btnlogin").click(function() {
                if (flag1l == 1 && flag2l == 1) {
                    var uidl = $("#txtuidl").val();
                    var passwordl = $("#txtpassl").val();
                    var url = "ajaxloginchk.php?useridl=" + uidl + "&passwordl=" + passwordl;
                    $.get(url, function(response) {
                        if (response == "unauthorized ") {
                            $("#errinfol").removeClass("ok").addClass("notok");
                            $("#errinfol").html(response);
                        } else {
                            $("#errinfol").removeClass("notok").addClass("ok");
                            alert(response);
                            if (response == "patient")
                                location.href = "dashboard.php";
                            else {
                                location.href = "doctorprofile.php";
                            }
                        }

                    });
                } else {
                    alert("oops some error occured!!!");
                }
            });

            $("#btnforgotp").click(function() {
                var uidp = $("#uidp").val();
                var url = "ajaxforgotpass.php?uidp=" + uidp;
                $.get(url, function(response) {
                    alert(response);
                });



            })
            $("#txtuid").blur(function() {
                // alert();
                if ($("#txtuid").val() == "") {
                    $("#erruid").addClass("notok").removeClass("ok");
                    $("#erruid").html("enter the userid");
                } else {
                    var uid = $("#txtuid").val();
                    var url = "ajaxchkuid.php?uid=" + uid;
                    $.get(url, function(response) {
                        if (response == "its already available") {
                            $("#erruid").addClass("notok").removeClass("ok");
                            $("#erruid").html(response);
                        } else {
                            $("#erruid").addClass("ok").removeClass("notok");
                            $("#erruid").html(response);
                            flag1 = 1;
                        }
                    })
                }
            });
            $("#txtpass").blur(function() {
                // alert();
                if ($("#txtpass").val() == "") {
                    $("#errpass").addClass("notok").removeClass("ok");
                    $("#errpass").html("enter the password");
                } else {
                    flag2 = 1;
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
                        flag3 = 1;
                    } else {
                        $("#errmob").removeClass("ok").addClass("notok");
                        $("#errmob").html("Invalid");
                    }
                }
            });
            $("#txtuidl").blur(function() {
                if ($("#txtuidl").val() == "") {
                    $("#erruidl").addClass("notok").removeClass("ok");
                    $("#erruidl").html("enter the userid");
                } else {
                    $("#erruidl").html("");
                    flag1l = 1;

                }
            });
            $("#txtpassl").blur(function() {
                if ($("#txtpassl").val() == "") {
                    $("#errpassl").addClass("notok").removeClass("ok");
                    $("#errpassl").html("enter the password");
                } else {
                    $("#errpassl").html("");
                    flag2l = 1;
                }
            })
            $("#btnclose").click(function() {
                $("#txtuid").val("");
                $("#txtpass").val("");
                $("#txtmob").val("");
                $("#erruid").html("");
                $("#errpass").html("");
                $("#errmob").html("");
                $("#errinfo").html("");
            });
            $("#btnclosep").click(function() {
                $("#txtuidl").val("");
                $("#txtpassl").val("");

                $("#errinfol").html("");
            });
            $("#btnclosel").click(function() {
                $("#uidp").val("");

                $("#errinfop").html("");
            });
        });

    </script>
    <style>
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

        #index {
            background-color: lightgray;
        }

        /*
        .background {
        background-image: url(photos/photo-1584982751601-97dcc096659c.jpg);
        background-size: cover;

        }*/
        get #index-card:hover {
            transform: rotate(360deg);
            transition: ease all 1s;
        }

        #btn {
            cursor: pointer;
        }

        .text {
            font-weight: bold;

        }

        #grad {

            background-image: linear-gradient(to right, lightgray, white);
            /* Standard syntax (must be last) */
        }

        #gradd {

            background-image: linear-gradient(to right, lightgray, white);
            /* Standard syntax (must be last) */
        }

        .fac {
            color: deepskyblue;
        }

        .card {
            box-shadow: 2px 2px grey;
        }

        .card:hover {
            transform: translate(0px, 10px);
            box-shadow: 2px 2px deepskyblue;

        }

        .pic {
            border-radius: 50%;

        }

        .bg {
            background-color: deepskyblue;
        }

        fieldset {
            background-image: linear-gradient(to right, white, lightgrey);
        }

        /*
        legend {
        color: deepskyblue;
        }
*/
        .txt {
            color: white;

        }

    </style>

    <title>E-MEDICARE</title>
    <link rel="icon" href="photos/unnamed.png" type="image/x-icon">

</head>


<body class="background">


    <!--
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">PROJECT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active" style="margin-left:880px; margin-right:20px">
                    <input type="button" class="btn-success" data-toggle="modal" data-target="#signup" value="Sign-Up">
                </li>
                <li class="nav-item">
                    <input type="button" data-toggle="modal" data-target="#login" class="btn-success" value="Login">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Forgot Password</a>
                </li>
                <br>
            </ul>


        </div>
    </nav>
-->
    <!--
    <nav class="navbar navbar-expand-lg navbar-dark bg">
        <a class="navbar-brand" href="#"><i class="fas fa-laptop-medical"></i>MEDICARE</a>

        <input type="button" class="btn-danger" data-toggle="modal" data-target="#signup" value="Sign-Up">
        <input type="button" class="btn-danger" data-toggle="modal" data-target="#login" value="LOGIN">
        <a href="forgotpassword.php">forgot password </a>

    </nav>
-->
    <nav class="navbar navbar-expand-lg navbar-light bg">
        <a class="navbar-brand" href="#">E-Medicare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#" data-toggle="modal" data-target="#signup">Sign-up <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="#" data-toggle="modal" data-target="#login">Login <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="#" data-toggle="modal" data-target="#forgetp">Forgot password ? <span class="sr-only">(current)</span></a>

            </div>
        </div>
    </nav>
    <!--
    <div class="row">
        <div class="col-md-8 offset-2">
             <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="10000">
      <img src="photos/c1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="photos/c2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="photos/c3.jpg"  class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
    </div>
    
-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="photos/gif3.gif" alt="" width="100%">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <center>
                <h1>
                    OUR SERVICES
                </h1>
            </center>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <center> <i class="fas fa-tv fa-4x mt-3 fac"></i></center>

                    <div class="card-body">
                        <center>
                            <h5 class="card-title">EASY TO USE</h5>
                        </center>

                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <center> <i class="fas fa-search fa-4x mt-3 fac"></i></center>

                    <div class="card-body">
                        <h5 class="card-title">EASY SEARCHING OF DOCTOR </h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <center> <i class="fas fa-lock fa-4x mt-3 fac"></i></center>
                    <div class="card-body">
                        <h5 class="card-title">SAFE AND SECURE DATA</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <center> <i class="fas fa-clipboard fa-4x mt-3 fac"></i></center>
                    <div class="card-body">
                        <h5 class="card-title">RECORDS UR BP AND SUGAR HISTORY</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <center><i class="fas fa-directions fa-4x mt-3 fac"></i></center>
                    <div class="card-body">
                        <h5 class="card-title">CLEAR NAVIGATION </h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <center><i class="fas fa-upload fa-4x mt-3 fac"></i></center>
                    <div class="card-body">
                        <h5 class="card-title">UPLAOD UR DOCTOR SLIPS </h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <center>
                <h2> MEET THE DEVELOPERS </h2>
            </center>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <fieldset class="border border-info p-4">
                    <legend class="w-auto">
                        <h4>MEET THE DEVELOPER</h4>
                    </legend>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-2">
                                    <img src="photos/ishika.jpg" alt="" width="150px" height="150px" class="pic">
                                </div>
                                <div class="col-md-8 ">
                                    i am ishika currently pursuing degree of BTECH from Guru Nanak Dev University, Amritsar has created this website under the guidance of RAJESH K. BANSAL (Author of "real java") , training head at Sun-Soft Techonologies .
                                </div>
                                <div class="col-md-2">

                                    <img src="photos/sir.jpg" alt="" width="150px" height="150px" class="pic">
                                </div>
                            </div>

                        </div>
                    </div>
                </fieldset>


            </div>
            <!--
            <div class="col-md-6">
                <fieldset class="border border-info p-4">
                    <legend class="w-auto">
                        <h4>UNDER THE GUIDANCE</h4>
                    </legend>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="photos/sir.jpg" alt="" width="250px" height="200px" class="pic">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>


            </div>
-->

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <nav class="navbar navbar-light bg-dark">
                <a class="navbar-brand" href="#">
                    <h4 class="txt">REACH US</h4>
                </a>
            </nav>

        </div>
    </div>
    <div style=" background-color:grey">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-5">
                    <h5 class="txt"><i class="fas fa-1x facc fa-map-marker-alt"></i> &nbsp; New shakti Nagar, House no-44, Bathinda(PUNJAB) , &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pincode-151001 </h5>
                    <h5 class="txt"><i class="fas fa-question-circle facc fa-1x "></i> &nbsp;ishika4774@gmail.com</h5>
                    <!--                    <a href="">ishika4774@gmail.com</a>-->
                </div>
                <div class="col-md-6 mt-5">
                    <h3>FOLLOW US </h3>
                    <h5><i class="fab fa-facebook fa-1x facc txt"><a href="https://www.facebook.com/E-Medicare-104205461392333" class="txt">&nbsp;&nbsp;E-medicare</a></i></h5>
                </div>


            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d215.4662866812809!2d74.9332860569114!3d30.223939422566595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391732ed4156e05f%3A0x238c897cb031daf2!2sNew%20Shakti%20Nagar%2C%20Bathinda%2C%20Punjab%20151001!5e0!3m2!1sen!2sin!4v1595737676828!5m2!1sen!2sin" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-6">
                    <!--                <div class="col-sm-4 offset-sm-2">-->
                    <div class="card border-dark">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/E-Medicare-104205461392333/?modal=admin_todo_tour" width="100%" height="250px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-4"></div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-light bg-light">

                <marquee behavior="scroll" direction="right">Copyright reserved </marquee>

            </nav>
        </div>
    </div>
    <!--
   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
   
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="photos/ishika.jpg" height="100px" class="d-block w-20 pic" alt="...">
    </div>
    <div class="carousel-item">
      <img src="photos/sir.jpg" height="100px"class="d-block w-10 pic" alt="...">
    </div>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <div class="row">
        <div class="col-md-12 bg-light">
            copyrights reserved
        </div>
    </div>



    <!--    sign-up-modAL-->
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="grad">
                <div class="modal-header bg">
                    <h5 class="modal-title txt " id="exampleModalLabel">SIGN-UP HERE</h5>
                    <button type="button" id="btnclose" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <center> <img src="photos/user.png" alt="" class="pic"></center>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="txtuid" class="text">USER-ID</label>
                                <input type="text" id="txtuid" name="uid" class="form-control">
                                <span id="erruid"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="txtpass" class="text">PASSWORD</label>
                                <input type="password" id="txtpass" name="password" class="form-control">
                                <span id="errpass"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="txtmob" class="text">MOBILE</label>
                                <input type="text" id="txtmob" name="mobile" class="form-control">
                                <span id="errmob"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-left:20">
                        <div class="col">
                            <label for="signuptyp" class="text">DOCTOR</label>
                            <input type="radio" id="doctor" value="doctor" name="category">

                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="signuptype" class="text">PATIENT</label>
                            <input type="radio" id="patient" value="patient" name="category">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <span id="errinfo" style="margin-right=40%;color:black;size:20px;font-weight:bolder"></span>
                    <!--                    <button type="button" class="btn btn-outline-info" id="btnreset">RESET</button>-->
                    <button type="button" class="btn btn-outline-info" id="btnsignup">SIGN UP</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="gradd">
                <div class="modal-header bg">
                    <h5 class="modal-title txt" id="exampleModalLabel">LOGIN HERE</h5>
                    <button type="button" id="btnclosel" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <center><img src="photos/icon_login.png" class="pic" alt=""></center>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="txtuidl" class="text">USER-ID</label>
                                <input type="text" id="txtuidl" name="uid" class="form-control">
                                <span id="erruidl"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="txtpassl" class="text">PASSWORD</label>
                                <input type="password" id="txtpassl" name="password" class="form-control">
                                <span id="errpassl"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <span id="errinfol"></span>
                    <button type="button" class="btn btn-outline-info" id="btnlogin">LOGIN</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="forgetp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="gradd">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FORGOT PASSWORD </h5>
                    <button type="button" id="btnclosep" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="uidp" class="text">USER-ID</label>
                                <input type="text" id="uidp" name="uid" class="form-control">
                                <span id="erruidl"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <span id="errinfop"></span>
                    <button type="button" class="btn btn-outline-info" id="btnforgotp">-></button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
