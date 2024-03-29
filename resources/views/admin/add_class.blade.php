@extends('admin.master')

@section('title', 'Create New Class')

@section('content')
    @if(count($errors))
    <form action="{{route('classes.create-post')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input
            id="name"
            type="text"
            class="form-control"
            name="name"
            />

        </div>
        <div class="form-group">
            <label for="teacher_name">TeacherName</label>
            <input
            id="teacher_name"
            type="text"
            class="form-control"
            name="teacher_name"
            />
        </div>
        <div class="form-group">
            <select>
                name="major"
                class="form-control"
            >
                <option value="CNTT">Công nghệ thông tin</option>
                <option value="DPT">Đa phương tiện</option>
                <option value="MKT">Marketing</option>
                <option value="UD">Ứng dụng</option>
            </select>
        </div>
        <div class="form-group">
            <label for="max_student">Max Student</label>
            <input
                type="number"
                class="form-control"
                name="max_student"
                id="max_student"
            />
        </div>
        <div>
            <button
                type="submit"
                class="btn btn-submit"
            >
                Create Class
            </button>
        </div>
    </form>
@endsection