{{-- <!DOCTYPE html>
<html>
 <head>
  <title>Live search in Tasks</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head> --}}
 @extends('layouts.app-master')
{{-- 
 <body>
  <br /> --}}
  @section('content')

  <div class="container box">
   <h3 >Live search in Tasks</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Tasks</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Tasks" />
     </div>
     <div class="table-responsive">
      <h3 >Total Data : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>ID</th>
         <th>Title</th>
         <th>description</th>
         <th>body</th>
          <th>Show it</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>
  @endsection
 {{-- </body>
</html> --}}
