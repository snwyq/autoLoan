//得到配置 列表


<?= $form->field($model, 'loan_period_id')->dropDownList(Yii::$app->config->get('LOAN_PERIRD_LIST')) ?>
<?= $form->field($model, 'pay_type_id')->dropDownList(Yii::$app->config->get('LOAN_REPAY_TYPE')) ?>



<?= $form->field($model, 'area_id')->label('提报城市')->widget(\common\modules\city\widgets\CityWidget::className(), [
    'provinceAttribute' => 'province_id',
    'cityAttribute' => 'city_id',
    'areaAttribute' => 'area_id'
]) ?>

//得到车型信息


[
'attribute' => 'car_model_id',
'value' => function ($model) {
return \common\models\AutoBrand::getBrand()[$model->car_brand_id] .
\common\models\AutoSeries::getAutoSeries()[$model->car_series_id] .
\common\models\AutoModel::getAutoModel()[$model->car_model_id];
}
],

<?= $form->field($model, 'check_time')->widget(
    \kartik\date\DatePicker::className(),
    [
        'name' => 'check_time',
        'options' => [
            'value' => !empty($model->check_time) ? date('Y-m-d', $model->check_time) : date('Y-m-d', time()),
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,]
    ]
) ?>


<?php

            [
                'attribute' => 'loan_id',
                'value' => function ($model) {
                    return \common\models\Loan::getLoanNo()[$model->loan_id];
                }
            ]

            ?>
<?php

            [
            'attribute' => 'customer_id',
                    'value' => function ($model) {
                    return \common\models\Customer::getCustomerList()[$model->customer_id];
}
                ]






?>


//
//[['car_out_time','car_start_time'] ,'default', 'value' => function () {
//    return date('Y-m-d', time());
//}],
//            [['car_out_time','car_start_time'], 'filter', 'filter' => function ($value) {
//                return is_numeric($value) ? $value : strtotime($value);
//            }, 'skipOnEmpty' => true],


//[['area_id'], 'required', 'when' => function ($model) {
//    $provinceValue = $model->province_id;
//    $provinceIsEmpty = $provinceValue === null || $provinceValue === [] || $provinceValue === '';
//    $cityValue = $model->city_id;
//    $cityIsEmpty = $cityValue === null || $cityValue === [] || $cityValue === '';
//    return !$provinceIsEmpty || !$cityIsEmpty;
//}, 'whenClient' => "function(attribute, value){
//                return $('#customercreditapply-province_id').val() || $('#customercreditapply-city_id').val();
//            }"],

?>



[
'attribute'=>'status',
'label'=>'状态',
'value'=>function ($model)
{
return  \common\models\LoanCar::getCarStatus()[$model->status];
}
],


