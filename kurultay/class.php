<?
class Encryption
{
	
	private static $key = "K1_1r1_11_T@6Ys1_1-11_11_13";
	public static function encrypt($string)
	{
		$key = Encryption::$key;
		$result = "";
		for ($i = 0; $i < strlen($string); $i++)
		{
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key)) - 1, 1);
			$char = chr(ord($char) + ord($keychar));
			$result.= $char;
		}
		return base64_encode($result);
	}
	public static function decrypt($string)
	{
		$key = Encryption::$key;
		$result = "";
		$string = base64_decode($string);
                for ($i = 0; $i < strlen($string); $i++)
		{
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key)) - 1, 1);
			$char = chr(ord($char) - ord($keychar));
			$result.=$char;
		}
		return $result;
	}
}

class Control
{
	public static function textControl($string)
	{
		
		$string=stripslashes($string);
		
		
		return $string;
	}
	
	public static function mysqlControl($string)
	{
		
		$string=mysql_real_escape_string($string);
		
		
		return $string;
	}
}
?>