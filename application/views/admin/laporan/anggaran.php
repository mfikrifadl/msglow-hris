<?php
	
    if($bayar == 0){
        $cPembayaran = "Mandiri";
    }elseif($bayar == 2){
        $cPembayaran = "Bank Syariah Mandiri";
    }elseif($bayar == 3){
        $cPembayaran = "Bni Syariah";
    }elseif($bayar == 4){
        $cPembayaran = "Cash";
    }elseif($bayar == 5){
        $cPembayaran = "Semua Pembayaran";
    }elseif($bayar == 6){
        $cPembayaran = "BNI";
    }elseif($bayar == 7){
        $cPembayaran = "GNC";
    }

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
header("Content-Disposition: attachment; filename=Anggaran.xls" );
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

$worksheet1->write_string(2,1,'Gaji Pokok',$header);  // Set Nama kolom
$worksheet1->set_column(0,1,20); // Set lebar kolom

$worksheet1->write_string(2,2,'Uang Makan Hr Biasa',$header);  // Set Nama kolom
$worksheet1->set_column(0,2,22); // Set lebar kolom

$worksheet1->write_string(2,3,'Uang Makan Hr Libur',$header);  // Set Nama kolom
$worksheet1->set_column(0,3,22); // Set lebar kolom

$worksheet1->write_string(2,4,'Uang Makan Longshift Hr Biasa',$header);  // Set Nama kolom
$worksheet1->set_column(0,4,32); // Set lebar kolom

$worksheet1->write_string(2,5,'Uang Makan Longshift Hr Libur',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,32); // Set lebar kolom

$worksheet1->write_string(2,6,'Tunjangan Laporan',$header);  // Set Nama kolom
$worksheet1->set_column(0,6,22); // Set lebar kolom

$worksheet1->write_string(2,7,'Uang Kesehatan',$header);  // Set Nama kolom
$worksheet1->set_column(0,7,22); // Set lebar kolom

$worksheet1->write_string(2,8,'Bonus Shift',$header);  // Set Nama kolom
$worksheet1->set_column(0,8,22); // Set lebar kolom

$worksheet1->write_string(2,9,'Bonus EDC',$header);  // Set Nama kolom
$worksheet1->set_column(0,9,22); // Set lebar kolom

$worksheet1->write_string(2,10,'Ins. IdulFitri',$header);  // Set Nama kolom
$worksheet1->set_column(0,10,20); // Set lebar kolo

$worksheet1->write_string(2,11,'Ins. IdulAdha',$header);  // Set Nama kolom
$worksheet1->set_column(0,11,20); // Set lebar kolo

$worksheet1->write_string(2,12,'Nasi Box',$header);  // Set Nama kolom
$worksheet1->set_column(0,12,20); // Set lebar kolo

$worksheet1->write_string(2,13,'Tambahan Lain-Lain ',$header);  // Set Nama kolom
$worksheet1->set_column(0,13,20); // Set lebar kolo

$worksheet1->write_string(2,14,'Ins. Tambahan',$header);  // Set Nama kolom
$worksheet1->set_column(0,14,20); // Set lebar kolo

$worksheet1->write_string(2,15,'Ins. Promo',$header);  // Set Nama kolom
$worksheet1->set_column(0,15,20); // Set lebar kolo

$worksheet1->write_string(2,16,'Pinjaman',$header);  // Set Nama kolom
$worksheet1->set_column(0,16,20); // Set lebar kolo

$worksheet1->write_string(2,17,'Denda',$header);  // Set Nama kolom
$worksheet1->set_column(0,17,20); // Set lebar kolo

$worksheet1->write_string(2,18,'Lain-Lain',$header);  // Set Nama kolom
$worksheet1->set_column(0,18,20); // Set lebar kolo

$worksheet1->write_string(2,19,'Total Gaji',$header);  // Set Nama kolom
$worksheet1->set_column(0,19,20); // Set lebar kolo



$judul =& $workbook->add_format();
$judul->set_color('black'); // set warna huruf
$judul->set_size(20); // Set ukuran font 
$judul->set_align("center"); // set align rata tengah
$worksheet1->write_string(0,0,'Anggaran Gaji Februari 2017',$judul);  // Set Nama kolom
$worksheet1->merge_cells(0, 0, 1, 6);


$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$row = 3;


