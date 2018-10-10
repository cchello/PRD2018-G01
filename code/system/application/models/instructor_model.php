<?php
class Instructor_model extends Model
{
	function Instructor_model()
	{
		parent::Model();
	}
	
	//--------------------------------------------------------------------------	
// Added by cendy at 2010-01-19
// Instructor handles

/**
 * 功能：判断一个用户在某个项目中是否为指导者（Instructor)
 * @param $ins_id: 项目ID
 * @param $user_id： 用户ID
 * @return TRUE or FALSE
 */	
	
	function isInstructor($insId,$userId){
		$sql = "SELECT * from instance_Instructor WHERE instanceid=$insId AND userid=$userId AND status='1'";
		$query = $this->db->query($sql);
		return ($query->num_rows() > 0)?TRUE:FALSE;
		
/*		$this->db->where('instanceid', $insId);
		$this->db->where('userid', $userId);
		$this->db->where('status','1');
		$result = $this->db->get('instance_Instructor')->row_array();
		return $result->num_rows()>0?TRUE:FALSE;	*/
	}

/**
 * 功能：返回一个项目中的所有指导者的ID及用户名
 * @param $ins_id
 * @return array——指导者的数组，包括userid,instanceid,username
 */
	function getInstructors($insId){
		$sql = "select distinct userid,instanceid,instance_Instructor.status,username from instance_Instructor LEFT JOIN users ON instance_Instructor.userid=users.uid where instanceid=$insId AND instance_Instructor.status=1";
		/*$sql = "SELECT distinct instance_Instructor.userid,instance_Instructor.instanceid,instance_Instructor.status,username
		FROM instance_Instructor LEFT JOIN users ON instance_Instructor.userid=users.uid
		where instanceid=$insId";*/
		return $this->db->query($sql)->result_array();
	}
	
/**
 * 功能：返回一个项目中的所有正在申请的指导者的ID及用户名
 * @param $ins_id
 * @return array——指导者的数组，包括userid,instanceid,username
 */
	function getInstructorApplyers($insId){
		$sql = "select distinct userid,instanceid,instance_Instructor.status,username from instance_Instructor LEFT JOIN users ON instance_Instructor.userid=users.uid where instanceid=$insId AND instance_Instructor.status=0";
		return $this->db->query($sql)->result_array();
	}
	
/**
 * 功能：申请担任某个项目的指导者（Instructor)
 * @param $insId：	项目ID
 * @param $userId：	用户ID
 * @return TRUE OR FALSE
 */
	function applyInstructor($insId,$userId){
		$result_array = $this->db->query("SELECT NOW()")->row_array();
//		$data['applytime'] =  $result_array['NOW()'];
		$data = array(
			'userid' => $userId,
			'instanceid' => $insId,
			'status' => '0',
			'applytime' => $result_array['NOW()']
		);
		$this->db->set($data);
		$this->db->insert('instance_Instructor');
		return mysql_error()==''?TRUE:FALSE;
	}
	
/**
 * 功能：取消申请担任某个项目的指导者（Instructor）
 * @param $insId：	项目ID
 * @param $userId:	用户ID
 * @return unknown_type
 */	
	function cancelApplyInstructor($insId,$userId){
		$this->db->where('instanceid', $insId);
		$this->db->where('userid', $userId);
		$this->db->delete('instance_Instructor');
		return mysql_error()==''?TRUE:FALSE;
	}
	
/**
 * 功能：取消担任某个项目的指导者（Instructor）
 * @param $insId：	项目ID
 * @param $userId：	用户ID
 * @return unknown_type
 */
	function cancelInstructorAct($insId,$userId){
		$this->db->where('instanceid', $insId);
		$this->db->where('userid', $userId);
		$this->db->delete('instance_Instructor');
		return mysql_error()==''?TRUE:FALSE;
	}
	
/**
 * 功能：通过某个用户申请担任项目指导者的申请，由项目创建者完成
 * @param $insId：	项目ID
 * @param $userId：	用户ID
 * @return unknown_type
 */
	function acApplyInstructor($insId,$userId){
		$result_array = $this->db->query("SELECT NOW()")->row_array();
		$this->db->set('status', '1');
		$this->db->set('handletime',$result_array['NOW()']);
		$this->db->where('instanceid', $insId);
		$this->db->where('userid', $userId);
		$this->db->update('instance_Instructor');
		return mysql_error()==''?TRUE:FALSE;
	}
	
/**
 * 功能：拒绝某个用户申请担任项目指导者的申请，由项目创建者完成
 * @param $insId：	项目ID
 * @param $userId：	用户ID
 * @return unknown_type
 */
	function denyApplyInstructor($insId,$userId){
		$this->db->where('instanceid', $insId);
		$this->db->where('userid', $userId);
		$this->db->delete('instance_Instructor');
		return mysql_error()==''?TRUE:FALSE;
	}

/**
 * 功能：判断一个用户是否正在申请成为该项目指导者
 * @param $ins_id: 项目ID
 * @param $user_id： 用户ID
 * @return TRUE or FALSE
 */		
	function isApplyingInstructor($insId,$userId){
		$sql = "SELECT * from instance_Instructor WHERE instanceid=$insId AND userid=$userId AND status='0'";
		$query = $this->db->query($sql);
		return ($query->num_rows() > 0)?TRUE:FALSE;
/*		$this->db->where('instanceid', $insId);
		$this->db->where('userid', $userId);
		$this->db->where('status','0');
		$result = $this->db->get('instance_Instructor');
		return ($result->num_rows()>0)?TRUE:FALSE;	*/
	}
	
// End Instructor's operations	
//--------------------------------------------------------------------	
}