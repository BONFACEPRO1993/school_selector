<h1><?= $title ?></h1>

<?php
  echo form_open('Users/login_validation');

  echo validation_errors();

  echo "<p> EMAIL </p>";
  echo "<p>";
  echo form_input('email', $this->input->post('email'));
  echo "</p>";

  echo "<p> PASSWORD </p>";
  echo "<p>";
  echo form_password('password');
  echo "</p>";

  echo "<p>";
  echo form_submit('login_submit', 'login');
  echo "</p>";

  echo form_close();

?>

<a href="<?php echo base_url()."Users/signup"?>">Sign up here</a>
