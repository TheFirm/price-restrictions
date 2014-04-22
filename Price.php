<?php

class Price {
	protected $priceRestrictions = array();

	/**
	* Input that program gets is PHP DateTime object of current date and time.
	*/
	public function checkPriceRestriction(DateTime $date) {

        foreach($this->priceRestrictions as $pr){
            // Check is valid data
            if (!$pr->checkDateTime($date)) {
                return false;
            }

        }
	
		return true;
	}


    /**
     * Add data to $priceRestrictions array
     * @param PriceRestriction $data
     * @return bool
     */
    public function addPriceRestriction($data){

        $this->priceRestrictions[] = $data;

    }
}