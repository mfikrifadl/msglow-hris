<!DOCTYPE html>
<html ng-app="app">
<head>

<link rel="stylesheet" href="<?=base_url()?>angularJS/angular-bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?=base_url()?>angularJS/angular-fontawesome/css/font-awesome.min.css"/> 
<link rel="stylesheet" href="<?=base_url()?>angularJS/angular-gritter/css/jquery.gritter.css"/>
<link rel="stylesheet" href="<?=base_url()?>angularJS/angular-select2/dist/css/select2.min.css"/>
<link rel="stylesheet" href="<?=base_url()?>angularJS/angular-css/custom.css"/>

</head>
<body >

<div ng-controller="form-data">
 <header>
  <nav class="navbar navbar-default">
   <div class="container">
    <div class="navbar-header">
     <a class="navbar-brand" href="#home">Angular Routing Example</a>
    </div>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="#home"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="#about"><i class="fa fa-shield"></i> About</a></li>
      <li><a href="#contact"><i class="fa fa-comment"></i> Contact</a></li>
      </ul>
      </div>
    </nav>
 </header>
 <div ng-view></div>
 </div>
 
  </body>
</html>

<script type="text/javascript" src="<?=base_url()?>angularJS/angular-js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>angularJS/angular-js/angular.min.js"></script>
<script type="text/javascript"  src="<?=base_url()?>angularJS/angular-js/angular-route.js"></script>
<script type="text/javascript" src="<?=base_url()?>angularJS/angular-js/ui-bootstrap-min.js"></script>
<script type="text/javascript" src="<?=base_url()?>angularJS/angular-confrim/bootbox.js"></script>
<script type="text/javascript" src="<?=base_url()?>angularJS/angular-confrim/ngBootbox.js"></script>
<script type="text/javascript" src="<?=base_url()?>angularJS/angular-select2/dist/js/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>angularJS/angular-gritter/js/jquery.gritter.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>angularJS/angular-bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">
      module = angular.module('app', ['ui.bootstrap','ngBootbox','ngRoute']);
      
       // configure our routes
        module.config(function($routeProvider) {
          $routeProvider
            // route for the home page
            .when('/home', {
                templateUrl : '<?=site_url('angular/home')?>',
                controller  : 'form-data'
            })

            // route for the about page
            .when('/about', {
                templateUrl : '<?=site_url('angular/about')?>',
                controller  : 'form-data'
            })

            // route for the contact page
            .when('/contact', {
                templateUrl : 'pages/contact.html',
                controller  : 'contactController'
        });
      });

       module.filter('startFrom', function() {
        return function(input, start) {
            if(input) {
                start = +start; //parse to int
                return input.slice(start);
            }
            return [];
        }
      });

      module.directive('select2', function($timeout) {
        var linker = function(scope, element, attr) {
          scope.$watch('kelurahanList', function() {
             $timeout(function() {
               element.trigger('select2:updated');
              }, 0, false);
           }, true);

           scope.$watch('pendidikanList', function() {
             $timeout(function() {
               element.trigger('select2:updated');
              }, 0, false);
           }, true);

            $timeout(function() {
              element.select2();
             }, 0, false);
          };
          return {
           restrict: 'A',
           link: linker
          };
      }); 

      module.directive('showErrors', function($timeout) {
      return {
        restrict: 'A',
        require: '^form',
        link: function (scope, el, attrs, formCtrl) {
          // find the text box element, which has the 'name' attribute
          var inputEl   = el[0].querySelector("[name]");
          // convert the native text box element to an angular element
          var inputNgEl = angular.element(inputEl);
          // get the name on the text box
          var inputName = inputNgEl.attr('name');
          
          // only apply the has-error class after the user leaves the text box
          var blurred = false;
          inputNgEl.bind('blur', function() {
            blurred = true;
            el.toggleClass('has-error', formCtrl[inputName].$invalid);
          });
          
          scope.$watch(function() {
            return formCtrl[inputName].$invalid
          }, function(invalid) {
            // we only want to toggle the has-error class after the blur
            // event or if the control becomes valid
            if (!blurred && invalid) { return }
            el.toggleClass('has-error', invalid);
          });
          
          scope.$on('show-errors-check-validity', function() {
            el.toggleClass('has-error', formCtrl[inputName].$invalid);
          });
          
          scope.$on('show-errors-reset', function() {
            $timeout(function() {
              el.removeClass('has-error');
            }, 0, false);
          });
        }
      }
    });


     
       
      module.controller('form-data', function($scope,$http,$ngBootbox,$timeout) {
        $scope.action           = "save";
        $scope.actionButtonText = "Simpan Data";
        $scope.my = {};
        $scope.save = function() {
         $scope.$broadcast('show-errors-check-validity');
            if($scope.myForm.$valid) {
                $ngBootbox.confirm("Yakin Simpan Data ?").then(function() {
                $scope.loading = true; 
                $scope.actionButtonText = "Loading..";
                $scope.enable = "false";
                $http({
                  method  : 'POST',
                  url     : '<?=site_url('angular/add')?>',
                  data    : $scope.my, //forms user object
                  headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
               }).success(function(result){
                 //$scope.message = result.status
                 $.gritter.add({
                    title: 'Informasi',
                    text: result.status,
                    class_name: 'gritter-info gritter-center' 
                 });
                 $scope.reset();
                 $scope.loading = false;
                 $scope.show();
              });
              $timeout(function(){
                  $scope.enable = "true";
                  $scope.actionButtonText = "Simpan Data";
              }, 2000);   
            },
            function(){});
         }
        };
  
      $scope.reset = function() {
        $scope.$broadcast('show-errors-reset');
        $scope.my.name = '';
        $scope.my.city = '';
        $scope.my.areakerja = '';
        $scope.my.pendidikan = '';
        $scope.my.id   = ''; 
      }

      $scope.show = function() {
        $http.get('<?=site_url('angular/view')?>').success(function(data){
          $scope.list = data;
          $scope.currentPage = 1; //current page
          $scope.entryLimit = 10; //max no of items to display in a page
          $scope.filteredItems = $scope.list.length; //Initially for no filter  
          $scope.totalItems = $scope.list.length;
      });
        $scope.setPage = function(pageNo) {
            $scope.currentPage = pageNo;
        };
        $scope.filter = function() {
            $timeout(function() { 
                $scope.filteredItems = $scope.filtered.length;
            }, 10);
        };
        $scope.sort_by = function(predicate) {
            $scope.predicate = predicate;
            $scope.reverse = !$scope.reverse;
        };
      }
      $scope.show();

      $scope.edit = function(id_edit="") {
        $http.get('<?=site_url('angular/edit')?>/'+id_edit).success(function(data){
            $scope.my.name = data.name ;
            $scope.my.city = data.city ;
            $scope.my.id   = data.id ;
            $scope.my.pendidikan = data.pendidikan;
            $scope.my.areakerja = data.areakerja;
        }).success(function(result){
            $('html, body').animate({
                scrollTop: $("#form").offset().top
            }, 1000);
        });
      }

      $scope.hapus = function(id_delete) {
        $ngBootbox.confirm("Yakin Hapus Data ?").then(function() {
           $http.get('<?=site_url('angular/hapus')?>/'+id_delete).success(function(data){}).success(function(result){
            $.gritter.add({
               title: 'Informasi',
               text: result.status,
               class_name: 'gritter-danger gritter-center' 
            });
            $scope.reset();
            $scope.loading = false;
            $scope.show();
          });   
        },
        function(){});
      };

        $scope.GetArea = function(){
          $scope.areakerjaList = [] ;
          $scope.areakerjaList = [
            <?php 
              foreach ($area as $key => $vaData) {
                echo '
                    {"id":"'.$vaData['id_area'].'","name":"'.$vaData['nama_area'].'"},
                ';
              }
            ?>
          ] 
        }
        $scope.GetPendidikan = function(){
          $scope.pendidikanList = [] ;
          $scope.pendidikanList = [
            <?php 
              foreach ($pendidikan as $key => $vaData) {
                echo '
                    {"id":"'.$vaData['id_pendidikan'].'","name":"'.$vaData['nama_pendidikan'].'"},
                ';
              }
            ?>
          ] 
        }
        $scope.GetArea();
        $scope.GetPendidikan();
});

</script>
    
