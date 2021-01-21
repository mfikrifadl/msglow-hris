<?php 

	error_reporting(0);
	
?>
   

<div class="row">
<div class="col-sm-12"> 
    <div class="nav-tabs-custom">
    	<ul class="nav nav-tabs" id="myTabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Database Backup</a></li>
            
        </ul>  
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                  		<form action="" method="post" name="postform">
                                        	<label>DATABASE TABLES</label>
                                            <div class="form-group">  
												<div class="row">
                                        	<?php 
												$Show = mysql_query("SHOW TABLES");
												while($data = mysql_fetch_array($Show)){
											?>
                                         	<div class="col-sm-3">
                                            	<input type="checkbox" readonly checked value="<?=$data[0]?>"> <?=$data[0]?>
                                            </div>
                                            <?php } ?>
                                            	</div>
                                           	</div>
											<div class="form-group">
                                            <input type="submit" name="backup"  
                                            onClick="return confirm('Apakah Anda yakin?')"value="Proses Backup" class="btn btn-primary btn-lg btn-flat" />
	  										</div>
										</form>
                                    </div><!-- /.tab-pane -->
                              </div><!-- /.tab-content -->
                              
                              
                              <?php
if(isset($_POST['backup'])){

	//membuat nama file
	$file=date("Ymd").'_dbFurniture'.time().'.sql';
	
	
	backup_tables("localhost","root","","db_rumah",$file);
	
	?>
	<p align="center">&nbsp;</p>
	<p align="center"><a style="cursor:pointer" onClick="location.href='<?=site_url('admin/download/'.$file.'')?>'" title="Download">Backup database telah selesai. <font color="#0066FF">Download file database</font></a>
    
</p>
	<?php
}else{
	unset($_POST['backup']);
}


function backup_tables($host,$user,$pass,$name,$nama_file,$tables = '*')
{
	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}else{
		
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	
	
	foreach($tables as $table)
	{
		
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		
		
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					
					$row[$j] = addslashes($row[$j]);
					$row[$j] = str_replace("\n", '\n', $row[$j]);;
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}

	$nama_file;
	
	$handle = fopen(APPPATH.'backup/'.$nama_file,'w+');
	fwrite($handle,$return);
	fclose($handle);
}
?>

    </div> 
</div>
</div>


