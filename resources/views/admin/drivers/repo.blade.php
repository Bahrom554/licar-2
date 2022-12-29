@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.message')
    @include('admin.layouts.error')
    <div class="container-fluid card ">
        <form role="form" action="{{route('report')}}" >

            <div class="row card-header px-0">
                <div class="col-md-9 my-2">
                    <h3 class="card-title">
                        <a href="{{route('drivers.index')}}" class="mx-4"><i
                                class="bi bi-chevron-left"></i></a>Xisobot</h3>
                </div>
            </div>
            <div class="card-body row">
                <div class="col-md-3">
                    <div class="form-group">
                        <select type="text" name="branch_id" class="form-control" >
                            <option value=0>Barcha Filliallar</option>
                            @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6 col-md-2 form-group">
                    <input type="date" name="from" class="form-control" required >
                </div>
                <div class="col-6 col-md-2 form-group">
                    <input type="date" name="to" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select type="text" name="user_id" class="form-control" >
                            <option value=0>Barcha Hodimlar</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <select type="text" name="type" class="form-control">
                            <option value=0 >Barcha</option>
                            <option value=1 >Karta</option>
                            <option value=2  >Naqd</option>
                            <option value=3 >boshqa</option>
                        </select>
                    </div>
                </div>
            </div>
            {{--            @if(isset($payments))--}}
            <div class="modal-footer  px-0">
                <input type="submit" class="btn btn-info" value="Xisoblash">
            </div>
        </form>
    </div>

@endsection

