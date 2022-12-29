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
                                    <option value="{{$branch->id}}" @if($request->branch_id==$branch->id) selected @endif>{{$branch->name}}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="col-6 col-md-2 form-group">
                    <input type="date" name="from" class="form-control" @if($request) value="{{$request->from ?? ""}}" @endif required >
                </div>
                <div class="col-6 col-md-2 form-group">
                    <input type="date" name="to" class="form-control" @if($request) value="{{$request->to ?? ""}}" @endif  required>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select type="text" name="user_id" class="form-control" >
                            <option value=0>Barcha Hodimlar</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" @if($request->user_id==$user->id) selected @endif>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                            <select type="text" name="type" class="form-control">
                                <option value=0  @if($request->type==0) selected @endif>Barcha</option>
                                <option value=1  @if($request->type==1) selected @endif>Karta</option>
                                <option value=2  @if($request->type==2) selected @endif>Naqd</option>
                                <option value=3  @if($request->type==3) selected @endif>boshqa</option>
                            </select>
                    </div>
                </div>
                <div class="text-right px-4 font-20">
                    Jami:
                    @if(isset($sum))
                        {{number_format($sum,0,',',' ')}} so'm
                    @endif
                </div>
            </div>
{{--            @if(isset($payments))--}}
           @if($payments->count())
                <div class="accordion d-none d-lg-block" id="paymentdad">
                    <div class="accordion-item" >
                        <button class="accordion-button font-14" type="button" data-toggle="collapse"
                                data-target="#payment">
                            Arxivlar
                        </button>
                        <div id="payment" class="collapse" aria-labelledby="headingOne" data-bs-parent="#paymentdad">
                            <div class="accordion-body" >
                                <div class="table-responsive" style="overflow-y: scroll; max-height: 600px">
                                    <table  class="table table-striped table-bordered example"  style="width: 100%; table-layout: fixed;">
                                        <thead>
                                        <tr>
                                            <th>haydovchi</th>
                                            <th>Hodim</th>
                                            <th>To'lo'v</th>
                                            <th>sana</th>
                                        </tr>
                                        </thead>
                                        <tbody id="table_body">
                                        @foreach($payments as $payment)
                                            <tr id="tr">
                                                <td class="text-truncate">{{$payment->driver}}</td>
                                                <td class="text-truncate">{{$payment->user->name}}</td>
                                                <td class="puli text-truncate">{{number_format($payment->account,0,',',' ')}}</td>
                                                <td class="text-truncate">{{\Carbon\Carbon::parse($payment->created_at)->toDateString()}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    {{ $payments->appends(request()->input())->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

{{--            @endif--}}
            <div class="modal-footer  px-0">
                <input type="submit" class="btn btn-info" value="Xisoblash">
            </div>
        </form>
    </div>

@endsection

