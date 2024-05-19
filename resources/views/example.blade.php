<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/addTodo" method="POST">
        @csrf
        <label for="fname">Todo :</label><br>
        <input type="text" name="todo" ><br>
        <label for="lname">Name:</label><br>
        <input type="text" name="name"><br><br>
        <input type="submit" value="Submit">
    </form> 
    @if(!$todos->isEmpty())
        @foreach($todos as $todo)   
        id : {{$todo->id}}<br>
        ชื่อ Todo : {{$todo->todoName}}<br>
        ผู้กรอก Todo: {{$todo->Name}}<br>
        <a href delete/{{$todo->id}}">ลบ</a><br>
        @endforeach
    @else
        คุณยังไม่มี todo
    @endif
    

</body>
</html>