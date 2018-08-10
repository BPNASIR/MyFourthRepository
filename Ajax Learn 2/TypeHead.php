<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | Autocomplete Textbox using Bootstrap Typehead with Ajax PHP</title>
  <script src="JS/jquery.min.js"></script>
  <script src="JS/MyJS.js"></script>  
  <link rel="stylesheet" href="CSS/bootstrap.min.css" />  
  <script src="JS/angular.min.js"></script>
  <script type="text/javascript" src="JS/app.js"></script>
 </head>
 <body ng-app="myApp" ng-controller="MainController">
  <br /><br />
  <div class="container" style="width:1000px;">
          <input style="margin-right:4px;width:400px;height:34px;float:left;" type="text" name="country" id="country" class="form-control input-lg" autocomplete="off" placeholder="Type Country Name" />
        <input style="float:left;" type="button" class="btn btn-primary" value="Search"/>
          <br><br/>
          <div class="row">
            <div class="col-md-12">

                <div class="table-responsive">
                  <form  id="empform"  ng-submit="submitEmployee()">
                    <table id="mytable" class="table table-bordered">

                        <thead>
                        <th style="width:50px;">SL#</th>
                        <th style="width:240px;">COMPANY NAME</th>
                        <th style="width:300px;">PRESIDENT NAME</th>
                        <th style="width:100px;">ACTION</th>                     
                        </thead>
                        <tbody>
              <tr ng-repeat="emp in empoyees">
                <td>{{$index+1}}</td>
                <td>
                   <input  style="width:100%;height:34px;" class="form-control input-lg" name="country{{$index}}" ng-model="emp.country" 
                   ng-disabled="!enabledEdit[{{$index}}]"/>
                </td>
                <td>
                   <input style="width:100%;height:34px;" class="form-control input-lg" name="president{{$index}}" ng-model="emp.president"  ng-disabled="!enabledEdit[{{$index}}]" />
                </td>
                <td style="width:22%;">
                  <div class="buttons" >
                    <button class="btn btn-success" ng-click="">Save</button>
                    <button class="btn btn-primary" ng-click="editEmployee($index)">Edit</button>
                    <button class="btn btn-danger" ng-click="deleteEmployee($index)">Delete</button>
                  </div>  
                </td>
              </tr>
                        </tbody>

                    </table>
                   </form>
                    <div class="clearfix"></div>
                 </div>

            </div>   

  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 
 $('#country').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});
</script>
