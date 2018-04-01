<?php
    class calculator {
        public function __construct() {}
        public function mult(&$model) {
            $mult=1;
            $sz = $model->getSize();
            for($i=0; $i<$sz; $i++) {
                $mult *= $model->getNumbers($i);
            }
            return $mult;
        }
        public function sum(&$model) {
            $sum=0;
            $sz = $model->getSize();
            for($i=0; $i<(int)$sz; $i++) {
                $sum += $model->getNumbers($i);
            }
            return $sum;
        }
        public function avg(&$model) {
            $sum=0;
            $sz = $model->getSize();
            for($i=0; $i<(int)$sz; $i++) {
                $sum += $model->getNumbers($i);
            }
            return $sum/$sz;
        }
        
        public function __destruct() {}        
    }

    