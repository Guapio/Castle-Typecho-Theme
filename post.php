<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php $style = Typecho_Widget::widget('Widget_Options')->style; ?>

<!-- 内容区 -->
 <div class="mdui-container" id="moe-main">
 <div style="margin-top:20px;"></div>
 <div class="mdui-row">
 <div class="mdui-col-md-6 mdui-col-offset-md-3">
  <div class="mdui-card">
   <div class="mdui-card-media">
    <img src="<?php if(!empty($this->fields->wzimg)){ echo ''.$this->fields->wzimg; }else{
		$ll = rand(1,5);
		$this->options->themeUrl("api/pic.php?l=".$ll.""); }?>" class="mdui-img-fluid">
	<div class="mdui-card-media-covered">
     <div class="mdui-card-primary">
     <div class="mdui-card-primary-title"><?php $this->title() ?></div>
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
   <?php if ($this->options->iwa && in_array('flbq', $this->options->iwa)): ?> <?php else: ?>
   <span mdui-menu="{target: '#tab', align: 'right', position: 'top'}" mdui-tooltip="{content: '分类'}" class="mdui-btn mdui-ripple mdui-btn-icon mdui-float-right" style="margin-top:20px; margin-right:10px;"><i class="mdui-icon material-icons mdui-text-color-grey-600">local_offer</i></span>
    
	<!-- Tab 菜单 -->
    <ul class="mdui-menu" id="tab">
	<?php $this->widget('Widget_Metas_Category_List')->parse('<a href="{permalink}" class="mdui-list-item mdui-ripple" style="color:#000;"><strong>{name}</strong></a>'); ?>
	</ul>
	<?php endif; ?>
  <span mdui-menu="{target: '#share', align: 'right', position: 'top'}" mdui-tooltip="{content: '分享'}" class="mdui-btn mdui-ripple mdui-btn-icon mdui-float-right" style="margin-top:20px; margin-right:10px;"><i class="mdui-icon material-icons mdui-text-color-grey-600">share</i></span>
	
	<!-- Share 菜单 -->
    <ul class="mdui-menu" id="share">
    <li class="mdui-menu-item">
      <a href="http://connect.qq.com/widget/shareqq/index.html?site=<?php $this->options->title() ?>&amp;title=<?php $this->title() ?>&amp;summary=<?php $this->title() ?> &amp;pics=<?php if(isset($this->fields->img)){echo ' '.$this->fields->img;}else{$this->options->themeUrl('others/images/bg.jpg');}?>&amp;url=<?php $this->permalink() ?>" target="_blank" class="mdui-ripple">
        <strong>分享到 QQ</strong>
      </a>
    </li>
    <li class="mdui-menu-item">
      <a href="javascript:void((function(s,d,e,r,l,p,t,z,c) {var%20f='http://v.t.sina.com.cn/share/share.php?appkey=962772401',u=z||d.location,p=['&url=',e(u),'& title=',e(t||d.title),'&source=',e(r),'&sourceUrl=',e(l),'& content=',c||'gb2312','&pic=',e(p||'')].join('');function%20a() {if(!window.open([f,p].join(''),'mb', ['toolbar=0,status=0,resizable=1,width=600,height=500,left=',(s.width- 600)/2,',top=',(s.height-600)/2].join('')))u.href=[f,p].join('');}; if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();}) (screen,document,encodeURIComponent,'','','<?php $this->permalink() ?>','<?php $this->options->title() ?> - <?php $this->title() ?>','','utf-8'));" class="mdui-ripple">
        <strong>分享到 微博</strong>
      </a>
    </li>
    <li class="mdui-menu-item">
      <a href="http://www.facebook.com/sharer/sharer.php?u=<?php $this->permalink() ?>" target="_blank" class="mdui-ripple">
        <strong>分享到 FaceBook</strong>
      </a>
    </li>
    <li class="mdui-menu-item">
      <a href="https://twitter.com/intent/tweet?text=<?php $this->title() ?>;url=<?php $this->permalink() ?>;via=<?php $this->author(); ?>" target="_blank" class="mdui-ripple">
        <strong>分享到 Twitter</strong>
      </a>
    </li>
  </ul>
  
   <br><br><br><br>
   <div class="mdui-typo">
    <hr/>
   </div>
  <div class="mdui-card-content mdui-typo">
  <div style="margin-top:-20px;"></div>
   <?php $this->content(); ?>
   <?php if ($this->options->iwa && in_array('appreciates', $this->options->iwa)): ?>
   <br><br>
   <center><button class="mdui-btn mdui-color-theme-accent mdui-btn-raised mdui-ripple" style="border-radius:100px;" mdui-dialog="{target: '#appreciates-QR-Code'}" mdui-tooltip="{content: '打赏作者'}"><i class="mdui-icon material-icons">favorite</i></button></center>
   <?php endif; ?>
  </div>
  </div>
  </div>
  </div>
 </div>
 
 <?php if ($this->options->iwa && in_array('appreciates', $this->options->iwa)): ?>
 <!-- 打赏二维码对话框 -->
 <div class="mdui-dialog" id="appreciates-QR-Code">
  <div class="mdui-tab mdui-color-theme mdui-tab-full-width" mdui-tab>
  <?php if ($this->options->wxqr): ?>
   <a href="#wechatpay" class="mdui-ripple mdui-ripple-white">
    <label>微信二维码</label>
   </a>
  <?php endif; ?>
  <?php if ($this->options->aliqr): ?>
   <a href="#alipay" class="mdui-ripple mdui-ripple-white">
    <label>支付宝二维码</label>
   </a>
   <?php endif; ?>
   <?php if ($this->options->qqqr): ?>
   <a href="#qqpay" class="mdui-ripple mdui-ripple-white">
    <label>QQ二维码</label>
   </a>
   <?php endif; ?>
  </div>
  <div class="mdui-dialog-content">
  <?php if ($this->options->wxqr): ?>
  <div id="wechatpay" class="mdui-p-a-2" style="heiht:100%">
   <center><img src="<?php $this->options->wxqr(); ?>" class="mdui-img-fluid"></center>
   <br>
   <center><button class="mdui-btn mdui-ripple mdui-color-theme" mdui-dialog-confirm>关闭</button></center><br>
  </div>
  <?php endif; ?>
	 
  <?php if ($this->options->aliqr): ?>
  <div id="alipay" class="mdui-p-a-2">
   <center><img src="<?php $this->options->aliqr(); ?>" class="mdui-img-fluid"></center>
   <br>
   <center><button class="mdui-btn mdui-ripple mdui-color-theme" mdui-dialog-confirm>关闭</button></center><br>
  </div>
  <?php endif; ?>
  
  <?php if ($this->options->qqqr): ?>
  <div id="qqpay" class="mdui-p-a-2">
   <center><img src="<?php $this->options->qqqr(); ?>" class="mdui-img-fluid"></center>
   <br>
   <center><button class="mdui-btn mdui-ripple mdui-color-theme" mdui-dialog-confirm>关闭</button></center><br>
  </div>
  <?php endif; ?>
 </div></div>
 <?php endif; ?>
 

 <?php $this->need('comments.php'); ?>

