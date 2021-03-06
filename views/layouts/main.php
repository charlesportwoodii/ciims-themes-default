<?php $cs = Yii::app()->clientScript; ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language; ?>">
	<head>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=no">
	    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<?php $cs->registerMetaTag('text/html; charset=UTF-8', 'Content-Type', 'Content-Type', array(), 'Content-Type')
                 ->registerMetaTag($this->keywords, 'keywords', 'keywords', array(), 'keywords')
                 ->registerMetaTag(strip_tags($this->params['meta']['description']), 'description', 'description', array(), 'description')
                 ->registerCssFile($this->asset . (YII_DEBUG ? '/dist/theme.css' : '/dist/theme.min.css'))
				 ->registerScriptFile($this->asset .(YII_DEBUG ? '/dist/theme.js' : '/dist/theme.min.js'))
				 ->registerScript('load', '$(document).ready(function() { Theme.load(); });', CClientScript::POS_END); ?>
	</head>
	<body>
		<div id="main-container">
			<header id="top-header">
				<div class="logo pull-left">
					<?php echo CHtml::link(CHtml::encode(Cii::getConfig('name')), Yii::app()->getBaseUrl(true)); ?>
				</div>
				<div class="nav-item"></div>
				<nav class="top-navigation pull-right">
					<ul>
						<li><?php echo CHtml::link(Yii::t('themes.default.main', 'Home'), Yii::app()->getBaseUrl(true)); ?></li>
						<li><?php echo CHtml::link(Yii::t('themes.default.main', 'Dashboard'), $this->createUrl('/dashboard')); ?></li>
						<li><?php echo CHtml::link(NULL, $this->createUrl('/search'), array('class' => 'fa fa-search')); ?></li>
					</ul>
				</nav>
				<div class="clearfix"></div>
			</header>
			<main class="pure-g-r">
                <?php foreach (Yii::app()->user->getFlashes() as $key=>$message): ?>
                    <div class="alert alert-<?php echo $key; ?>"><?php echo $message; ?></div>
                <?php endforeach; ?>
				<?php echo $content; ?>
			</main>
			<div class="main-footer-container">
				<footer id="main-footer">
					<div class="copyright pull-left">
						Copyright &copy <?php echo date("Y"); ?> <?php echo CHtml::encode(Cii::getConfig('name')); ?>
					</div>
					<nav class="footer-nav pull-right">
						<ul>
							<li><?php echo CHtml::link(Yii::t('themes.default.main', 'Home'), Yii::app()->getBaseUrl(true)); ?></li>
							<li><?php echo CHtml::link(Yii::t('themes.default.main', 'Dashboard'), $this->createUrl('/dashboard')); ?></li>
						</ul>
					</nav>
					<div class="clearfix"></div>
				</footer>
			</div>
		</div>
	</body>
	<span id="endpoint" data-attr-endpoint="<?php echo Yii::app()->getBaseUrl(true); ?>" style="display:none"></span>
</html>
