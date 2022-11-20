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
    





* {
  box-sizing: border-box;
}

input[type=text], select, [type=date] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
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
                    <button type="button" class="close" data-dismiss="alert">×</button>
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
