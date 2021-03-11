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
        $module = angular.module("kuchbhi", []);
        $module.controller("mycontroller", function($scope, $http) {
            $scope.jsonarray;
            $scope.fetchall = function() {
                $http.get("angulardoctorfetch.php").then(ok, notok);

                function ok(response) {
                    alert(JSON.stringify(response.data));
                    $scope.jsonarray = response.data;
                }

                function notok(response) {
                    alert(response.data);
                }
            }
            $scope.dosort = function(cols) {
                $scope.colname = cols;
            }

            $scope.dodelete = function(uid) {
                $http.get("angulardelete.php?uid=" + uid).then(ok, notok);

                function ok(response) {
                    alert(response.data);
                    $scope.fetchall();
                }

                function notok(response) {
                    alert(response.data);
                }

            }


        })

    </script>
    <style>
        /*
        body
        {
            background-color: #333;
        }
*/
        input[type="button"] {
            font-weight: bold;

        }

        card-title {
            color: white;
        }

        card-text {
            color: white;
        }

    </style>
</head>

<body ng-app="kuchbhi" ng-controller="mycontroller">
    <nav class="navbar navbar-light bg-dark">
        <input type="button" class="btn-warning btn-lg" value="ALL DOCTORS" ng-click="fetchall();">
        <label for="" style="margin-left:70%;color:white">Search</label>
        <input type="text" ng-model="ggle.name">

    </nav>

    <center>
        <!--        <input type="button" class="btn-warning btn-lg" value="ALL DOCTORS" ng-click="fetchall();">-->
        <table width="800" border="1" style="margin-top:30px" cell-spacing="70px">
            <tr bg-color="yellow">
                <th ng-click="dosort('uid')">UID</th>
                <th ng-click="dosort('name')">NAME</th>
                <th ng-click="dosort('contact')">CONTACT NO. </th>
                <th ng-click="dosort('email')">EMAIL-ID</th>
                <th ng-click="dosort('sp')">SPECIALITY</th>
                <th></th>
            </tr>
            <tr ng-repeat="obj in jsonarray |orderBy:colname| filter:ggle">
                <td>{{obj.uid}}</td>
                <td>{{obj.name}}</td>
                <td>{{obj.contact}}</td>
                <td>{{obj.email}}</td>
                <td>{{obj.sp}}</td>
                <td>
                    <center><input type="button" class="btn-success" value="remove" ng-click="dodelete(obj.uid);"></center>
                </td>
            </tr>
        </table>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-3" ng-repeat="obj in jsonarray|orderBy:colname| filter:ggle">
                <div class="card mt-5">
                    <img src="uploads/{{obj.ppic}}" class="card-img-top" height="200" alt="..." style="border:2px 2px 2px 2px">
                    <div class="card-body">
                        <h5 class="card-title"><b>UID:</b>{{obj.uid}}</h5>
                        <p class="card-text"><b>NAME:</b>{{obj.name}}</p>
                        <p class="card-text"><b>CONTACT:</b>{{obj.contact}}</p>
                        <p class="card-text"><b>EMAIL:</b>{{obj.email}}</p>
                        <p class="card-text"><b>SPECIALITY:</b>{{obj.sp}}</p>
                        <a href="#" ng-click="dodelete(obj.uid);" class="btn btn-primary">REMOVE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
