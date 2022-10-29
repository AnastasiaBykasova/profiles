<?php
class MySQL_Access{
	#Параметры соединения с сервером.
	var $host_name = "";
	var $user_name = "";
	var $password = "";
	var $db_name = "";
	
	var $conn_id = 0; #Отсутствие соединения.
	var $errno = 0;
	var $errstr = "";
	var $halt_on_error = 1; #Завершить сценарий в случае возникновения ошибки.

	var $query_pieces = array();
	var $result_id = 0;
	var $num_rows = 0; #Количество измененных или возвращенных строк.
	var $row = array();

	#Установить соединение с сервером, если оно не установлено.
	function connect(){
		$this->errno = 0;
		$this->errstr = "";
		
		if($this->conn_id == 0){
			$this->conn_id = @mysql_connect($this->host_name, $this->user_name, $this->password);

			if(!$this->conn_id){
				if(mysql_errno()){
					$this->errno = mysql_errno();
					$this->errstr = mysql_error();
				}
				else{
					$this->errno = -1;
					$this->errstr = $php_errormsg;
				}

				$this->error("Cannot connect to server.");
		
				return FALSE;
			}
	
			if(isset($this->db_name) && $this->db_name != ""){
				if(!@mysql_select_db($this->db_name, $this->conn_id)){
					$this->errno = mysql_errno();
					$this->errstr = mysql_error();
					$this->error("Cannot select database.");

					return FALSE;
				}
			}
		}
	
		return $this->conn_id;
	}
	
	#Закрыть соединение с сервером.
	function disconnect(){
		if($this->conn_id != 0){
			mysql_close($this->conn_id);
			$this->conn_id = 0;
		}
		
		return TRUE;
	}
	
	#Выполнение запроса.
	function issue_query($query_str){
		if(!$this->connect())
			return FALSE;
		
		$this->num_rows = 0;
		$this->result_id = mysql_query($query_str, $this->conn_id);
		$this->errno = mysql_errno();
		$this->errstr = mysql_error();
		
		if($this->errno){
			$this->error("Cannot execute query: $query_str");
		
			return FALSE;
		}
	
		$this->num_rows = mysql_affected_rows($this->conn_id);
		
		return $this->result_id;
	}
	
	#Извлечение следующей строки в виде массива с числовыми индексами.
	function fetch_row(){
		$this->row = mysql_fetch_row($this->result_id);
		$this->errno = mysql_errno();
		$this->errstr = mysql_error();

		if($this->errno){
			$this->error("fetch_row error");

			return FALSE;
		}
		
		if(is_array($this->row))
			return $this->row;

		$this->free_result();

		return FALSE;
	}
	
	#fetch_array()
	
	#fetch_object()
	
	#Освобождение идентификатора результата запроса.
	function free_result(){
		if($this->result_id)
			
		mysql_free_result($this->result_id);
		$this->result_id = 0;

		return TRUE;
	}
	
	#Обработка кавычек и NULL-значений
	
}
?>