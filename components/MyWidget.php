<?php

namespace app\components;

use yii\base\Widget;

class MyWidget extends Widget {

    public $name;

    public function init() {
        parent::init();
        if ($this->name === null) {
            $this->name = 'Гость';
        }
    }

    public function run() {
        return "<p>Привет,{$this->name}.</p>";
    }
}
