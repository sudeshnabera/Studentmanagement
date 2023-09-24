# Validation Class with File Validation Documentation

The `Validation` class is a PHP class designed to validate data fields, including file uploads. It supports various validation rules, including checks for required fields, email formats, and file size, type, and extension validation.

## Table of Contents

- [Class Overview](#class-overview)
- [Constructor](#constructor)
- [Method: validate](#method-validate)
- [Method: errors](#method-errors)
- [Method: passes](#method-passes)
- [File Validation](#file-validation)
- [Example Usage](#example-usage)

## Class Overview

- The `Validation` class provides a versatile way to validate data, including file uploads, based on specified rules.
- It offers essential validation rules such as required fields, email formats, and advanced file validation checks.

## Constructor

### `__construct($data)`

- The constructor accepts an associative array `$data` as its parameter.
- It initializes the `Validation` object with the data to be validated.

## Method: `validate`

### `validate(array $rules)`

- The `validate` method performs data validation based on specified rules.
- It accepts an array of validation rules, where each rule is specified as a key-value pair.
- Rules are defined in the format `field_name` => `validation_rule1|validation_rule2`.
- Multiple rules can be applied to a single field by separating them with the `|` (pipe) character.

## Method: `errors`

### `errors()`

- The `errors` method returns an array of validation errors, if any.
- It provides details about fields that failed validation and their corresponding error messages.

## Method: `passes`

### `passes()`

- The `passes` method checks if the data passed all validation rules without errors.
- It returns `true` if validation passed without errors and `false` otherwise.

## File Validation
## Method: `file($field, $value, $params)`

The `file` method of the `Validation` class is used to validate file uploads based on specified criteria, including file size, allowed MIME types (file types), and allowed file extensions.

### Parameters

- `$field`: The name of the field being validated (e.g., 'file_upload').
- `$value`: The value of the field, typically containing file upload information from `$_FILES`.
- `$params`: An array of parameters that define the file validation rules.

### File Size Validation

The method first checks if the file upload is successful (no upload errors) and exists in the `$_FILES` array. If the file upload is valid, it proceeds to validate the file size.

- **Max File Size**: You can specify the maximum allowed file size in bytes as the first parameter in `$params`. The default maximum size is 1,000,000 bytes (1 MB) if not explicitly defined.

```php
$fileSize = isset($params[0]) ? (int)$params[0] : 1000000; // Default: 1 MB
if ($file['size'] > $fileSize) {
    $this->addError($field, 'The ' . $field . ' exceeds the maximum file size.');
}
```


### Allowed MIME Types Validation

- The `file` method checks if the file's MIME type (file type) is allowed.
- You can specify a comma-separated list of allowed MIME types as the second parameter in `$params`.
- Example: `image/jpeg,image/png`
- Code implementation :
  ```php
  $allowedTypes = isset($params[1]) ? explode(',', $params[1]) : [];
  if (!in_array($file['type'], $allowedTypes)) {
      $this->addError($field, 'The ' . $field . ' has an invalid file type.');
  }
    ```
### File Validation Rule

To validate file uploads, the `Validation` class introduces a new rule called `file`. This rule allows you to check the following aspects of a file:

1. **Max File Size**: Specify the maximum file size in bytes. Default is 1 MB if not specified.

2. **Allowed MIME Types**: Define a comma-separated list of allowed MIME types (e.g., `image/jpeg,image/png`).

3. **Allowed File Extensions**: Define a comma-separated list of allowed file extensions (e.g., `jpg,png`).

### Example File Validation Rule

```php
'file_upload' => 'file:2000000,image/jpeg,image/png'
```
## Example Usage with File Validation

In this example, we illustrate how to use the `Validation` class to validate user input data, including file uploads. The `file_upload` field is subjected to file size, type, and extension validation based on the provided rules.

```php
$data = [
    'email' => 'invalid-mail',
    'password' => '',
    'file_upload' => $_FILES['file_upload'], // Assuming you have a file input named 'file_upload'
];

$validator = new Validation($data);

$rules = [
    'email' => 'required|email',
    'password' => 'required',
    'file_upload' => 'file:2000000,image/jpeg,image/png',
];

$validator->validate($rules);

if ($validator->passes()) {
    // Data is valid, perform your actions here
} else {
    // Validation failed, handle errors
    $errors = $validator->errors();
    print_r($errors);
}
```
