<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <meta name="renderer" content="webkit">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="referrer" content="never">
	<link rel="icon" href="<?php $this->options->themeUrl('favicon.png'); ?>">
	<link rel="apple-touch-icon" href="<?php $this->options->themeUrl('favicon.png'); ?>">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <!-- 使用url函数转换相关路径 -->
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('lightgallery/css/lightgallery.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('style1.css?'.date('YmdHi')); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('style.css?'.date('YmdHi')); ?>" />
    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<!-- header class="header">
	<?php if($this->is('post')): ?>
	<a class="header-post-back" href="javascript:history.go(-1);"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></a>
	<?php endif; ?>
	<h1 class="header-title anti-select"><a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->siteUrl(); ?>logo.png"  style="margin-top: -10px;height: 35px"><?php $this->options->title() ?></a></h1>
</header -->

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
			</button>
			<a class="navbar-brand" href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->siteUrl(); ?>logo.png"  style="margin-top: -10px;height: 35px"></a>
		</div>
    	<!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			<!-- pageNav -->
<?php if($this->is('post')): ?>
	<li><a href="javascript:history.go(-1);">返回</a><li>
	<?php endif; ?>
			<li><a href="<?php $this->options->siteUrl(); ?>page/about.html" title="关于">关于</a></li>
						<!-- randomLink -->
						<!-- cateNav -->
										<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">分类<span class="caret"></span></a>
					<ul class="dropdown-menu">
					<?php $this->widget('Widget_Metas_Category_List')->to($cats); ?><?php while ($cats->next()): ?><li><a href="<?php $cats->permalink()?>"><?php $cats->name()?></a></li>
										<?php endwhile; ?>
											</ul>
				</li>
						<!-- diyNav -->
	</ul>
			<!-- search & setting -->
			<!-- float search -->
						<form class="navbar-form navbar-left" id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
				<div class="form-group">
					<label for="s" class="sr-only">搜索关键字</label>
					<input type="text" id="s" name="s" class="form-control input-search" placeholder="输入关键字搜索">
					<button type="submit" class="btn btn-default button-search">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</button>
				</div>
			</form>
						<!-- right search & setting -->
			<ul class="nav navbar-nav navbar-right">
																<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span><span class="space-5"></span>管理<span class="caret"></span></a>
					<ul class="dropdown-menu">
<?php if($this->user->hasLogin()): ?><li class="last"><a href="<?php $this->options->adminUrl(); ?>"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span><span class="space-5"></span><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li><li><a href="<?php $this->options->logoutUrl(); ?>" ><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span><span class="space-5"></span><?php _e('退出'); ?></a></li><?php else: ?><li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span><span class="space-5"></span><?php _e('登录'); ?></a></li><?php endif; ?>
																							<li role="separator" class="divider"></li>
						<li><a href="<?php $this->options->siteUrl(); ?>feed/"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span><span class="space-5"></span>文章 RSS</a></li>
											</ul>
				</li>
							</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>