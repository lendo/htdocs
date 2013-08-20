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
          	<i class="icon-chevron-right"></i> <?php echo anchor("holder/search", "股东管理")?><span class="divider">/</span>
          </li>
          <li class="active">股东列表</li>
          <li class="pull-right"><i class="icon-plus"></i> <?php echo anchor("holder/add", "新增")?></li>
        </ul>
      </div>

      <div class="span12">
      	<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>
							产品
						</th>
						<th>
							交付时间
						</th>
						<th>
							状态
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Default
						</td>
					</tr>
					<tr>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Approved
						</td>
					</tr>
					<tr>
						<td>
							TB - Monthly
						</td>
						<td>
							02/04/2012
						</td>
						<td>
							Declined
						</td>
					</tr>
					<tr>
						<td>
							TB - Monthly
						</td>
						<td>
							03/04/2012
						</td>
						<td>
							Pending
						</td>
					</tr>
					<tr>
						<td>
							TB - Monthly
						</td>
						<td>
							04/04/2012
						</td>
						<td>
							Call in to confirm
						</td>
					</tr>
				</tbody>
			</table>
      </div>
    </div>
    <div class="row">
      <div class="span12">
    		<?php echo $pager;?>
    	</div>
    </div>
  </div>
  <?php require 'a-body-bottom.php';?>
</body>
</html>
