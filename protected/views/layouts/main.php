<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/buttons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorcodes.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/elements.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/full-layout.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/messages.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mystyle.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/paginate.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/stereomesh.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tabs.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo" class="bol"><img src="" height="42" width="215" /></div>	
		<div id="userinfo" class="eol fontsmall">
			<?php if(!Yii::app()->user->isGuest){
				echo "
					<p class='fontbig bold'>Welcome, ".Yii::app()->user->name."</p>
					<p class='fontsmall'>company name</p>
					<p class='fontsmall'>Main Client: mainClientID + mainClientName</p>
					<p class='fontsmall'>Logged in as ".Yii::app()->user->name." - <a href=".Yii::app()->request->baseUrl."/index.php/site/logout>Logout</a></p>
				";
			} else{
				echo "<p><a href=".Yii::app()->request->baseUrl."/index.php/login>login</a></p>";
			}
			?>
		</div>
		<div class="clear"></div>
	</div><!-- header -->

	<div id="pagecontainer">
		<?php if(!Yii::app()->user->isGuest){
			echo "
				<div id='tabs'>
					<a href='#' class='current-tab inline-block tab'>Manage Assets</a>
					<a href='#' class='inline-block tab'>Bulk Transactions</a>
					<a href='#' class='inline-block tab'>New Upload</a>
					<a href='#' class='inline-block tab'>Settings</a>
					<a href='#' class='inline-block tab'>Notifications</a>
				</div><!-- tabs -->
			";
			}
			?>
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			)); ?><!-- breadcrumbs -->
		<?php endif?>
		<div id="side-bar" class="bol"></div>
		<div id="main-area" class="bol fontsmall">
			<?php echo $content; ?>
		</div><!-- main-area -->
		<div class="clear"></div>
	</div><!-- container -->
	<div id="footer">
		<div id="copyright" class="bol">
			<p>Copyright &copy; <?php echo date('Y'); ?> by My Company.</p>
			<p>All Rights Reserved.</p>
		</div><!-- copyright -->
		<div id="footmenu" class="eol">
			<p class="inline-block"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/index">Home</a></p>
			<p class="inline-block"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/page?view=about">About</a></p>
			<p class="inline-block"><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/contact">Contact</a></p>
		</div><!-- footmenu -->
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
