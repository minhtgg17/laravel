<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;
use App\Http\Requests\ClassRoomRequest;

class ClassRoomController extends Controller
{
    // Ham chay vao dau tien khi co phuong thuc trong controller dc goi
    function __construct()
    {
        // Dat middleware o day de luc nao cung check dau tien
        $this->middleware(['auth', 'active.admin', 'uni.admin']);
    }

    public function index()
    {   
        $classes = ClassRoom::all();
        $classes = $classes->load('admins');
        // dd($classes->toArray());
        return view('admin.class', ['classes' => $classes]);
    }

    public function createform()
    {
        return view('admin.add_class');
    }

    public function create(ClassRoomRequest $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|string|min:8',
        //     'teacher_name' => 'required|string|min:5|max:32',
        //     'major' => 'required|string',
        //     'max_student' => 'nullable|numeric',
        // ]);

        $data = $request->except('_token');
        // dd($data);
        // Luu du lieu vao bang classes
        // CACH 1
        // Khoi tao doi tuong moi
        // $classRoom = new ClassRoom();
        // // Gan gia tri vao cho cac thuoc tinh
        // $classRoom->name = $data['name'];
        // $classRoom->teacher_name = $data['teacher_name'];
        // $classRoom->major = $data['major'];
        // $classRoom->max_student = $data['max_student'];
        // // Luu
        // $classRoom->save();
        // Sau khi luu se tra ve danh sach

        // CACH 2
        // ClassRoom::create($data);


        // CACH 3
        $multiData = [
            $data,
            $data,
            $data,
        ];
        ClassRoom::insert($multiData);

        return view('admin.class', ['classes' => ClassRoom::all()]);
        // return $this->index();
    }

    public function editForm(ClassRoom $class)
    {
        // Dat ten tham so trung tham so o ROUTE, kem theo kieu ClassRoom
        // Tra ve luon ClassRoom co id ma khong can thuc hien find()
        // $classRoom = ClassRoom::find($id);
        // dd($class);
        return view('admin.add_class', ['class' => $class]);
    }
    public function update(ClassRoomRequest $request)
    {
        // 1. Lay ra du lieu can update
        $data = $request->except('_token', 'id');
        // 2. Tim ra classRoom co id truyen vao
        $classRoom = ClassRoom::find($request->id);
        // $classRoom = ClassRoom::where('id', '=', $request->id)->first();
        // 3. Update bang phuong thuc update
        $classRoom->update($data);
        // 4. Tra ve danh sach
        return $this->index();
    }

    public function delete(ClassRoom $class) {
        // 1. class la the hien cua doi tuong ClassRoom co id la class truyen vao route
        // Su dung phuong thuc delete()
        $class->delete();
        // 2. Tra ve view
        return $this->index();
    }
}
