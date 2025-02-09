<?php
namespace necrox87\field\widgets;

use yii\helpers\Html;
use yii;

class Show extends \yii\base\Widget
{
    public $model = NULL;
    public $cssClass = 'dvizh-field-show';
    
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $lis = [];
        
        if($fields = $this->model->fields) {
            foreach($fields as $field) {
                $value = $this->model->getField($field->slug);
                if(is_array($value)) {
                    $value = implode(', ', $value);
                }
                $lis[] = $field->name.': '.$value;
            }
        }
        
        return Html::ul($lis, ['class' => $this->cssClass]);
    }
}
