<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTournamentsRequest extends FormRequest
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
            
            'name' => 'required|unique:tournaments,name,'.$this->route('tournament'),
            'beginn' => 'required|date_format:'.config('app.date_format'),
            'end' => 'nullable|date_format:'.config('app.date_format'),
            'public' => 'required',
            'tournamentmode_id' => 'required',
        ];
    }
}
