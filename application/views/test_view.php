<html>
  <head>
    <meta charset="UTF-8">
    <title>CI测试</title>
    <base href="<?php echo "$base";?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo "$base$css";?>" />
  </head>
  <body>
    <h1><?php echo "$title";?></h1>
    <p class="test">
      <?php echo "$text";?>
    </p>
    <p class="test">
      <?php
        $this->load->helper('url');
        echo anchor(base_url().'index','内部链接', 'id="target"');
      ?>
    </p>
    <p class="test">
      <?php echo "$menu";?>
    </p>
    <table border="1" style="width:100%">
      <tr>
        <td>ID</td>
        <td>站点地址</td>
        <td>站点名称</td>
        <td>用户名</td>
        <td>密码</td>
      </tr>
      <?php
        foreach ($result as $row) {
          echo '<tr>';
          echo '<td>'.$row->id.'</td>';
          echo '<td>'.$row->site_url.'</td>';
          echo '<td>'.$row->site_name.'</td>';
          echo '<td>'.$row->user_name.'</td>';
          echo '<td>'.$row->pwd.'</td>';
          echo '</tr>';
        }
      ?>
    </table>
  </body>
</html>
