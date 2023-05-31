<?php
namespace App\Domain\Services;
use Illuminate\Support\Facades\Validator;

class DataValidator {
    protected $validationRules = [];
    protected $customValidationErrorMessages = [];
    protected $validator;

    public function __construct() {
        $this->validator = new Validator();
    }

    protected function setValidationRules($rules) {
        $this->validationRules = $rules;
    }

    protected function setCustomValidationErrorMessages(array $messages) {
        $this->customValidationErrorMessages = $messages;
    }

    /**
     * @return array{failed: bool, errors: string[]}
     */
    public function validateData($data) {
        $validator = $this->validator::make(
            $data, 
            $this->validationRules, 
            $this->customValidationErrorMessages
        );
        return [
            'failed' => $validator->fails(),
            'errors' => $validator->errors()->all()
        ];
    }

    public function validateRule($ruleName, $propertyName, $value) {
        $propertyName = $ruleName;
        $rule = safeVal($ruleName, $this->validationRules);
        $result = $this->validator::make(
            [$propertyName => $value], 
            [$ruleName => $rule]
        );
        if (count($result->errors())) {
            return false;
        }

        return true;
    }
}

?>