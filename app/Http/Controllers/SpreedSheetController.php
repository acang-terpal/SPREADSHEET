<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;
use App\Services\ExcelForecastService;

class SpreedSheetController extends Controller
{
    protected $forecast;

    public function __construct(ExcelForecastService $forecast)
        {
            $this->forecast = $forecast;
        }

    public function getPage(){
        return view('spreedsheet',["activeSidebarMain" => "spreedsheet", "bodyClass" => "sidebar_main_open sidebar_main_swipe"]);
    }

    public function dontMessMeItsWork(Request $request){
        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        // Get the active worksheet
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('BC5', '=0');
        $activeWorksheet->getStyle('BC5')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('BC6', '=0.3');
        $activeWorksheet->getStyle('BC6')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('BC7', '=1');
        $activeWorksheet->getStyle('BC7')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('BD5', '=1.2');
        $activeWorksheet->getStyle('BD5')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('BD6', '=1');
        $activeWorksheet->getStyle('BD6')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('BD7', '=0');
        $activeWorksheet->getStyle('BD7')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);

        $activeWorksheet->setCellValue('C6', '61798739');
        $activeWorksheet->setCellValue('C7', '61798739');
        $activeWorksheet->setCellValue('C8', '139544838');
        $activeWorksheet->setCellValue('C9', '139544838');
        $activeWorksheet->setCellValue('C10', '=C6');

        $activeWorksheet->setCellValue('D6', '26904191.78');
        $activeWorksheet->setCellValue('D7', '59773031.23');
        $activeWorksheet->setCellValue('D8', '82941956');
        $activeWorksheet->setCellValue('D9', '118872037');
        $activeWorksheet->setCellValue('D10', '=SUM(D6:D9)');

        $activeWorksheet->setCellValue('E6', '=C6-D6');
        $activeWorksheet->setCellValue('E7', '=C7-D7');
        $activeWorksheet->setCellValue('E8', '=C8-D8');
        $activeWorksheet->setCellValue('E9', '=C9-D9');
        $activeWorksheet->setCellValue('E10', '=C10-D10');

