<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // unique:classes Kiem tra duy nhat trong bang classes
            // exist:classes Kiem tra ton tai trong bang classes
            'name' => 'required|string|min:8',
            'teacher_name' => 'required|string|min:5|max:32',
            'major' => 'required|string',
            'max_student' => 'nullable|numeric',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Yêu cầu nhập tên lớp',
            'name.string' => 'Tên lớp là 1 chuỗi',
            'name.min' => 'Tên lớp ít nhất 8 kí tự',
            'teacher_name.required' => 'Yêu cầu nhập tên giáo viên',
            'teacher_name.string' => 'Tên giáo viên là 1 chuỗi',
            'teacher_name.min' => 'Tên giáo viên ít nhất  5 kí tự',
            'major.required' => 'Yêu cầu nhập tên ngành',
            'major.string' => 'Tên ngành là 1 chuỗi',
        ];
    }
}
