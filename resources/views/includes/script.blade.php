<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="jquery-simple-tree-table.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
{{--<script src="js/bootstrap-datepicker.js"></script>--}}
<script>
    function exportTasks(_this) {

        let _url = $(_this).data('href');

        window.location.href = _url;
    }
    function exportTasks3(_this) {

        let _url = $(_this).data('href');

        window.location.href = _url;
    }
    function exportTasks1(_this) {
        let _url = $(_this).data('href');

        window.location.href = _url;
    }
</script>
    <script type="text/javascript">

    $("#planedleaves2").keyup(function(){
        $("#totaldays").val(parseFloat($("#planedleaves2").val()) + parseFloat($('#extradays1').val()));
    });

    {{--$(document).on('click', '#exportareaob', function(e){--}}
    {{--    var area_id= $(this).attr('value');--}}

    {{--            $.ajax({--}}
    {{--                url:"{{ route('') }}",--}}
    {{--                type:"get",--}}
    {{--                data: {--}}
    {{--                    area_id: area_id--}}
    {{--                },--}}
    {{--                success:function (data) {--}}

    {{--                    }--}}
    {{--                });    });--}}







    // TO RETAIN VALUES  AFTER PAGE SUBMIT
     // <----------- START ----------->


    // window.onload = function() {
    //
    // }
    // $('#areas').change(function() {
    //     var selVala = $(this).val();
    //     sessionStorage.setItem("SelItema", selVala);
    // });

    // window.onload = function() {
    //     var selItem = sessionStorage.getItem("SelItem");
    //     $('#audit_period').val(selItem);
    // }
    // $('#audit_period').change(function() {
    //     var selVal = $(this).val();
    //     sessionStorage.setItem("SelItem", selVal);
    // });
    //
    // window.onload = function() {
    //     var selItem = sessionStorage.getItem("SelItem");
    //     $('#audit_period_form').val(selItem);
    // }
    // $('#audit_period_form').change(function() {
    //     var selVal = $(this).val();
    //     sessionStorage.setItem("SelItem", selVal);
    // });
    //
    // window.onload = function() {
    //     var selItem = sessionStorage.getItem("SelItem");
    //     $('#audit_period_to').val(selItem);
    // }
    // $('#audit_period_to').change(function() {
    //     var selVal = $(this).val();
    //     sessionStorage.setItem("SelItem", selVal);
    // });
    //
    // window.onload = function() {
    //     var selItem = sessionStorage.getItem("SelItem");
    //     $('#team_lead').val(selItem);
    // }
    // $('#team_lead').change(function() {
    //     var selVal = $(this).val();
    //     sessionStorage.setItem("SelItem", selVal);
    // });
    // window.onload = function() {
    //     var selItem = sessionStorage.getItem("SelItem");
    //     $('#team_lead').val(selItem);
    // }
    // $('#team_lead').change(function() {
    //     var selVal = $(this).val();
    //     sessionStorage.setItem("SelItem", selVal);
    // });



        $(document).ready(function () {
            $( function() {
                $( "#datepicker" ).datepicker();
            } );
            $( function() {
                $( "#datepicker1" ).datepicker();
            } );



            // $('.datepicker').datepicker()

            $('#regions').on('change',function(e) {
                var region_id = e.target.value;
                $.ajax({
                    url:"{{ route('toareas') }}",
                    type:"get",
                    data: {
                        region_id: region_id
                    },
                    success:function (data) {
                        $('#areas').empty();
                        $('#report_areas').empty();
                        $('#areas').append('<option hidden></option>');
                        $.each(data, function(key, areas){
                            $('select[name="areas"]').append('<option value="'+ areas.id +'">' + areas.name+ '</option>');
                        });

                        var res='';
                        res +=' <table id=""  class="table shadow-0">'+
                           '<thead class="border-0">'+
                            '<tr>'+
                                '<th scope="col">Branch</th>'+
                                '<th scope="col">Visit Date</th>'+
                                '<th scope="col">Auditor</th>'+
                                '<th scope="col">Disbursed Cases</th>'+
                                '<th scope="col">Sample Selected</th>'+
                                '<th scope="col">No of Days Cases</th>'+
                                '<th scope="col">No of Days Branches</th>'+
                                '<th scope="col">Total Days</th>'+
                                '<th scope="col"></th>' +
                            '<th scope="col"></th>'+
                            '</tr>'+
                            '</thead>'+
                            '<tbody id="dynamic_field">'+
                            '</tbody>'+
                            '<tfoot>'+
                            '<tr>'+
                        '</table>'+
                        '<input type="submit" class="btn btn-info" value="Create">';
                        $('#cardbody').empty();
                        $('#cardbody').append(res);
                    }
                })
            });
            $('#report_areas').on('change',function(e) {
                var area_id = e.target.value;
                $.ajax({
                    url:"{{ route('toreportbranches') }}",
                    type:"get",
                    data: {
                        area_id: area_id
                    },
                    success:function (data) {
                        $('#report_branches').empty();
                        $('#report_branches').append('<option hidden></option>');
                        $.each(data, function(key, branches){
                            $('select[name="branches"]').append('<option value="'+ branches.id +'">' + branches.name+ '</option>');
                        });
                    }
                })
            });
                var i;

            $('#areas').on('change',function(e){
                var area_id = e.target.value;
                i++;
                $.ajax({
                    url:"{{ route('tobranches') }}",
                    type:"get",
                    data: {
                        area_id: area_id
                    },
                    success:function (data) {
                        console.log(data);
                        console.log(data.branches[0].area_id);
                        $('#dynamic_field').empty();
                        var res='';
                            res +=
                                '<tr id="row'+i+'" class="dynamic-added">' +
                                '<td>  <select class="form-control" aria-label="branches" name="branches[]" id="branches for_branch" style="width: 10rem;">'+
                                '<option hidden></option>'+
                                '</select></td>' +
                                '<td><input type="text" name="date[]" id="datepickertable" class="form-control" /></td>' +
                                '<td><select  aria-label="auditiors" name="auditiors[]" id="auditiors" class="form-control" style="width: 10rem;">' +
                                '</select></td>' +
                                '<td><input type="number" name="disbursed[]"  class="form-control name_list" /></td>' +
                                '<td><input type="number" name="sample_selected[]"  class="form-control name_list" /></td>' +
                                '<td><input type="number" name="days_cases[]" id="dayc" class="form-control name_list" /></td>' +
                                '<td><input type="number" name="days_branches[]" id="dayb" class="form-control name_list" /></td>' +
                                '<td><input type="number" name="total_days[]"  id="totoal_days" class="form-control" /></td>' +
                                '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>'+
                                '<td><button type="button" name="add" value="'+ data.branches[0].area_id+'" id="table_add" class="btn btn-info btn_add" />Add</button></td></tr>';


                        $('#dynamic_field').append(res);
                        $('#branches').empty();
                        $('#branches').append('<option hidden></option>');

                            $.each(data.branches, function(key, branches){

                                    $('select[name="branches[]"]').append('<option value="'+ branches.id +'">' + branches.name+ '</option>');
                            });
                        $('#auditiors').empty();
                        $('#auditiors').append('<option hidden></option>');

                            $.each(data.users, function(key, users){

                                    $('select[name="auditiors[]"]').append('<option value="'+ users.id +'">' + users.name+ '</option>');
                            });

                        $('#dayb').on("input",function(){
                            var num1 = $('#dayb').val();
                            var num2 = $('#dayc').val();
                            var answer = parseInt(num1) + parseInt(num2);
                            $('#totoal_days').val(answer);
                        });


                        // var num1 = $("#num1").val();
                        // var num2 = $("#num2").val();
                        // var answer = parseInt(num1) + parseInt(num2);
                        //
                        // $("#answer").val(answer);


                    }
                })
            });

        });
        document.addEventListener("DOMContentLoaded", function(){
            document.querySelectorAll('.sidebar .nav-link').forEach(function(element){

                element.addEventListener('click', function (e) {

                    let nextEl = element.nextElementSibling;
                    let parentEl  = element.parentElement;

                    if(nextEl) {
                        e.preventDefault();
                        let mycollapse = new bootstrap.Collapse(nextEl);

                        if(nextEl.classList.contains('show')){
                            mycollapse.hide();
                        } else {
                            mycollapse.show();
                            // find other submenus with class=show
                            var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                            // if it exists, then close all of them
                            if(opened_submenu){
                                new bootstrap.Collapse(opened_submenu);
                            }
                        }
                    }
                }); // addEventListener
            }) // forEach
            $('#basic').simpleTreeTable({
                expander: $('#expander'),
                collapser: $('#collapser'),
                store: 'session',
                storeKey: 'simple-tree-table-basic'
            });
            $('#open1').on('click', function() {
                $('#basic').data('simple-tree-table').openByID("1");
            });
            $('#close1').on('click', function() {
                $('#basic').data('simple-tree-table').closeByID("1");
            });

        });
        // DOMContentLoaded  end
    </script>
