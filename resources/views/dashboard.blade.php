<!DOCTYPE html>
<html>
<head>
  <title>Todo list</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    .space {
      height: 20vh;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="space"></div>
        <h1 class="text-center">MY TODO LIST</h1>
        <form method="post" action="/saveTask">
            {{ csrf_field() }}
          <div class="form-group">
            <label for="taskType">Task Type</label>
            <input type="text" class="form-control" name="taskType" id="taskType" placeholder="Enter task type" required>
          </div>
          <div class="form-group">
            <label for="taskName">Task Name</label>
            <input type="text" class="form-control" name="taskName" id="taskName" placeholder="Enter task name" required>
          </div>
          <div class="text-right mb-5">
            <input type="submit" value="Add new Task" class="btn btn-primary  mr-3"></button>
            <input type="RESET" value="Clear" class="btn btn-warning "></button>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table table-dark">
            <thead style="text-align: center">
              <tr>
                <th scope="col">Task No</th>
                <th scope="col">Task Type</th>
                <th scope="col">Task Name</th>
                <th scope="col">Task Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody style="text-align: center">
                @foreach ($tasks as $task)
                    
              <tr>
                <th scope="row">{{ $task->id }}</th>
                <td>{{ $task->taskType }}</td>
                <td>{{ $task->taskName }}</td>  
                <td>
                    @if ($task->isCompleted)
                    <button class="btn btn-success" style="width: 120px; height: 35px;"> Completed</button>
                    @else
                    <button class="btn btn-warning "  style="width: 120px; height: 35px;">Not Completed</button>
                    @endif
                </td>  
                <td>
                    @if (!$task->isCompleted)
                    <a href="/markasCompleted/{{ $task->id }}" class="btn btn-primary mr-3"  style="width: 180px; height: 35px;">Mark as Completed</button>
                     @else
                     <a href="/markasNotCompleted/{{ $task->id }}" class="btn btn-secondary mr-3 "  style="width: 180px; height: 35px;">Mark as Not Completed</button>
                     @endif
                     <a href="/deletetask/{{ $task->id }}" class="btn btn-danger" style="width: 180px; height: 35px;" onclick="return confirm('Are you sure you want to remove this task?')">Remove Task</a>


                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS (optional) -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
