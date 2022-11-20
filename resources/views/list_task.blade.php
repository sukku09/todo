<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    * {
      box-sizing: border-box;
    }
    
    body {
      font-family: Arial, Helvetica, sans-serif;
    }
    
    /* Style the header */
    header {
      background-color: #666;
      padding: 10px;
      text-align: center;
      font-size: 15px;
      color: white;
    }
    
    /* Create two columns/boxes that floats next to each other */
    nav {
      float: left;
      width: 20%;
      height: 500px; /* only for demonstration, should be removed */
      background: #ccc;
      padding: 20px;
    }
    
    /* Style the list inside the menu */
    nav ul {
      list-style-type: none;
      padding: 10px;
    }
    nav li {
      list-style-type: none;
      padding: 10px;
    }
    article {
      float: left;
      padding: 20px;
      width: 80%;
      background-color: #f1f1f1;
      height: 500px; /* only for demonstration, should be removed */
    }
    
    /* Clear floats after the columns */
    section::after {
      content: "";
      display: table;
      clear: both;
    }
    
    /* Style the footer */
    footer {
      background-color: #777;
      padding: 10px;
      text-align: center;
      color: white;
    }
    
    /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
    @media (max-width: 600px) {
      nav, article {
        width: 100%;
        height: auto;
      }
    }
    

    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}




</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('js/task.js') }}"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <header>
        <h2> {{ $title }} </h2>
      </header>

      <section>
        <nav>
          <ul>
            <li> <a style="text-decoration: none; color : black"  href="add-task"> Add Task </a></li>
            <li> <a style="text-decoration: none; color : black"  href="list-task"> List Of Tasks </a></li>
            <li> <a style="text-decoration: none; color : black"  href="list-pending-task"> List Of Pending Task </a></li>
            <li> <a style="text-decoration: none; color : black"  href="list-completed-task"> List Of Completed Tasks </a></li>
          </ul>
        </nav>
        
        <article>
            <table>
                <tr>
                  <th>S.No</th>
                  <th>Task Name</th>
                  <th>Assignee</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                @php
                $i = 1;
            @endphp
                @foreach($data as $taskdata)

                
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$taskdata->task_name}}</td>
                    <td>{{$taskdata->task_assignee}}</td>
                    <td>{{$taskdata->task_startdate}}</td>
                    <td>{{$taskdata->task_enddate}}</td>
                    @if($taskdata->status==0)
                    <td>Task Assigned</td>
                    @elseif($taskdata->status==1)
                    <td>Task Pending</td>
                    @else
                    <td>Task Completed</td>
                    @endif
                    <td>
                        @if($taskdata->status== 0)
                            <button
                            class="btn btn-secondary update-status-btn"
                            data-id="1/{{ $taskdata->id }}" title="Mark As Progress"><i class="fa fa-clock-o" ></i>
                            </button>

                            <button
                            class="btn btn-secondary delete-btn"
                            data-id="{{ $taskdata->id }}"><i class="fa fa-trash"></i>
                            </button>

                        @elseif($taskdata->status== 1)
                            <button
                            class="btn btn-secondary update-status-btn"
                            data-id="2/{{ $taskdata->id }}" title="Mark As Complete"><i class="fa fa-check"></i>
                            </button>

                            <button
                            class="btn btn-secondary delete-btn"
                            data-id="{{ $taskdata->id }}"><i class="fa fa-trash"></i>
                            </button>
                        @else

                        @endif

                        
                    </td>
                </tr>
                @php
                $i = $i + 1;
            @endphp
                @endforeach
                

              </table>

            
        </article>
      </section>
      
       <footer>
         <p>Footer</p> 
      </footer> 


</body>

</html>
