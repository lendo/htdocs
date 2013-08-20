<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<?php require 'a-head.php';?>
</head>
<body>
	<?php require 'a-body-top.php';?>
	<?php require 'b-top.php';?>

	<div class="container dd-box">
		<div class="row">
			<div class="span12">
				<ul class="breadcrumb">
					<li>
						<i class="icon-chevron-right"></i> <?php echo anchor("holder/search", "股东管理");?><span class="divider">/</span>
					</li>
					<li class="active">新增股东</li>
					<li class="pull-right">
						<i class="icon-share-alt"></i> <?php echo anchor("holder/search", "返回");?>
					</li>
				</ul>
			</div>

			<div class="span12">
				<?php echo validation_errors('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>', '</div>'); ?>
				<?php echo form_open('holder/save')?>
					<fieldset>
						<label>股东名称</label>
						<?php echo form_input(array('value'=>set_value('holder_name'),'name'=>'holder_name','class'=>'input-xxlarge','placeholder'=>'请输入股东名称'));?>
						<label></label>
						<?php echo form_submit(array('class'=>'btn', 'value'=>'提交'));?>
					</fieldset>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	<?php require 'a-body-bottom.php';?>
</body>
</html>
