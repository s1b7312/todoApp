<!DOCTYPE html>
<html>
	<head>
		<!--AngularJS-->
		<script src="js/angular.min.js"></script>
		<script src="js/angular-resource.min.js"></script>
		<script src="js/app.js"></script>
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/bootstrap-3.3.5-dist/css/bootstrap.min.css">

	</head>

	<body>
		<div class="container" ng-app="todoApp" ng-controller="todoController">
			<h1>TodoApp index view</h1>
			<div class="row">
				<div class="col-md-4">
					<input type='text' ng-model="task">
					<button ng-disabled="task.length==0" class="btn btn-primary btn-md"  ng-click="addTodo()">Add</button>
					<i ng-show="loading" class="fa fa-spinner fa-spin"></i>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-4">
					<label ng-show="todos.length==0">You have no pending tasks</label>
					<label ng-show="todos.length>0">You have listed <% todos.length %> tasks</label>
					<table class="table table-striped">
						<tr ng-repeat='todo in todos track by $index'>
							<td><input type="checkbox" ng-checked="todo.done=='1'" ng-true-value="'1'" ng-false-value="'0'" ng-model="todo.done" ng-change="updateTodo($index)"></td>
							<td ng-class="{'strike': todo.done=='1'}" ng-bind="todo.title"></td>
							<td ng-bind="todo.done"></td>
							<td>
							<button class="btn btn-danger btn-xs" ng-disabled="todo.done==0" ng-click="deleteTodo($index)">  <span class="glyphicon glyphicon-trash" ></span></button>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<% message %>

		</div>
	</body>
</html>