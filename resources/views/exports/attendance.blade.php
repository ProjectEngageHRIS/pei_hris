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
            <th rowspan="2" colspan="14" style="font-size: 20px; color: #AC0C2E " >Daily Time Record </th>
        </tr>
        <tr></tr>
        <tr>
            <th rowspan="3"  colspan="3"> Employee ID: {{$employees->employee_id}} <br>
                             Name:  {{$employees->first_name}} {{$employees->middle_name}} {{$employees->last_name}} <br>
                             Department: {{$employees->department}} </th>
            <th rowspan="3" colspan="11"></th>
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
            <th bgcolor="#ff9900" width="120px"> REMARKS</th>
            <th width="130px">TARDINESS</th>
            <th width="155px">LEGAL HOLIDAY</th>
            <th width="170px">SPECIAL HOLIDAY</th>
            <th width="140px">REGULAR OT</th>
            <th width="180px">LEGAL HOLIDAY OT</th>
            <th width="190px">SPECIAL HOLIDAY OT</th>
            <th width="110px">RD OT</th>
            <th width="160px">RD HOLIDAY OT</th>
            <th width="195px">NIGHT DIFFERENTIAL</th>
            <th width="125px" >BIRTHDAY</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dtrs as $employeeData)
        <tr>
          
            <td align="center">{{$employeeData['attendance_date']}}</td>
 
            @if($employeeData)
                @if (!$employeeData['leave_request_flag'])
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
        </tr>
        @endforeach
    
    
        </tbody>
    </table>
</div>