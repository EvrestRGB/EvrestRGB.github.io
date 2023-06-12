<?php

function sanitize($input) {
  // Escape special characters in the username
  $username = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

  // Validate the email address
  $emailRegex = '/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,6}$/';
  $email = preg_match($emailRegex, $input) ? $input : null;

  // Validate the password
  $passwordRegex = '/^[a-zA-Z0-9_!@#$%^&*()-]+$/';
  $password = preg_match($passwordRegex, $input) ? $input : null;

  return [
    'username' => $username,
    'email' => $email,
    'password' => $password,
  ];
}

// Get the user input
$input = [
  'email' => $_POST['email'],
  'password' => $_POST['password'],
  'username' => $_POST['username'],
];

// Sanitize the user input
$sanitizedInput = sanitize($input);

// Check if the input is valid
if (!isset($sanitizedInput['username']) || !isset($sanitizedInput['email']) || !isset($sanitizedInput['password'])) {
  echo 'Please enter valid input';
  exit;
}

// Create a new user
$user = new User();
$user->username = $sanitizedInput['username'];
$user->email = $sanitizedInput['email'];
$user->password = $sanitizedInput['password'];

$user->save();

// Redirect the user to the home page
header('Location: /');
