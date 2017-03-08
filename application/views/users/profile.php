<h1><?= $title ?></h1>

<?php

echo "<pre>";
print_r ($this->session->userdata());
echo "</pre>";

?>

<a href='<?php echo base_url()."Users/logout"?>'>Logout Here</a>
