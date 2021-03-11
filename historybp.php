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
		$module.controller("mycontroller", function($scope,$http) {
			$scope.jsonArray;
			
			$scope.doFetchAll=function()
			{
				//sending JSON request
				$http.get("angularfetchallbp.php").then(okFx,notOk);
				function okFx(response)
				{
										$scope.jsonArray=response.data;

					//alert(JSON.stringify(response.data));//data==jsonArray
				}
				function notOk(response)
				{
					alert(response.data);
				}
			}

//			$scope.doDelete = function(uid) {
//				$http.get("angular-delete.php?uid="+uid).then(okFx,notOk);
//				function okFx(response)
//				{
//					alert(response.data);
//					$scope.doFetchAll();
//
//					//alert(JSON.stringify(response.data));//data==jsonArray
//				}
//				function notOk(response)
//				{
//					alert(response.data);
//				}
//			}

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
			background-color: burlywood;
		}

	</style>
</head>

<body ng-app="mymodule" ng-controller="mycontroller">
	<center>
	<div class="btn btn-success" ng-click="doFetchAll();">Fetch All Records</div>
	<hr>
		<h1>All records</h1>
		<p>
			Serch oin User id Field: <input type="text" ng-model="googler.uid">
		</p>
		<table width="600" border="1" rules="all">
			<tr>
				<th>Sr. No.</th>
				<th ng-click="doSort('dateofrecord');">DATE OF RECORD</th>
				<th ng-click="doSort('pulse');">PULSE</th>
				<th ng-click="doSort('dia');">DIASTOLIC</th>
				<th ng-click="doSort('syst');">SYSTOLIC</th>
				<th>Operations</th>
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
