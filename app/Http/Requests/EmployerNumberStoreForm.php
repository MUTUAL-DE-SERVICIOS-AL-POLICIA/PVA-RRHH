<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployerNumberStoreForm extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'number' => 'required|unique:employer_numbers|min:1|max:255'
		];
	}

	public function messages() {
		return [
			'number.required' => 'El campo de número de empleador no puede estar vacío',
			'number.unique' => 'El número de empleador ya existe',
			'number.min' => 'El número mínimo de caracteres es 1',
			'number.max' => 'El número máximo de caracteres es 255'
		];
	}
}