$jos = $this->db->query("CALL rekapan_gaji('2','2017')");   


$no = 0 ;

$nGajiPokok = 0 ;
$nUangMakanHariBiasa = 0 ;
$nUangMakanHariLibur = 0 ;
$nUangMakanLongshiftBiasa = 0 ;
$nUangMakanLongshiftLibur = 0 ;
$nUangLaporan  = 0 ;
$nUangKesehatan = 0 ;
$nBonusSebelumnya = 0 ;
$nInsentif1 = 0 ;
$nInsentif2 = 0 ;
$nInsentif3 = 0 ;
$nInsentif4 = 0 ;
$nInsentif5 = 0 ;
$nInsentif7 = 0 ;

$nPinjaman = 0 ;
$nDenda    = 0 ; 
$nLainLain = 0 ;

$nTotal    = ($nGajiPokok + $nUangMakanHariBiasa + $nUangMakanHariLibur + 
             $nUangMakanLongshiftBiasa + $nUangMakanLongshiftLibur + $nUangLaporan +
             $nUangKesehatan + $nBonusSebelumnya + $nInsentif1 + $nInsentif2 +
             $nInsentif3 + $nInsentif4 + $nInsentif5 + $nInsentif7) - $nPinjaman - $nDenda - $nLainLain  ;




foreach ($jos->result_array() as $key) {
    $nGajiPokok += round($key['GajiPokok'],-3);
    $nUangMakanHariBiasa += $key['UangMakanHariBiasa'] ;
    $nUangMakanHariLibur += $key['UangMakanHariLibur'] ;
    $nUangMakanLongshiftBiasa += $key['UangMakanLongshiftBiasa'] ;
    $nUangMakanLongshiftLibur += $key['UangMakanLongshiftLibur'] ;
    $nUangLaporan       += $key['UangLaporan'] ;
    $nUangKesehatan     += $key['UangKesehatan'];
    $nBonusSebelumnya   += round($key['bonus_shift_bulan_sebelumnya'],-3) ;
    $nInsentif1         += $key['insentif_1'] ;
    $nInsentif2         += $key['insentif_2'] ;
    $nInsentif3         += $key['insentif_3'] ;
    $nInsentif4         += $key['insentif_4'] ;
    $nInsentif5         += $key['insentif_5'] ;
    $nInsentif7         += $key['insentif_7'] ;

    $nPinjaman          += $key['pinjaman'] ;
    $nDenda             += $key['denda'] ; 
    $nLainLain          += $key['lain_lain'] ;

    $nTotal             += round($key['total'],-3) ;

}
    $worksheet1->write_string($row+1,1,  ($nGajiPokok) ,$content);
    $worksheet1->write_string($row+1,2,  ($nUangMakanHariBiasa) ,$content);
    $worksheet1->write_string($row+1,3,  ($nUangMakanHariLibur) ,$content);
    $worksheet1->write_string($row+1,4,  ($nUangMakanLongshiftBiasa) ,$content);
    $worksheet1->write_string($row+1,5,  ($nUangMakanLongshiftLibur) ,$content);
    $worksheet1->write_string($row+1,6,  ($nUangLaporan) ,$content);
    $worksheet1->write_string($row+1,7,  ($nUangKesehatan) ,$content);
    $worksheet1->write_string($row+1,8,  ($nBonusSebelumnya) ,$content);
    $worksheet1->write_string($row+1,9,  ($nInsentif1) ,$content);
    
    $worksheet1->write_string($row+1,10,  ($nInsentif2) ,$content);
    $worksheet1->write_string($row+1,11,  ($nInsentif3) ,$content);
    $worksheet1->write_string($row+1,12,  ($nInsentif6) ,$content);
    $worksheet1->write_string($row+1,13,  ($nInsentif4) ,$content);
    $worksheet1->write_string($row+1,14,  ($nInsentif5) ,$content);
    $worksheet1->write_string($row+1,15,  ($nInsentif7) ,$content);
    

    $worksheet1->write_string($row+1,16,  ($nPinjaman) ,$content);
    $worksheet1->write_string($row+1,17,  ($nDenda) ,$content);
    $worksheet1->write_string($row+1,18,  ($nLainLain) ,$content);
    $worksheet1->write_string($row+1,19,  ($nTotal) ,$content);


$workbook->close();

