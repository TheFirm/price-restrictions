<?php

class PriceRestriction {

	// Format hh:mm
	protected $startTime;
	// Format hh:mm
	protected $endTime;
	// Format 1234567     - Monday = 1, tuesday, wednesday, thursday, friday, saturday, sunday = 7
	protected $weekDays;

}

/**
* Some test data
*
* 1. startDate = "13:00"
*    endDate   = "18:45"
*    weekDays  = "1234567"
*
* 2. startDate = "13:50"
*    endDate   = "19:00"
*    weekDays  = "137"
*
* 3. startDate = "21:00"
*    endDate   = "8:00"
*    weekDays  = "1456"
*
* 4. startDate = "6:00"
*    endDate   = "15:39"
*    weekDays  = ""
*
* 5. startDate = ""
*    endDate   = ""
*    weekDays  = "127"
*/