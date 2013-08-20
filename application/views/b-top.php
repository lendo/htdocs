<div class="container">
  <div class="row">
    <div class="span12">
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <a data-target=".navbar-responsive-collapse"
              data-toggle="collapse" class="btn btn-navbar"><span
              class="icon-bar"></span><span class="icon-bar"></span><span
              class="icon-bar"></span> </a> <?php echo anchor("#", "易盈投资", "class=brand")?>
              <div class="nav-collapse navbar-responsive-collapse in collapse">
                <ul class="nav">
                  <li class="active">
                  <?php echo anchor("holder/search", "<i class='icon-calendar'></i> 股东")?>
                  </li>
                  <li>
                  <?php echo anchor("#", "<i class='icon-list'></i> 股票")?>
                  </li>
                  <li>
                  <?php echo anchor("#", "<i class='icon-signal'></i> 统计与分析")?>
                  </li>
                </ul>
                <ul class="nav pull-right">
                  <li class="dropdown"><a data-toggle="dropdown"
                    class="dropdown-toggle" href="#">成都瘦人<strong class="caret"></strong>
                  </a>
                    <ul class="dropdown-menu">
                      <li>
                      <?php echo anchor("#", "<i class='icon-wrench'></i> 设置")?>
                      </li>
                      <li class="divider"></li>
                      <li>
                      <?php echo anchor("#", "<i class='icon-off'></i> 注销")?>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
