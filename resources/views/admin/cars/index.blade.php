@extends('admin.layouts.app')
@section('content')
<div  class=" mt-2 row">
    <div class=" col-md-8 mx-auto card ">
        @include('admin.layouts.message')
        <div class="offset-md-4 col-md-8 ">
            <div class="row">
                <div class="col-9  text-right my-2">
                    <input class="form-control " id="searchss" onkeyup="searchDrivers()" type="search"
                           placeholder="Search" aria-label="Search">
                </div>

                <div class="col-3    my-2">
                    <a type="button" style="width: 100%" href="{{route('cars.create')}}" class="btn btn-primary px-5 ">Create</a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive" id="for_search">
                <table id="example" class="table table-striped table-bordered" style="width:100%; ">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Name</th>
                            <th>Drivers</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                        <tr>
                            <td>{{ $car->id}}</td>
                            <td class="text-truncate">{{$car->name}}</td>
                            <td>{{$car->drivers->count()}}</td>
                            <td class="text-center"> <a href="{{route('cars.edit',$car->id)}}" class="text-warning"
                                    title="Edit"><i class="bi bi-pencil-fill"></i></a></td>
                            <td class="text-center">

                                    <form method="POST" action="{{route('cars.destroy',$car->id)}}">
                                        @method('delete')
                                        @csrf
                                        <a href="#" style="color: red;" onclick="
                                     if(confirm('Are sure,You want delete this?')){
                                            event.preventDefault();
                                            this.closest('form').submit();
                                           }
                                            else{
                                            event.preventDefault();}"><i class="bi bi-trash-fill"></i></a>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>Name</th>
                            <th>Drivers</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                {{ $cars->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@section('jscontent')

<script>
    $('#example').dataTable({
        "columnDefs": [{
            "width": "10%",
            "targets": 0
        },
            {
                "width": "60%",
                "targets": 1
            },
            {
                "width": "10%",
                "targets": 2
            },
            {
                "width": "10%",
                "targets": 3
            },
            {
                "width": "10%",
                "targets": 4
            },

        ],
        "paging": false,
        "order": [0, 'desc'],
        "info":false,
        "searching": false,
    });


</script>
@endsection
