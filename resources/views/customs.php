<!DOCTYPE html>
<html>
	<head>
		<title>Customs Register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<!-- Bootstrap -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Application Dependencies -->
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular-route.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular-sanitize.js"></script>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.13.4/ui-bootstrap-tpls.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-resource/1.5.8/angular-resource.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.5/angular-cookies.min.js"></script>

		<!-- Application Scripts -->
		<script type="text/javascript" src="scripts/app.js"></script>
		<script type="text/javascript" src="scripts/services/customs.js"></script>
		<script type="text/javascript" src="scripts/controllers/Customs.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/bootbox/4.4.0/bootbox.min.js"></script>

		</head>
	<body ng-app="customsregister" ng-controller="CustomsRecordManager as vm" data-ng-init="vm.init()">
		<div id="navbar"></div>
		<!-- Grid System      ====================================== -->
		<div class="container-fluid">
			<div class="row">
				<h3></h3>
				<h3></h3>
			</div>

			<div ng-if="!vm.showReport">
				<h1>Import Record Keeper</h1>
				<p></p>
			
				<!-- Authentication      ====================================== -->
				<div ng-if="!vm.isAuthenticated">
				<authentication vm="vm"></authentication>
				<!-- Receipt Creation      ====================================== -->
				<hr>
				</div>
				<div ng-if="vm.isAuthenticated">
					<div class="btn-group btn-group-justified">
						<a href="#" ng-click="vm.setCurrentView('AddEdit')" class="btn btn-primary">Add</a>
						<a href="#" ng-click="vm.setCurrentView('Search')" class="btn btn-primary">Search</a>
						<a href="#" ng-click="vm.setCurrentView('Audit')" class="btn btn-primary">Audit</a>
						<a ng-click="vm.togggleReportView()" class="btn btn-primary">Report</a>
						<a ng-click="vm.signOut()" class="btn btn-danger">Sign Out</a>
					</div>
					<p></p>
					
					<div ng-if="vm.isActiveView('AddEdit')">
						<h3>Add/Edit Receipt</h3>
						<receiptupdate vm="vm"></receiptupdate>
						<hr>
					</div>
					
					<!-- Receipt List      ====================================== -->
					<div ng-if="vm.isActiveView('Search')">
						<h3>Receipt Search</h3>
						<receiptsearch vm="vm"></receiptsearch>
						<!-- Audit Trail      ====================================== -->
						<hr>
					</div>

					<div ng-if="vm.isActiveView('Audit')">
						<h3>Audit Trail</h3>
						<br/><br/>
						<audittrail vm="vm"></audittrail>
						<hr>
					</div>

					<!-- Export For Report      ====================================== -->
				</div>
			</div>

			<div ng-if="vm.showReport">
				<reportforcustoms vm="vm"></reportforcustoms>
				<br/><br/><br/><br/><br/>
				<hr>
				<table><tr ng-click="vm.togggleReportView()"><td><h4>Report generated on -- {{ vm.reportDate }}</h4></td></tr></table>
			</div>
			
	</body>
</html>



