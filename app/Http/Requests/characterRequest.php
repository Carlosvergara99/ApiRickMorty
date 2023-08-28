<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;


class characterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name' => 'required',
            'status' => 'required',
            'species' => 'required',
            'type' => 'required',
            'gender' => 'required',
            'origin' => 'required|array',
            'origin.name' => 'required|string',
            'origin.url' => 'required|url',
            'location' => 'required|array',
            'location.name' => 'required|string',
            'location.url' => 'required|url',
            'image' => 'required',
            'episode' => 'required|array',
            'url' => 'required|url'
        ];
    }
     public function messages(){
         return [
             'name.required' => 'name es requerido!',
             'status.required' => 'status es  requerido!',
             'species.required' => 'species es requerido!',
             'type.required' => 'type es requerido!',
             'gender.required' => 'type es requerido!',
             'origin.required' => 'origin es requerido!',
             'origin.array' => 'origin debe ser un json!',
             'origin.name.required' => 'origin.name es requerido!',
             'origin.url.required' => 'origin.url es requerido!',
             'location.required' => 'location es requerida!',
             'location.array' => 'location debe ser un json !',
             'image.required' => 'image es requerido!',
            // 'location.name.string' => 'location.name debe ser un string!',
             'location.name.required' => 'location.name es requerido!',
             'location.url.required' => 'location.url es requerido!',
             'episode.required' => 'episode es requerido!',
             'episode.array' => 'episode debe ser un json!',
             'url.required' => 'url es requerido!',
             'url.link' => 'url debe ser un link!',
         ];
     }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(['errors' => $validator->errors()], 422)
        );
    }
}
