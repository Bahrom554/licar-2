<script src="{{asset('user/js/bootstrap.bundle.min.js')}}"></script>

<!--plugins-->
<script src="{{asset('user/js/jquery.min.js')}}"></script>
<script src="{{asset('user/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('user/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('user/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('user/js/pace.min.js')}}"></script>
{{--<script src="{{asset('user/plugins/chartjs/js/Chart.min.js')}}"></script>--}}
{{--<script src="{{asset('user/plugins/chartjs/js/Chart.extension.js')}}"></script>--}}
{{--<script src="{{asset('user/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>--}}
<script src="{{asset('user/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('user/js/form-select2.js')}}"></script>
<script src="{{asset('user/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('user/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('user/js/table-datatable.js')}}"></script>
<!-- Vector map JavaScript -->
{{--<script src="{{asset('user/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>--}}
{{--<script src="{{asset('user/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>--}}
<!--app-->
<script src="{{asset('user/js/app.js')}}"></script>
<script src="{{asset('user/js/index.js')}}"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<script>
    new PerfectScrollbar(".review-list")
    new PerfectScrollbar(".chat-talk")


</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>




@yield('jscontent')
