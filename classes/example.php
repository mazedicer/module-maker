<?php

class example {
	private $data=[];
	 function __construct(){
        $this->db=new Database();
    }
	// add __set() and __get() functions for $data
	
	/*add db functions
	use $this->db->fetchAllDB($query)
	returns $rows or 'NODATA'
	iterate $rows[<iterator>]['FIELD']
	use $this->db->fetchSingle($query)
	returns $row or 'NODATA'
	not iteration needed $row['FIELD']*/
	
	//add view functions
	
	
}