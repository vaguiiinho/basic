<?php

/* @var $this \yii\web\View */
/* @var $content string */
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
<body>
<?php $this->beginBody() ?>


    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top'
        ]
    ]);

    NavBar::end();
    ?>

    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-3">
				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">														
							<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Contas<span
									class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
                                                                            <?= Html::a('Novo', ['lancamento/create']) ?>
                                                                        </li>
									<li>
                                                                            <?= Html::a('Lista', ['lancamento/index']) ?>
                                                                        </li>
								</ul>
							</li>
							<li><a href="#"><i class="fa fa-location-arrow fa-fw"></i>Categoria<span
									class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><?= Html::a('Novo', ['categoria/create']) ?></li>
									<li><?= Html::a('Lista', ['categoria/index']) ?></li>
								</ul>
							</li>
							<li><a href="#"><i class="fa fa-thumb-tack fa-fw"></i> Tipo<span
									class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><?= Html::a('Novo', ['tipo/create']) ?></li>
									<li><?= Html::a('Lista', ['tipo/index']) ?></li>
								</ul>
							</li>							
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
                <?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []])?>
                <?= Alert::widget() ?>
                <?= $content ?>
       		 </div>
     	 </div>
	</div>
		

<?php $this->endBody() ?>


</body>
</html>
<?php $this->endPage() ?>


