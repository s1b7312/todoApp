
var todoApp = angular.module('todoApp', ['ngResource'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});


todoApp.factory('Todo', function ($resource) {
  return $resource( '/api/todos/:todoId', {	todoId: '@todoId' }, { 
    	update: { 
	        method: 'PUT', 
	        isArray: false 
      } ,
      	delete_todo: { 
	        method: 'DELETE', 
	        isArray: false 
      } ,
      	save_todo: { 
	        method: 'POST', 
	        isArray: false 
      } 
    });
});


todoApp.controller('todoController', ['$scope', '$http', '$resource', 'Todo', function($scope, $http, $resource, Todo) {

	$scope.todos = [];
	$scope.message = null;
	$scope.task = "";

	$scope.init = function() {

		$scope.todos = Todo.query();
	};

 
	$scope.addTodo = function() {
	    Todo.save_todo({}, {'title': $scope.task}, function(returnObj) {
					$scope.init();
					$scope.task = "";
                    $scope.message = returnObj['message'];
                });
	};
 
	$scope.updateTodo = function(index) {
		
		var todo = $scope.todos[index];

		Todo.update({todoId: todo.id}, {'done': todo.done}, function(returnObj) {
                    $scope.message = returnObj['message'];
                });
	};
 
	$scope.deleteTodo = function(index) {
 
		var todo = $scope.todos[index];

		Todo.delete_todo({todoId: todo.id}, function(returnObj) {
                    $scope.message = returnObj['message'];
                });
		$scope.todos.splice(index, 1);
	};

	$scope.init();	//	load all tasks when page loads
 
}]);
