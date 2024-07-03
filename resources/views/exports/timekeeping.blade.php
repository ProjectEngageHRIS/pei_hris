
<table>
    <style>
        th, tr, td{
            text-align: center
        }
    </style>
    <thead>
    <tr>
        <th colspan="6">

        </th>
        @foreach ($months as $month)
        <th colspan="{{$month['days_in_month'] * 2}}"  style="text-align: center;">
            {{$month['month_name']}}
        </th>
        @endforeach

    </tr>
    <tr>
        <th>Employee No.</th>
        <th width="80px">Company</th>
        <th width="80px">Last Name</th>
        <th width="80px">First Name</th>
        <th width="80px">Middle Name</th>
        <th width="80px">Date Hired</th>
        @foreach($months as $month)
            @for ($i = $month['days_in_month']; $i <= $month['days_in_month']; $i++)
            <th colspan="2" style="text-align: center;">
                {{$i}}
            </th>
            @endfor
        @endforeach
    </tr>
    <tr>
        <th colspan="6">

        </th>
        @foreach($dtrs as $dtr_data)
            @foreach ($dtr_data['dtrs'] as $day)
            <th width="140px" align="center">
                Time-In
            </th>
            <th width="140px" align="center">
                Time-Out
            </th>
            @endforeach
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee_data)
        <tr>
            <td>{{ $employee_data->employee_id }}</td>
            <td>{{ $employee_data->department }}</td>
            <td>{{ $employee_data->last_name }}</td>
            <td>{{ $employee_data->first_name }}</td>
            <td>{{ $employee_data->middle_name }}</td>
            <td>{{ $employee_data->start_of_employment }}</td>
            @foreach($dtrs as $dtr_data)
                @foreach ($dtr_data['dtrs'] as $day)
                    @if($day)
                        <td align="center">{{ $day->time_in}}</td>
                        <td align="center">{{ $day->time_out}}</td>
                    @else
                        <td align="center"></td>
                        <td align="center"></td>
                    @endif
                @endforeach
                {{-- <td align="center">{{ $dtr_data['time_out'] }}</td> --}}
            @endforeach
            
        </tr>
    @endforeach


    </tbody>
</table>