<?php
class PDF extends FPDF
{
	

	function Content($row){
    
    function String2Date($dTgl){
            //return 22-11-2012  
            list($cYear,$cMount,$cDate) = explode("-",$dTgl) ;
            if(strlen($cYear) == 4){
                $dTgl   = $cDate . "-" . $cMount . "-" . $cYear ;
            } 
            return $dTgl ;  
        }    
    $cText_1 = "Human Resource Manager PT.GLOBAL INSIGHT UTAMA memberikan tugas kepada :";
    $cText_2 = "Untuk Berpindah Tugas Dari : ";
    $cText_3 = "Demikian Surat Mutasi ini dibuat agar dapat dilaksanakan dengan penuh rasa tanggung jawab dan apabila ada kekeliruan dalam surat mutasi ini akan diadakan perbaikan sebagaimana mestinya.";
        foreach ($row as $vaHasil) {
            $nNomorMutasi = $vaHasil['nomor_mutasi'];
            $cNamaPegawai = $vaHasil['Pegawai']; 
            $cNikPegawai  = $vaHasil['NIK'];
            $cJabatanLama = $vaHasil['JabatanLama'];
            $cTempatLama  = $vaHasil['tempat_lama'];
            $cAtasanLama  = $vaHasil['atasan_lama'];
            $cJabatanBaru = $vaHasil['JabatanBaru'];
            $cTempatBaru  = $vaHasil['tempat_baru'];
            $cAtasanBaru  = $vaHasil['atasan_baru'];
            $cTugas       = $vaHasil['tugas'];
            $dTgl         = String2Date($vaHasil['tanggal']);        
            $cCreate      = $vaHasil['create']; 
        }
        
                $this->setFont('Arial','',10);
                $this->setFillColor(255,255,255);
                $this->cell(100,6,"PT.GLOBAL INSIGHT UTAMA",0,0,'L',1); 
            //$this->Image(base_url().'upload/logo_nitro.jpg', 10, 25,'20','20','jpeg');
                
                $this->Ln(12);
                $this->setFont('Arial','',14);
                $this->setFillColor(255,255,255);
                $this->cell(70,6,'',0,0,'C',0); 
                $this->setFont('Arial','B',14);
                $this->cell(100,6,'SURAT MUTASI',0,1,'L',1); 
                $this->setFont('Arial','',10);
                $this->cell(68,6,'',0,0,'C',0);
                $this->cell(100,6,$nNomorMutasi,0,1,'L',1);
            
                $this->Ln(5); // SPASI
                $this->cell(10,6,'',0,0,'C',0); 
                $this->setFont('Arial','',10);
                $this->Text(22, 42, $cText_1);
                $this->Ln(1); // SPASI
                $this->Text(33, 50, "Nama");
                $this->Text(63, 50, ":");
                $this->Text(67, 50, $cNamaPegawai);
                $this->Text(33, 58, "Nik");
                $this->Text(63, 58, ":");
                $this->Text(67, 58, $cNikPegawai);

                $this->Text(22, 68, $cText_2);
                $this->Text(33, 76, "Jabatan");
                $this->Text(63, 76, ":");
                $this->Text(67, 76, $cJabatanLama);
                $this->Text(33, 84, "Tempat");
                $this->Text(63, 84, ":");
                $this->Text(67, 84, $cTempatLama);
                $this->Text(33, 92, "Atasan Langsung");
                $this->Text(63, 92, ":");
                $this->Text(67, 92, $cAtasanLama);

                $this->Text(22, 106, "Menjadi");
                $this->Text(33, 114, "Jabatan");
                $this->Text(63, 114, ":");
                $this->Text(67, 114, $cJabatanBaru);
                $this->Text(33, 122, "Tempat");
                $this->Text(63, 122, ":");
                $this->Text(67, 122, $cTempatBaru);
                $this->Text(33, 130, "Atasan Langsung");
                $this->Text(63, 130, ":");
                $this->Text(67, 130, $cAtasanBaru);
                $this->Text(33, 138, "Masa Tugas");
                $this->Text(63, 138, ":");
                $this->Ln(100); // SPASI
                $this->SetY(134);
                $this->SetX(66);
                $this->MultiCell('140','5', $cTugas, '2', 'J', '');

                $this->SetY(164);
                $this->SetX(22);
                $this->MultiCell('174','5', $cText_3, '2', 'J', '');

                $this->Text(137, 190, "Dikeluarkan di ");
                $this->Text(167, 190, ": Bekasi");
                $this->Text(137, 195, "Pada Tanggal ");
                $this->Text(167, 195, ": ".$dTgl."");
                $this->Text(137, 200, "HRM");
                
                $this->Text(137, 230, $cCreate);

                 $this->Text(22, 239, "Tembusan");
                 $this->Text(22, 245, "1. Direksi PT.GIU");
                 $this->Text(22, 250, "2. Kepala Unit Bisnis");
                 $this->Text(22, 255, "3. Kepala Unit Kerja");
                 $this->Text(22, 260, "4. Kepala Area");
                 $this->Text(22, 265, "5. Arsip");
              

	}
	
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($row);
$pdf->Output();