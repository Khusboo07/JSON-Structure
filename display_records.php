<!DOCTYPE html>
<html>
<head>
<title>Display Records</title>

</head>

<body>
  <h1> REGISTERED EMPLOYEE DETAILS </h1>
  <input type="button" id = "btnGenerate" value="Show Employees" />
  <hr />
  <div id="dvTable" >
  </div>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript">
  $(function () {
      $("#btnGenerate").click(function () {
          //Build an array containing Employee records.
         var employees = new Array();
          employees.push(["Employee Id", "Employee Name", "Employee Email","Employee Password","Employee Mobile"]);
          employees.push([1, "Nayra", "nayra@gmail.com","1234567","9876543423"]);
          employees.push([2, "Anita Mishra", "anita@gmail.com","1234567","9876544532"]);
          employees.push([3, "Khushboo", "khushbu@gmail.com","1234567","8796546758"]);
          
          //Create a HTML Table element.
          var table = $("<table />");
          table[0].border = "1";
   
          //Get the count of columns.
          var columnCount = employees[0].length;
   
          //Add the header row.
          var row = $(table[0].insertRow(-1));
          for (var i = 0; i < columnCount; i++) {
              var headerCell = $("<th />");
              headerCell.html(employees[0][i]);
              row.append(headerCell);
          }
   
          //Add the data rows.
          for (var i = 1; i < employees.length; i++) {
              row = $(table[0].insertRow(-1));
              for (var j = 0; j < columnCount; j++) {
                  var cell = $("<td />");
                  cell.html(employees[i][j]);
                  row.append(cell);
              }
          }
   
          var dvTable = $("#dvTable");
          dvTable.html("");
          dvTable.append(table);
    });
  });
  </script> 

</body>
</html> 

