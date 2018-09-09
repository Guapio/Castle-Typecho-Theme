<?php
 if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
 <!-- 内容区 -->
 <div class="mdui-container" id="moe-main">
 <div style="margin-top:180px;"></div>
 <div class="mdui-text-center">
 <font size="20" class="<?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">404 Not Found</font>
 <br>
 <img src="<?php $this->options->themeUrl('others/images/404.gif'); ?>">
 </div>
 </div>
 
 <div style="margin-top:180px;"></div>
 
 <?php $this->need('footer.php'); ?>