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
  <div class="mdui-card-header-title"><font color="#000"><?php $comments->author(); ?></font></div>
  <div class="mdui-card-header-subtitle">Time: <?php $comments->date('Y-m-d H:i'); ?></div>
 </div>
 <br><br><br><br>
 <div class="mdui-card-content mdui-typo" id="comment"><?php $comments->content(); ?>
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
  <div class="mdui-card mdui-color-<?php echo Typecho_Widget::widget('Widget_Options')->accentcolor; ?>" style="border-radius:2px 2px 0px 0px;">
  <br>
   <center>已登陆作为 <a href="<?php $this->options->profileUrl(); ?>" style="color:#fff;"><?php $this->user->screenName(); ?></a> 的身份评论  <strong><a href="<?php $this->options->logoutUrl(); ?>" style="color:#fff;">退出登录</a></strong></center>
  <br>
  </div>
  <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
  <div class="mdui-card" style="border-radius:0px 0px 2px 2px">
  <br>
  <center><h1>评论</h1></center>
   <div class="mdui-textfield mdui-textfield-floating-label" style="width: calc(100% - 60px);">
    &nbsp; &nbsp;<i class="mdui-icon material-icons">textsms</i>
    <label class="mdui-textfield-label">留下你成为大佬的想法吧~</label>
    <textarea class="mdui-textfield-input" name="text" type="text" id="owo-input"><?php $this->remember('text'); ?></textarea>
   </div><?php $comments->smilies(); ?>
   <button type="button" mdui-tooltip="{content: 'OwO表情'}" mdui-menu="{target: '#owo', align: 'right', position: 'top'}" class="mdui-btn mdui-btn-icon mdui-float-right bq"><i class="mdui-icon material-icons">sentiment_very_satisfied</i></button>
   <div class="mdui-menu owo-css" id="owo">
    <div class="mdui-tab mdui-tab-full-width" mdui-tab>
     <a href="#OwO" class="mdui-ripple">OwO</a>
    </div>
    <div id="OwO" class="mdui-p-a-2">
	<a href="javascript:Smilies.grin('Σ( ° △ °|||)︴');"><span class="mdui-btn">Σ( ° △ °|||)︴</span></a>
	<a href="javascript:Smilies.grin('（╯‵□′）╯︵┴─┴');"><span class="mdui-btn">（╯‵□′）╯︵┴─┴</span></a>
	<a href="javascript:Smilies.grin('(｡>∀<｡)');"><span class="mdui-btn">(｡>∀<｡)</span></a>
	<a href="javascript:Smilies.grin('Ｏ(≧▽≦)Ｏ');"><span class="mdui-btn">Ｏ(≧▽≦)Ｏ</span></a>
	<a href="javascript:Smilies.grin('ㄟ( ▔, ▔ )ㄏ');"><span class="mdui-btn">ㄟ( ▔, ▔ )ㄏ</span></a>
	<a href="javascript:Smilies.grin('(ಥ_ಥ) ');"><span class="mdui-btn">(ಥ_ಥ)</span></a>
	<a href="javascript:Smilies.grin('⊙︿⊙');"><span class="mdui-btn">⊙︿⊙</span></a>
	<a href="javascript:Smilies.grin('(⋟﹏⋞)');"><span class="mdui-btn">(⋟﹏⋞)</span></a>
	<a href="javascript:Smilies.grin('（￣▽￣）');"><span class="mdui-btn">（￣▽￣）</span></a>
	<a href="javascript:Smilies.grin('(°∀°)ﾉ');"><span class="mdui-btn">(°∀°)ﾉ</span></a>
	<a href="javascript:Smilies.grin('(￣3￣)');"><span class="mdui-btn">(￣3￣)</span></a>
	<a href="javascript:Smilies.grin('( ´_ゝ｀)');"><span class="mdui-btn">( ´_ゝ｀)</span></a>
	<a href="javascript:Smilies.grin('～(￣▽￣～)');"><span class="mdui-btn">～(￣▽￣～)</span></a>
	<a href="javascript:Smilies.grin('(〜￣△￣)〜');"><span class="mdui-btn">(〜￣△￣)〜</span></a>
	<a href="javascript:Smilies.grin('（/TДT)/');"><span class="mdui-btn">（/TДT)/</span></a>
	<a href="javascript:Smilies.grin('（￣へ￣）');"><span class="mdui-btn">（￣へ￣）</span></a>
	<a href="javascript:Smilies.grin('(￣ε(#￣) Σ');"><span class="mdui-btn">(￣ε(#￣) Σ</span></a>
	<a href="javascript:Smilies.grin('Σ( ￣□￣||)');"><span class="mdui-btn">Σ( ￣□￣||)</span></a>
	<a href="javascript:Smilies.grin('(ﾟДﾟ≡ﾟдﾟ)!?');"><span class="mdui-btn">(ﾟДﾟ≡ﾟдﾟ)!?</span></a>
	<a href="javascript:Smilies.grin('_(:3」∠)_');"><span class="mdui-btn">_(:3」∠)_</span></a>
	</div>
   </div>
   <br>
   <center><?php $comments->cancelReply('<button id="qxhf" class="mdui-btn mdui-ripple"><i class="mdui-icon material-icons">clear</i></button>'); ?><button id="send-pl" class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit"><i class="mdui-icon material-icons">send</i></button></center>
	<br>
  </form>
  </div>
  <?php else: ?>
  <div class="mdui-card">
  <br>
  <center><h1>评论</h1></center>
   <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
   <div class="mdui-textfield mdui-textfield-floating-label" style="width: calc(100% - 60px);">
    &nbsp; &nbsp;<i class="mdui-icon material-icons">textsms</i>
    <label class="mdui-textfield-label">留下你成为大佬的想法吧~</label>
    <textarea class="mdui-textfield-input" name="text" id="owo-input"><?php $this->remember('text'); ?></textarea>
   </div>
   <button type="button" mdui-tooltip="{content: 'OwO表情'}" mdui-menu="{target: '#owo', align: 'right', position: 'top'}" class="mdui-btn mdui-btn-icon mdui-float-right bq"><i class="mdui-icon material-icons">sentiment_very_satisfied</i></button>
   
   <div class="mdui-menu owo-css" id="owo">
    <div class="mdui-tab mdui-tab-full-width" mdui-tab>
     <a href="#OwO" class="mdui-ripple">OwO</a>
    </div>
    <div id="OwO" class="mdui-p-a-2">
	<a href="javascript:Smilies.grin('Σ( ° △ °|||)︴');"><span class="mdui-btn">Σ( ° △ °|||)︴</span></a>
	<a href="javascript:Smilies.grin('（╯‵□′）╯︵┴─┴');"><span class="mdui-btn">（╯‵□′）╯︵┴─┴</span></a>
	<a href="javascript:Smilies.grin('(｡>∀<｡)');"><span class="mdui-btn">(｡>∀<｡)</span></a>
	<a href="javascript:Smilies.grin('Ｏ(≧▽≦)Ｏ');"><span class="mdui-btn">Ｏ(≧▽≦)Ｏ</span></a>
	<a href="javascript:Smilies.grin('ㄟ( ▔, ▔ )ㄏ');"><span class="mdui-btn">ㄟ( ▔, ▔ )ㄏ</span></a>
	<a href="javascript:Smilies.grin('(ಥ_ಥ) ');"><span class="mdui-btn">(ಥ_ಥ)</span></a>
	<a href="javascript:Smilies.grin('⊙︿⊙');"><span class="mdui-btn">⊙︿⊙</span></a>
	<a href="javascript:Smilies.grin('(⋟﹏⋞)');"><span class="mdui-btn">(⋟﹏⋞)</span></a>
	<a href="javascript:Smilies.grin('（￣▽￣）');"><span class="mdui-btn">（￣▽￣）</span></a>
	<a href="javascript:Smilies.grin('(°∀°)ﾉ');"><span class="mdui-btn">(°∀°)ﾉ</span></a>
	<a href="javascript:Smilies.grin('(￣3￣)');"><span class="mdui-btn">(￣3￣)</span></a>
	<a href="javascript:Smilies.grin('( ´_ゝ｀)');"><span class="mdui-btn">( ´_ゝ｀)</span></a>
	<a href="javascript:Smilies.grin('～(￣▽￣～)');"><span class="mdui-btn">～(￣▽￣～)</span></a>
	<a href="javascript:Smilies.grin('(〜￣△￣)〜');"><span class="mdui-btn">(〜￣△￣)〜</span></a>
	<a href="javascript:Smilies.grin('（/TДT)/');"><span class="mdui-btn">（/TДT)/</span></a>
	<a href="javascript:Smilies.grin('（￣へ￣）');"><span class="mdui-btn">（￣へ￣）</span></a>
	<a href="javascript:Smilies.grin('(￣ε(#￣) Σ');"><span class="mdui-btn">(￣ε(#￣) Σ</span></a>
	<a href="javascript:Smilies.grin('Σ( ￣□￣||)');"><span class="mdui-btn">Σ( ￣□￣||)</span></a>
	<a href="javascript:Smilies.grin('(ﾟДﾟ≡ﾟдﾟ)!?');"><span class="mdui-btn">(ﾟДﾟ≡ﾟдﾟ)!?</span></a>
	<a href="javascript:Smilies.grin('_(:3」∠)_');"><span class="mdui-btn">_(:3」∠)_</span></a>
	</div>
   </div>
   
   <div class="mdui-textfield mdui-textfield-floating-label" style="width: calc(100% - 80px);">
    &nbsp; &nbsp;<i class="mdui-icon material-icons">account_circle</i>
    <label class="mdui-textfield-label">昵称</label>
    <input class="mdui-textfield-input" type="text" name="author" value="<?php $this->remember('author'); ?>" required/>
    <div class="mdui-textfield-error">昵称不能为空</div>
   </div>
   
   <div class="mdui-textfield mdui-textfield-floating-label" style="width: calc(100% - 80px);">
    &nbsp; &nbsp;<i class="mdui-icon material-icons">email</i>
    <label class="mdui-textfield-label">Email</label>
    <input class="mdui-textfield-input" type="email" name="mail" value="<?php $this->remember('mail'); ?>" required/>
    <div class="mdui-textfield-error">邮箱格式错误</div>
   </div>
   
   <div class="mdui-textfield mdui-textfield-floating-label" style="width: calc(100% - 80px);">
    &nbsp; &nbsp;<i class="mdui-icon material-icons">language</i>
    <label class="mdui-textfield-label">网址(选填)</label>
    <input class="mdui-textfield-input" type="url" name="url" value="<?php $this->remember('url'); ?>" />
   </div>
    <br>
	<center><?php $comments->cancelReply('<button id="qxhf" class="mdui-btn mdui-ripple"><i class="mdui-icon material-icons">clear</i></button>'); ?><button id="send-pl" class="mdui-btn mdui-color-theme-accent mdui-ripple" type="submit"><i class="mdui-icon material-icons">send</i></button></center>
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
 </div>
 
 <script>
 var inst = new mdui.Tooltip('#qxhf', {
  content: '取消回复'
 });
 var inst = new mdui.Tooltip('#send-pl', {
  content: '发送评论'
 });
</script>

<script type="text/javascript">
Smilies = {
 dom : function(id) {
   return document.getElementById(id);
 },

 showBox : function () {
   this.dom('smiley').style.display = 'block';
   document.onclick = function() {
     Smilies.hideBox();
   }
 },

 hideBox : function () {
   this.dom('smiley').style.display = 'none';
 },

 grin : function (tag) { // 表情
   tag = ' ' + tag + ' '; myField = this.dom('owo-input');
   document.selection ? (myField.focus(), sel = document.selection.createRange(), sel.text = tag, myField.focus()) : this.insertTag(tag);
 },

 insertTag : function (tag) { // 插入评论中
   myField = Smilies.dom('owo-input');
   myField.selectionStart || myField.selectionStart == '0' ? (
     startPos = myField.selectionStart,
     endPos = myField.selectionEnd,
     cursorPos = startPos,
     myField.value = myField.value.substring(0, startPos)
                   + tag
                   + myField.value.substring(endPos, myField.value.length),
     cursorPos += tag.length,
     myField.focus(),
     myField.selectionStart = cursorPos,
     myField.selectionEnd = cursorPos
   ) : (
     myField.value += tag,
     myField.focus()
   );
   this.hideBox();
 }
}
</script>