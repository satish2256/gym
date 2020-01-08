<?php 
require_once"common.class.php";
	class Attandance extends Common{
		protected $id,$member_id,$Adate,$status,$created_by,$created_date,$updated_by,$updated_date;
	
	function create(){
		// print_r($this);
		   $sql="insert into  tbl_attandance(member_id,Adate,status,created_by,created_date)values('$this->member_id','$this->Adate','$this->status','$this->created_by','$this->created_date')";
		return $this->insert($sql);
	}
		function lists(){
			$sql="select * from  tbl_attandance";
			return $this->select($sql);
		}

		function remove(){
			$sql="delete from  tbl_attandance where id='$this->id'";
			return $this->delete($sql);
		}

		function getattandance(){
		$sql="select * from  tbl_attandance where id='$this->id'";
			return $this->select($sql);
		}
		function edit(){
			$sql="update  tbl_attandance set id='$this->id',member_id='$this->member_id',Adate='$this->Adate',status='$this->status',updated_by='$this->updated_by',updated_date='$this->updated_date' where id='$this->id'";
				// echo $sql;
			return $this->update($sql);
		}
	}
	
 ?>