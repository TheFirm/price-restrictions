<?php

class PriceRestriction {
	// Format hh:mm
	protected $startTime = "00:00";
	// Format hh:mm
	protected $endTime = "23:59";
	// Format 1234567     - Monday = 1, tuesday, wednesday, thursday, friday, saturday, sunday = 7
	protected $weekDays = array("1","2","3","4","5","6","7");


    public function __construct($opts = array())
    {
        if (isset($opts['startTime']) and $opts['startTime'] !== '') {

            if(!$this->validateTime($opts['startTime'])){
                throw new Exception('Start Time is not valid');
            }
            $this->startTime = $opts['startTime'];
        }

        if (isset($opts['endTime']) and $opts['endTime'] !== '') {

            if(!$this->validateTime($opts['endTime'])){
                throw new Exception('End Time is not valid');
            }
            $this->endTime = $opts['endTime'];
        }


        if (isset($opts['weekDays']) and $opts['weekDays'] !== '') {

            if(!$this->validateDay($opts['weekDays'])){
                throw new Exception('weekDays is not valid');
            }
            $this->weekDays = str_split($opts['weekDays']);
        }
    }


    /**
     * Check is restrict
     * @param DateTime $date
     * @return bool
     */
    public function checkDateTime(DateTime $date) {
        $is_overnight = (strtotime($this->startTime) > strtotime($this->endTime)) ? true : false;
        $date_time = date('H:i', $date->getTimestamp());

        if ($is_overnight) {
            $date_day = date('N', strtotime('-1 day', $date->getTimestamp()));
        }
        else {
            $date_day = date('N', $date->getTimestamp());
        }

        if (!in_array($date_day,$this->weekDays)) { //match day
            return false;
        }

        if ( // is not overnight
            !(!$is_overnight
            and
            strtotime($this->startTime) <= strtotime($date_time) and
            strtotime($this->endTime) >=  strtotime($date_time)
            )) {

            return false;
        }


        if (!( // is overnight
            $is_overnight and
            (
                strtotime($this->startTime) <= strtotime($date_time) and
                strtotime("23:59") >= strtotime($date_time)
            ) or
            (
                strtotime("00:00") <= strtotime($date_time) and
                strtotime($this->endTime) >=  strtotime($date_time)
            )
        )) {
            return false;
        }

        return true;

    }

    /**
     * Validate time
     * @param $data
     * @return bool
     */
    private function validateTime($data){
        if (!strtotime($data)){
            return false;
        }
        return true;
    }

    /**
     * Validate Days (from 1 to 7)
     * @param $data
     * @return bool
     */
    private function validateDay($data){
        if (!preg_match('/^[1-7]{1,7}$/', $data)){
            return false;
        }
        return true;
    }
}
