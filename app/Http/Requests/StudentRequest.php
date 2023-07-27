<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // khai báo 1 mảng
        $rules = [];
        // lấy phương thức đang hoat động
        $method = $this->route()->getActionMethod();
        switch ($this->method()) {
            case 'POST':
                switch ($method) {
                    case 'add': // hàm nào gọi đến 
                        $rules = [
                            'image' => 'required',
                            'name' => 'required',
                            'email' => 'required|unique:students',
                            'address' => 'required',
                        ];
                        break;

                    case 'edit': // hàm nào gọi đến
                        $rules = [
                            'name' => 'required',
                            'email' => 'required',
                            'address' => 'required'
                        ];
                        break;

                    default:
                        break;
                }
                break;
            default:
                break;
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => "Không được bỏ trống tên",
            'email.required' => "Không được bỏ trống email",
            'email.unique' => "Email đã tồn tại",
            'address.required' => "Không được bỏ trống địa chỉ",
            'image.required' => "Không được bỏ trống ảnh",
        ];
    }
}
