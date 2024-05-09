<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvocationUpdateRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return ($this->user()->getMainRole() == 'admin');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'id' => ['required', 'exists:convocations,id'],
			'name' => ['required', 'string', 'max:255'],
			'date' => ['required', 'date'],
			'time' => ['nullable', 'date_format:H:i'],
			'location' => ['nullable', 'string', 'max:255'],
			'description' => ['nullable', 'string', 'max:500']
		];
	}
}
