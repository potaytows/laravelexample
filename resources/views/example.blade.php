<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- สร้าง form โดยกำหนดให้มีปลายทางเป็น /addTodo โดย method POST --}}
    <form action="/addTodo" method="POST">
        @csrf
        <label for="fname">Todo :</label><br>
        {{-- สร้าง input ขึ้นมา โดยให้ชื่อว่า todo --}}
        <input type="text" name="todo" ><br> 
        <label for="lname">Name:</label><br>
        {{-- สร้าง input ขึ้นมา โดยให้ชื่อว่า name --}}
        <input type="text" name="name"><br><br>
        {{-- ปุ่ม sumbit ต้องมีทุกครั้งนะครับ --}}
        <input type="submit" value="Submit">
    </form> 

    {{-- เช็คว่า $todo นั้นว่างหรือไม่ โดยคำสั่ง ->isEmpty (ก็คือเช็คว่ามีข้อมูลมั้ย) --}}

    @if(!$todos->isEmpty())
        {{-- ถ้ามี ก็จะนำตัวแปร $todos(ซึ่งเป็น array) มาลูป และนำข้อมูลแต่ละตัวมาแสดง --}}
        @foreach($todos as $todo)   
        id : {{$todo->id}}<br>
        ชื่อ Todo : {{$todo->todoName}}<br>
        ผู้กรอก Todo: {{$todo->Name}}<br>
        {{--  สร้าง a link(อีตัวอักษรที่มันกดๆได้) โดยกำหนดให้ href คือ "delete/id ของข้อมูลแต่ละตัวใน array" 
        ซึ่งเมื่อเวลากดตรงนี้ของแต่ละข้อมูลใน array ที่เรามาแสดง ก็จะส่งเราไปที่ url นั้นๆ
        ตัวอย่างเช่น เมื่อกดของข้อมูลที่มี id = 1 ก็จะเป็น /delete/1 
        ถ้า id = 2 ก็เป็น /delete/2 --}}
        <a href= "delete/{{$todo->id}}">ลบ</a>
        <a href= "edit/{{$todo->id}}">แก้ไข</a><br>
        @endforeach
    @else
        {{-- ถ้าไม่เข้าเงื่อนไข (ก็คือไม่มีข้อมูล) จะแสดงผลตามด้านล่าง --}}
        คุณยังไม่มี todo
    @endif
    

</body>
</html>