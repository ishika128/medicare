<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/jquery-1.8.2.min.js"></script>


    <script src="js/bootstrap.min.js"></script>


    <script src="js/angular.min.js"></script>
    <script>
        $module = angular.module("mymodule", []);
        $module.controller("mycontroller", function($scope, $http) {
            $scope.jsonarraycities;
            $scope.jsonarraydoctors;
            $scope.selObject1;
            $scope.fetchcities = function() {
                $http.get("angularfetchcities.php").then(ok, notok);

                function ok(response) {
                    alert(JSON.stringify(response.data));
                    $scope.jsonarraycities = response.data;
                    $scope.selObject1 = $scope.jsonarraycities[0]; //point

                }

                function notok(response) {
                    alert(response.data);
                }
                $scope.doShow = function() {
                    alert($scope.selObject1.city);
                }
                $scope.finddoctors = function() {
                    //                    alert($scope.selObject1.city);
                    $http.get("angularfetchdoctorsfromcities.php?city=" + $scope.selObject1.city).then(okk, notokk);

                    function okk(response) {
                        alert(JSON.stringify(response.data));
                        $scope.jsonarraydoctors = response.data;
                    }

                    function notokk(response) {
                        alert(response.data);
                    }
                }

            }
        })

    </script>
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

    </style>
</head>

<body ng-app="mymodule" ng-controller="mycontroller" ng-init="fetchcities();">

    <nav class="navbar navbar-light  bg">
        <span class="navbar-brand mb-0 h1">
            <h2 class="txt"><img src="photos/serdoc.png" id="icon" alt=""> SEARCH FOR DOCTORS</h2>
        </span>
    </nav>
    <!--   <input type="button" ng-click="fetchcities();" value="fetch">-->
    <center>
        <label for="">SELECT CITY</label><select ng-options="obj.city for obj in jsonarraycities" ng-change="doShow();" ng-model="selObject1" class="mt-3"></select>
        <br>
        <input type="button" value="find doctors" class="btn-outline-info btn-lg mt-5" ng-click="finddoctors();">

    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-4" ng-repeat="obj in jsonarraydoctors">
                <div class="card mt-5">
                    <img src="uploads/{{obj.ppic}}" class="card-img-top" height="400" alt="..." style="border:2px 2px 2px 2px">
                    <div class="card-body">
                        <h5 class="card-title"><b>UID:&nbsp;</b>{{obj.uid}}</h5>
                        <p class="card-text"><b>NAME:&nbsp;</b>{{obj.name}}</p>
                        <p class="card-text"><b>CONTACT:&nbsp;</b>{{obj.contact}}</p>
                        <p class="card-text"><b>EMAIL:&nbsp;</b>{{obj.email}}</p>
                        <p class="card-text"><b>WEBSITE:&nbsp;</b>{{obj.website}}</p>
                        <p class="card-text"><b>SPECIALITY:&nbsp;</b>{{obj.sp}}</p>
                        <p class="card-text"><b>WORK EXPERIENCE:&nbsp;</b>{{obj.we}}</p>
                        <p class="card-text"><b>ADDRESS:&nbsp;</b>{{obj.address}}</p>
                        <p class="card-text"><b>CITY:&nbsp;</b>{{obj.city}}</p>
                        <!--                        <a href="#" ng-click="dodelete(obj.uid);" class="btn btn-primary">REMOVE</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