<br>
 <div class="<?php if ($style == "bg_style"){}elseif ($style == "default_style"){ ?>mdui-color-<?php echo Typecho_Widget::widget('Widget_Options')->themecolor; ?><?php } ?>" style="padding-top:25px; padding-bottom:25px; width:100%; background-color:rgba(0, 0, 0, 0.6);">
  <div class="mdui-container">
   <div class="mdui-row">
   <div class="mdui-col-md-6 mdui-float-left mdui-hidden-md-up text-color">
     <span style="color:#E0E0E0;"><i class="mdui-icon material-icons" style="margin-top:-2.5px;">arrow_back</i> 上一篇</span>
     <br><span style="font-size:18px"><strong class="mdui-text-color-white"><?php $this->thePrev("<div class='mdui-text-truncate' style='max-width: 130px;'>%s</div>","没有了"); ?></strong></span>
    </div>
    <div class="mdui-col-md-6 mdui-float-left mdui-hidden-sm-down text-color">
     <span style="color:#E0E0E0;"><i class="mdui-icon material-icons" style="margin-top:-2.5px;">arrow_back</i> 上一篇</span>
     <br><span style="font-size:18px"><strong class="mdui-text-color-white"><?php $this->thePrev('%s','没有了'); ?></strong></span>
    </div>
    <div class="mdui-col-md-6 mdui-float-right mdui-hidden-sm-down text-color" style="text-align:right">
     <span style="color:#E0E0E0;">下一篇 <i class="mdui-icon material-icons" style="margin-top:-2.5px;">arrow_forward</i></span>
     <br><span style="font-size:18px"><strong class="test-color mdui-text-color-white"><?php $this->theNext('%s','没有了'); ?></strong></span>
    </div>
    <div class="mdui-col-md-6 mdui-float-right mdui-hidden-md-up text-color" style="text-align:left">
     <span style="color:#E0E0E0;">下一篇 <i class="mdui-icon material-icons" style="margin-top:-2.5px;">arrow_forward</i></span>
     <br><span style="font-size:18px"><strong class="mdui-text-color-white"><?php $this->theNext("<div class='mdui-text-truncate' style='max-width: 130px;'>%s</div>",'没有了'); ?></strong></span>
    </div>    
   </div>
  </div>
 </div>


 <?php $this->need('footer.php'); ?>