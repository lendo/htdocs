<?php
$this->load->helper(array('url','html'));
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<?php
echo link_tag($boilerplate_normalize_css);
echo link_tag($boilerplate_main_css);
echo link_tag($bootstrap_css);
echo link_tag($bootstrap_custom_css);
?>

<script src="<?php echo $base_url . $boilerplate_jquery_js?>"></script>
<script src="<?php echo $base_url . $boilerplate_modernizr_js?>"></script>
<script src="<?php echo $base_url . $bootstrap_js?>"></script>
