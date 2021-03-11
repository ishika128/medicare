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
        $(document).ready(function() {
            //       $("#typeoftest").change(function(){
            //           	alert($(this).prop("selectedIndex"));
            //
            //       });
            $("#fetchall").click(function() {

                //           if($("#typeoftest").prop("selectedindex")==1)
                //               {
                //                   alert("fill the type of test");
                //               }
                var val = $("#typeoftest").prop("selectedIndex");
                if (val == 1) {
                    $("#table3").hide();
                    $("#table2").hide();
                    $("#table1").show();
                }
                if (val == 2) {
                    $("#table1").hide();
                    $("#table3").hide();
                    $("#table2").show();
                }
                if (val == 3) {
                    $("#table1").hide();
                    $("#table2").hide();
                    $("#table3").show();
                }


            })



        })

    </script>
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
                $http.get("angularfetchallsugar.php?uid=" + $scope.txtuid + "&fromdate=" + $fromdate + "&txttodate=" + $txttodate).then(okFx, notOk);

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
            background-color:  deepskyblue;
        }

        #table1 {
            display: none;
        }

        #table2 {
            display: none;
        }

        #table3 {
            display: none;
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
            <h2 class="txt"><img src="photos/sugarr.png" id="icon" alt=""> SUGAR HISTORY</h2>
        </span>
    </nav>
    <center>
        <div class="row">
            <div class="col-md-4 offset-4 form-group">
                <label for="txtuid">USER ID</label>
                <input type="text" id="txtuid" name="uid" class="form-control" placeholder="USER ID " ng-model="txtuid" ng-init="txtuid='<?php echo $_SESSION["activeuser"];?>'" readonly>
                <span id="erruid"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="txtfromdate">FROM</label>
                <input type="date" id="txtfromdate" class="form-control" ng-model="txtfrom" required>
                <span id="errfrom"></span>
            </div>
            <div class="col-md-4 form-group">
                <label for="txttodate">TO</label>
                <input type="date" id="txttodate" class="form-control" ng-model="txtto" required>
                <span id="errto"></span>

            </div>
            <div class="col-md-4 form-group">
                <label for="">TYPE OF TEST</label>
                <select name="" id="typeoftest" class="form-control" required>
                    <option value="0">select</option>
                    <option value="1">blood sugar</option>
                    <option value="2">urine sugar</option>
                    <option value="3">both</option>
                </select>
            </div>
        </div>
        <div class="btn btn-outline-info" ng-click="doFetchAll();" id="fetchall">Fetch All Records</div>
        <hr>
        <h1 style="color:deepskyblue">All records</h1>
        <!--
		<p>
			Serch oin User id Field: <input type="text" ng-model="googler.uid">
		</p>
-->
        <table width="600" border="1" rules="all" id="table1">
            <tr>
                <th>Sr. No.</th>
                <th ng-click="doSort('dateofrecord');">DATE OF RECORD</th>
                <th ng-click="doSort('pulse');">TIME OF RECORD</th>
                <th ng-click="doSort('dia');">SUGAR TIME</th>
                <th ng-click="doSort('syst');">SUGAR RESULT</th>

            </tr>
            <tr ng-repeat="obj in jsonArray |orderBy:colName | filter:googler">
                <td>{{$index+1}}</td>
                <td>{{obj.dateofrrecord}} </td>
                <td>{{obj.timerecord}} </td>
                <td>{{obj.sugartime}} </td>
                <td>{{obj.sugarresult}} </td>
                <!--				<td align="center"><input type="button" value="Delete" ng-click="doDelete(obj.uid);"> </td>-->

            </tr>
        </table>
        <table width="600" border="1" rules="all" id="table2">
            <tr>
                <th>Sr. No.</th>
                <th ng-click="doSort('dateofrecord');">DATE OF RECORD</th>
                <th ng-click="doSort('pulse');">TIME OF RECORD</th>
                <th ng-click="doSort('dia');">MEDICINAL INTAKE</th>
                <th ng-click="doSort('syst');">URINE RESULT</th>

            </tr>
            <tr ng-repeat="obj in jsonArray |orderBy:colName | filter:googler">
                <td>{{$index+1}}</td>
                <td>{{obj.dateofrrecord}} </td>
                <td>{{obj.timerecord}} </td>
                <td>{{obj.medintake}} </td>
                <td>{{obj.urineresult}} </td>
                <!--				<td align="center"><input type="button" value="Delete" ng-click="doDelete(obj.uid);"> </td>-->

            </tr>
        </table>
        <table width="600" border="1" rules="all" id="table3">
            <tr>
                <th>Sr. No.</th>
                <th ng-click="doSort('dateofrecord');">DATE OF RECORD</th>
                <th ng-click="doSort('pulse');">TIME OF RECORD</th>
                <th ng-click="doSort('dia');">SUGAR TIME</th>
                <th ng-click="doSort('syst');">SUGAR RESULT</th>
                <th ng-click="doSort('dia');">MEDICINAL INTAKE</th>
                <th ng-click="doSort('syst');">URINE RESULT</th>


            </tr>
            <tr ng-repeat="obj in jsonArray |orderBy:colName | filter:googler">
                <td>{{$index+1}}</td>
                <td>{{obj.dateofrrecord}} </td>
                <td>{{obj.timerecord}} </td>
                <td>{{obj.sugartime}} </td>
                <td>{{obj.sugarresult}} </td>
                <td>{{obj.medintake}} </td>
                <td>{{obj.urineresult}} </td>
                <!--				<td align="center"><input type="button" value="Delete" ng-click="doDelete(obj.uid);"> </td>-->

            </tr>
        </table>
    </center>



</body>

</html>
