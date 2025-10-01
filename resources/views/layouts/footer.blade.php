

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>


<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- DataTables Export Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<!-- JSZip and PDFMake for export buttons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<link rel="stylesheet" href="{{asset('assets/css/flatpickr.min.css')}}">
<script src="{{asset('assets/js/flatpickr.js')}}"></script>
@if(Config::get('app.locale')=='ar' )
<script>

    $(document).ready(function() {
        $('table:not(.view_table)').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy' , 'excel',  'print'
            ],
            responsive: true,
            language: {
                url: '{{asset('assets/json/dt_ar.json')}}' // Arabic for RTL
            }
        });
    });
</script>
    @else

    <script>
        $(document).ready(function() {
            $('table:not(.view_table)').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy' , 'excel', 'pdf', 'print'
                ],
                responsive: true,

            });
        });

    </script>
@endif

<script>
    if($('.date').length){
        flatpickr(".date", {
            dateFormat: "d-m-Y", // dd-mm-yyyy
            defaultDate: new Date()
        });
    }
</script>
