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
            $scope.jsonarray;
            $scope.fetchpatients = function() {
                $http.get("angularfetchpatients.php").then(ok, notok);

                function ok(response) {
                    alert(JSON.stringify(response.data));
                    $scope.jsonarray = response.data;
                }

                function notok(response) {
                    alert(response.data);
                }
            }
        })

    </script>
</head>

<body ng-app="mymodule" ng-controller="mycontroller">
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">PATIENT MANAGER</span>
    </nav>
    <input type="button" style="width:100px" class="btn-success btn-lg" value="fetch" ng-click="fetchpatients();">
    <table width="800" border="1" style="margin-top:30px cell-spacing=70px">
        <tr>
            <th>UID</th>
            <th>NAME</th>
            <th>AGE</th>
            <th>GENDER</th>
            <th>EMAIL</th>
            <th>CITY</th>
            <th>ADDRESS</th>
            <th>CONTACT</th>
            <th>PROBLEMS</th>
        </tr>
        <tr ng-repeat="obj in jsonarray">
            <td>{{obj.uid}}</td>
            <td>{{obj.name}}</td>
            <td>{{obj.age}}</td>
            <td>{{obj.gender}}</td>
            <td>{{obj.email}}</td>
            <td>{{obj.city}}</td>
            <td>{{obj.address}}</td>
            <td>{{obj.contact}}</td>
            <td>{{obj.problems}}</td>
        </tr>

    </table>
</body>

</html>
