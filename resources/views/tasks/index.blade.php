<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do list</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('favicon2.ico') }}" type="image/x-icon">

</head>
<body>
    <div class="container">
    <form method="POST" action="{{ route('admin.logout') }}" style="float: right;">
                @csrf
                <button type="submit" class="btn btn-danger"><b>Logout</b></button>
            </form>
        <div class="todo-app">

            <h1> <img src="{{ asset('images/logo2.png') }}" alt="logo"> BIT</h1>
            
        
            <h2><img src="{{ asset('images/icon.png') }}" alt="icon"> To-do List </h2>
            <!-- <h2>To-do List </h2> -->
            


            
            <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="row">
              
                <input type="text" id="input-box" name="task" placeholder="ADD Your text" required>
                <button type="submit">Add </button>
             </div>

             </form>  
            
         @if ($tasks->isEmpty())
                 <p>No tasks available.</p>
             @else
 
             <!-- <ul id="list-container">
                @foreach($tasks as $task)
                    <li class="{{ $task->is_completed ? 'checked' : '' }}">
                        {{ $task->task }}
                    </li>
                @endforeach
            </ul>  -->

            <ul id="list-container">
              @foreach($tasks as $task)
                  <li class="{{ $task->is_completed ? 'checked' : '' }}">
                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display: inline;">
                     @csrf
                     @method('PATCH')
                     <input type="checkbox" name="is_completed" 
                       onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }} 
                       style="display: none;">
                     <!-- <input type="checkbox" name="is_completed" onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }}> -->
                     <span style="cursor: pointer;" onclick="this.previousElementSibling.click()">
                     {{ $task->task }}
                     </span>
                    </form>
         @if ($task->is_completed)
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline; float: right;">
                @csrf
                @method('DELETE')
                <span onclick="this.parentElement.submit();" style="cursor: pointer; color: grey;">&#x2716;</span> <!-- Cross symbol -->
            </form>
        @endif  
                  </li>
              @endforeach
            </ul>

         @endif
         
        </div>
    </div>
</body>
</html>