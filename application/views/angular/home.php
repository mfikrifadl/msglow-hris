<div class="container">
 <br/>
<blockquote id="form"><h4><a href="">Form Data Angular</a></h4></blockquote>
<br/>
  <div class="col-sm-12">
    <form method="post" name="myForm" id="myForm" novalidate>
      <input type="hidden" name="id" ng-model="my.id" class="form-control">
      <div class="form-group" show-errors>
        <label>Nama</label>
        <input type="text" name="name" ng-model="my.name" required class="form-control">
        <p class="help-block" ng-if="myForm.name.$error.required">The user's name is required</p>
      </div>
      <div class="form-group" show-errors>
        <label>Area Kerja</label>
        <select data-placeholder="Pilih Area Kerja" name="areakerja"  
        required  class="form-control " select2 ng-change="change()" ng-model="my.areakerja">
           <option ng-repeat="areakerja in areakerjaList" value="{{areakerja.id}}">
            {{areakerja.name}}
          </option>
         </select>
         <p class="help-block" ng-if="myForm.areakerja.$error.required">Area Kerja is required</p>
      </div>
      <div class="form-group" show-errors>
        <label>Pendidikan</label>
        <select data-placeholder="Pilih Pendidikan"  name="pendidikan" 
        required class="form-control " select2 ng-model="my.pendidikan">
          <option ng-repeat="pendidikan in pendidikanList" value="{{pendidikan.id}}">  
            {{pendidikan.name}}
          </option>
        </select>
         <p class="help-block" ng-if="myForm.pendidikan.$error.required">Pendidikan is required</p>
      </div>
      <div class="form-group" show-errors>
        <label>Kota</label>
        <input type="text" name="city" ng-model="my.city" required class="form-control">
        <p class="help-block" ng-if="myForm.city.$error.required">Kota  is required</p>
      </div>
      <img id="mySpinner" src="http://www.gravity.co.il/Images/General/preloader.gif" 
      ng-show="loading" style="width: 50px" />
      <button type="button"  class= "btn btn-primary" ng-click="save();" ng-disabled="enable=='false'">
        <span ng-show="actionButtonText == 'Loading..'">
          <i class="fa fa-refresh spinning"></i>
        </span>
          {{ actionButtonText }}
      </button>
    </form>
    {{message}}
    <br/>
    <br/>
    <blockquote id="grid"><h4><a href="">Data Grid Angular</a></h4></blockquote>
    <br/>
    <div class="row">
        <div class="col-sm-3">Total Data:
            <select ng-model="entryLimit" class="form-control">
                <option>5</option>
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
        <div class="col-sm-9" >Pencarian Data:
            <input type="text" ng-model="search" ng-change="filter()" placeholder="Pencarian" class="form-control" />
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12" ng-show="filteredItems > 0">
          <table class="table table-striped table-bordered">
            <thead>
             <th>Name&nbsp;<a ng-click="sort_by('name');"><i class="fa fa-sort"></i></a></th>
             <th>City&nbsp;<a ng-click="sort_by('city');"><i class="fa fa-sort"></i></a></th>
             <th>Action <i class="fa fa-pencil"></i> <i class="fa fa-times"></i> </th>
            </th>
            </thead>
            <tbody>
                <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                    <td>{{data.name}}</td>
                    <td>{{data.city}}</td>
                    <td>
                      <button type="button" class="btn btn-primary" ng-click="edit(data.id);">
                        <i class="fa fa-pencil"></i> 
                      </button>
                      <button type="button" class="btn btn-danger" ng-click="hapus(data.id);">
                        <i class="fa fa-times"></i> 
                      </button>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="col-sm-12" ng-show="filteredItems == 0">
            <div class="col-md-12">
                <h4>No customers found</h4>
            </div>
        </div>
        <div class="col-sm-6" align="left">
        <h5>Filtered {{ filtered.length }} of {{ totalItems}} total data</h5>
        </div>
        <div class="col-sm-6 " align="right" ng-show="filteredItems > 0">    
            <div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>  
        </div>
    </div>
    </div>
   </div>