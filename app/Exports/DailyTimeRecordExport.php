<?php

namespace App\Exports;

use Throwable;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Dailytimerecord;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class DailyTimeRecordExport implements FromView, WithStyles, WithChunkReading, WithEvents, ShouldAutoSize
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date, $end_date) {
            $this->start_date = $start_date;
            $this->end_date = $end_date;

    }

    public function failed(Throwable $exception): void
    {
        // handle failed export
    }

    public function chunkSize(): int
    {
        return 1000; // Adjust the chunk size based on your needs
    }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function(AfterSheet $event) {
    //             $sheet = $event->sheet->getDelegate();
                
    //             // Determine the highest column and row in the worksheet
    //             $highestColumn = $sheet->getHighestColumn();
    //             $highestRow = $sheet->getHighestRow();
                
    //             // Assuming the start date and end date are provided
    //             $startDate = $this->start_date; // Replace with your actual start date
    //             $endDate = $this->end_date; // Replace with your actual end date
    
    //             // Calculate the start and end columns based on the dates
    //             $startColumnIndex = Coordinate::columnIndexFromString('G'); // Column where your date columns start
    //             $endColumnIndex = $startColumnIndex + (new \DateTime($endDate))->diff(new \DateTime($startDate))->days * 2 + 1; // Each day spans 2 columns
                
    //             $skipColumns = range($startColumnIndex, $endColumnIndex);
    
    //             // Build the auto filter range by excluding the date columns
    //             $filterColumns = [];
    //             $currentColumnIndex = 1;
    
    //             // Loop through each column until we reach the highest column
    //             while ($currentColumnIndex <= Coordinate::columnIndexFromString($highestColumn)) {
    //                 $currentColumn = Coordinate::stringFromColumnIndex($currentColumnIndex);
    
    //                 // Check if the column index is not in the skip list
    //                 if (!in_array($currentColumnIndex, $skipColumns)) {
    //                     $filterColumns[] = $currentColumn; // Only add column letter without row number
    //                 }
    //                 $currentColumnIndex++;
    //             }
    
    //             // Determine the last column in the filter range
    //             $endFilterColumn = end($filterColumns);
    
    //             // Construct the auto filter range
    //             $startFilterColumn = 'A'; // Assuming the start of your data is from column A
    //             $autoFilterRange = $startFilterColumn . '2:' . $endFilterColumn . '2'; // Assuming the header is in row 2
                
    //             // Apply auto filter
    //             $sheet->setAutoFilter($autoFilterRange);
    //         }
    //     ];
    // }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
    
                // Set auto-filter from A3 to the highest column in row 3
                $sheet->setAutoFilter('A3:' . $sheet->getHighestColumn() . '3');
    
                // Freeze columns A to F
                $sheet->freezePane('G4'); // Assuming you want row 3 to be frozen and columns A to F to be sticky
                // $sheet->setAutoSize(array(
                //     'A', 'C'
                // ));
            },
        ];
    }
    
    


    public function styles(Worksheet $sheet)
    {
        // Determine the highest column and row in the worksheet
        $highestColumn = $sheet->getHighestColumn();
        $highestRow = $sheet->getHighestRow();
    
        // Assuming the start date and end date are provided (e.g., in $startDate and $endDate)
        $startDate = $this->start_date; // Replace with your actual start date
        $endDate = $this->end_date; // Replace with your actual end date
    
        // Calculate the start and end columns based on the dates
        $startColumnIndex = Coordinate::columnIndexFromString('G'); // Column where your date columns start
        $endColumnIndex = $startColumnIndex + (new \DateTime($endDate))->diff(new \DateTime($startDate))->days * 2 + 1; // Each day spans 2 columns
    
        $skipColumns = range($startColumnIndex, $endColumnIndex);

    
        // Initialize the current column to "A"
        $currentColumnIndex = 1;
    
        // Loop through each column until we reach the highest column
        while (true) {
            $currentColumn = Coordinate::stringFromColumnIndex($currentColumnIndex);
    
            // Apply styles to the header row (first row)
            if (!in_array($currentColumnIndex, $skipColumns)) {
                $sheet->getStyle($currentColumn . '1')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THICK,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'font' => [
                        'name' => 'Aptos Narrow',
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $sheet->getStyle($currentColumn . '2')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THICK,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'font' => [
                        'name' => 'Aptos Narrow',
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $sheet->getStyle($currentColumn . '3')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THICK,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'font' => [
                        'name' => 'Aptos Narrow',
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);
            } else {
                $sheet->getStyle($currentColumn . '1')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $sheet->getStyle($currentColumn . '2')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $sheet->getStyle($currentColumn . '3')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THICK,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'font' => [
                        'name' => 'Aptos Narrow',
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);
            }
    
            // Apply styles to each cell in the column
            for ($row = 4; $row <= $highestRow; $row++) { // Start from the 3rd row
                $cell = $currentColumn . $row;
                if (!in_array($currentColumnIndex, $skipColumns)) {
                    $sheet->getStyle($cell)->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => Border::BORDER_THICK,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                        'font' => [
                            'name' => 'Aptos Narrow',
                        ],
                        'alignment' => [
                            'horizontal' => Alignment::HORIZONTAL_CENTER,
                            'vertical' => Alignment::VERTICAL_CENTER,
                        ],
                    ]);
                } else {
                    $sheet->getStyle($cell)->applyFromArray([
                        'borders' => [
                            'outline' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                    ]);
                }
            }
    
            // Move to the next column
            $currentColumnIndex++;
    
            // Check if we have reached the highest column
            if ($currentColumnIndex > Coordinate::columnIndexFromString($highestColumn)) {
                break;
            }
        }
    
        // Apply styles to the last column (the highest column)
        if (!in_array(Coordinate::columnIndexFromString($highestColumn), $skipColumns)) {
            $sheet->getStyle($highestColumn . '1')->applyFromArray([
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THICK,
                        'color' => ['argb' => '000000'],
                    ],
                ],
                'font' => [
                    'name' => 'Aptos Narrow',
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ]);
            $sheet->getStyle($highestColumn . '2')->applyFromArray([
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THICK,
                        'color' => ['argb' => '000000'],
                    ],
                ],
                'font' => [
                    'name' => 'Aptos Narrow',
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ]);
        } else {
            $sheet->getStyle($highestColumn . '1')->applyFromArray([
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ]);
            $sheet->getStyle($highestColumn . '2')->applyFromArray([
                'borders' => [
                    'outline' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ]);
        }
    
        // Apply styles to each cell in the last column
        for ($row = 3; $row <= $highestRow; $row++) { // Start from the 3rd row
            $cell = $highestColumn . $row;
            if (!in_array(Coordinate::columnIndexFromString($highestColumn), $skipColumns)) {
                $sheet->getStyle($cell)->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THICK,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                    'font' => [
                        'name' => 'Aptos Narrow',
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);
            } else {
                $sheet->getStyle($cell)->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            }
        }
    }


    public function view(): View
    {
        $start_date = Carbon::parse($this->start_date);
        $end_date = Carbon::parse($this->end_date);
        $diff_in_days = $start_date->diffInDays($end_date) + 1;
        // $start_date = Carbon::parse('March 22, 2024');
        // $end_date = Carbon::parse('September 17, 2024');
        
        // $dtrs = Dailytimerecord::with('employee:employee_id,first_name,last_name')->whereBetween('attendance_date', [$this->start_date, $this->end_date])->get();
        $dtrs = Dailytimerecord::whereBetween('attendance_date', [$start_date, $end_date])->get();
        $employees = Employee::select('employee_id', 'first_name', 'middle_name', 'last_name', 'department', 'start_of_employment')->get();
        $dtrsGroupedByEmployee = $dtrs->groupBy('employee_id');

        // Initialize an array to hold the final results
        $results = [];
        
        // Loop through each employee
        foreach ($employees as $employee) {
            // Initialize an array to hold DTRs for each date in the range
            $employeeDtrs = [];
            $currentDate = $start_date->copy();
            $endingDate = $end_date->copy();

            // dd($currentDate, $endingDate);
            while ($currentDate->lessThanOrEqualTo($endingDate)) {
                // Check if the employee has any DTRs
                $employeeDtrGroup = $dtrsGroupedByEmployee->get($employee->employee_id);
                
                // Check if there is a DTR for the current date
                $dtr = $employeeDtrGroup ? $employeeDtrGroup->firstWhere('attendance_date', $currentDate->toDateString()) : null;
                
                if ($dtr) {
                    $sameDay = Carbon::parse($dtr->time_in)->isSameDay(Carbon::parse($dtr->time_out));
                    if(!in_array($dtr->type, ["Wholeday", "Overtime", "Undertime", "Half-Day"])){
                        $timeIn = $dtr->type;
                        $timeOut = $dtr->type;
                    } else if ($sameDay) {
                        $timeIn = Carbon::parse($dtr->time_in)->format('h:i A');
                        $timeOut = Carbon::parse($dtr->time_out)->format('h:i A');
                    } else {
                        $timeIn = Carbon::parse($dtr->time_in)->format('M d, Y h:i A');
                        $timeOut = Carbon::parse($dtr->time_out)->format('M d, Y h:i A');
                    }
                    $overtime = $dtr->overtime;
                } else {
                    $timeIn = null;
                    $timeOut = null;
                    $overtime = null;

                }
                // Add the formatted time to the array, or null if DTR doesn't exist
                $employeeDtrs[$currentDate->toDateString()] = [
                    'time_in' => $timeIn,
                    'time_out' => $timeOut,
                    'overtime' => $overtime,
                ];
                
                // Move to the next date
                $currentDate->addDay();
            }
        
            // Add the employee and their DTRs to the results
            $results[] = [
                'employee' => $employee,
                'dtrs' => $employeeDtrs,
            ];
        }

        
        // Output the results (for debugging purposes)
        // dd($results);   
        // dd($results[1]['dtrs']);
          // dd($results[1]['dtrs']['2024-03-22']->time_in);


        // Initialize an empty array to store the results
        $months = [];

        // Calculate for the start month
        if($start_date->month == $end_date->month){
            $startMonth = $start_date->format('F Y');
            $startDays = $end_date->copy()->diffInDays($start_date) + 1;
            $startMonthStartDay = $start_date->day; // Get the day of the month
            // dd($startDays);
            $months[] = [
                'month_name' => $startMonth,
                'days_in_month' => $startDays,
                'starting_day' => $startMonthStartDay ,

            ];

        }
        else {
            $startMonth = $start_date->format('F Y');
            $startDays = $start_date->copy()->endOfMonth()->diffInDays($start_date) + 1;
            $startMonthStartDay = $start_date->day; // Get the day of the month
            // dd($start_date->copy()->endOfMonth());
            $months[] = [
                'month_name' => $startMonth,
                'days_in_month' => $startDays,
                'starting_day' => $startMonthStartDay ,

            ];


            // Calculate for the full months in between
            $currentDate = $start_date->copy()->addMonth()->startOfMonth();
            while ($currentDate->lessThanOrEqualTo($endingDate->copy()->subMonth()->endOfMonth())) {
                $fullMonth = $currentDate->format('F Y');
                $daysInMonth = $currentDate->copy()->endOfMonth()->diffInDays($currentDate) + 1;
                $currentMonthStartDay = $currentDate->day; // Get the day of the month
                $months[] = [
                    'month_name' => $fullMonth,
                    'days_in_month' => $daysInMonth,
                    'starting_day' => $currentMonthStartDay,

                ];
                $currentDate->addMonthNoOverflow(); // Move to the next month without overflow
            }

            // Calculate for the end month
            $endMonth = $endingDate->format('F Y');
            $endDays = $endingDate->diffInDays($endingDate->copy()->startOfMonth()) + 1;
            $endMonthStartDay = $endingDate->copy()->startOfMonth()->day;

            $months[] = [
                'month_name' => $endMonth,
                'days_in_month' => $endDays,
                'starting_day' => $endMonthStartDay,

            ];
        }

        

        return view('exports.timekeeping', [
            'dtrs' => $results,
            'employees' => $employees,
            'months' => $months,
            'days' => $diff_in_days
        ]);
    }
}
