<?php $this->need('header.php'); ?>	
<!-- 内容区 -->
<?php if($this->fields->PageType == "links"){ ?>
 <div class="mdui-container" id="moe-main">
  <?php $this->content(); ?>
 </div>
<?php }else{ ?>
 <div class="mdui-container" id="moe-main">
 <div style="margin-top:20px;"></div>
 <div class="mdui-col-md-6 mdui-col-offset-md-3">
 <div class="mdui-row">
  <div class="mdui-card">
   <div class="mdui-card-header mdui-float-left">
    <?php if ($this->options->iwa && in_array('authimg', $this->options->iwa)): ?>
	<div class="mdui-card-header-avatar mdui-hoverable headimg-xz"><?php echo $this->author->gravatar(640);?></div>
	<?php else: ?>
    <img class="mdui-card-header-avatar" src="<?php $this->options->headimg(); ?>"/>
	<?php endif; ?>
    <div class="mdui-card-header-title"><?php $this->author(); ?></div>
    <div class="mdui-card-header-subtitle">Time: <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></div>
   </div>
   <br><br><br>
   <div class="mdui-typo">
    <hr/>
   </div>
  <div class="mdui-card-content mdui-typo">
  <div style="margin-top:-20px;"></div>
   <?php $this->content(); ?>
  </div>
 </div>
 </div>
 </div>
 </div>
<?php } ?>
<?php $this->need('comments.php'); ?>
<br>
<?php $this->need('footer.php'); ?>