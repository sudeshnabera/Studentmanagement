<?php
class Validation
{
    protected $data;     // Store the data to be validated.
    protected $errors = [];  // Store validation errors.

    public function __construct($data)
    {
        $this->data = $data;  // Initialize the data in the constructor.
    }

    public function validate(array $rules)
    {
        foreach ($rules as $field => $rule) {
            $rulesArray = explode('|', $rule);
            foreach ($rulesArray as $r) {
                $this->applyRule($field, $r); // Apply each validation rule to the field.
            }
        }
    }

    protected function applyRule($field, $rule)
    {
        $ruleParts = explode(':', $rule);
        $ruleName = $ruleParts[0];

        if (method_exists($this, $ruleName)) {
            $value = isset($this->data[$field]) ? $this->data[$field] : "";
            $params = isset($ruleParts[1]) ? explode(',', $ruleParts[1]) : [];
            call_user_func([$this, $ruleName], $field, $value, $params); // Call the validation rule method.
        }
    }

    protected function required($field, $value, $params)
    {
        if (empty($value)) {
            $this->addError($field, 'The ' . $field . ' field is required.');
        }
    }

    protected function email($field, $value, $params)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addError($field, 'The ' . $field . ' field must be a valid email address.');
        }
    }

    protected function file($field, $value, $params)
    {
        if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES[$field];

            // Check file size (in bytes)
            $maxSize = isset($params[0]) ? (int)$params[0] : 1000000; // Default max size: 1 MB
            if ($file['size'] > $maxSize) {
                $this->addError($field, 'The ' . $field . ' exceeds the maximum file size.');
            }

            // Check allowed file types (mime types)
            $allowedTypes = isset($params[1]) ? explode(',', $params[1]) : [];
            if (!in_array($file['type'], $allowedTypes)) {
                $this->addError($field, 'The ' . $field . ' has an invalid file type.');
            }

            // Check allowed file extensions
            $allowedExtensions = isset($params[2]) ? explode(',', $params[2]) : [];
            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
            if (!in_array($fileExtension, $allowedExtensions)) {
                $this->addError($field, 'The ' . $field . ' has an invalid file extension.');
            }
        } else {
            $this->addError($field, 'The ' . $field . ' field must be a valid file.');
        }
    }

    protected function addError($field, $message)
    {
        $this->errors[$field][] = $message; // Store validation errors.
    }

    public function errors()
    {
        return $this->errors; // Get validation errors.
    }

    public function passes()
    {
        return empty($this->errors); // Check if validation passed without errors.
    }
}

// this data will be comming from ```form data``` Like $_POST $_FILE
$data = [
    'email' => '',
    'password' => '',
    'file_upload' => '', 
    // Assuming you have a file input named 'file_upload' 
    // 'file_upload' => $_FILES['file_upload'], 
];

$validator = new Validation($data);

$rules = [
    'email' => 'required|email',
    'password' => 'required',
    'file_upload' => 'file:2000000,image/jpeg,image/png', // Example with max size, allowed types, and allowed extensions
];

$validator->validate($rules);

if ($validator->passes()) {
    // Data is valid, perform your actions here
} else {
    // Validation failed, handle errors
    $errors = $validator->errors();
    print_r($errors);
}
?>
