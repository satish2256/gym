<?php 
require_once"common.class.php";
	class Member extends Common{
		protected $id,$name,$shift,$package,$address,$dob,$phone,$email,$image,$gender,$status,$created_by,$created_date,$updated_by,$updated_date;
	
	function create(){
		// print_r($this);
		  $sql="insert into tbl_member(name,shift,package,address,dob ,phone,email,image,gender,status,created_by,created_date)values('$this->name','$this->shift','$this->package','$this->address','$this->dob','$this->phone','$this->email','$this->image','$this->gender','$this->status','$this->created_by','$this->created_date')";
		return $this->insert($sql);
	}
		function lists(){
			$sql="select * from tbl_member";
			return $this->select($sql);
		}

		function remove(){
			$sql="delete from tbl_member where id='$this->id'";
			return $this->delete($sql);
		}

		function getmember(){
		$sql="select * from tbl_member where id='$this->id'";
			return $this->select($sql);
		}
		function getMemberForSelect(){
		$sql="select id,name from tbl_member";
		return $this->select($sql);
	}
		function edit(){
			$sql="update tbl_member set id='$this->id',name='$this->name',shift='$this->shift',package='$this->package',address='$this->address',dob='$this->dob',phone='$this->phone',email='$this->email',image='$this->image',gender='$this->gender',status='$this->status',updated_by='$this->updated_by',updated_date='$this->updated_date' where id='$this->id'";
				// echo $sql;
			return $this->update($sql);
		}
	}
	
 ?>