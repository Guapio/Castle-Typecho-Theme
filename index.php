<?php
/**
 * 一个基于MDUI编写的MD风格的Typecho主题<br><a href="https://ohmyga.net/castle.html" title="Castle的使用方法以及介绍" target="_blank">主题简介</a> | <a href="https://ohmyga.net/castle-update-log.html" title="Castle的更新日志" target="_blank">更新日志</a>
 * 
 * @package Castle
 * @author ohmyga
 * @version 1.1.1
 * @link https://ohmyga.net/
 */
 
 if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 $this->need('topping.php');
 
?>
 <style>
 a{
	 color:#fff;
 }
 </style>
 <!-- 内容区 -->
 <div class="mdui-container" id="moe-main">
 <div style="margin-top:20px;"></div>
 <div class="mdui-row">
 <?php //文章循环 ?>
 <?php while($this->next()): ?>
 <div class="mdui-col-md-6 mdui-col-offset-md-3">
  <div class="mdui-card mdui-hoverable index-animation">
   <div class="mdui-card-media">
    <img src="<?php if(!empty($this->fields->wzimg)){ echo ''.$this->fields->wzimg; }else{
		$ll = rand(1,5);
		$this->options->themeUrl("api/pic.php?l=".$ll.""); }?>" class="mdui-img-fluid">
	<div class="mdui-card-media-covered">
     <div class="mdui-card-primary">
     <div class="mdui-card-primary-title"><?php $this->sticky(); $this->title() ?></div>
     <div class="mdui-card-primary-subtitle"><i class="mdui-icon material-icons">local_offer</i> <?php $this->category(','); ?><div class="mdui-float-right"><i class="mdui-icon material-icons">forum</i>评论: <?php $this->commentsNum('%d 条'); ?></div></div>
    </div>
    </div>
   </div>
   <div class="mdui-card-header mdui-float-left">
    <?php if ($this->options->iwa && in_array('authimg', $this->options->iwa)): ?>
	<div class="mdui-card-header-avatar "><?php echo $this->author->gravatar(32);?></div>
	<?php else: ?>
    <img class="mdui-card-header-avatar" src="<?php $this->options->headimg(); ?>"/>
	<?php endif; ?>
    <div class="mdui-card-header-title"><?php $this->author(); ?></div>
    <div class="mdui-card-header-subtitle">Time: <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></div>
   </div>
   <a href="<?php $this->permalink() ?>"><button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent mdui-float-right mdui-btn-icon" style="margin-top:16px; margin-right:20px;"><i class="mdui-icon material-icons">chevron_right</i></button></a>
  </div><br>
 </div>
 <?php endwhile; ?>
 <div class="mdui-col-md-6 mdui-col-offset-md-3">
 <div class="mdui-text-center">
 <?php $this->pageLink('<button class="mdui-btn mdui-btn-icon mdui-color-theme mdui-float-left"><i class="mdui-icon material-icons">arrow_back</i></button>','prev'); ?>
 <button class="mdui-btn" disabled><strong class="<?php
 $style = Typecho_Widget::widget('Widget_Options')->style;
 if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>"><?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?> / <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></strong></button>
 <?php $this->pageLink('<button class="mdui-btn mdui-btn-icon mdui-color-theme mdui-float-right"><i class="mdui-icon material-icons">arrow_forward</i></button>','next'); ?></center>
 </div></div>
 </div>
 <div style="margin-top:10px;"></div>
 </div>
 
 <?php $this->need('footer.php'); ?>
