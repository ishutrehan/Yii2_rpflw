<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body style="background: #eaeef3;">
<?php $this->beginBody() ?>
<div id="ui" class="ui ui-aside-none">
<header id="header" class="ui-header">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <!--logo start-->
                                <a href="" class="navbar-brand">
                                    <span class="logo"><!-- <img src="imgs/logo-dark.png" alt=""/> -->
                                        Repflow
                                    </span>
                                </a>
                                <!--logo end-->
                            </div>

                            <div class="search-dropdown dropdown pull-right visible-xs">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-search"></i></button>
                                <div class="dropdown-menu">
                                    <form >
                                        <input class="form-control" placeholder="Search here..." type="text">
                                    </form>
                                </div>
                            </div>

                            <div class="navbar-collapse nav-responsive-disabled">


                                <!--search start-->
                                <form class="search-content hidden-xs" >
                                    <button type="submit" name="search" class="btn srch-btn">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <input type="text" class="form-control" name="keyword" placeholder="Search here...">
                                </form>
                                <!--search end-->

                                <!--notification start-->
                               
                                <!--notification end-->

                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--header end-->
             <!--nav start-->
            <nav class="navbar navbar-inverse yamm navbar-default hori-nav " role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">

                                <!--toggle bar for responsive star-->
                                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#main-navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!--toggle bar for responsive end-->

                            </div>

                            <div class="collapse navbar-collapse" id="main-navigation">

                                <ul class="nav navbar-nav">
                                    <li class="dropdown">
                                        <?= Html::a('Sales', ['rep/index'], ['class' => 'dropdown-toggle']) ?>
                                    </li>
                                    <li class="dropdown mega-dropdown yamm-half">
                                        <?= Html::a('Team', ['rep/team'], ['class' => 'dropdown-toggle']) ?>
                                    </li>
                                    <li class="dropdown mega-dropdown yamm-fw">
                                        <?= Html::a('Settings', ['rep/settings'], ['class' => 'dropdown-toggle']) ?>
                                    </li>
                                  

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!--nav end-->
            <!--main content start-->
            <div id="content" class="ui-content ui-content-aside-overlay">
                <div class="ui-content-body">
                    <div class="container">
                    <div class="wrap">
                    <?= $content ?>
   <!--  <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        // ['label' => 'About', 'url' => ['/site/about']],
        // ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>-->
        
    </div>
</div>
                    
                    </div>
                </div>
            </div>
            <!--main content end-->



<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>     
    </div>
</footer>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
