<?php
/** @var $model Article */

use app\models\Article;

?>


<div>
    <a href="<?php echo yii\helpers\Url::to(['/article/view', 'slug' => $model->slug]) ?>">
        <h1><?= \yii\helpers\Html::encode($model->title) ?></h1>
    </a>
    <div>
        <?php echo \yii\helpers\StringHelper::truncateWords($model->encodedBody(), 10) ?>
    </div>
    <hr>
</div>
