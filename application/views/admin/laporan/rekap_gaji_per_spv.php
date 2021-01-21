<?php
	
	if($bulan == '1'){
		$cBulan 	= 'Januari'; 
	}elseif ($bulan == '2') {
		$cBulan     =  'Februari' ;
	}elseif ($bulan == '3') {
		$cBulan     =  'Maret' ;
	}elseif ($bulan == '4') {
		$cBulan     =  'April' ;
	}elseif ($bulan == '5') {
		$cBulan     =  'Mei' ;
	}elseif ($bulan == '6') {
		$cBulan     =  'Juni' ;
	}elseif ($bulan == '7') {
		$cBulan     =  'Juli' ;
	}elseif ($bulan == '8') {
		$cBulan     =  'Agustus' ;
	}elseif ($bulan == '9') {
		$cBulan     =  'September' ;
	}elseif ($bulan == '10') {
		$cBulan     =  'Oktober' ;
	}elseif ($bulan == '11') {
		$cBulan     =  'November' ;
	}elseif ($bulan == '12') {
		$cBulan     =  'Desember' ;
	}


header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=RekapGaji Bulan - ".$cBulan." Tahun - ".$tahun."- Spv - ".$nama_spv." .xls" );
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");

$workbook = new Workbook();
$worksheet1 =& $workbook->add_worksheet(date('dmY_His'));

$header =& $workbook->add_format();
$header->set_color('blue'); // set warna huruf
$header->set_border_color('red'); // set warna border

$header->set_size(12); // Set ukuran font 

$header->set_align("center"); // set align rata tengah

