<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div>
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script type="text/javascript"> 

</script> 
<?php if ($this->options->top && in_array('topbtn', $this->options->top)): ?>
<!-- 回到顶部 -->
<script type="text/javascript">
var scrolltotop={
	setting:{
		startline:100, //起始行
		scrollto:0, //滚动到指定位置
		scrollduration:400, //滚动过渡时间
		fadeduration:[500,100] //淡出淡现消失
	},
	controlHTML:'<button class="mdui-fab mdui-ripple mdui-color-theme-accent"><i class="mdui-icon material-icons">arrow_upward</i></button>', //返回顶部按钮
	controlattrs:{offsetx:0,offsety:0},//返回按钮固定位置
	anchorkeyword:"#top",
	state:{
		isvisible:false,
		shouldvisible:false
	},scrollup:function(){
		if(!this.cssfixedsupport){
			this.$control.css({opacity:0});
		}
		var dest=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);
		if(typeof dest=="string"&&jQuery("#"+dest).length==1){
			dest=jQuery("#"+dest).offset().top;
		}else{
			dest=0;
		}
		this.$body.animate({scrollTop:dest},this.setting.scrollduration);
	},keepfixed:function(){
		var $window=jQuery(window);
		var controlx=$window.scrollLeft()+$window.width()-this.$control.width()-this.controlattrs.offsetx;
		var controly=$window.scrollTop()+$window.height()-this.$control.height()-this.controlattrs.offsety;
		this.$control.css({left:controlx+"px",top:controly+"px"});
	},togglecontrol:function(){
		var scrolltop=jQuery(window).scrollTop();
		if(!this.cssfixedsupport){
			this.keepfixed();
		}
		this.state.shouldvisible=(scrolltop>=this.setting.startline)?true:false;
		if(this.state.shouldvisible&&!this.state.isvisible){
			this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]);
			this.state.isvisible=true;
		}else{
			if(this.state.shouldvisible==false&&this.state.isvisible){
				this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]);
				this.state.isvisible=false;
			}
		}
	},init:function(){
		jQuery(document).ready(function($){
			var mainobj=scrolltotop;
			var iebrws=document.all;
			mainobj.cssfixedsupport=!iebrws||iebrws&&document.compatMode=="CSS1Compat"&&window.XMLHttpRequest;
			mainobj.$body=(window.opera)?(document.compatMode=="CSS1Compat"?$("html"):$("body")):$("html,body");
			mainobj.$control=$('<div id="topcontrol" >'+mainobj.controlHTML+"</div>").css({position:mainobj.cssfixedsupport?"fixed":"absolute",bottom:"5em",right:"1em",opacity:0,cursor:"pointer"}).attr({title:"返回顶部"}).click(function(){mainobj.scrollup();return false;}).appendTo("body");if(document.all&&!window.XMLHttpRequest&&mainobj.$control.text()!=""){mainobj.$control.css({width:mainobj.$control.width()});}mainobj.togglecontrol();
			$('a[href="'+mainobj.anchorkeyword+'"]').click(function(){mainobj.scrollup();return false;});
			$(window).bind("scroll resize",function(e){mainobj.togglecontrol();});
		});
	}
};
scrolltotop.init();
</script>
<?php endif; ?>


