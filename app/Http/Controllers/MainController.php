<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//import โมเดล Todo (Eloquent mode หรือเรียกกันปกติว่าโมเดลดาต้าเบส)
use App\Models\Todo;
use App\Models\TodoType;


class MainController extends Controller
{
    //สร้าง function ที่ชื่อว่า index โดยสามารถเรียกใช้ function นี้ได้ใน router (web.php)
    public function index()
    {   
        //ใช้คำสั่ง Todo::All(); และนำข้อมูลที่ถูก return มา เก็บไว้ที่ตัวแปร $todo 
        //(คำสั่ง Models::All(); นี้จะ return ค่าเป็น list หรือ array of objects หรือ ลิสต์ของ object(ก็คือ array ที่เก็บ object ไว้หลายๆตัวนั่นแหละ))
        $todo = Todo::All();
        $types = TodoType::All(); 
        // dd($types);
        //return ไปที่ view ที่ชื่อว่า "example" (แสดงผล) โดยแนบตัวแปร $todo ซึ่งมีข้อมูลที่เราค้นหาจากดาต้าเบสไปด้วย 
        //ส่งโดยคำสั่ง ->with("todo",$todo) (String แรกในวงเล็บคือชื่อตัวแปรที่เราต้องการตั้ง ตัวที่สองในวงเล็บคือข้อมูลที่ต้องการส่ง 
        //ในบริบทนี้ เราต้องการส่ง $todo โดยกำหนดให้ชื่อว่า "todos")

        return view('example')->with("todos",$todo)->with("types",$types);
    }

    //สร้าง function ที่ชื่อว่า addExampleData โดยสามารถเรียกใช้ function นี้ได้ใน router (web.php) 
    //เรียกใช้ Request 
    public function addExampleData(Request $request)
    {
        //สร้างตัวแปร $exampledata1 โดยกำหนเให้มันเป็น Object Todo(กำหนดให้เป็น object เปล่าๆ ยังไม่กำหนดค่าอะไรให้มัน)
        $exampledata1 = new Todo;
        //กำหนดให้ todoName(property) ของ $exampledata1 มีค่าเท่ากับ property todo ของ request ($request->todo)
        //ง่ายๆก็คือ เราส่งค่าจากฟอร์ม(ใน view) มาที่ controller และเรียกใช้ข้อมูลจากฟอร์มด้วยตัวแปร $request ที่เราเรียกใช้ในบรรทัดที่ 25 (Request $request) 
        $exampledata1->todoName = $request->todo;
        //เหมือนกันกับบรรทัดด้านบน แต่เปลี่ยนชื่อตัวแปร
        $exampledata1->Name = $request->name;
        
        $exampledata1->type_id = $request->typeid;
        //เรียกใช้ method save(); ซึ่งเป็นการบันทึกข้อมูลตัวนี้ลงดาต้าเบส (เพิ่มข้อมูล)
        $exampledata1->save();


        //ใช้คำสั่ง redirect ไปที่ /home (ก็คือส่ง get request ไปที่ url /home)
        //อย่าสับสน return view กับ return redirect นะครับ ไม่เหมือนกัน redirect(การเปลี่ยนเส้นทาง) = ส่ง request ใหม่ไปที่ url อื่น return viee = เรียกแสดงไฟล์ view นั้นๆ
        return redirect('/home');
    }

    //สร้าง function ที่ชื่อว่า deleteData โดยสามารถเรียกใช้ function นี้ได้ใน router (web.php)
    //มีการเรียกใช้ตัวแปร $id ซึ่งใน route เรากำหนดไว้แล้ว 
    //Route::get('/delete/{id}',[MainController::class,'deleteData']);
    //                     ^
    //                     ตัวนี้นะครับ ในไฟล์ web.php
    //(ชื่อตัวแปรทั้งสองต้องเหมือนกัน)
    public function deleteData($id)
    {
        // เรียกใช้ method destroy โดยในวงเล็บต้องใส่เป็น id ของข้อมูลที่ต้องการลบ 
        Todo::destroy($id);
        //redirect ไปที่ /home
        return redirect('/home');
    }
    public function editData($id)
    {
        $todo = Todo::find($id);
        // dd($todo); คำสั่งเช็คข้อมูล
        return view("edit")->with("todo",$todo);
    }
    public function confirmEdit(Request $request, $id)
    {
        //ค้นหา todo ที่มีไอดี = $id (ค่าที่รับมาจาก URL)
        $newTodo = Todo::find($id);

        //นำค่าที่ผู้ใช้ส่งมาจาก Form เปลี่ยนให้กับข้อมูลที่เพิ่งค้นหาไป
        $newTodo->todoName = $request->todo;
        $newTodo->Name = $request->name;

        // บันทึกข้อมูลที่เปลี่ยนลง database
        $newTodo->save();
        return redirect("/home");
    }
}
