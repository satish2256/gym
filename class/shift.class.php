<?php 
require_once"common.class.php";
	class Shift extends Common{
		protected $id,$from_time,$to_time,$description,$status,$shift,$created_by,$created_date,$updated_by,$updated_date;
	
	function create(){
		// print_r($this);
		  $sql="insert into tbl_shift(from_time,to_time,description,status,shift,created_by,created_date)values('$this->from_time','$this->to_time','$this->description','$this->status','$this->shift','$this->created_by','$this->created_date')";
		return $this->insert($sql);
	}
		function lists(){
			$sql="select * from tbl_shift";
			return $this->select($sql);
		}

		function remove(){
			$sql="delete from tbl_shift where id='$this->id'";
			return $this->delete($sql);
		}

		function getshift(){
		$sql="select * from tbl_shift where id='$this->id'";
			return $this->select($sql);
		}
		function getshiftForSelect(){
		$sql="select id,name from tbl_shift";
		return $this->select($sql);
	}
		function edit(){
			$sql="update tbl_shift set id='$this->id',from_time='$this->from_time',to_time='$this->to_time',description='$this->description',status='$this->status',shift='$this->shift',updated_by='$this->updated_by',updated_date='$this->updated_date' where id='$this->id'";
			return $this->update($sql);
		}
	}
	
 ?>