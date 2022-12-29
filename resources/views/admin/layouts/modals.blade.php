{{--bonus--}}
<div id="bonusModal" class="modal fade ">
    <div class="modal-dialog mx-auto">
        <div class="modal-content">
            <form role="form" action="{{route('bonus.store')}}" method="POST">
                {{csrf_field()}}
                <input name="driver_id" value="{{$driver->id}}" style="display: none">
                <div class="modal-header ">
                    <h4 class="modal-title">Bo'nus</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Bo'nus</label>
                        <input type="text" class="form-control loan_max_amount" name="bonus" maxlength="10"
                               placeholder="To'lo'v Summasini kiriting" required>
                    </div>
                    <div class="form-group">
                        <label>Sababi</label>
                        <input type="text" class="form-control " name="reason" placeholder="Sababi">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
{{--service--}}
<div id="serviceModal" class="modal fade ">
    <div class="modal-dialog mx-auto">
        <div class="modal-content">
            <form  role="form" action="{{route('service.store')}}"  method="POST">
                {{csrf_field()}}
                <input name="driver_id" value="{{$driver->id}}" style="display: none">
                <div class="modal-header ">
                    <h4 class="modal-title">Servis qo'shish</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                                <label>Service</label>
                                <input type="text"  class="form-control "  name="service" placeholder="To'lo'v Summasini kiriting" required>
                            </div>

                <div class="form-group">
                                <label>Ma'lumot</label>
                                <input type="text"  class="form-control "  name="definition" placeholder="Sababi" >
                            </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
{{--payment Modal--}}
<div id="paymentModal" class="modal fade ">
    <div class="modal-dialog mx-auto">
        <div class="modal-content">
            <form  role="form" action="{{route('payment.store')}}"  method="POST">
                {{csrf_field()}}
                <input name="driver_id" value="{{$driver->id}}" style="display: none">
                <div class="modal-header ">
                    <h4 class="modal-title">To'lo'v qilish</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Oylik Summasi</label>
                                <input type="text" class="form-control" id="pay_total" value="{{$driver->payment}}" disabled >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> To'langan Summa</label>
                                <input type="text" class="form-control" id="pay_cost" value="{{$driver->account}}" disabled >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Yangi To'lo'v Qilish</label>
                                <input type="text"  class="form-control loan_max_amount" maxlength="10" name="account" placeholder="To'lo'v Summasini kiriting" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>To'tov turi</label>
                                <select type="text" name="type" class="form-control">
                                    <option value=1>Credit Card</option>
                                    <option value=2>Cash</option>
                                    <option value=3>Other</option>
                                </select>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
{{--delete Modal--}}
<div id="deleteModal" class="modal fade ">
    <div class="modal-dialog mx-auto">
        <div class="modal-content">
            <form id="delform"  method="post" action="{{route('drivers.destroy',$driver->id)}}" method="post" >
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="modal-header">
                    <h2 class="modal-title" id="deldrive">{{$driver->driver}}</h2>
                </div>
                <div class="modal-body">
                    <p>Chindanxam ushbu m'alumotlarni o'chirmoqchimisz?</p>

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>

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
