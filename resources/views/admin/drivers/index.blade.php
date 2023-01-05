@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.message')

    <div class="card">
        <div class="row px-4" >
               <div class="col-md-8 ">
                   <form method="GET" action="{{route('drivers.index')}}" >
                       <div class="row">
                           <div class="col-8 my-2">
                               <select type="text" name="branch_id" class="form-control" onchange="this.form.submit()" >
                                   <option value=0>Barcha Filliallar</option>
                                   @foreach($branches as $branch)
                                       <option value="{{$branch->id}}" @if($branch->id==$branch_id) selected @endif>{{$branch->name}}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="col-4 my-2">
                               <select type="text" name="status" class="form-control" onchange="this.form.submit()">
                                   <option value=0 >Barcha Haydovchilar</option>
                                   <option value=1  @if($status==1) selected @endif>Qarzdorlar</option>
                                   <option value=2 @if($status==2) selected @endif>To'lo'v yaqn</option>
                                   <option value=3 @if($status==3) selected @endif>Litsenziya Muddati tugagan</option>
                                   <option value=4 @if($status==4) selected @endif>Litsenziya vaqti yaqn </option>
                                   <option value=5 @if($status==5) selected @endif>Shartnoma Muddati tugagan</option>
                                   <option value=6 @if($status==6) selected @endif>Shartnoma vaqti yaqn</option>
                               </select>
                           </div>
                       </div>
                   </form>
               </div>
            <div class="col-md-4 ">
                <div class="row">
                    <div class="col-8  text-right my-2">
                        <input class="form-control " id="searchss" onkeyup="searchDrivers()" type="search"
                               placeholder="Search" aria-label="Search">
                    </div>

                   <div class="col-4   my-2">
                       <a type="button" style="width: 100%" href="{{route('drivers.create')}}" class="btn btn-primary">Create</a>
                   </div>
                </div>

            </div>
        </div>

    </div>

    <div class="card p-1">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width: 100%; table-layout: fixed;">
                    <thead>
                    <tr>
                        <th class="d-none d-md-table-cell">#</th>
                        <th>Haydovchi</th>
                        <th  >Tel</th>
                        <th class="d-none d-lg-table-cell">Avtomobil</th>
                        <th class="d-none d-lg-table-cell">Shartnoma </th>
                        <th class="d-none d-lg-table-cell">Litsenziya</th>
                        <th >Balans</th>

                        <th class="d-none d-md-table-cell">prof</th>
                    </tr>
                    </thead>
                    <tbody id="table_body">
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

                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="d-none d-md-table-cell">#</th>
                        <th>Haydovchi</th>
                        <th >Tel</th>
                        <th class="d-none d-lg-table-cell">Avtomobil</th>
                        <th class="d-none d-lg-table-cell">Shartnoma </th>
                        <th class="d-none d-lg-table-cell">Litsenziya</th>
                        <th >Balans</th>

                        <th class="d-none d-md-table-cell">prof</th>

                    </tr>

                    </tfoot>
                </table>

            </div>
            <div class="d-flex align-items-center justify-content-end">

            </div>
        </div>
    </div>
@endsection
@section('jscontent')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $('#example').dataTable({
            "columnDefs": [{
                "width": "2%",
                "targets": 0
            }, {
                    "width": "5%",
                    "targets": 6
                },
                {
                    "width": "2%",
                    "targets": 7
                }

            ],
            "paging": false,
            "info":false,
            "searching": false,

        });
    </script>
    {{--    search--}}
    <script>
        let elbody=$('#table_body');
        function searchDrivers() {
            console.log('ok');
            let search = $('#search').val()
            if (!search.trim()) {
                $('form').submit();
                return;
            }
            if (search.length > 1) {
                axios.get('{{url('/')}}' + '/search', {
                    params: {
                        search: search
                    }
                }).then(function (response) {
                    console.log(response);
                    elbody.html(response.data.view);
                    // eltable.replaceChild(response.data.view,elbody);
                }).catch(function (error) {
                        console.log(error);
                    })
            }
        }
    </script>
@endsection
