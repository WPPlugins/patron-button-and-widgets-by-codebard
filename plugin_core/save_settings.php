<?php



	$tab=$_REQUEST[$this->internal['prefix'].'tab'];
				
	foreach($this->opt[$tab] as $key => $value)
	{
		if(array_key_exists($key,$_REQUEST[$this->internal['prefix'].$tab]))
		{
			$this->opt[$tab][$key]=$_REQUEST[$this->internal['prefix'].$tab][$key];
		}
	}
				
	update_option($this->internal['prefix'].'options' ,$this->opt);
				
				
				
?>