<script type="text/javascript">
    $(document).ready(function(){
        $(function(){
            $("body").on("click", "#datepickertable", function(){
                $(this).datepicker();
                $(this).datepicker("show");
            });
        });
        var i=1;
        $(document).on('click', '#table_add', function(e){

            i++;
            var a_id = e.target.value;
            $.ajax({
                url:"{{ route('tableBranches') }}",
                type:"get",
                data: {
                    area_id: a_id
                },
                success:function (data) {
                    console.log(data);

                    // $('input[name="total_days[]"]').empty();
                    console.log(data.users)
                    $('#for_branch').empty();
                    // $('#auditiors').empty();

                    $('#dynamic_field').append('' +
                        '<tr id="row'+i+'" class="dynamic-added">' +
                        '<td>  <select class="form-control" aria-label="branches" name="branches[]" id="for_branch'+i+'" style="width: 10rem;">'+
                        '<option hidden></option>'+
                        '</select></td>' +
                        '<td><input type="text" name="date[]"  id="" class="form-control" /></td>' +
                        '<td><select  aria-label="auditiors" name="auditiors[]" id="auditiors'+i+'" class="form-control userdata" style="width: 10rem;">' +
                        '</select></td>' +
                        '<td><input type="number" name="disbursed[]"  class="form-control name_list" /></td>' +
                        '<td><input type="number" name="sample_selected[]"  class="form-control name_list" /></td>' +
                        '<td><input type="number" name="days_cases[]" id="dc'+i+'" class="form-control dc" /></td>' +
                        '<td><input type="number" name="days_branches[]"  id="db'+i+'" class="form-control db" /></td>' +
                        '<td><input type="number" name="total_days[]"  id="dt'+i+'" class="form-control tdu dt" /></td>' +
                        '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

                    $('#for_branch'+i+'').append('<option hidden></option>');
                    $.each(data.branches, function(key, branches){
                        $('#for_branch'+i+'').append('<option value="'+ branches.id +'">' + branches.name+ '</option>');
                    });


                    $('input[name="date[]"]').datepicker()

                    $('#auditiors'+i+'').append('<option hidden></option>');

                    $.each(data.users, function(key, users){

                        // $('select[name="auditiors[]"]').append('<option value="'+ users.id +'">' + users.name+ '</option>');
                        $('#auditiors'+i+'').append('<option value="'+ users.id +'">' + users.name+ '</option>');
                    });

                    $('#db'+i+'').on("input",function(){
                        var num1 = $('#dc'+i+'').val();
                        var num2 = $('#db'+i+'').val();
                        var answer = parseInt(num1) + parseInt(num2);
                        $('#dt'+i+'').val(answer);
                    });


                }
            })


        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");

            $('#row'+button_id+'').remove();
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        });


</script>
