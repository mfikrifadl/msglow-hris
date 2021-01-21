<?php 
	
		// Setting Kode 
		
		
		
			if($action == "edit") {
				
					foreach ($field as $column) {
					$Nama		= $column['nama'];
					$User		= $column['user'];
					$Pass		= $column['pass'];
					$Level		= $column['level'];
					$LastLogin  = $column['LastLogin'];
					$LastLogout	= $column['LastLogout'];
					$Id	       	= $column['id'];
					}
				
			}else{
					
					$Nama		= "";
					$User		= "" ;
					$Pass		= "" ;
					$Level		= "" ;
					$Status		= "";
					$LastLogin  = "";
					$LastLogout	= "";
				  $Id         = "";
				}
				
						
				
				
				if($action == "edit") {
					$cAction = "Update/".$Id."" ;
					}else{
						$cAction = "I" ;
						}
		
		?>
<section class="content">
<div class="row">
<div class="col-sm-12"> 
    <div class="nav-tabs-custom">
    	<ul class="nav nav-tabs" id="myTabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Setting Username</a></li>
            <li><a href="#tab_2" data-toggle="tab">Data User</a></li>  
        </ul>  
               <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                  
            		<form role="form" name="frmJurusan" id="frmJurusan" method="post"  enctype="multipart/form-data" action="<?=site_url('admin/ActionUser/'.$cAction.'')?>">
               			
						<div class="row">
                        	<div class="col-sm-4">
                            	<div class="form-group">  
									<label for="cContent">Full Name</label>   
									<input type="Text"  name="cNama" placeholder="Full Name" class="form-control"  value="<?=$Nama?>">
                            	</div>
                           </div>
                            <div class="col-sm-4">
                            	<div class="form-group">  
									<label for="cContent">Username</label>   
									<input type="Text"  name="cUser" placeholder="Username" class="form-control"  value="<?=$User?>">
                            	</div>
                           </div>
                           <div class="col-sm-4">
                            	<div class="form-group">  
									<label for="cContent">Password <font size="-1" color="#FF0000">* Isi Jika Ingin Ubah Password</font></label> 
									<input type="password"  name="cPassword" placeholder="Password" class="form-control"  value="">
                            	</div>
                           </div>
                        </div>
                        <div class="row">
                        	<div class="col-sm-9">
                            	<div class="form-group">  
									<label for="cContent">Level </label> 
									<input type="text"  name="cLevel" placeholder="Level" class="form-control"  value="<?=$Level?>" readonly>
                            	</div>
                           </div>
                       </div>
                        <div class="row">
                        	<div class="col-sm-6">
                            	<div class="form-group">  
									<label for="cContent">Last Date Login</label>   
									<input type="Text"  name="dLogin" placeholder="Last Date Login" class="form-control"  value="<?=$LastLogin?>" readonly>
                            	</div>
                           </div>
                           <div class="col-sm-6">
                            	<div class="form-group">  
									<label for="cContent">Last Date Logout</label> 
									<input type="text"  name="dLogout" placeholder="Last Date Logout" class="form-control"  value="<?=$LastLogout?>" readonly>
                            	</div>
                           </div>
                        </div>
                        
								
                        
                                <div>
                        			<button type="submit" class="btn btn-primary btn-flat">
                                    	<i class="fa fa-save"></i> Save Data
                                    </button>
                        		</div>
                                
                                
                               </form>        
                             </div>
                             <div class="tab-pane" id="tab_2">
                           
                                   	<table class="table table-striped table-bordered table-hover" id="DataTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>User</th>
                                                <th>Level</th>
                                                <th>Last Login</th>
                                                <th>Last Logout</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php 
											$No = 0 ;
										  $A = mysql_query("SELECT * FROM username");
												
											while($dbData = mysql_fetch_array($A)){
											
											?>
                                            <tr>
                                                <td><?=++$No?></td>
                                                <td><?=$dbData['nama']?></td>
                                                <td><?=$dbData['user']?></td>
                                                <td><?=$dbData['level']?></td>
                                                <td><?=$dbData['LastLogin']?></td>
                                                <td><?=$dbData['LastLogout']?></td>
                                                <td>
                                
                                  <a class="btn btn-effect btn-success" href="<?=site_url('admin/user/edit/'.$dbData['id'].'')?>"><i class="fa fa-pencil"></i> Edit</a>
                                      </td>
                                            </tr>
                                            <?php  } ?>
                                        </tbody>
                                        <tfoot>
                                            	<th>No</th>
                                                <th>Nama</th>
                                                <th>User</th>
                                                <th>Level</th>
                                                <th>Last Login</th>
                                                <th>Last Logout</th>
                                                <th>Action</th>
                                        </tfoot>
                                    </table>      
                                    </div>
                                        
        </div><!-- /.tab-content -->
    </div> 
</div>
</div>
</section>




