<?php
use yii\bootstrap\ActiveForm;

use backend\widgets\LanguageTabs;
?>
<?php $form = ActiveForm::begin([
        'id' => 'content',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-error',
        'method' => 'post',
        'action' => ['site/save-translation', 'id'=>$model->id]
    ]);
?>
        <?=
            LanguageTabs::widget([
                'form' => $form,
                'model' => $model,
                'fieldName' => 'translation',
                'translations' => $model->initializeTranslations(),
                'numberOfRows' => 1,
                'showLaguageCodeAsLabel' => true,
            ]);
        ?>
        <?php $model->setLanguage(Yii::$app->params['appMainLanguage']) ?>
        <p><?= Yii::$app->params['supportedLanguages'][Yii::$app->params['appMainLanguage']] ?>: <?=$model->translation?></p>
<?php ActiveForm::end() ?>