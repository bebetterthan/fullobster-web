<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\LearningProgram;
use App\Models\AddOn;

class ProgramRegistrationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Student information
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
            'gender' => ['required', Rule::in(['male', 'female'])],

            // Program selection
            'learning_program_id' => [
                'required',
                'exists:learning_programs,id',
                function ($attribute, $value, $fail) {
                    $program = LearningProgram::find($value);
                    if (!$program || !$program->is_active) {
                        $fail('The selected program is not available.');
                    }
                },
            ],

            // Program dates
            'program_start_date' => [
                'required',
                'date',
                'after_or_equal:today',
                function ($attribute, $value, $fail) {
                    $startDate = Carbon::parse($value);
                    if ($startDate->dayOfWeek !== Carbon::MONDAY) {
                        $fail('Program must start on a Monday.');
                    }
                },
            ],

            // Add-ons selections (all optional)
            'transportation_addon_id' => [
                'nullable',
                'exists:add_ons,id',
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $addOn = AddOn::find($value);
                        if (!$addOn || $addOn->type !== 'transportation' || !$addOn->is_active) {
                            $fail('The selected transportation add-on is not valid.');
                        }
                    }
                },
            ],

            'laundry_addon_id' => [
                'nullable',
                'exists:add_ons,id',
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $addOn = AddOn::find($value);
                        $program = LearningProgram::find($this->learning_program_id);
                        
                        if (!$addOn || $addOn->type !== 'laundry' || !$addOn->is_active) {
                            $fail('The selected laundry add-on is not valid.');
                        } elseif ($program && !$addOn->isAvailableForProgram($program)) {
                            $fail('The selected laundry add-on is not available for this program duration.');
                        }
                    }
                },
            ],

            'catering_addon_id' => [
                'nullable',
                'exists:add_ons,id',
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $addOn = AddOn::find($value);
                        if (!$addOn || $addOn->type !== 'catering' || !$addOn->is_active) {
                            $fail('The selected catering add-on is not valid.');
                        }
                    }
                },
            ],

            // Additional information
            'notes' => 'nullable|string|max:1000',
            
            // Terms and conditions
            'accept_terms' => 'required|accepted',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Full name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Phone number is required.',
            'gender.required' => 'Please select your gender.',
            'gender.in' => 'Gender must be either male or female.',
            'learning_program_id.required' => 'Please select a learning program.',
            'learning_program_id.exists' => 'The selected program is not valid.',
            'program_start_date.required' => 'Program start date is required.',
            'program_start_date.after_or_equal' => 'Program start date must be today or in the future.',
            'transportation_addon_id.exists' => 'The selected transportation option is not valid.',
            'laundry_addon_id.exists' => 'The selected laundry package is not valid.',
            'catering_addon_id.exists' => 'The selected catering package is not valid.',
            'accept_terms.required' => 'You must accept the terms and conditions.',
            'accept_terms.accepted' => 'You must accept the terms and conditions.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'learning_program_id' => 'learning program',
            'program_start_date' => 'start date',
            'transportation_addon_id' => 'transportation option',
            'laundry_addon_id' => 'laundry package',
            'catering_addon_id' => 'catering package',
            'accept_terms' => 'terms and conditions',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Clean up phone number
        if ($this->phone) {
            $phone = preg_replace('/[^\d+]/', '', $this->phone);
            $this->merge(['phone' => $phone]);
        }

        // Ensure checkbox values are properly handled
        $this->merge([
            'accept_terms' => $this->has('accept_terms') ? true : false,
        ]);
    }

    /**
     * Handle a passed validation attempt.
     */
    protected function passedValidation(): void
    {
        // Calculate program end date based on start date and program duration
        if ($this->learning_program_id && $this->program_start_date) {
            $program = LearningProgram::find($this->learning_program_id);
            $startDate = Carbon::parse($this->program_start_date);
            $endDate = $program->calculateEndDate($startDate);
            
            $this->merge(['program_end_date' => $endDate->format('Y-m-d')]);
        }
    }

    /**
     * Get validated data with additional computed fields
     */
    public function getValidatedData(): array
    {
        $validated = $this->validated();
        
        // Add computed fields
        $program = LearningProgram::find($validated['learning_program_id']);
        $startDate = Carbon::parse($validated['program_start_date']);
        
        $validated['program_end_date'] = $program->calculateEndDate($startDate)->format('Y-m-d');
        $validated['learning_calendar'] = $program->generateLearningCalendar($startDate);
        
        return $validated;
    }
}
