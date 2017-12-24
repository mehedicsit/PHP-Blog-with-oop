<?php
	
	/**
	* posts structure design common mehtods here
	*/
	class  sturcturePost 
	{
		function dateFormat($date){
			return date("F j,Y g:i a",strtotime($date));


		}


		function excerpt($str,$start,$end=250){
		  $excerpt=substr($str,$start,$end);
		  $excerpt=substr($excerpt,0,strrpos($str,' '))." "."....";
		  return $excerpt;

		}


	}