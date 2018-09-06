<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
  $commentClass = '';
  if ($comments->authorId) {
    if ($comments->authorId == $comments->ownerId) {
      $commentClass .= ' comment-by-author';
    } else {
      $commentClass .= ' comment-by-user';
    }
  }
  $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
</ol>
<div class="mdui-card" id="<?php $comments->theId(); ?>">
 <div class="mdui-card-header mdui-float-left">
  <div class="mdui-card-header-avatar mdui-img-fluid"><?php $comments->gravatar('40', ''); ?></div>
  <div class="mdui-card-header-title"><?php $comments->author(); ?></div>
  <div class="mdui-card-header-subtitle">Time: <?php $comments->date('Y-m-d H:i'); ?></div>
 </div>
 <br><br><br><br>
 <div class="mdui-card-content mdui-typo"><?php $comments->content(); ?>
  <br>
  <?php $comments->reply('<button class="mdui-btn mdui-ripple mdui-text-color-theme-accent">回复</button>'); ?>
  </div>
  <?php if ($comments->children) { ?>
  <div class="mdui-container" id="moe-main">
    <?php $comments->threadedComments($options); ?>
   </div>
   <br>
   <?php } ?>
</div>
<?php } ?>
<style>
a {
	color: #000;
}
</style>

 <div class="mdui-container" id="moe-main">
  <div style="margin-top:20px;"></div>
  <div class="mdui-row">
  <?php if($this->fields->PageType == "links"){ ?><div class="mdui-col-md-12"><?php }else{ ?><div class="mdui-col-md-6 mdui-col-offset-md-3"><?php } ?>
    <?php $this->comments()->to($comments); ?>
  <div id="<?php $this->respondId(); ?>">
  <?php if($this->allow('comment')): ?>
  <?php if($this->user->hasLogin()): ?>
  <div class="mdui-card mdui-color-<?php echo Typecho_Widget::widget('Widget_Options')->accentcolor; ?>" style="border-radius:2px 2px 0px 0px">
  <br>
   <center>已登陆作为 <a href="<?php $this->options->profileUrl(); ?>" style="color:#fff;"><?php $this->user->screenName(); ?></a> 的身份评论  <strong><a href="<?php $this->options->logoutUrl(); ?>" style="color:#fff;">退出登录</a></strong></center>
  <br>
  </div>
  <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
  <div class="mdui-card" style="border-radius:0px 0px 2px 2px">
  <br>
  <center><h1>评论</h1></center>
   <div class="mdui-textfield mdui-textfield-floating-label">
    &nbsp; &nbsp;<i class="mdui-icon material-icons">textsms</i>
    <label class="mdui-textfield-label">留下你成为大佬的想法吧~</label>
    <textarea class="mdui-textfield-input" style="width:80%;" name="text" type="text"><?php $this->remember('text'); ?></textarea>
   </div>
   <br>
   <center><?php $comments->cancelReply('<button class="mdui-btn mdui-ripple"><i class="mdui-icon material-icons">clear</i></button>'); ?><button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit"><i class="mdui-icon material-icons">send</i></button></center>
	<br>
  </form>
  </div>
  <?php else: ?>
  <div class="mdui-card">
  <br>
  <center><h1>评论</h1></center>
   <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
   <div class="mdui-textfield mdui-textfield-floating-label">
    &nbsp; &nbsp;<i class="mdui-icon material-icons">textsms</i>
    <label class="mdui-textfield-label">留下你成为大佬的想法吧~</label>
    <textarea class="mdui-textfield-input" style="width:80%;" name="text"><?php $this->remember('text'); ?></textarea>
   </div>
   
   <div class="mdui-textfield mdui-textfield-floating-label">
    &nbsp; &nbsp;<i class="mdui-icon material-icons">account_circle</i>
    <label class="mdui-textfield-label">昵称</label>
    <input class="mdui-textfield-input" type="text" style="width:75%;" name="author" value="<?php $this->remember('author'); ?>" required/>
    <div class="mdui-textfield-error">昵称不能为空</div>
   </div>
   
   <div class="mdui-textfield mdui-textfield-floating-label">
    &nbsp; &nbsp;<i class="mdui-icon material-icons">email</i>
    <label class="mdui-textfield-label">Email</label>
    <input class="mdui-textfield-input" type="email" style="width:75%;" name="mail" value="<?php $this->remember('mail'); ?>" required/>
    <div class="mdui-textfield-error">邮箱格式错误</div>
   </div>
   
   <div class="mdui-textfield mdui-textfield-floating-label">
    &nbsp; &nbsp;<i class="mdui-icon material-icons">language</i>
    <label class="mdui-textfield-label">网址(选填)</label>
    <input class="mdui-textfield-input" type="url" style="width:75%;" name="url" value="<?php $this->remember('url'); ?>" />
   </div>
    <br>
	<center><?php $comments->cancelReply('<button class="mdui-btn mdui-ripple"><i class="mdui-icon material-icons">clear</i></button>'); ?><button class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit"><i class="mdui-icon material-icons">send</i></button></center>
    <br>
   </form>
	<br><br>
  </div><br>
  <?php endif; ?>
  
 <?php else: ?>
 <div class="mdui-card mdui-color-red">
  <br>
   <center><i class="mdui-icon material-icons">speaker_notes_off</i>&nbsp;&nbsp;&nbsp;<strong>评论已经关闭！</strong></center>
  <br>
  </div><br>
  <?php endif; ?>
  </div>
   <div class="mdui-chip">
    <span class="mdui-chip-icon"><i class="mdui-icon material-icons">message</i></span>
    <span class="mdui-chip-title"><?php $this->commentsNum(_t('没有评论惹=_='), _t('只有 1 条评论QwQ'), _t('已有 %d 条评论QwQ')); ?></span>
   </div>
   

   <?php if ($comments->have()): ?>
    <?php $comments->listComments(); ?>
   <?php endif; ?>
    </div>
  </div>
 </div>