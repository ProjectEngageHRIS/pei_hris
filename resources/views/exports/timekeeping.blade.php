<style>
    .border{
        text-align: center;
        border: 100px solid black
    }
</style>
<div>

    <table style="border: 100px solid black">
    
        <thead >
        <tr>
            <th colspan="6">
            </th>
            @foreach ($months as $month)
            <th colspan="{{$month['days_in_month'] * 2}}"  style="text-align: center; border: 50px solid black" bgcolor="#ffffb3">
                {{$month['month_name']}}
            </th>
            <th rowspan="2" bgcolor="#ff9900" width="80px"> REMARKS</th>
            <th width="80px"></th>
            <th colspan="2">HOLIDAY</th>
            <th colspan="3">OVERTIME</th>
            <th colspan="2">RD OT</th>
            <th width="80px"></th>
            <th width="80px"></th>
            @endforeach
    
        </tr>
        <tr>
            <th width="100px">Employee No.</th>
            <th width="90px">Company</th>
            <th width="90px">Last Name</th>
            <th width="90px">First Name</th>
            <th width="90px">Middle Name</th>
            <th width="90px">Date Hired</th>
            @foreach($months as $month)
                @php
                    $ctr = $month['starting_day'] - 1;
                @endphp
                {{-- @dd($month['days_in_month']) --}}
                @for ($i = 0; $i < $month['days_in_month']; $i++)
                    <th colspan="2" style="text-align: center; border: 1px solid black;" bgcolor="#ffffb3">
                        {{$ctr += 1}}
                    </th>
                @endfor
            @endforeach
            {{-- <th width="90px">REMARKS</th> --}}
            <th width="90px">TARDINESS</th>
            <th width="120px">LEGAL HOLIDAY</th>
            <th width="110px">SPECIAL HOLIDAY</th>
            <th width="90px">REGULAR OT</th>
            <th width="125px">LEGAL HOLIDAY OT</th>
            <th width="130px">SPECIAL HOLIDAY OT</th>
            <th width="90px">RD OT</th>
            <th width="120px">RD HOLIDAY OT</th>
            <th width="130px">NIGHT DIFFERENTIAL</th>
            <th width="80px">BIRTHDAY</th>
        </tr>
        
        <tr>
            <th colspan="6">
            </th>
            @for ($i = 1; $i <= $days; $i++)
            <th  align="center">
                Time-In
            </th>
            <th  align="center">
                Time-Out
            </th>
            @endfor
        </tr>
        </thead>
        <tbody>
       @foreach($dtrs as $employeeData)
        <tr>
            <td>{{ $employeeData['employee']->employee_id }}</td>
            <td>{{ $employeeData['employee']->department }}</td>
            <td>{{ $employeeData['employee']->last_name }}</td>
            <td>{{ $employeeData['employee']->first_name }}</td>
            <td>{{ $employeeData['employee']->middle_name }}</td>
            <td>{{ $employeeData['employee']->start_of_employment }}</td>
            @foreach($employeeData['dtrs'] as $day)
                @if($day)
                    <td align="center">{{ $day['time_in'] }}</td>
                    <td align="center">{{ $day['time_out'] }}</td>
                @else
                    <td align="center"></td>
                    <td align="center"></td>
                @endif
            @endforeach
            @php
                $regularOt = 0;
                foreach ($employeeData['dtrs'] as $day) {
                    if ($day && isset($day['overtime'])) {
                        $regularOt += $day['overtime'];
                    }
                }
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