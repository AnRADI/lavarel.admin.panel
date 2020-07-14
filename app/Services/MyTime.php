<?php

namespace App\Services;

class MyTime {
    public function timeNow() {

        $time = new \DateTime('now', new \DateTimeZone('Europe/Kiev'));

        return $time->format('H:i:s');
    }
}


