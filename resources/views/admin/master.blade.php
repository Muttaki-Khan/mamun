<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin') }}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('admin') }}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('admin') }}/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('admin') }}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="soft-all-wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('admin.inc.header')
            <!-- /.navbar-header -->
            @include('admin.inc.leftmenu')
                        <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('content-heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            @yield('mainContent')
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin') }}/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin') }}/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('admin') }}/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('admin') }}/vendor/raphael/raphael.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/morrisjs/morris.min.js"></script>
    <script src="{{ asset('admin') }}/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('admin') }}/dist/js/sb-admin-2.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css"> 
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="sweetalert2.all.min.js"></script>
    @include('sweetalert::alert')

</body>

</html>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script>
  $(document).ready (function() {
    $("#fromDate").datepicker({dateFormat:'yy-mm-dd'});
  } );
  $(document).ready (function() {
    $("#toDate").datepicker({dateFormat:'yy-mm-dd'});
  } );
  $(document).ready (function() {
    $("#datepicker").datepicker({dateFormat:'yy-mm-dd'});
  } );
</script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTables-example");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    columns = tr[i].getElementsByTagName("td");
    for ( j = 0; j<columns.length ; j++){
      td = tr[i].getElementsByTagName("td")[j];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
          break;
        } else {
          tr[i].style.display = "none";
        }
      } 
    }      
  }
}
</script>


<script>

function calcular(){
    var valor1 = parseFloat(document.getElementById('n1').value,10);
    var valor2 = parseFloat(document.getElementById('n2').value,10);
    document.getElementById('result').value = valor1 * valor2;
}
</script>

