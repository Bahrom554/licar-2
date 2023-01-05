
@foreach($drivers as $driver)
    <tr id="tr">
        <td  class="nr d-none d-md-table-cell">{{$loop->index+1}}</td>
        <td class="text-truncate" ><a class="d-md-none " href="{{route('drivers.show',$driver  ->id)}}">{{$driver->driver}}</a><span class="d-none d-md-block">{{$driver->driver}}</span></td>
        <td>{{$driver->tel_d}}</td>
        <td class="d-none d-lg-table-cell text-truncate">{{$driver->car->name ?? ''}} / {{$driver->car_number}} </td>
        <td class="d-none d-lg-table-cell text-truncate">{{$driver->c_start}} / {{$driver->c_end}} </td>
        <td class="d-none d-lg-table-cell text-truncate">{{$driver->l_start}} / {{$driver->l_end}} </td>
        <td class="puli text-truncate">{{number_format($driver->account,0,',',' ')}}</td>
        <td class="d-none d-md-table-cell bg-white text-truncate">
            <a href="{{route('drivers.show',$driver)}}"><i class="bi bi-diagram-3" style="font-size: 20px"></i></a>
        </td>

    </tr>

@endforeach