        $activeWorksheet->setCellValue('F6', '=E6/C6');
        $activeWorksheet->getStyle('F6')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('F7', '=E7/C6');
        $activeWorksheet->getStyle('F7')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('F8', '=E8/C6');
        $activeWorksheet->getStyle('F8')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('F9', '=E9/C6');
        $activeWorksheet->getStyle('F9')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('F10', '=E10/C10');
        $activeWorksheet->getStyle('F10')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);

        $activeWorksheet->setCellValue('G6', '=0.15');
        $activeWorksheet->getStyle('G6')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('G7', '=0.15');
        $activeWorksheet->getStyle('G7')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('G8', '=0.15');
        $activeWorksheet->getStyle('G8')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('G9', '=0.15');
        $activeWorksheet->getStyle('G9')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('G10', '=0.15');
        $activeWorksheet->getStyle('G10')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);

        $activeWorksheet->setCellValue('H6', '=IFERROR(FORECAST(F6,OFFSET($BD$5:$BD$7,MATCH(F6,$BC$5:$BC$7,1)-1,0,2),OFFSET($BC$5:$BC$7,MATCH(F6,$BC$5:$BC$7,1)-1,0,2)),"")');
        $activeWorksheet->getStyle('H6')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('H7', '=IFERROR(FORECAST(F7,OFFSET($BD$5:$BD$7,MATCH(F7,$BC$5:$BC$7,1)-1,0,2),OFFSET($BC$5:$BC$7,MATCH(F7,$BC$5:$BC$7,1)-1,0,2)),"")');
        $activeWorksheet->getStyle('H7')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('H8', '=IFERROR(FORECAST(F8,OFFSET($BD$5:$BD$7,MATCH(F8,$BC$5:$BC$7,1)-1,0,2),OFFSET($BC$5:$BC$7,MATCH(F8,$BC$5:$BC$7,1)-1,0,2)),"")');
        $activeWorksheet->getStyle('H8')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('H9', '=IFERROR(FORECAST(F9,OFFSET($BD$5:$BD$7,MATCH(F9,$BC$5:$BC$7,1)-1,0,2),OFFSET($BC$5:$BC$7,MATCH(F9,$BC$5:$BC$7,1)-1,0,2)),"")');
        $activeWorksheet->getStyle('H9')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        // $activeWorksheet->setCellValue('H10', '=IFERROR(FORECAST(F10,OFFSET($BD$5:$BD$7,MATCH(F10,$BC$5:$BC$7,1)-1,0,2),OFFSET($BC$5:$BC$7,MATCH(F10,$BC$5:$BC$7,1)-1,0,2)),"")');
        $activeWorksheet->getStyle('H10')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);

        // Create a writer and save the file
        $writer = new Xlsx($spreadsheet);
        $writer->setPreCalculateFormulas(false);

        // Prepare headers for direct download
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment; filename="hello_world.xlsx"');

        // Output the file to the browser
        // $writer->save('php://output');
        $filePath = storage_path('app/tes.xlsx');
        $writer->save($filePath);

        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the calculated result of a formula in cell E11
        $calculatedValue["H6"] = $worksheet->getCell("H6")->getCalculatedValue();
        $calculatedValue["H7"] = $worksheet->getCell("H7")->getCalculatedValue();
        $calculatedValue["H8"] = $worksheet->getCell("H8")->getCalculatedValue();
        $calculatedValue["H9"] = $worksheet->getCell("H9")->getCalculatedValue();
        $calculatedValue["H10"] = $worksheet->getCell("H10")->getCalculatedValue();

        return $calculatedValue; // Outputs the result (e.g., 100)
        exit; // Important to exit after saving to prevent extra HTML output
    }

    public function formulaCalculator(Request $request){
        // Log::info('request : ' . print_r($request->all(), true));
        $dataSOurce = $request['dataSource'];
        // Log::info('request : ' . print_r($dataSOurce, true));
        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        // Get the active worksheet
        $activeWorksheet = $spreadsheet->getActiveSheet();
        foreach($dataSOurce as $row => $column) {
            foreach($column as $key => $value){
                // Log::info('coordinate : '. Coordinate::stringFromColumnIndex($key + 1) . $row + 1 . ' value : '. $value);
                $activeWorksheet->setCellValue(Coordinate::stringFromColumnIndex($key + 1) . $row + 1, $value);
            }
        }

        //for table Deviasi Kuantitas Impor Minyak Mentah untuk Feedstock Kilang dari Kuantitas yang Direkomendasikan
        //---------------------------data reference
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('BC5', '=0');
        $activeWorksheet->getStyle('BC5')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('BC6', '=0.3');
        $activeWorksheet->getStyle('BC6')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('BC7', '=1');
        $activeWorksheet->getStyle('BC7')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);

        $activeWorksheet->setCellValue('BD5', '=1.2');
        $activeWorksheet->getStyle('BD5')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('BD6', '=1');
        $activeWorksheet->getStyle('BD6')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('BD7', '=0');
        $activeWorksheet->getStyle('BD7')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        //-----------------------------lets calc
        $activeWorksheet->setCellValue('H6', '=FORECAST(F6,OFFSET($BD$5:$BD$7,MATCH(F6,$BC$5:$BC$7,1)-1,0,2),OFFSET($BC$5:$BC$7,MATCH(F6,$BC$5:$BC$7,1)-1,0,2))');
        // $activeWorksheet->setCellValue('H6', '=FORECAST(0.56464820778948 ,OFFSET({1.2,1,0},MATCH(0.56464820778948 ,{0,0.3,1},1)-1,0,2),OFFSET({0,0.3,1},MATCH(0.56464820778948 ,{0,0.3,1},1)-1,0,2))');
        Log::info(@$activeWorksheet->getCell("F6")->getCalculatedValue());
        $activeWorksheet->getStyle('H6')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('H7', '=FORECAST(F7,OFFSET($BD$5:$BD$7,MATCH(F7,$BC$5:$BC$7,1)-1,0,2),OFFSET($BC$5:$BC$7,MATCH(F7,$BC$5:$BC$7,1)-1,0,2))');
        $activeWorksheet->getStyle('H7')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('H8', '=FORECAST(F8,OFFSET($BD$5:$BD$7,MATCH(F8,$BC$5:$BC$7,1)-1,0,2),OFFSET($BC$5:$BC$7,MATCH(F8,$BC$5:$BC$7,1)-1,0,2))');
        $activeWorksheet->getStyle('H8')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('H9', '=FORECAST(F9,OFFSET($BD$5:$BD$7,MATCH(F9,$BC$5:$BC$7,1)-1,0,2),OFFSET($BC$5:$BC$7,MATCH(F9,$BC$5:$BC$7,1)-1,0,2))');
        $activeWorksheet->getStyle('H9')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $activeWorksheet->setCellValue('H10', '=FORECAST(F10,OFFSET($BD$5:$BD$7,MATCH(F10,$BC$5:$BC$7,1)-1,0,2),OFFSET$BC$5:$BC$7,MATCH(F10,$BC$5:$BC$7,1)-1,0,2))');
        $activeWorksheet->getStyle('H10')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);

        // Create a writer and save the file
        $writer = new Xlsx($spreadsheet);
        $writer->setPreCalculateFormulas(false);

        // Prepare headers for direct download
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment; filename="hello_world.xlsx"');

        // Output the file to the browser
        // $writer->save('php://output');
        $filePath = storage_path('app/tes.xlsx');
        $writer->save($filePath);

        // then we need read again for get result
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the calculated result of a formula in cell
        $calculatedValue["H6"] = $this->getCalculatedValue($worksheet, 'H6');
        $calculatedValue["H7"] = $this->getCalculatedValue($worksheet, 'H7');
        $calculatedValue["H8"] = $this->getCalculatedValue($worksheet, 'H8');
        $calculatedValue["H9"] = $this->getCalculatedValue($worksheet, 'H9');
        $calculatedValue["H10"] = $this->getCalculatedValue($worksheet, 'H10');

        // with php logic
        // $BC = [0,0.3,1];
        // $BD = [1.2,1,0];
        // $F6 = $worksheet->getCell('F6')->getCalculatedValue();
        // $match = $this->forecast->matchApprox($F6, $BC);
        // $knownX = $this->forecast->offset($BC, $match, 3);
        // $knownY = $this->forecast->offset($BD, $match, 3);
        // $F6 = $this->forecast->forecastLinear($F6, $knownX, $knownY);

        // $F7 = $worksheet->getCell('F7')->getCalculatedValue();
        // $match = $this->forecast->matchApprox($F7, $BC);
        // $knownX = $this->forecast->offset($BC, $match, 3);
        // $knownY = $this->forecast->offset($BD, $match, 3);
        // $F7 = $this->forecast->forecastLinear($F7, $knownX, $knownY);

        // $F8 = $worksheet->getCell('F8')->getCalculatedValue();
        // $match = $this->forecast->matchApprox($F8, $BC);
        // $knownX = $this->forecast->offset($BC, $match, 3);
        // $knownY = $this->forecast->offset($BD, $match, 3);
        // $F8 = $this->forecast->forecastLinear($F8, $knownX, $knownY);

        // $F9 = $worksheet->getCell('F9')->getCalculatedValue();
        // $match = $this->forecast->matchApprox($F9, $BC);
        // $knownX = $this->forecast->offset($BC, $match, 3);
        // $knownY = $this->forecast->offset($BD, $match, 3);
        // $F9 = $this->forecast->forecastLinear($F9, $knownX, $knownY);

        // $F10 = $worksheet->getCell('F10')->getCalculatedValue();
        // $match = $this->forecast->matchApprox($F10, $BC);
        // $knownX = $this->forecast->offset($BC, $match, 3);
        // $knownY = $this->forecast->offset($BD, $match, 3);
        // $F10 = $this->forecast->forecastLinear($F10, $knownX, $knownY);

        // $calculatedValue["H6"] = $F6;
        // $calculatedValue["H7"] = $F7;
        // $calculatedValue["H8"] = $F8;
        // $calculatedValue["H9"] = $F9;
        // $calculatedValue["H10"] = $F10;

        return $calculatedValue; // Outputs the result (e.g., 100)
        exit; // Important to exit after saving to prevent extra HTML output
    }

    public function getCalculatedValue($worksheet, $coordinate){
        try {
            return $worksheet->getCell($coordinate)->getCalculatedValue();
        } catch (\Throwable $e) {
            return ExcelError::NA();;
        }
    }
}
