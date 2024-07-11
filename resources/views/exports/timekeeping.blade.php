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
            <th rowspan="2" colspan="6" style="text-align: center">Employee Information</th>
            @foreach ($months as $month)
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
            <th rowspan="2" width="80px"></th>
    
        </tr>
        <tr>
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
        </tr>
        <tr>
            <th width="120px">Employee No.</th>
            <th width="105px">Company</th>
            <th width="105px">Last Name</th>
            <th width="105px">First Name</th>
            <th width="120px">Middle Name</th>
            <th width="105px">Date Hired</th>
            @for ($i = 1; $i <= $days; $i++)
                <th width="95px">
                    Time-In
                </th>
                <th width="95px">
                    Time-Out
                </th>
            @endfor
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