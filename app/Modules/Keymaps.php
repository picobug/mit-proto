<?php

namespace App\Modules;

class Keymaps {
    public function __construct($target = null) {
        $this->target = $target;
    }
    private $char = [
        [1,'q', 'a', 'z'],
        [2,'w', 's', 'x'],
        [3,'e', 'd', 'c'],
        [4,'r', 'f', 'v'],
        [5,'t', 'g', 'b'],
        [6,'y', 'h', 'n'],
        [7,'u', 'j', 'm'],
        [8,'i', 'k', ','],
        [9,'o', 'l', '.'],
        [0,'p', ';', '/'],
    ];
    public $target;
    public function getHorizontal() {
        $col = collect($this->char);
        $result = '';
        $col->map(function($c) use (&$result){
            if($result) {
                return $c;
            }
            if(in_array($this->target, $c)) {
                $k = 0;
                collect($c)->map(function($exist, $key) use(&$k){
                    if ($this->target === $exist) {
                        $k = $key;
                    }
                });
                $result = $c[count($c)-($k + 1)];
            }
            return $c;
        });
        return [
            'target' => $this->target,
            'result' => $result === '/' ? '' : $result
        ];
    }
    public function getVertical() {
        $col = collect($this->char);
        $result = '';
        $col->map(function($c, $key) use (&$result, $col){
            if($result) {
                return $c;
            }
            if(in_array($this->target, $c)) {
                $k = 0;
                collect($c)->map(function($exist, $key) use(&$k){
                    if ($this->target === $exist) {
                        $k = $key;
                    }
                });
                $result = $col[count($col)-($key + 1)][$k];
            }
            return $c;
        });
        return [
            'target' => $this->target,
            'result' => $result === '/' ? '' : $result
        ];
    }
    public function getShift() {
        $col = collect($this->char);
    }
}
