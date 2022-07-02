
<!DOCTYPE html>
<html>
<head>

    @include('includes.head')

</head>
<body>

<h1>HOME</h1>
<p><a href="{{route('reports.risk_wise_report')}}">Click for Risk Wise Report</a></p><br>
<p><a href="{{route('reports.high_risk_report')}}">Click for High Risk Report</a></p>

@include('includes.script')

</body>
</html>
