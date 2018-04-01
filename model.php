<?php
    class model {
        private $numbers;
        private $sz = 0;
        public function __construct(&$obj) {
            $this->sz = $this->checkIsset($obj['size']);
            $size = $this->sz;
            for ($i = 0; $i<$size; $i++) {
                $this->numbers[] = $this->checkIsset($obj['num'.$i]);
            }
        }
        public function getSize() {
            return $this->sz;
        }
        public function getNumbers(&$num) {
            return $this->numbers[(int)$num];
        }
        private function checkIsset(&$var) {
            if(isset($var)) {
                return $var;
            } else {
                return 0;
            }
        }
        public function __destruct() {}        
    }