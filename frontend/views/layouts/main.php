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
use common\models\User;

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
                                <form class="search-content hidden-xs" id="ent_srch" action="<?= Url::to(['rep/search']);?>" method="get" >

                                    <input type="hidden" name="r" value="rep/search">
                                    <button type="submit" class="btn srch-btn">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <input type="text" id="srch" class="form-control" name="searchbar" placeholder="Search here..." value="<?php if(isset($_GET['searchbar'])){ echo $_GET['searchbar'];}?>">
                                </form>

                                <!--search end-->

                                <!--notification start-->
                                <?php
                                 $image = Yii::$app->user->identity->image;
                                $first = Yii::$app->user->identity->first_name;

                                $last = Yii::$app->user->identity->last_name;
                                ?>
                               <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown dropdown-usermenu">
                            <a href="#" class=" dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="user-avatar"><img src="uploads/<?= $image ?>" alt="..."></div>
                                <span class="hidden-sm hidden-xs"><?php echo $first." ".$last ?></span>
                                <!-- <i class="fa fa-angle-down"></i> -->
                              <span class="caret hidden-sm hidden-xs"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                <li><a href="#"><i class="fa fa-cogs"></i>  Settings</a></li>
                                <li><a href="#"><i class="fa fa-user"></i>  Profile</a></li>
                                <li><a href="#"><i class="fa fa-commenting-o"></i>  Feedback</a></li>
                                <li><a href="#"><i class="fa fa-life-ring"></i>  Help</a></li>
                                <li class="divider"></li>
                                <li><a href="<?= Url::to(['site/logout'])?>" data-method="post""><i class="fa fa-sign-out"></i> Log Out</a></li>
                            </ul>
                      
                        </li>
                 
                  


                    </ul>
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
