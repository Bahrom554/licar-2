@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.message')
    @include('admin.layouts.error')
    <div class="container-fluid card ">
        <form role="form" id="editform" action="{{route('drivers.update',$driver)}}"   method="POST">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="row card-header px-0">
                <div class="col-md-9 my-2">
                    <h3 class="card-title">  <a href="{{route('drivers.show',$driver)}}" class="mx-4"><i
                                class="bi bi-chevron-left"></i></a>Haydovchi ma'lumotlarini tahrirlash</h3>
                </div>
                <div class="col-md-3 my-2">
                    <div class="form-group">
                        <select type="text" name="branch_id" class="form-control" >
                            @foreach($branches as $branch)
                                <option value="{{$branch->id}}" @if($driver->branch_id==$branch->id) selected @endif>{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row card-body px-0">
                <div class="col-md-6 form-group">
                    <label>Haydovchi.F.I.SH</label>
                    <input type="text" name="driver" class="form-control" value="{{old('driver',$driver->driver) }}" required>
                </div>
                <div class="col-md-6 form-group ">
                    <label>AvtoEgasi.F.I.SH</label>
                    <input type="text" name="owner" class="form-control" value="{{old('owner',$driver->owner)}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>Haydovchi.Tel</label>
                    <input type="tel" name="tel_d" class="form-control" value="{{old('tel_d',$driver->tel_d)}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>AvtoEgasi.Tel</label>
                    <input type="tel" name="tel_o" class="form-control" value="{{old('tel_o', $driver->tel_o)}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label for="exampleDataList" class="form-label">Avtomobil Rusumi</label>
                    <input class="form-control" list="datalistOptions" id="exampleDataList" value="{{old('name',$driver->car->name ?? '')}}" name="name"
                           placeholder="Type to search..." required>
                    <datalist id="datalistOptions">
                        @foreach($cars as $car)
                            <option value="{{$car->name}}"></option>
                        @endforeach
                    </datalist>
                </div>
                <div class="col-md-3 form-group">
                    <label>DavlatRaqami</label>
                    <input type="text" name="car_number" class="form-control" value="{{old('car_number',$driver->car_number)}}" required>

                </div>
                <div class="col-md-3 form-group">
                    <label>Litsenziya Berilgan Sana</label>
                    <input type="date" name="l_start" class="form-control" value="{{old('l_start',$driver->l_start)}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>Litsenziya Tugash Sanasi</label>
                    <input type="date" name="l_end" class="form-control" value="{{old('l_end',$driver->l_end)}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>Shartnoma tuzilgan Sana</label>
                    <input type="date" name="c_start" class="form-control" value="{{old('c_start',$driver->c_start)}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>Shartnoma Tugash Sanasi</label>
                    <input type="date" name="c_end" class="form-control" value="{{old('c_end',$driver->c_end)}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>Oylik To'lo'v</label>
                    <input type="text" name="payment" class="form-control loan_max_amount" value="{{old('payment',$driver->payment)}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>Balans</label>
                    <input type="text" name="account" class="form-control loan_max_amount" value="{{old('account',$driver->account)}}">
                </div>
                <div class="col-md-3 form-group">
                    <label>Litsenziya uchun To'lov</label>
                    <input type="text" name="l_cost" class="form-control loan_max_amount" value="{{old('l_cost',$driver->l_cost)}}">
                </div>
                <div class="col-md-3 form-group">
                    <label>To'tov turi</label>
                    <select type="text" name="type" class="form-control">
                        <option value=1>Credit Card</option>
                        <option value=2>Cash</option>
                        <option value=3>Other</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer  px-0">
                <input type="submit" class="btn btn-info" value="Update">
            </div>
        </form>
    </div>

@endsection
@section('jscontent')
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.5.3/dist/cleave.min.js"></script>
    {{--    money format--}}
    <script>
        let elinputs = document.querySelectorAll('.loan_max_amount ');
        elinputs.forEach(inp => new Cleave(inp, {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        }));
        let elform = document.querySelectorAll('form');
        elform.forEach(function (form) {
            form.addEventListener('submit', function () {
                elinputs.forEach(function (input) {
                    input.value = parseInt(input.value.replace(/,/g, ''))

                })
            })
        })
    </script>
@endsection