$header->set_top(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_bottom(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_left(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_right(2); // set ketebalan border bagian atas cell 0 = border tidak tampil


$worksheet1->write_string(2,0,'No',$header);  // Set Nama kolom
$worksheet1->set_column(0,0,5); // Set lebar kolom

$worksheet1->write_string(2,1,'Nama',$header);  // Set Nama kolom
$worksheet1->set_column(0,1,40); // Set lebar kolom 

$worksheet1->write_string(2,2,'Kode Outlet',$header);  // Set Nama kolom
$worksheet1->set_column(0,2,13); // Set lebar kolom

$worksheet1->write_string(2,3,'Outlet',$header);  // Set Nama kolom
$worksheet1->set_column(0,3,36); // Set lebar kolom

$worksheet1->write_string(2,4,'Pembayaran',$header);  // Set Nama kolom
$worksheet1->set_column(0,4,12); // Set lebar kolom

$worksheet1->write_string(2,5,'Rekening',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,12); // Set lebar kolom

$worksheet1->write_string(2,6,'Atas Nama',$header);  // Set Nama kolom
$worksheet1->set_column(0,6,12); // Set lebar kolom

$worksheet1->write_string(2,7,'NIK',$header);  // Set Nama kolom
$worksheet1->set_column(0,7,12); // Set lebar kolom

$worksheet1->write_string(2,8,'Masa Kerja',$header);  // Set Nama kolom
$worksheet1->set_column(0,8,15); // Set lebar kolom

$worksheet1->write_string(2,9,'Tgl Masuk',$header);  // Set Nama kolom
$worksheet1->set_column(0,9,14); // Set lebar kolom

$worksheet1->write_string(2,10,'Msk 1 Bulan',$header);  // Set Nama kolom
$worksheet1->set_column(0,10,13); // Set lebar kolom

$worksheet1->write_string(2,11,'Msk Hr Biasa',$header);  // Set Nama kolom
$worksheet1->set_column(0,11,13); // Set lebar kolom

$worksheet1->write_string(2,12,'Msk Hr Libur',$header);  // Set Nama kolom
$worksheet1->set_column(0,12,13); // Set lebar kolom

$worksheet1->write_string(2,13,'Kerja Normal Hr Biasa',$header);  // Set Nama kolom
$worksheet1->set_column(0,13,22); // Set lebar kolom

$worksheet1->write_string(2,14,'Kerja Normal Hr Libur',$header);  // Set Nama kolom
$worksheet1->set_column(0,14,22); // Set lebar kolom

$worksheet1->write_string(2,15,'Longshift Hr Biasa',$header);  // Set Nama kolom
$worksheet1->set_column(0,15,22); // Set lebar kolom

$worksheet1->write_string(2,16,'Longshift Hr Libur',$header);  // Set Nama kolom
$worksheet1->set_column(0,16,22); // Set lebar kolom

$worksheet1->write_string(2,17,'Gaji Pokok',$header);  // Set Nama kolom
$worksheet1->set_column(0,17,20); // Set lebar kolom

$worksheet1->write_string(2,18,'Uang Makan Hr Biasa',$header);  // Set Nama kolom
$worksheet1->set_column(0,18,22); // Set lebar kolom

$worksheet1->write_string(2,19,'Uang Makan Hr Libur',$header);  // Set Nama kolom
$worksheet1->set_column(0,19,22); // Set lebar kolom

$worksheet1->write_string(2,20,'Uang Makan Longshift Hr Biasa',$header);  // Set Nama kolom
$worksheet1->set_column(0,20,32); // Set lebar kolom

$worksheet1->write_string(2,21,'Uang Makan Longshift Hr Libur',$header);  // Set Nama kolom
$worksheet1->set_column(0,21,32); // Set lebar kolom

$worksheet1->write_string(2,22,'Tunjangan Laporan',$header);  // Set Nama kolom
$worksheet1->set_column(0,22,22); // Set lebar kolom

$worksheet1->write_string(2,23,'Uang Kesehatan',$header);  // Set Nama kolom
$worksheet1->set_column(0,23,22); // Set lebar kolom

$worksheet1->write_string(2,24,'Bonus Shift',$header);  // Set Nama kolom
$worksheet1->set_column(0,24,22); // Set lebar kolom

$worksheet1->write_string(2,25,'Bonus EDC',$header);  // Set Nama kolom
$worksheet1->set_column(0,25,22); // Set lebar kolom

$worksheet1->write_string(2,26,'Ins. IdulFitri',$header);  // Set Nama kolom
$worksheet1->set_column(0,26,20); // Set lebar kolo

$worksheet1->write_string(2,27,'Ins. IdulAdha',$header);  // Set Nama kolom
$worksheet1->set_column(0,27,20); // Set lebar kolo

$worksheet1->write_string(2,28,'Nasi Box',$header);  // Set Nama kolom
$worksheet1->set_column(0,28,20); // Set lebar kolo

$worksheet1->write_string(2,29,'Tambahan Lain-Lain ',$header);  // Set Nama kolom
$worksheet1->set_column(0,29,20); // Set lebar kolo

$worksheet1->write_string(2,30,'Ins. Tambahan',$header);  // Set Nama kolom
$worksheet1->set_column(0,30,20); // Set lebar kolo

$worksheet1->write_string(2,31,'Ins. Promo',$header);  // Set Nama kolom
$worksheet1->set_column(0,31,20); // Set lebar kolo

$worksheet1->write_string(2,32,'Pinjaman',$header);  // Set Nama kolom
$worksheet1->set_column(0,32,20); // Set lebar kolo

$worksheet1->write_string(2,33,'Denda',$header);  // Set Nama kolom
$worksheet1->set_column(0,33,20); // Set lebar kolo

$worksheet1->write_string(2,34,'Lain-Lain',$header);  // Set Nama kolom
$worksheet1->set_column(0,34,20); // Set lebar kolo

$worksheet1->write_string(2,35,'Total Gaji',$header);  // Set Nama kolom
$worksheet1->set_column(0,35,20); // Set lebar kolo




$worksheet1->write_string(2,36,'27',$header);  // Set Nama kolom
$worksheet1->set_column(0,36,4); // Set lebar kolom

$worksheet1->write_string(2,37,'28',$header);  // Set Nama kolom
$worksheet1->set_column(0,37,4); // Set lebar kolom

$worksheet1->write_string(2,38,'29',$header);  // Set Nama kolom
$worksheet1->set_column(0,38,4); // Set lebar kolom

$worksheet1->write_string(2,39,'30',$header);  // Set Nama kolom
$worksheet1->set_column(0,39,4); // Set lebar kolom

$worksheet1->write_string(2,40,'31',$header);  // Set Nama kolom
$worksheet1->set_column(0,40,4); // Set lebar kolom

$For = 0 ;
$Loncat = 40 ; 
for($i=1;$i<=31;$i++){ ++$Loncat;
    $worksheet1->write_string(2,$Loncat,''.++$For.'',$header);  // Set Nama kolom
    $worksheet1->set_column(0,$Loncat,4); // Set lebar kolom
}



$judul =& $workbook->add_format();
$judul->set_color('black'); // set warna huruf
$judul->set_size(20); // Set ukuran font 
$judul->set_align("center"); // set align rata tengah
$worksheet1->write_string(0,0,'Rekap Gaji Operator Bulan '.$cBulan.' Tahun '.$tahun.' - SUPERVISOR '.$nama_spv.' ',$judul);  // Set Nama kolom
$worksheet1->merge_cells(0, 0, 1, 6);


$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$row = 3;

$jos = $this->db->query("CALL rekapan_gaji_perspv('".$bulan."','".$tahun."','".$id_spv."')");
$no = 0 ;
foreach ($jos->result_array() as $key) {
    # code..
    $worksheet1->write_string($row,0,  ++$no ,$content);
    $worksheet1->write_string($row,1,  $key['Pegawai'] ,$content);
    $worksheet1->write_string($row,2,  $key['KodeOutlet'],$content);
    $worksheet1->write_string($row,3,  $key['Outlet'] ,$content);
    $worksheet1->write_string($row,4,  $key['Pembayaran'] ,$content);
    $worksheet1->write_string($row,5,  $key['Rekening'] ,$content);
    $worksheet1->write_string($row,6,  $key['Atas_Nama'] ,$content);
    $worksheet1->write_string($row,7,  $key['Nik'] ,$content);
    $worksheet1->write_string($row,8,  $key['MasaKerja'] ,$content);
    $worksheet1->write_string($row,9,  $key['TanggalKerja'] ,$content);
    $worksheet1->write_string($row,10,  $key['TotalSatuBulan'] ,$content);
    $worksheet1->write_string($row,11,  $key['HariBiasa'] ,$content);
    $worksheet1->write_string($row,12,  $key['HariLibur'] ,$content);
    $worksheet1->write_string($row,13,  $key['KerjaHariBiasa'] ,$content);
    $worksheet1->write_string($row,14,  $key['KerjaHariLibur'] ,$content);
    $worksheet1->write_string($row,15,  $key['LongShiftHariBiasa'] ,$content);
    $worksheet1->write_string($row,16,  $key['LongShiftHariLibur'] ,$content);
    $worksheet1->write_string($row,17,  round($key['GajiPokok'],-3) ,$content);
    $worksheet1->write_string($row,18,  $key['UangMakanHariBiasa'] ,$content);
    $worksheet1->write_string($row,19,  $key['UangMakanHariLibur'] ,$content);
    $worksheet1->write_string($row,20,  $key['UangMakanLongshiftBiasa'] ,$content);
    $worksheet1->write_string($row,21,  $key['UangMakanLongshiftLibur'] ,$content);
    $worksheet1->write_string($row,22,  $key['UangLaporan'] ,$content);
    $worksheet1->write_string($row,23,  $key['UangKesehatan'] ,$content);
    $worksheet1->write_string($row,24,  $key['bonus_shift_bulan_sebelumnya'] ,$content);
    $worksheet1->write_string($row,25,  $key['insentif_1'] ,$content);
    
    $worksheet1->write_string($row,26,  $key['insentif_2'] ,$content);
    $worksheet1->write_string($row,27,  $key['insentif_3'] ,$content);
    $worksheet1->write_string($row,28,  $key['insentif_6'] ,$content);
    $worksheet1->write_string($row,29,  $key['insentif_4'] ,$content);
    $worksheet1->write_string($row,30,  $key['insentif_5'] ,$content);
    $worksheet1->write_string($row,31,  $key['insentif_7'] ,$content);

    $worksheet1->write_string($row,32,  $key['pinjaman']."(".$key['keterangan_pinjaman'].")" ,$content);
    $worksheet1->write_string($row,33,  $key['denda']."(".$key['denda_keterangan'].")" ,$content);
    $worksheet1->write_string($row,34,  $key['lain_lain'] ,$content);
    $worksheet1->write_string($row,35,  round($key['total'],-3) ,$content);
    $worksheet1->write_string($row,36,  $key['prev_27'] ,$content);
    $worksheet1->write_string($row,37,  $key['prev_28'] ,$content);
    $worksheet1->write_string($row,38,  $key['prev_29'] ,$content);
    $worksheet1->write_string($row,39,  $key['prev_30'] ,$content);
    $worksheet1->write_string($row,40,  $key['prev_31'] ,$content);
    $worksheet1->write_string($row,41,  $key['next_1'] ,$content);
    $worksheet1->write_string($row,42,  $key['next_2'] ,$content);
    $worksheet1->write_string($row,43,  $key['next_3'] ,$content);
    $worksheet1->write_string($row,44,  $key['next_4'] ,$content);
    $worksheet1->write_string($row,45,  $key['next_5'] ,$content);
    $worksheet1->write_string($row,46,  $key['next_6'] ,$content);
    $worksheet1->write_string($row,47,  $key['next_7'] ,$content);
    $worksheet1->write_string($row,48,  $key['next_8'] ,$content);
    $worksheet1->write_string($row,49,  $key['next_9'] ,$content);
    $worksheet1->write_string($row,50,  $key['next_10'] ,$content);
    $worksheet1->write_string($row,51,  $key['next_11'] ,$content);
    $worksheet1->write_string($row,52,  $key['next_12'] ,$content);
    $worksheet1->write_string($row,53,  $key['next_13'] ,$content);
    $worksheet1->write_string($row,54,  $key['next_14'] ,$content);
    $worksheet1->write_string($row,55,  $key['next_15'] ,$content);
    $worksheet1->write_string($row,56,  $key['next_16'] ,$content);
    $worksheet1->write_string($row,57,  $key['next_17'] ,$content);
    $worksheet1->write_string($row,58,  $key['next_18'] ,$content);
    $worksheet1->write_string($row,59,  $key['next_19'] ,$content);
    $worksheet1->write_string($row,60,  $key['next_20'] ,$content);
    $worksheet1->write_string($row,61,  $key['next_21'] ,$content);
    $worksheet1->write_string($row,62,  $key['next_22'] ,$content);
    $worksheet1->write_string($row,63,  $key['next_23'] ,$content);
    $worksheet1->write_string($row,64,  $key['next_24'] ,$content);
    $worksheet1->write_string($row,65,  $key['next_25'] ,$content);
    $worksheet1->write_string($row,66,  $key['next_26'] ,$content);
    $worksheet1->write_string($row,67,  $key['next_32'] ,$content);
      $worksheet1->write_string($row,68,  $key['next_33'] ,$content);
       $worksheet1->write_string($row,69,  $key['next_34'] ,$content);
        $worksheet1->write_string($row,70,  $key['next_35'] ,$content);
         $worksheet1->write_string($row,71,  $key['next_36'] ,$content);
    $row++;
}
$workbook->close();

