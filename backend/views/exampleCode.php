


<?= $form->field($model, 'car_out_time')->widget(
    \kartik\date\DatePicker::className(),
    [
        'name' => 'event_time',
        'value' => '12/31/2010',
        'options' => ['placeholder' => ''],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd',
            'todayHighlight' => true, ]
    ]
) ?>

<?= $form->field($model, 'loan_period_id')->dropDownList(Yii::$app->config->get('LOAN_PERIRD_LIST')) ?>
<?= $form->field($model, 'pay_type_id')->dropDownList(Yii::$app->config->get('LOAN_REPAY_TYPE')) ?>



<?= $form->field($model, 'area_id')->label('提报城市')->widget(\common\modules\city\widgets\CityWidget::className(), [
    'provinceAttribute' => 'province_id',
    'cityAttribute' => 'city_id',
    'areaAttribute' => 'area_id'
]) ?>







<?= $form->field($assessmodel, 'car_yearly_check_due_time')->widget(
    \kartik\date\DatePicker::className(),
    [
        'name' => 'car_yearly_check_due_time',
        'options' => [
            'value' => !empty($assessmodel->car_yearly_check_due_time) ? date('Y-m-d', $assessmodel->car_yearly_check_due_time) : date('Y-m-d', time()),
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,]
    ]
) ?>




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






