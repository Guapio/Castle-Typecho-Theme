<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$style = Typecho_Widget::widget('Widget_Options')->style;
?>
<html>
 <head>
  <meta http-equiv="content-type" content="text/html"; charset="utf-8" />
  <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
 
  <?php if ($this->options->headimg): ?>
  <!-- 浏览器小图标 -->
  <link rel="shortcut icon" href="<?php $this->options->headimg(); ?>">
  <?php endif; ?>
 
  <!-- CSS -->
  <!-- MDUI CSS -->
  <link rel="stylesheet" href="<?php $this->options->themeUrl('others/mdui/css/mdui.min.css'); ?>">
  <!-- 主题CSS -->
  <link rel="stylesheet" href="<?php $this->options->themeUrl('others/css/style.css'); ?>">
<?php if ($style == "bg_style"){ ?>
  <link rel="stylesheet" href="<?php $this->options->themeUrl('others/css/transparent.css'); ?>">
<?php }elseif ($style == "default_style"){} ?>
<?php if ($this->options->others_setting && in_array('mouse', $this->options->others_setting)): ?>
  <!-- 鼠标指针CSS -->
  <link rel="stylesheet" href="<?php $this->options->themeUrl('others/css/mouse.css'); ?>">
<?php endif; ?>
  <!-- Font Awesome -->
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 
 
  <!-- JS -->
  <!-- MDUI JS -->
  <script src="<?php $this->options->themeUrl('others/mdui/js/mdui.min.js'); ?>"></script>
 
  <!-- 自适应移动端 -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- Typecho其他head信息 -->
  <?php $this->header(); ?>
  
