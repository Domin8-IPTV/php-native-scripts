 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Show JSON Data in Jquery Datatables</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>  
           <script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h1 align="center">Show JSON Data in Jquery Datatables</h3><br />  
                <h3 align="center">Employee Database</h3><br />  
                <table id="data-table" class="table table-bordered">  
                     <thead>  
                          <tr>  
                               <th>Name</th>  
                               <th>Gender</th>  
                               <th>Designation</th>  
                          </tr>  
                     </thead>  
                </table>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#data-table').DataTable({  
           "ajax"     :     "employee_data.json",  
           "columns"     :     [  
                {     "data"     :     "name"     },  
                {     "data"     :     "gender"},  
                {     "data"     :     "designation"}  
           ]  
      });  
 });  
 </script>  