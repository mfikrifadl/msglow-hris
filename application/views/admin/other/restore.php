<?php 

	error_reporting(0);
	
?>
   <script>

function uploadFile() {
    // membaca data file yg akan diupload, dari komponen 'fileku'
    var file = document.getElementById("gambar").files[0];
    var formdata = new FormData();
    formdata.append("datafile", file);

    // proses upload via AJAX disubmit ke 'upload.php'
    // selama proses upload, akan menjalankan progressHandler()
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.open("POST", "restore.php", true);
    ajax.send(formdata);
}

function progressHandler(event){
    // hitung prosentase
    var percent = (event.loaded / event.total) * 100;
    // menampilkan prosentase ke komponen id 'progressBar'
    document.getElementById("progressBar").value = Math.round(percent);
    // menampilkan prosentase ke komponen id 'status'
    document.getElementById("status").innerHTML = Math.round(percent)+"% telah terupload";
    // menampilkan file size yg tlh terupload dan totalnya ke komponen id 'total'
    document.getElementById("total").innerHTML = "Telah terupload "+event.loaded+" bytes dari "+event.total;
}

</script>
<section class="content">
<div class="row">
<div class="col-sm-12"> 
    <div class="nav-tabs-custom">
    	<ul class="nav nav-tabs" id="myTabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Database Restore</a></li>
            
        </ul>  
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                         <form enctype="multipart/form-data"  method="post">
                         <div class="form-group">
							<label>File Restore Database (*.sql) </label>
                         	<input type="file" name="datafile" size="30" id="gambar" class="form-control" />
                          </div>
                          
                          <div class="form-group">
							<input type="submit" onclick="uploadFile()"
                             name="restore" value="Restore Database" class="btn btn-danger btn-lg" />
                          </div>
                           <div class="form-group">
                            <div class="progress progress-striped active" style="width:900px;">
                              <progress class="progress-bar progress-bar-red"   id="progressBar" value="0" max="100" style="width:1000px;"></progress>
                            </div>
  											 <h3 id="status"></h3>
  											 <p id="total"></p>
                           </div>
                        </form>

                                    </div><!-- /.tab-pane -->
                              </div><!-- /.tab-content -->
                              
                              
               <?php
if(isset($_POST['restore'])){
	$koneksi=mysql_connect("localhost","root","");
	mysql_select_db("db_rumah",$koneksi);
	
	$nama_file=$_FILES['datafile']['name'];
	$ukuran=$_FILES['datafile']['size'];
	
	//periksa jika data yang dimasukan belum lengkap
	if ($nama_file=="")
	{
		echo "Fatal Error";
	}else{
		//definisikan variabel file dan alamat file
		$uploaddir=APPPATH.'restore/';
		$alamatfile=$uploaddir.$nama_file;

		//periksa jika proses upload berjalan sukses
		if (move_uploaded_file($_FILES['datafile']['tmp_name'],$alamatfile))
		{
			
			$filename = APPPATH.'restore/'.$nama_file.'';
			
			// Temporary variable, used to store current query
			$templine = '';
			// Read in entire file
			$lines = file($filename);
			// Loop through each line
			foreach ($lines as $line)
			{
				// Skip it if it's a comment
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;
			 
				// Add this line to the current segment
				$templine .= $line;
				// If it has a semicolon at the end, it's the end of the query
				if (substr(trim($line), -1, 1) == ';')
				{
					// Perform the query
					mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
					// Reset temp variable to empty
					$templine = '';
				}
			}
			echo "<center>Berhasil Restore Database, Silahkan Di Cek.</center>";
		
		}else{
			//jika gagal
			echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
		}	
	}

}else{
	unset($_POST['restore']);
}
?>

    </div> 
</div>
</div>
</section>

