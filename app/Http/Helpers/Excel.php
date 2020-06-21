<?php
function exportLeads($leads)
{
	// Create new Spreadsheet object
	$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	// Set document properties
	$spreadsheet->getProperties()->setCreator('miraimedia.co.th')
		->setLastModifiedBy('Cholcool')
		->setTitle('how to export data to excel use phpspreadsheet in codeigniter')
		->setSubject('Generate Excel use PhpSpreadsheet in CodeIgniter')
		->setDescription('Export data to Excel Work for me!');
	// add style to the header
	$styleArray = array(
		'font' => array(
			'bold' => true,
		),
		'alignment' => array(
			'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
		),
		'borders' => array(
			'bottom' => array(
				'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
				'color' => array('rgb' => '333333'),
			),
		),
		'fill' => array(
			'type' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
			'rotation' => 90,
			'startcolor' => array('rgb' => '0d0d0d'),
			'endColor' => array('rgb' => 'f2f2f2'),
		),
	);
	$spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($styleArray);
	// auto fit column to content
	foreach (range('A', 'G') as $columnID) {
		$spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
	}
	// set the names of header cells
	$sheet->setCellValue('A1', 'ID');
	$sheet->setCellValue('B1', 'Name');
	$sheet->setCellValue('C1', 'Email');
	$sheet->setCellValue('D1', 'Phone');
	$sheet->setCellValue('E1', 'Source');
	$sheet->setCellValue('F1', 'Note');
	$sheet->setCellValue('G1', 'Train Location');
	$sheet->setCellValue('H1', 'Page');
	$sheet->setCellValue('I1', 'District');
	$sheet->setCellValue('J1', 'Product');
	$sheet->setCellValue('K1', 'Lead Date');
	$sheet->setCellValue('L1', 'Created At');
	$sheet->setCellValue('M1', 'Agent');
	$sheet->setCellValue('N1', 'Status');
	$getdata = $leads;
	// Add some data
	$x = 2;
	foreach ($getdata as $get) {
		$sheet->setCellValue('A' . $x, $get->id);
		$sheet->setCellValue('B' . $x, $get->name);
		$sheet->setCellValue('C' . $x, $get->email);
		$sheet->setCellValue('D' . $x, $get->phone);
		$sheet->setCellValue('E' . $x, $get->source);
		$sheet->setCellValue('F' . $x, $get->note);
		$sheet->setCellValue('G' . $x, $get->train_location);
		$sheet->setCellValue('H' . $x, $get->page);
		$sheet->setCellValue('I' . $x, $get->district);
		$sheet->setCellValue('J' . $x, $get->product);
		$sheet->setCellValue('K' . $x, $get->lead_date);
		$sheet->setCellValue('L' . $x, $get->created_at);
		$sheet->setCellValue('M' . $x, $get->agent ? $get->agent->email : null);
		$sheet->setCellValue('N' . $x, $get->ticket ? $get->ticket->current_level : null);
		$x++;
	}

// Redirect output to a client’s web browser (Xlsx)
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="test.xlsx"');
	header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
	header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header('Pragma: public'); // HTTP/1.0
	//Create file excel.xlsx
	$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
//	$writer->save('text.xlsx');
	$writer->save('php://output');
	return true;
//	exit();
	//End Function index
}