<?php if ($this->options->others_setting && in_array('origintitile', $this->options->others_setting)): ?>
<script>
(function() {
    var OriginTitile = document.title, titleTime;
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            document.title = '<?php $this->options->sqjd(); ?>';
            clearTimeout(titleTime);
        } else {
            document.title = '<?php $this->options->hfjd(); ?>';
            titleTime = setTimeout(function() {
                document.title = OriginTitile;
            },2000);
        }
    });
})();
</script>
<?php endif; ?>

 <!-- 尾部 -->
 <footer class="mdui-color-grey-800" style="width:100%; color:#FFF;">
  <div class="mdui-container">
   <div class="mdui-row">
    <!-- 大屏幕的情况下显示 -->
    <div class="mdui-col-xs-12 mdui-col-md-4 mdui-hidden-sm-down" style="float:left; margin-top:16px; margin-bottom:16px;">
    <div style="height:8px;"></div>
	 <?php if ($this->options->github): ?>
     <a href="https://github.com/<?php $this->options->github(); ?>" target="_blank"><button class="mdui-btn mdui-btn-icon mdui-ripple" style="margin-right:8px; color:#fff;" mdui-tooltip="{content: 'GitHub'}"><i class="fa fa-github"></i></button></a>
	 <?php endif; ?>
	 <?php if ($this->options->email): ?>
     <a href="mailto:<?php $this->options->email(); ?>" target="_blank"><button class="mdui-btn mdui-btn-icon mdui-ripple" style="color:#fff;" mdui-tooltip="{content: 'EMail'}"><i class="mdui-icon material-icons">email</i></button></a>
	 <?php endif; ?>
	 <?php if ($this->options->twitter): ?>
     <a href="<?php $this->options->twitter(); ?>" target="_blank"><button class="mdui-btn mdui-btn-icon mdui-ripple" style="margin-left:8px; color:#fff;" mdui-tooltip="{content: 'Twitter'}"><i class="fa fa-twitter"></i></button></a>
	 <?php endif; ?>
    </div>
    <!-- 大屏幕的情况下显示 -->
            
    <!-- 小屏幕的情况显示 -->
    <div class="mdui-col-xs-12 mdui-col-md-4 mdui-hidden-md-up" style="text-align:center; margin-top:16px; margin-bottom:16px;">
    <div style="height:8px;"></div>
     <?php if ($this->options->github): ?>
     <a href="https://github.com/<?php $this->options->github(); ?>" target="_blank"><button class="mdui-btn mdui-btn-icon mdui-ripple" style="margin-right:8px; color:#fff;" mdui-tooltip="{content: 'GitHub'}"><i class="fa fa-github"></i></button></a>
	 <?php endif; ?>
	 <?php if ($this->options->email): ?>
     <a href="mailto:<?php $this->options->email(); ?>" target="_blank"><button class="mdui-btn mdui-btn-icon mdui-ripple" style="color:#fff;" mdui-tooltip="{content: 'EMail'}"><i class="mdui-icon material-icons">email</i></button></a>
	 <?php endif; ?>
	 <?php if ($this->options->twitter): ?>
     <a href="<?php $this->options->twitter(); ?>" target="_blank"><button class="mdui-btn mdui-btn-icon mdui-ripple" style="margin-left:8px; color:#fff;" mdui-tooltip="{content: 'Twitter'}"><i class="fa fa-twitter"></i></button></a>
	 <?php endif; ?>
	</div>
    <!-- 小屏幕的情况显示 -->
            
            
    <div class="mdui-col-xs-12 mdui-col-md-4" style="text-align:center; margin-top:16px; margin-bottom:16px;  ">
     <br class="mdui-hidden-sm-down"><strong>Copyright &copy; 2017-<?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>" style="color:#fff;"><?php $this->options->title(); ?></a> All rights reserved.</strong><br class="mdui-hidden-sm-down">
    </div>            
            
    <!-- 大屏幕的情况下显示 -->
    <div class="mdui-col-xs-12 mdui-col-md-4 mdui-hidden-sm-down" style=" text-align:right; margin-top:16px; margin-bottom:16px;">
     Theme <a href="https://github.com/ohmyga233/castle-Typecho-Theme" class="mdui-list-item-content" style="color:#EC407A;" target="_blank">Castle</a> | Author <a href="https://ohmyga.net/castle.html" style="color:#EC407A;" target="_blank">ohmyga</a><br>

	 <?php if ($this->options->miibeian): ?>
     <a href="http://www.miitbeian.gov.cn/" style="color:#fff;" target="_blank"><?php $this->options->miibeian(); ?></a><br>
	 <?php endif; ?>
     Powered By Typecho 
	 </div>
    </div>
    <!-- 大屏幕的情况下显示 -->
            
    <!-- 小屏幕的情况下显示 -->
    <div class="mdui-col-xs-12 mdui-col-md-4 mdui-hidden-md-up" style="text-align:center; margin-top:16px; margin-bottom:16px;">
     Theme <a href="https://github.com/ohmyga233/castle-Typecho-Theme" class="mdui-list-item-content" style="color:#EC407A;" target="_blank">Castle</a> | Author <a href="https://ohmyga.net/castle.html" style="color:#EC407A;" target="_blank">ohmyga</a><br>
	 <?php if ($this->options->miibeian): ?>
     <a href="http://www.miitbeian.gov.cn/" style="color:#fff;" target="_blank"><?php $this->options->miibeian(); ?></a><br>
	 <?php endif; ?>
     Powered By Typecho 
	 </div>
    </div>
    <!-- 小屏幕的情况下显示 -->
            
   </div>
  </div>
 </footer>
 
 <?php $this->footer(); ?>
 </body>
 
</html>