var app = angular.module('myApp', []);


app.controller("MainController",['$scope',function($scope){

   $scope.data = [{ president:"Dr.Abdul Hamid ",country:"Bangladesh"
	              },
	              { president:"Dr.Waleed Amin ",country:"Pakistan"
	              },
	              { president:"Sakila Zafor ",country:"Indonesia"
	              }];

	              
	$scope.empoyees = angular.copy( $scope.data);
	 $scope.enabledEdit =[];

    $scope.addEmployee = function(){
	    var emp ={country:"",president:"",disableEdit:false};
		$scope.empoyees.push(emp);
		 $scope.enabledEdit[$scope.empoyees.length-1]=true;
	}

	$scope.editEmployee = function(index){
		console.log("edit index"+index);
		$scope.enabledEdit[index] = true;
	}
	$scope.deleteEmployee = function(index) {
		  $scope.empoyees.splice(index,1);
	}
	$scope.submitEmployee = function(){
		console.log("form submitted:"+angular.toJson($scope.empoyees ));
	}
	
}]);
