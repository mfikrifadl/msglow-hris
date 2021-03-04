    <?php

    if (!defined('BASEPATH')) exit('No direct script access allowed');
    
    class Import extends CI_Controller
    {
    
        public function __construct()
        {
    
            parent::__construct();
    
            //MenLoad model yang berada di Folder Model dan namany model
            $this->load->model('model');
            $this->load->model('relasi');
            // Meload Library session 
            $this->load->library('session');
            //Meload database
            $this->load->database();
            //Meload url 
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->helper('download');
        }

        public function tes()
        {
            echo"<h1>HALO</h1> <br />";
            $this->load->library('Libexcel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Testing langsung bunting');
            $this->excel->getActiveSheet()->setCellValue('A1', 'Nilai excelnya');

            $filename = 'nama_file.xls';
            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0'); //no cache
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
            $objWriter->save('php://output');
        }

        public function bangunexcel($parameter){
            $alphas = range("A", "Z");
            $objPHPExcel = new PHPExcel();
            $sNAMESS = "";
            foreach ($parameter as $key => $value) {
                ${$key}=$value;
            }
                if(!isset($col)){
                    echo "Definisi Kolom tidak ada!";
                    die();
                }else{
                    $jumlahKolom = count($col);
                    if($jumlahKolom==0){
                        echo "Definisi Kolom tidak ada!";
                        die();
                    }else{
                        if($jumlahKolom>26){
                            // $alphas = $this->createColumnsArray("c");
                        }
                    }
                }
                
                $objPHPExcel->setActiveSheetIndex(0);
                $objPHPExcel->getActiveSheet()->setTitle($sNAMESS);
                $objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(55);
                $loop = 1;
                $arrKolom =0;
                foreach ($col as $colvalue) {
                    foreach ($colvalue as $keycol => $valuecol) {
                        ${$keycol}=$valuecol;
                    }
                    if(isset($nilai)){
                        if($nilai!=""){
                            $objPHPExcel->getActiveSheet()->setCellValue($alphas[$arrKolom]."1", $nilai);
                        }
                    }
                    if(isset($fontsize)){
                        if($fontsize!=0){
                            $objPHPExcel->getActiveSheet()->getStyle($alphas[$arrKolom]."1")->getFont()->setSize($fontsize);
                        }
                    }
                    if(isset($bold)){	
                        if($bold){
                            $objPHPExcel->getActiveSheet()->getStyle($alphas[$arrKolom]."1")->getFont()->setBold(true);
                        }
                    }
                    $classvertical = PHPExcel_Style_Alignment::VERTICAL_CENTER;
                    if(isset($valign)){	
                        switch ($valign) {
                            case 'top':
                                $classvertical = PHPExcel_Style_Alignment::VERTICAL_TOP;
                                break;
                            case 'bottom':
                                $classvertical = PHPExcel_Style_Alignment::VERTICAL_BOTTOM;
                                // $objPHPExcel->getActiveSheet()->getStyle($alphas[$arrKolom]."1")->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
                                break;
                        }
                    }
                    $objPHPExcel->getActiveSheet()->getStyle($alphas[$arrKolom]."1")->getAlignment()->setVertical($classvertical);
    
                    $classhorizontal = PHPExcel_Style_Alignment::HORIZONTAL_LEFT;
                    if(isset($halign)){	
                        switch ($halign) {
                            case 'center':
                                $classhorizontal = PHPExcel_Style_Alignment::HORIZONTAL_CENTER;							
                                break;
                            case 'right':
                                $classhorizontal = PHPExcel_Style_Alignment::HORIZONTAL_RIGHT;
                                break;
                        }
                    }
                    $objPHPExcel->getActiveSheet()->getStyle($alphas[$arrKolom]."1")->getAlignment()->setHorizontal($classhorizontal);
                    $loop++;
                    $arrKolom++;
                }
                if(isset($rsl)){
                    $nomor = 1;
                    $rowloc = 2;
                    // echo "";
				foreach ($rsl as $key => $value) {
					$colloc=0;
					$arrKolom =0;
					foreach ($col as $colvalue) {
					        foreach ($colvalue as $keycol => $valuecol) {
							$ketemu = false;
							if($keycol=="namanya"){
								if($valuecol=="nomor"){
									$valueval = $nomor;	
								}else{
									$valueval = $value->$valuecol;	
								}
								$objPHPExcel->getActiveSheet()->setCellValue($alphas[$arrKolom].$rowloc, $valueval);
								$objPHPExcel->getActiveSheet()->getColumnDimension($alphas[$arrKolom])->setAutoSize(true);
								$ketemu = true;
							}
							if($keycol=="format"){
								switch ($valuecol) {
									case 'datetime':
										$objPHPExcel->getActiveSheet()->getStyle($alphas[$arrKolom].$rowloc)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
										break;
									case 'angkakoma':
										$objPHPExcel->getActiveSheet()->getStyle($alphas[$arrKolom].$rowloc)->getNumberFormat()->setFormatCode('_(#,##0.00_);_(\(#,##0.00\);_("-"??_);_(@_)');
										break;			
								}
							}
						}
						$arrKolom++;			
					}
					$rowloc++;
					$nomor++;
				}
			}
			
			header('Content-Type: application/vnd.ms-excel'); //mime type
			header('Content-Disposition: attachment;filename="'.$sFILNAM.'.xls"'); 
			header('Cache-Control: max-age=0'); //no cache
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save('php://output');    	
			
    }



    }



    ?>
