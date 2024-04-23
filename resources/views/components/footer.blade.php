
<!-- page vendor js file -->
{{-- <script src="{{asset('assets/vendor/toastr/toastr.js')}}"></script> --}}


<!-- page vendor js file -->
{{-- <script src="{{asset('assets/vendor/toastr/toastr.js')}}"></script> --}}
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/charts/c3.js')}}"></script>
<!-- page js file -->
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>

<script src="{{asset('assets/js/index.js')}}"></script>
<script src="{{asset('assets/js/confirm.min.js')}}"></script>
{{-- @if( !request()->is('home')) --}}
<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

<script src="{{asset('assets/vendor/sweetalert/sweetalert.min.js')}}"></script> <!-- SweetAlert Plugin Js -->
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('assets/js/pages/ui/dialogs.js')}}"></script>
<script src="{{asset('assets/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2.min.js')}}"></script>

<script src="{{asset('assets/vendor/jquery-validation/jquery.validate.js')}}"></script> <!-- Jquery Validation Plugin Css -->
<script src="{{asset('assets/vendor/jquery-steps/jquery.steps.js')}}"></script> <!-- JQuery Steps Plugin Js -->

<script src="{{asset('assets/js/pages/forms/form-wizard.js')}}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<script src="{{asset('assets/vendor/dropify/js/dropify.min.js')}}" defer></script>
<script src="{{asset('assets/js/pages/forms/dropify.js')}}" defer></script>
<script src="{{asset('assets/js/jquery.bootstrap-duallistbox.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.json-editor.min.js')}}"></script>
<script src="{{asset('assets/vendor/multi-select/js/jquery.multi-select.js')}}"></script> <!-- Multi Select Plugin Js -->
<script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.toast.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/input-mask.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>

<script src="{{asset('assets/js/bootstrap-confirmation.min.js')}}"></script>

{{-- @endif --}}

<script src="{{asset('assets/bundles/morrisscripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/file/filemanager.js')}}"></script>

<script src="{{asset('assets/bundles/apexcharts.bundle.js')}}"></script>
<script src="{{asset('assets/js/university/index.js')}}"></script>

<script>
    // dropdown toggle
    // $(function () {
    //     $("#item").click(function () {
    //         $("#submenu").toggle();
    //     });
    // });
</script>

{{-- <script>
    // Check toggle
    $(document).ready(function () {
        $('#wizard_vertical').hide();
        $('#app_check').hide();
        $('#diss').hide();
        $('#postCheck').hide();
    });

    $("#init_check").click(function () {
        $('#wizard_vertical').show();
        $('#contentToHide').hide();
        $('#init_check').hide();
        $('#app_check').show();
        $('#diss').show();
    })
</script> --}}

{{-- <script>
    $(document).ready(function () {
        var dir_type = "{!!$variable!!}";

        if (dir_type == 'All' || dir_type == 'Desktop' || dir_type == 'Laptop') {
            $('.server-dependent').hide()
            $('.server-windows-dependent').hide()
            $('.server-linux-dependent').hide()  
        }else if (dir_type == 'Server') {
            $('.server-dependent').show()
        }
        $('.server-windows-dependent').hide()
        $('.server-linux-dependent').hide() 
        $('.location-dependent').hide()
        $('.branch-dependent').hide()
    });

    // Type dependency
    $('#inf_type').change(function () {
        var inf_type = $('#inf_type').val();
        
        $('.server-dependent').toggle(inf_type == 3);
    });

    // OS version dependency
    $('#inf_os').change(function () {
        var os_input = document.getElementById('inf_os').value;

        let osVersions = osversions

        osVersions = osversions.filter((os) => os.operatingsystem_id == os_input);
        
        let OsVersionInput = $('#inf_version');
        OsVersionInput.find('option').remove();
        OsVersionInput.html('<option value="">Choose OS version</option>');
        osVersions.forEach(element => {
            OsVersionInput.append(`<option value="${element.id}">${element.details}</option>`)
        });

    });

    // location dependency
    $('#inf_location').change(function () {
        var info_loc = $('#inf_location').val();
        $('.location-dependent').toggle(info_loc == 'other');
    });

    // branch dependency
    $('#inf_branch').change(function (){
        var info_branch = $('#inf_branch').val();
        $('.branch-dependent').toggle(info_branch == 'other');
    });
    

    var location_arr = {!! $locations !!};
    var branch_arr = {!! $branches !!};
    // filtering branches
    $('#inf_location').change(function () {
        var location_input = document.getElementById('inf_location').value; 
        // console.log(location_input);

        let branches_com = branch_arr

        branches_com = branch_arr.filter((branch) => branch.location_id == location_input);
        // console.log(branches_com);

        let branchLocation = $('#inf_branch')
        branchLocation.find('option').remove()
        branchLocation.html('<option value="">Choose branch</option>')
        branches_com.forEach(element => {
            branchLocation.append(`<option value="${element.id}">${element.name}</option>`)
        });
    });
    
    // Model filtering script
    var brand_arr = {!! $brands !!};
    var model_arr = {!! $models !!};
    $('#inf_brand').change(function () {
        var brand_input = document.getElementById('inf_brand').value;

        console.log(brand_arr, model_arr);

        let models_array = model_arr

        models_array = model_arr.filter((model) => model.brand_id == brand_input);

        let brandModel = $('#inf_model');
        brandModel.find('option').remove()
        brandModel.html('<option value="">Choose Infrastructure model</option>')
        models_array.forEach(element => {
            brandModel.append(`<option value="${element.id}">${element.details}</option>`)
        });
    })

    // OS version filtering
    var operatingSystems = {!! $ops !!};
    var osversions = {!! $osVersion !!};

    console.log(operatingSystems);

    // dropdown toggle
    $(function () {
        $("#item").click(function () {
            $("#submenu").toggle();
        });
    });

    const buttonClickedDropDown = ()=>{
        console.log('clicked')
    }
</script> --}}


 