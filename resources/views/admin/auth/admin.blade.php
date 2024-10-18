<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User data</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>
    <div class="user-container">
           <form method="GET" action="{{ route('tasks.index') }}" style="float: left;">
                @csrf
                
                <button  type="submit" class="back">Back</button>
            </form>
   
        <h2>User Data</h2>
       
        <div class="users">
           <table class="user-table">
               <tr class="table-row">
                  <th>User ID</th>
                  <th>Name</th>
                  <th>Email ID</th>
                  <th>Action</th>
               </tr>
               
               @foreach ($users as $user)
               <tr class="data">
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                  <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="del">Delete</button>
                  </form>
                  </td>
               </tr>
               @endforeach
             
           </table>
        </div>
    </div>
</body>
</html>