<?php if ($style == "bg_style"){ ?>
  <!-- bg_style -->
  <style>
  body{ 
    background-image: url(<?php if ($this->options->bgimg){ $this->options->bgimg(); }else{ $this->options->themeUrl("others/images/bg.jpg"); }?>); 
  }
  </style>
<?php }elseif ($style == "default_style"){ }?>
  <!--[if IE]>
   <script type="text/javascript">
    if (!!window.ActiveXObject || "ActiveXObject" in window) {
     alert('请抛弃万恶的IE浏览器吧！请更换浏览器访问本博客呢……');
    }
   </script>
  <![endif]-->
 </head>
 
 <body class="mdui-theme-primary-<?php echo Typecho_Widget::widget('Widget_Options')->themecolor; ?> mdui-theme-accent-<?php echo Typecho_Widget::widget('Widget_Options')->accentcolor; ?> mdui-appbar-with-toolbar" <?php if ($style == "bg_style"){}elseif ($style == "default_style"){?>style="background: #F5F5F5;"<?php } ?>>
  <!-- 头部 -->
  <header class="<?php if ($style == "bg_style"){ ?>mdui-appbar mdui-shadow-0 mdui-appbar-fixed mdui-headroom mdui-headroom-pinned-top mcname-header<?php }elseif ($style == "default_style"){?>mdui-appbar mdui-appbar-fixed mdui-headroom<?php } ?>">
   <div class="<?php if ($style == "bg_style"){ ?>mdui-toolbar mdui-appbar-scroll-hide<?php }elseif ($style == "default_style"){?>mdui-toolbar mdui-color-theme<?php } ?>">
    <span class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#menu', swipe: true}"><i class="mdui-icon material-icons <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">menu</i></span>
    <a href="<?php $this->options->siteUrl(); ?>" class="mdui-typo-title <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>" style="text-shadow:1px 1px 0px #616161;"><strong><?php $this->options->title() ?></strong></a>
    <div class="mdui-toolbar-spacer"></div>
	<?php if ($this->options->tools && in_array('searchbtnp', $this->options->tools)): ?>
	<div class="mdui-hidden-xs-down">
	 <div class="mdui-textfield mdui-textfield-expandable mdui-float-right" style="margin-top:18px;">
      <button class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">search</i></button>
	  <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
      <input class="mdui-textfield-input <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>" type="text" name="s" placeholder="输入你想搜索的内容并回车"/>
	  </form>
      <button class="mdui-textfield-close mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">close</i></button>
     </div>
	</div>
	<?php endif; ?>
	<div class="mdui-hidden-sm-up">
	 <?php if ($this->options->tools && in_array('searchbtnm', $this->options->tools)): ?>
	 <span class="mdui-btn mdui-btn-icon" mdui-dialog="{target: '#search-ck'}"><i class="mdui-icon material-icons <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">search</i></span>
	 <?php endif; ?>
	</div>
	<?php if ($this->options->tools && in_array('showlogin', $this->options->tools)): ?>
	<span class="mdui-btn mdui-btn-icon <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>" mdui-menu="{target: '#admin-menu', covered: 'true'}"><i class="mdui-icon material-icons">account_circle</i></span>
	<!-- Admin弹出窗口 -->
	<ul class="mdui-menu mdui-list" id="admin-menu">
	<?php if($this->user->hasLogin()): ?>
	 <li class="mdui-list-item mdui-ripple">
	 <div class="mdui-list-item"><?php if ($this->options->iwa && in_array('authimg', $this->options->iwa)): ?><?php echo $this->author->gravatar(640);?><?php else: ?><img src="<?php $this->options->headimg(); ?>"/><?php endif; ?></div>
     <a href="<?php $this->options->profileUrl(); ?>"><strong>HI,<?php $this->user->screenName(); ?>!</strong></a>
     </li>
	 
     <li class="mdui-list-item mdui-ripple">
	 <i class="mdui-list-item mdui-icon material-icons">account_circle</i>
     <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin">进入后台</a>
     </li>
	 
     <li class="mdui-list-item mdui-ripple">
	 <i class="mdui-list-item mdui-icon material-icons">keyboard_tab</i>
     <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.php/action/logout">注销登陆</a>
     </li>
	 
	 <?php else: ?>
	 <li class="mdui-list-item mdui-ripple">
	 <i class="mdui-list-item mdui-icon material-icons">account_circle</i>
     <a><strong>HI!</strong></a>
     </li>
     
	 <li class="mdui-list-item mdui-ripple">
	 <i class="mdui-list-item mdui-icon material-icons">lock</i>
     <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin/login.php">登陆</a>
     </li>
	 
	 <?php endif; ?>
    </ul>
	<?php endif; ?>
   </div>
  </header>
  
  <?php if ($this->options->tools && in_array('searchbtnm', $this->options->tools)): ?>
  <!-- 搜索框 -->
  <div class="mdui-dialog" id="search-ck">
   <div class="mdui-dialog-content">
    <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
     <div class="mdui-textfield mdui-textfield-floating-label">
      <i class="mdui-icon material-icons">search</i>
      <label class="mdui-textfield-label">输入你想搜索的内容并回车</label>
	  <input class="mdui-textfield-input" name="s"></input>
     </div>
	</form>
   </div>
   <div class="mdui-dialog-actions">
    <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>关闭</button>
   </div>
  </div>
  <?php endif; ?>
  

  <!-- 侧边抽屉 -->
 <div class="mdui-shadow-3 mdui-drawer <?php if ($this->options->menu && in_array('closemenu', $this->options->menu)): ?>mdui-drawer-close<?php endif; ?>" id="menu">
 <?php if ($style == "bg_style"){ ?>
 <?php }elseif ($style == "default_style"){?>
 <?php if ($this->options->headbg): ?>
 <div class="moe-menu-img" data-original="<?php $this->options->headbg(); ?>" style="height:200px;background: url(<?php $this->options->headbg(); ?>);background-size:auto 200px;">
 <?php else: ?>
 <div class="moe-menu-img" data-original="<?php $this->options->themeUrl('others/images/headbg.jpg');?>" style="height:200px;background: url(<?php $this->options->themeUrl('others/images/headbg.jpg'); ?>);background-size:auto 200px;">
 <?php endif; ?>
 <?php if ($this->options->headimg): ?><div class="moe-logo mdui-shadow-3" style="background-image:url(<?php $this->options->headimg(); ?>"></div><?php endif; ?>
 <div class="moe-username"><strong>
 <?php $this->options->title() ?>            <br></strong><strong>
 <span class="moe-info"><?php $this->options->description() ?></span></strong>
 </div>
 </div>
 <?php } ?>
  <ul class="mdui-list" mdui-collapse="{accordion: true}">
  <li class="mdui-list-item mdui-ripple">
   <i class="mdui-list-item-icon mdui-icon material-icons <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">home</i>
   <a href="<?php $this->options->siteUrl(); ?>" class="mdui-list-item-content <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">首页</a>
  </li>

  <?php if ($this->options->menu && in_array('showarchives', $this->options->menu)): ?>
  <li class="mdui-collapse-item">
  <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
   <i class="mdui-list-item-icon mdui-icon material-icons <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">access_time</i>
   <div class="mdui-list-item-content <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">归档</div>
   <i class="mdui-collapse-item-arrow mdui-icon material-icons <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">keyboard_arrow_down</i>
  </div>
  <ul class="mdui-collapse-item-body mdui-list mdui-list-dense <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">
   <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<a href="{permalink}" class="mdui-list-item mdui-ripple">{date}</a>'); ?>
  </ul>
  </li>
  <?php endif; ?>
 
  <?php if ($this->options->menu && in_array('showcategory', $this->options->menu)): ?>
  <li class="mdui-collapse-item">
  <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
   <i class="mdui-list-item-icon mdui-icon material-icons <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">view_list</i>
   <div class="mdui-list-item-content <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">分类</div>
   <i class="mdui-collapse-item-arrow mdui-icon material-icons <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">keyboard_arrow_down</i>
  </div>
  <ul class="mdui-collapse-item-body mdui-list mdui-list-dense <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">
  <?php $this->widget('Widget_Metas_Category_List')->parse('<a href="{permalink}" class="mdui-list-item mdui-ripple">{name} &nbsp; <span style="background:#66BB6A; color:#FFF; line-heigh:40px; text-align:center; font-size:10px; border-radius:100px; padding-top:3px; padding-bottom:2px; padding-left:7px; padding-right:7px;">{count}</span></a>'); ?>
  </ul>
  </li>
  <?php endif; ?>

  <?php if ($this->options->menu && in_array('showpage', $this->options->menu)): ?>
  <li class="mdui-collapse-item">
  <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
   <i class="mdui-list-item-icon mdui-icon material-icons <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">view_carousel</i>
   <div class="mdui-list-item-content <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">页面</div>
   <i class="mdui-collapse-item-arrow mdui-icon material-icons <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">keyboard_arrow_down</i>
  </div>
  <ul class="mdui-collapse-item-body mdui-list mdui-list-dense <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">
  <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
  <?php while($pages->next()): ?>
  <?php if($this->is('page', $pages->slug)): ?><?php endif; ?>
   <a class="mdui-list-item mdui-ripple" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
  <?php endwhile; ?>
  </ul>
  </li>
  <?php endif; ?>
  
  <?php if ($this->options->menu && in_array('showthemename', $this->options->menu)): ?>
  <div class="mdui-divider"></div>
 
  <li class="mdui-list-item mdui-ripple">
   <i class="mdui-list-item-icon mdui-icon material-icons <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>">info</i>
   <a href="https://ohmyga.net/castle.html" class="mdui-list-item-content <?php if ($style == "bg_style"){ ?>mdui-text-color-<?php echo Typecho_Widget::widget('Widget_Options')->icon_color; ?><?php }elseif ($style == "default_style"){}?>" target="_blank">主题 Castle</a>
  </li>
  <?php endif; ?>
  
  </ul>
 </div>
 </div>

 <div id="body">