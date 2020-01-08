<?php 
require_once"common.class.php";
	class Package extends Common{
		protected $id,$name,$title,$price,$description,$image,$status,$created_by,$created_date,$updated_by,$updated_date;
	
	function create(){
		// print_r($this);
		  $sql="insert into tbl_package(name,title,price,description,image,status,created_by,created_date)values('$this->name','$this->title','$this->price','$this->description','$this->image','$this->status','$this->created_by','$this->created_date')";
		return $this->insert($sql);
	}
		function lists(){
			$sql="select * from tbl_package";
			return $this->select($sql);
		}

		function remove(){
			$sql="delete from tbl_package where id='$this->id'";
			return $this->delete($sql);
		}

		function getpackage(){
		$sql="select * from tbl_package where id='$this->id'";
			return $this->select($sql);
		}
		function edit(){
			$sql="update tbl_package set id='$this->id',name='$this->name',title='$this->title',price='$this->price',description='$this->description',image='$this->image',status='$this->status',updated_by='$this->updated_by',updated_date='$this->updated_date' where id='$this->id'";
				// echo $sql;
			return $this->update($sql);
		}
	}
	
 ?>