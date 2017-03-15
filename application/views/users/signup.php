<h1><?= $title ?></h1>

<?php
  echo form_open('Users/signup_validation');

  echo validation_errors();

  echo "<p> EMAIL </p>";
  echo "<p>";
  echo form_input('email', $this->input->post('email'));
  echo "</p>";

  echo "<p> USERNAME </p>";
  echo "<p>";
  echo form_input('username');
  echo "</p>";


  echo "<p> GENDER </p>";
  echo "<p>";
  echo form_radio('gender', 'Female', FALSE). form_label('Female', 'female');
  echo form_radio('gender', 'Male', FALSE). form_label('Male', 'male');
  echo "</p>";

  echo "<p> PASSWORD </p>";
  echo "<p>";
  echo form_password('password');
  echo "</p>";

  echo "<p> CONFIRM PASSWORD </p>";
  echo "<p>";
  echo form_password('cpassword');
  echo "</p>";

  echo "<p>";
  echo form_submit('signup_submit', 'Sign Up');
  echo "</p>";

  echo form_close();

?>
