@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.message')
    @include('admin.layouts.error')
    <div class="container-fluid card ">
        <form role="form" action="{{route('drivers.store')}}" method="POST">
            {{csrf_field()}}

            <div class="row card-header px-0">

                <div class="col-md-9 my-2">
                    <h3 class="card-title"> <a href="{{route('drivers.index')}}" class="mx-4"><i
                                class="bi bi-chevron-left"></i></a>Yangi Haydovchi Qo'shish</h3>
                </div>
                <div class="col-md-3 my-2">
                    <div class="form-group">
                        <select type="text" name="branch_id" class="form-control" >
                            @foreach($branches as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row card-body px-0">
                <div class="col-md-6 form-group">
                    <label>Haydovchi.F.I.SH</label>
                    <input type="text" name="driver" class="form-control" value="{{old('driver')}}" maxlength="100" required>
                </div>
                <div class="col-md-6 form-group ">
                    <label>AvtoEgasi.F.I.SH</label>
                    <input type="text" name="owner" class="form-control" value="{{old('owner')}}" maxlength="100" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>Haydovchi.Tel</label>
                    <input type="tel" name="tel_d" class="form-control" value="{{old('tel_d')}}"  required>
                </div>
                <div class="col-md-3 form-group">
                    <label>AvtoEgasi.Tel</label>
                    <input type="tel" name="tel_o" class="form-control" value="{{old('tel_o')}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label for="exampleDataList" class="form-label">Avtomobil Rusumi</label>
                    <input class="form-control" list="datalistOptions" id="exampleDataList" value="{{old('name')}}" name="name"
                           placeholder="Type to search..." required>
                    <datalist id="datalistOptions">
                        @foreach($cars as $car)
                            <option value="{{$car->name}}"></option>
                        @endforeach
                    </datalist>
                </div>
                <div class="col-md-3 form-group">
                    <label>DavlatRaqami</label>
                    <input type="text" name="car_number" class="form-control" value="{{old('car_number')}}" required>

                </div>
                <div class="col-md-3 form-group">
                    <label>Litsenziya Berilgan Sana</label>
                    <input type="date" name="l_start" class="form-control" value="{{old('l_start')}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>Litsenziya Tugash Sanasi</label>
                    <input type="date" name="l_end" class="form-control" value="{{old('l_end')}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>Shartnoma tuzilgan Sana</label>
                    <input type="date" name="c_start" class="form-control" value="{{old('c_start')}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>Shartnoma Tugash Sanasi</label>
                    <input type="date" name="c_end" class="form-control" value="{{old('c_end')}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>Oylik To'lo'v</label>
                    <input type="text" name="payment" class="form-control loan_max_amount" value="{{old('payment')}}" required>
                </div>
                <div class="col-md-3 form-group">
                    <label>To'lov</label>
                    <input type="text" name="account" class="form-control loan_max_amount" value="{{old('account')}}">
                </div>
                <div class="col-md-3 form-group">
                    <label>Litsenziya uchun To'lov</label>
                    <input type="text" name="l_cost" class="form-control loan_max_amount" value="{{old('l_cost')}}">
                </div>
                <div class="col-md-3 form-group">
                    <label>To'tov turi</label>
                    <select type="text" name="type" class="form-control">
                        <option value=1>Karta</option>
                        <option value=2>Naqd</option>
                        <option value=3>boshqa</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <div class="accordion" id="bonus">
                        <div class="accordion-item">
                            <button class="accordion-button font-14" type="button" data-toggle="collapse"
                                    data-target="#collapseOne">
                                Bonus
                            </button>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#bonus">
                                <div class="accordion-body">
                                    <div class="form-group">
                                        <label>Bonus</label>
                                        <input type="text" name="bonus" class="form-control loan_max_amount" maxlength="7" value="{{old('bonus')}}" >
                                    </div>
                                    <div class="form-group">
                                        <label>Sababi</label>
                                        <input type="text" name="reason" class="form-control" value="{{old('reason')}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <div class="accordion" id="service">
                        <div class="accordion-item ">
                            <button class="accordion-button font-14" type="button" data-toggle="collapse"
                                    data-target="#collapse">
                                Service
                            </button>
                            <div id="collapse" class=" collapse" aria-labelledby="headingOne" data-bs-parent="#bonus">
                                <div class="accordion-body">
                                    <div class="form-group">
                                        <label>Service</label>
                                        <input type="text" name="service" class="form-control"  value="{{old('service')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Malumot</label>
                                        <input type="text" name="definition" class="form-control" value="{{old('definition')}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer  px-0">
                <input type="submit" class="btn btn-info" value="Save">
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
                    input.value =input.value? parseInt(input.value.replace(/,/g, '')) : "";

                })
            })
        })
    </script>
@endsection
