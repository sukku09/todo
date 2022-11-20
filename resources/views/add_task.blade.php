<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/task.css') }}">
</head>
<body>
    <header>
        <h2 style="text-align: center">ADD TASK</h2>
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
            


            <div class="container">
            
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                
                <strong>{{ $message }}</strong>
            </div>
        @endif
            
              <form  method="post" action="add-task">
                @csrf
                <div class="row">
                  <div class="col-25">
                    <label>Task Name</label>
                  </div>
                  <div class="col-25">
                    <input type="text" id="tname" name="tname" placeholder="task name">
                    @if($errors->has('firstname'))
                        <div class="error">{{ $errors->first('firstname') }}</div>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-25">
                    <label>Task Assigne</label>
                  </div>
                  <div class="col-25">
                    <input type="text" id="t_assigne" name="t_assigne" placeholder="Task Asignee">
                  </div>
                </div>
                <div class="row">
                    <div class="col-25">
                      <label>Start Date</label>
                    </div>
                    <div class="col-25">
                      <input type="date" id="start_date" name="start_date" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                      <label>End Date</label>
                    </div>
                    <div class="col-25">
                      <input type="date" id="end_date" name="end_date" >
                    </div>
                </div>
                {{-- <div class="row">
                  <div class="col-25">
                    <label>Status</label>
                  </div>
                  <div class="col-25">
                    <select id="status" name="status">
                      <option value="">Select</option>
                      <option value="0">Pending</option>
                      <option value="1">Completed</option>
                      
                    </select>
                  </div>
                </div> --}}
                <br>
                <div class="row" >
                  <input type="submit" id="submit" value="Submit">
                </div>
              </form>
            </div>
            
        </article>
      </section>
      
       <footer>
         <p>Footer</p> 
      </footer> 


</body>

</html>
