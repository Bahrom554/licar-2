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
                    <a type="button" style="width: 100%" href="{{route('branches.create')}}" class="btn btn-primary  ">Create</a>
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
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branches as $branch)
                        <tr>
                            <td>{{ $branch->id}}</td>
                            <td class="text-truncate">{{$branch->name}}</td>
                            <td class="text-center"> <a href="{{route('branches.edit',$branch->id)}}" class="text-warning"
                                    title="Edit"><i class="bi bi-pencil-fill"></i></a></td>
                            <td class="text-center">

                                    <form method="POST" action="{{route('branches.destroy',$branch->id)}}">
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
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="d-flex align-items-center justify-content-end">
                {{ $branches->links() }}
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
                "width": "70%",
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

        ],
        "paging": false,
        "order": [0, 'desc'],
        "info":false,
        "searching": false,
    });


</script>
@endsection
