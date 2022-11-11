<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students PDF File</title>

    <style>
      
      #customers {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10px;
        border-collapse: collapse;
        width: 100%;
      }

      #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }

      #customers tr:nth-child(even){background-color: #f2f2f2;}

      #customers tr:hover {background-color: #ddd;}

      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
      }
      
    </style>

</head>
<body>

    <table id="customers">
      
        <tr>
          <th>Student No.</th>
          <th>Full Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Birthday</th>
          <th>Birthplace</th>
          <th>Contact #</th>
          <th>Email</th>
          <th>Address</th>
          
        </tr>
        @foreach ($students as $item )
          <?php
            $mi=$item -> mname;
            if ($mi == "none" || $mi == "(none)") {
              $mi="";
            }
          ?>
          <tr>
          <td>{{ $item -> student_no }}</td>
          <td>{{ $item -> fname }} {{ $mi }} {{ $item -> lname }}</td>
          <td>{{ $item -> age }}</td>
          <td>{{ $item -> gender }}</td>
          <td>{{ $item -> bday }}</td>
          <td>{{ $item -> bplace }}</td>
          <td>{{ $item -> contact }}</td>
          <td>{{ $item -> email }}</td>
          <td>{{ $item -> address }}</td>
          
        </tr>
        @endforeach
        
        
      
    </table>

</body>
</html>