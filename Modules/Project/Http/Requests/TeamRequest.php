<?php

namespace Modules\Project\Http\Requests;

use App\Traits\ValidationMessage;
use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    use ValidationMessage;
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

        if ($this->type == 'description'){
            return [
                'description' => 'sometimes|nullable|string'
            ];
        }

        return [
            'name' => 'required|min:3|max:191',
            'description' => 'sometimes|nullable|string',
            'members' => 'sometimes|nullable|string'
        ];
    }
}
