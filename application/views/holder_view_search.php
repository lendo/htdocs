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
  <?php require 'b-top-holder.php';?>

  <div class="container dd-box">
    <div class="row">
      <div class="span12">
        <ul class="breadcrumb">
          <li>
          	<i class="icon-chevron-right"></i> <?php echo anchor("holder/search", "股东管理")?><span class="divider">/</span>
          </li>
          <li class="active">股东列表</li>
          <li class="pull-right"><i class="icon-plus"></i> <?php echo anchor("holder/add/$current", "新增股东信息")?></li>
        </ul>
      </div>

      <div class="span12">
      	<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>
							股东名称
						</th>
						<th style="text-align:center;width:150px;">
							操作
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
		        foreach ($result as $row) {
		          echo '<tr>';
		          echo '<td>'.$row->holder_name.'</td>';
		          echo '<td style="text-align:center;">';
		          echo '<i class="icon-edit"></i> ';
		          echo anchor("holder/edit/$row->id/$current", "修改");
		          echo ' ';
		          echo '<i class="icon-trash"></i> ';
		          echo "<a href='#' onclick='sdelete($row->id);'>删除</a>";
		          echo '</td>';
		          echo '</tr>';
		        }
		      ?>
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
  <script type="text/javascript">
	  function sdelete(id) {
			art.dialog({
	      fixed: true,
	      lock: true,
	      title: '删除提示',
	      width: 400,
	      okValue: '确认',
	      ok: function () {
	      	window.location='<?php echo base_url("holder/delete");?>/' + id + '<?php echo "/$current";?>';
	        return true;
	      },
	      cancelValue: '取消',
	      cancel: function () {
	        return true;
	      },
	      content: "是否确认删除该股东信息？"
	    });
		}
  </script>
</body>
</html>
