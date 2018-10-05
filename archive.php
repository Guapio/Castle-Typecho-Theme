<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $style = Typecho_Widget::widget('Widget_Options')->style; ?>


<style>
a{
	color:#fff;
}
</style>
 <!-- 内容区 -->
 <div class="mdui-container" id="moe-main">
  <div style="margin-top:20px;"></div>
  <div class="mdui-row">
  <div class="mdui-col-md-8 mdui-col-offset-md-2">
   <div class="mdui-typo">
    <h2 class="<?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?>
	</h2>
   </div>
   </div>
   
  <?php if ($this->have()): ?>
  <?php while($this->next()): ?>
  <div class="mdui-col-md-6 mdui-col-offset-md-3">
  <div class="mdui-card mdui-hoverable">
   <div class="mdui-card-media moe-wzimg" data-original="<?php $wzimg = $this->fields->wzimg;
	 if(!empty($wzimg)){
	     echo ''.$this->fields->wzimg; 
	 }else{
	 	$ll = rand(1,5);
	 	$this->options->themeUrl("api/pic.php?l=".$ll."");} ?>" style="background-image: url('<?php $wzimg = $this->fields->wzimg;
	 if(!empty($wzimg)){
	     echo ''.$this->fields->wzimg; 
	 }else{
	 	$ll = rand(1,5);
	 	$this->options->themeUrl("api/pic.php?l=".$ll."");} ?>');">
    <div class="mdui-card-media-covered">
     <div class="mdui-card-primary">
      <div class="mdui-card-primary-title">
	   <a class="mdui-text-color-white-text" href="<?php $this->permalink() ?>" title="点击标题继续阅读 《<?php $this->title() ?>》" style="text-decoration:none;"><?php $this->sticky(); $this->title() ?></a>
      </div>
	  <div class="mdui-card-primary-subtitle"><i class="mdui-icon material-icons">local_offer</i> <span class="tages-style"><?php $this->category(','); ?></span><div class="mdui-float-right"><i class="mdui-icon material-icons">forum</i>评论: <?php $this->commentsNum('%d 条'); ?></div></div>
     </div>
    </div>
   </div>
   <div class="mdui-card-header mdui-float-left">
    <?php if ($this->options->iwa && in_array('authimg', $this->options->iwa)): ?>
	<div class="mdui-card-header-avatar mdui-hoverable headimg-xz"><?php echo $this->author->gravatar(640);?></div>
	<?php else: ?>
    <img class="mdui-card-header-avatar" src="<?php $this->options->headimg(); ?>"/>
	<?php endif; ?>
    <div class="mdui-card-header-title"><?php $this->author(); ?></div>
    <div class="mdui-card-header-subtitle">Time: <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></div>
   </div>
   <a href="<?php $this->permalink() ?>"><button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent mdui-float-right mdui-btn-icon" style="margin-top:16px; margin-right:20px;"><i class="mdui-icon material-icons">chevron_right</i></button></a>
   </div><br></div>
  <?php endwhile; ?>
 <br><br><br>
 <center class="mdui-col-md-6 mdui-col-offset-md-3"><?php $this->pageLink('<button class="mdui-btn mdui-btn-icon mdui-color-theme mdui-float-left"><i class="mdui-icon material-icons">arrow_back</i></button>','prev'); ?>
 <button class="mdui-btn" disabled><strong class="<?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>"><?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?> / <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?></strong></button>
 <?php $this->pageLink('<button class="mdui-btn mdui-btn-icon mdui-color-theme mdui-float-right"><i class="mdui-icon material-icons">arrow_forward</i></button>','next'); ?></center>
 </div></div>
  <?php else: ?>
  <br>
  <div class="mdui-col-md-8 mdui-col-offset-md-2">
  <div class="mdui-card mdui-color-red mdui-hoverable"><div class="mdui-card-content">没有找到相关内容！</div></div></div>
  <?php if ($this->options->iwa && in_array('searchno', $this->options->iwa)): ?>
  <div class="mdui-col-md-8 mdui-col-offset-md-2"><br><br><strong class="<?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">试着搜索一下？</strong><br>
  <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
  <div class="mdui-textfield mdui-textfield-floating-label">
   <label class="mdui-textfield-label">输入你想搜索的内容并回车</label>
   <input class="mdui-textfield-input" type="text" name="s"/>
  </div>
   </form>
  </div>
  <?php endif; ?>
  
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><div class="mdui-hidden-sm-down"><br><br><br><br><br><br><br><br><br><br><br><br></div>
  <?php endif; ?>
  
  </div>
  <div style="margin-top:10px;"></div>
  </div>
  
  <?php $this->need('footer.php'); ?>
