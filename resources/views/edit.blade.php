<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit data</title>
</head>
<body>
    <h1>Editing data</h1>
    <form action="/editTodo/{{$todo->id}}" method="POST">
        @csrf
        <h2>id:{{$todo->id}}</h2><br>
        <label for="fname">Todo :</label>
        {{-- สร้าง input ขึ้นมา โดยให้ชื่อว่า todo --}}
        <input type="text" name="todo" value="{{$todo->todoName}}" required ><br> 
        <label for="lname">Name:</label>
        {{-- สร้าง input ขึ้นมา โดยให้ชื่อว่า name --}}
        <input type="text" name="name" value="{{$todo->Name}}" required><br>
        <input type="submit" value="Submit">
    </form> 
</body>
</html>