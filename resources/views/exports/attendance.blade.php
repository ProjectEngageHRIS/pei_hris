<style>
    .border{
        text-align: center;
        border: 100px solid black
    }
</style>
<div>

    <table style="border: 100px solid black">
    
        <thead >
        <tr >
            <th rowspan="2" colspan="20" style="font-size: 20px; color: #AC0C2E " >Daily Time Record </th>
            {{-- @foreach ($months as $month)
            <th colspan="{{$month['days_in_month'] * 2}}"  style="text-align: center; border: 50px solid black" bgcolor="#ffffb3">
                {{$month['month_name']}}
            </th>
            @endforeach
            <th rowspan="2"  width="80px"></th>
            <th rowspan="2" width="80px"></th>
            <th rowspan="2" colspan="2" align="center">HOLIDAY</th>
            <th rowspan="2" colspan="3" align="center">OVERTIME</th>
            <th rowspan="2" colspan="2" align="center">RD OT</th>
            <th rowspan="2" width="80px"></th>
            <th rowspan="2" width="80px"></th> --}}
        </tr>
        <tr></tr>
        <tr>
            <th rowspan="3"  colspan="3"> Employee ID: {{$employees->employee_id}} <br>
                             Name:  {{$employees->first_name}} {{$employees->middle_name}} {{$employees->last_name}} <br>
                             Department: {{$employees->department}} </th>
            <th rowspan="3" colspan="17"></th>
        </tr>
        <tr></tr>
        <tr></tr>
        {{-- <tr>
            @foreach($months as $month)
                @php
                    $ctr = $month['starting_day'] - 1;
                @endphp
                @for ($i = 0; $i < $month['days_in_month']; $i++)
                    <th colspan="2" style="text-align: center; border: 1px solid black;" bgcolor="#ffffb3">
                        {{$ctr += 1}}
                    </th>
                @endfor
            @endforeach
        </tr> --}}
        <tr>
            <th align="center" width="150px">
                Date
            </th>
            <th align="center" width="120px">
                Time-In
            </th>
            <th align="center" width="120px">
                Time-Out
            </th>
            <th bgcolor="#ff9900" width="100px"> REMARKS</th>
            <th width="110px">TARDINESS</th>
            <th width="135px">LEGAL HOLIDAY</th>
            <th width="145px">SPECIAL HOLIDAY</th>
            <th width="115px">REGULAR OT</th>
            <th width="150px">LEGAL HOLIDAY OT</th>
            <th width="160px">SPECIAL HOLIDAY OT</th>
            <th width="90px">RD OT</th>
            <th width="140px">RD HOLIDAY OT</th>
            <th width="165px">NIGHT DIFFERENTIAL</th>
            <th width="105px" >BIRTHDAY</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dtrs as $employeeData)
        <tr>
            {{-- @foreach($months as $month)
                @php
                    $ctr = $month['starting_day'] - 1;
                @endphp
                @for ($i = 0; $i < $month['days_in_month']; $i++)
                    <th colspan="2" style="text-align: center; border: 1px solid black;" bgcolor="#ffffb3">
                        {{$ctr += 1}}
                    </th>
                @endfor
            @endforeach --}}
            <td align="center">{{$employeeData['attendance_date']}}</td>
            {{-- <td>{{ $employeeData->employee_id }}</td>
            <td>{{ $employeeData->department }}</td>
            <td>{{ $employeeData->last_name }}</td>
            <td>{{ $employeeData->first_name }}</td>
            <td>{{ $employeeData->middle_name }}</td>
            <td>{{ $employeeData->start_of_employment }}</td> --}}
                {{-- @dd($employeeData, $day) --}}
            @if($employeeData)
                @if (is_null($employeeData['time_in']) || preg_match('/^\d{1,2}:\d{2} (AM|PM)$/i', $employeeData['time_in']))
                    <!-- Handle cases where time_in is null or not a time string -->
                    <td align="center">{{ $employeeData['time_in'] }}</td>
                    <td align="center">{{ $employeeData['time_out'] }}</td>
                @else
                    <td width="200px" align="center">{{ $employeeData['time_in'] }}</td>
                    <td width="200px" align="center">{{ $employeeData['time_out'] }}</td>
                    <!-- Handle cases where time_in is a valid time string -->
                @endif
            @else
                <td align="center"></td>
                <td align="center"></td>
            @endif
            @php
                $regularOt = 0;
                // foreach ($employeeData as $day) {
                //     if ($day && isset($day['overtime'])) {
                //         $regularOt += $day['overtime'];
                //     }
                // }
            @endphp
            <td ></td>
            <td></td>
            <td ></td>
            <td></td>
            @if($regularOt > 0)
                <td style="background-color: #9BBB59">{{$regularOt}}</td>
            @else
                <td></td>

            @endif
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td></td>
            <td ></td>

    
        </tr>
        @endforeach
    
    
        </tbody>
    </table>
</div>