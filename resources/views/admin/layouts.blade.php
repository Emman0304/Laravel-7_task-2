<?php 
     $male = DB::table('students')->where('gender', 'Male')->count();
     $female = DB::table('students')->where('gender', 'Female')->count();
     $other = DB::table('students')->where('gender', 'Other')->count();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layouts</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="/sidebar.css">
    <link rel="stylesheet" href="/userAccs.css">
    <link rel="stylesheet" href="/table.css">
</head>
<body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ route('admin.dash') }}">Dashboard</a>
        <a href="{{ route('admin.studentProf') }}">Student Profile</a>
        <a href="{{ route('admin.ann') }}">Announcement</a>
        <a href="{{ route('admin.userAccs') }}">User Accounts</a>
        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
      </div>
      
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; {{ Auth::user()->username }}</span>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawLineChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Gender', 'Gender of Students'],
            ['Male',     {{ $male }}],
            ['Female',   {{ $female }}],
            ['Others',   {{ $other }}]
          ]);
  
          var options = {
            title: 'Student Genders',
            is3D: true,
          };
  
          var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
          chart.draw(data, options);
        }

       

        function drawLineChart() {
            var data = google.visualization.arrayToDataTable([
            ['Day', 'Applicants'],
            ['0',0,],
            ['1',13,],
            ['2',15,],
            ['3',20,],
            ['4',10,]
            ]);

            var options = {
            title: 'Daily Number of Applicants',
            curveType: 'function',
            legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
        
      </script>

   <script src="/sidebar.js" ></script>
   <script src="/register.js" ></script> 
</body>

</html>