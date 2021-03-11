<?php
session_start();
?>
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
        $module.controller("mycontroller", function($scope, $http, $filter) {
            $scope.jsonArray;
            $scope.txtuid;
            $scope.txtfrom;
            $scope.txtto;

            $scope.doFetchAll = function() {
                //sending JSON request
                $fromdate = $filter('date')($scope.txtfrom, "yyyy-MM-dd");
                $txttodate = $filter('date')($scope.txtto, "yyyy-MM-dd");
                $http.get("angularfetchallbp.php?uid=" + $scope.txtuid + "&fromdate=" + $fromdate + "&txttodate=" + $txttodate).then(okFx, notOk);

                function okFx(response) {
                    $scope.jsonArray = response.data;

                    //                    alert(JSON.stringify(response.data)); //data==jsonArray
                }

                function notOk(response) {
                    alert(response.data);
                }
            }


            $scope.doSort = function(colm) {
                $scope.colName = colm;
            }
        });

    </script>
    <style>
        th {
            cursor: pointer;
        }

        th:hover {
            background-color: deepskyblue;
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

    </style>
</head>

<body ng-app="mymodule" ng-controller="mycontroller">
    <nav class="navbar navbar-light  bg">
        <span class="navbar-brand mb-0 h1">
            <h2 class="txt"><img src="photos/timer.png" id="icon" alt=""> BP HISTORY</h2>
        </span>
    </nav>
    <center>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-4 form-group mt-5">
                    <label for="txtuid">USER ID</label>
                    <input type="text" id="txtuid" name="uid" class="form-control" placeholder="USER ID " ng-model="txtuid" ng-init="txtuid='<?php echo $_SESSION["activeuser"];?>' " readonly>
                    <span id="erruid"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-2 form-group">
                    <label for="txtfromdate">FROM</label>
                    <input type="date" id="txtfromdate" class="form-control" ng-model="txtfrom" required>
                    <span id="errfrom"></span>
                </div>
                <div class="col-md-4 form-group">
                    <label for="txttodate">TO</label>
                    <input type="date" id="txttodate" class="form-control" ng-model="txtto" required>
                    <span id="errto"></span>

                </div>
            </div>
        </div>
        <div class="btn btn-outline-info" ng-click="doFetchAll();">Fetch All Records</div>
        <hr>
        <h1 style="color:deepskyblue">All records</h1>
        <!--
        <p>
            Serch oin User id Field: <input type="text" ng-model="googler.uid">
        </p>
-->
        <table width="600" border="1" rules="all">
            <tr>
                <th>Sr. No.</th>
                <th ng-click="doSort('dateofrecord');">DATE OF RECORD</th>
                <th ng-click="doSort('pulse');">PULSE</th>
                <th ng-click="doSort('dia');">DIASTOLIC</th>
                <th ng-click="doSort('syst');">SYSTOLIC</th>

            </tr>
            <tr ng-repeat="obj in jsonArray |orderBy:colName | filter:googler">
                <td>{{$index+1}}</td>
                <td>{{obj.dateofrecord}} </td>
                <td>{{obj.pulse}} </td>
                <td>{{obj.dia}} </td>
                <td>{{obj.syst}} </td>
                <!--				<td align="center"><input type="button" value="Delete" ng-click="doDelete(obj.uid);"> </td>-->

            </tr>
        </table>
    </center>



</body>

</html>
