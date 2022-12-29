@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.message')
    @include('admin.layouts.modals')
    <div class="card mx-2 px-2">
        <div class="row">
           <div class="col-2"> <a href="{{route('drivers.index')}}" class="m-4" style="font-size: 30px"><i
                       class="bi bi-chevron-left"></i></a></div>
           <div class="col-8">
               <h2 class="text-center">{{$driver->branch->name ?? ''}}</h2>
           </div>
            <hr>
            <div class="col-md-10">
                <div class="row">
                                <div class=" col-sm-7 col-md-3 ">
                                     <h3>Haydovchi</h3>
                                     <p>{{$driver->driver }}</p>
                                 </div>
                                 <div class=" col-sm-5  col-md-3 ">
                                     <h3>Telfo'n raqami</h3>
                                     <p>{{$driver->tel_d}}</p>
                                 </div>
                                 <div class=" col-sm-7 col-md-3 ">
                                     <h3>Avtomobil Egasi</h3>
                                     <p>{{$driver->owner}}</p>
                                 </div>
                                 <div class=" col-sm-5  col-md-3 ">
                                     <h3>Telfo'n raqami</h3>
                                     <p>{{$driver->tel_o}}</p>
                                 </div>
                                  <div class=" col-sm-7 col-md-3 ">
                                        <h3>Avtomobil Rusumi</h3>
                                     <p>{{$driver->car->name ?? ''}}</p>
                                    </div>
                                 <div class=" col-sm-5 col-md-3  ">
                                        <h3> Davlat Raqami</h3>
                                        <p>{{$driver->car_number}}</p>
                                    </div>
                                  <div class=" col-sm-7 col-md-3">
                                   <h3>Litsenziya </h3>
                                   <p>{{$driver->l_start}}/{{$driver->l_end}}</p>
                               </div>
                                 <div class=" col-sm-5 col-md-3">
                                   <h3>Shartnoma</h3>
                                   <p>{{$driver->c_start}}/{{$driver->c_end}}</p>
                               </div>
                                <div class=" col-sm-7 col-md-3 ">
                        <h3>Litsenziya uchun to'lov </h3>
                        <p>{{number_format($driver->l_cost,0,',',' ')}} so'm</p>
                    </div>
                               <div class=" col-sm-5 col-md-3 ">
                        <h3>Oylik To'lov</h3>
                        <p>{{number_format($driver->payment,0,',',' ')}} so'm</p>
                    </div>
                               <div class=" col-sm-7 col-md-3 ">
                        <h3>Balans</h3>
                        <p>{{number_format($driver->account,0,',',' ')}} so'm</p>
                    </div>
                              <div class=" col-sm-5     col-md-3 ">
                        <h3>Holati</h3>
                                  @foreach($status as $stat)
                                      <span>{{$stat}}</span><br>
                                  @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-2  d-flex flex-column justify-content-around">
                     <a href="{{route('drivers.edit',$driver->id)}}" class=" btn btn-warning  d-block py-3 my-1" data-toggle="modal">Tahrirlash</a>
                    <a href="#deleteModal" class="btn btn-danger d-block py-3 my-1" data-toggle="modal">O'chirish</a>
                    <a href="#paymentModal" class="btn btn-success d-block py-3  my-1"  data-toggle="modal">To'lov Qilish</a>
                    <a href="#serviceModal" class="btn btn-secondary d-block py-3 my-1" data-toggle="modal">Serivis qo'shish</a>
                    <a href="#bonusModal" class="btn btn-primary d-block py-3  my-1"  data-toggle="modal">Bo'nus berish</a>
            </div>
        </div>
    </div>
    <div class="card mx-2 px-2">
        <div class="row">
            <div class="my-2 col-md-3">
                <div class="accordion" id="paymentdad">
                    <div class="accordion-item" >
                        <button class="accordion-button font-14" type="button" data-toggle="collapse"
                                data-target="#payment">
                            To'lo'vlar
                        </button>
                        <div id="payment" class="collapse" aria-labelledby="headingOne" data-bs-parent="#paymentdad">
                            <div class="accordion-body" >
                                <div class="table-responsive" style="overflow-y: scroll; max-height: 400px">
                                    <table  class="table table-striped table-bordered example"  style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>sana</th>
                                            <th>To'lo'v</th>
                                            <th class= "d-none d-lg-table-cell">turi</th>
                                        </tr>
                                        </thead>
                                        <tbody id="table_body">
                                        <td class="d-none">{{$total=0}}</td>
                                        @foreach($driver->payments as $payment)
                                            <td class="d-none">{{$total+=$payment->account}}</td>
                                            <tr id="tr">
                                                <td>{{\Carbon\Carbon::parse($payment->created_at)->toDateString()}}</td>
                                                <td class="puli">{{number_format($payment->account,0,',',' ')}}</td>
                                                <td class="d-none d-lg-table-cell">
                                                    @switch($payment->type)
                                                        @case(1)
                                                            Karta
                                                            @break
                                                        @case(2)
                                                            Naqd
                                                            @break
                                                        @case(3)
                                                            Boshqa
                                                            @break
                                                    @endswitch
                                                </td>
                                                <td class="text-center">
                                                    <form method="POST" action="{{route('payment.destroy',$payment)}}">
                                                        @method('delete')
                                                        @csrf
                                                        <a href="#" style="color: red;" onclick="
                                     if(confirm('{{$payment->account}}  to\'lovni o\'chirish')){
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
                                    </table>

                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="mx-3">Jami:</h5>
                                    <h5 class="mx-3">{{number_format($total,0,',',' ')}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" my-2 col-md-4">
                <div class="accordion" id="servicdad">
                    <div class="accordion-item" >
                        <button class="accordion-button font-14" type="button" data-toggle="collapse"
                                data-target="#service">
                           Serivslar
                        </button>
                        <div id="service" class="collapse" aria-labelledby="headingOne" data-bs-parent="#servicdad">
                            <div class="accordion-body">
                                <div class="table-responsive" style=" overflow-y: scroll; max-height: 400px">
                                    <table  class="table table-striped table-bordered example"  style="width: 100%">
                                        <thead>
                                        <tr>
                                            <th>sana</th>
                                            <th>Serivice</th>
                                            <th class= "d-none d-lg-table-cell">Ma'lumot</th>
                                            <th class= "d-none d-lg-table-cell">o'chirish</th>
                                        </tr>
                                        </thead>
                                        <tbody id="table_body">
                                        @foreach($driver->services as $service)
                                            <tr id="tr">
                                                <td>{{\Carbon\Carbon::parse($service->created_at)->toDateString()}}</td>
                                                <td >{{$service->service}}</td>
                                                <td class="d-none d-lg-table-cell">{{$service->definition}}</td>
                                                <td class="text-center">
                                                    <form method="POST" action="{{route('service.destroy',$service)}}">
                                                        @method('delete')
                                                        @csrf
                                                        <a href="#" style="color: red;" onclick="
                                     if(confirm('{{$service->service}} Servisni o\'chirish')){
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
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" my-2 col-md-5">
                <div class="accordion" id="bonustdad">
                    <div class="accordion-item" >
                        <button class="accordion-button font-14" type="button" data-toggle="collapse"
                                data-target="#bonus">
                            Bonuslar
                        </button>
                        <div id="bonus" class="collapse" aria-labelledby="headingOne" data-bs-parent="#bonusdad">
                            <div class="accordion-body" >
                                <div class="table-responsive" style="overflow-y: scroll; max-height: 400px">
                                    <table  class="table table-striped table-bordered example" style="width: 100%" >
                                        <thead>
                                        <tr>
                                            <th>sana</th>
                                            <th>Bonus</th>
                                            <th class= "d-none d-lg-table-cell">Sababi</th>
                                            <th class= "d-none d-lg-table-cell">o'chirish</th>
                                        </tr>
                                        </thead>
                                        <tbody id="table_body">
                                        <td class="d-none">{{$total=0}}</td>
                                        @foreach($driver->bonuses as $bonus)
                                          <td class="d-none"> {{$total+=$bonus->bonus}}</td>
                                            <tr id="tr">
                                                <td>{{\Carbon\Carbon::parse($bonus->created_at)->toDateString()}}</td>
                                                <td class="puli">{{number_format($bonus->bonus,0,',',' ')}}</td>
                                                <td class="d-none d-lg-table-cell">
                                                   {{$bonus->reason}}
                                                </td>
                                                <td class="text-center">
                                                    <form method="POST" action="{{route('bonus.destroy',$bonus)}}">
                                                        @method('delete')
                                                        @csrf
                                                        <a href="#" style="color: red;" onclick="
                                     if(confirm('{{$bonus->bonus}} Bo\'nusni o\'chirish')){
                                            event.preventDefault();
                                            this.closest('form').submit();
                                           }
                                            else{
                                            event.preventDefault();}"><i class="bi bi-trash-fill"></i></a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                       <tr>

                                       </tr>
                                        </tbody>
                                    </table>
                                    <div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="mx-3">Jami:</h5>
                                    <h5 class="mx-3">{{number_format($total,0,',',' ')}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('jscontent')
    <script>
        $('.example').dataTable({

            "paging": false,
            "info":false,
            "searching": false,

        });
    </script>
@endsection


