<?php
class Rankmodel extends Model
{
	function Rankmodel()
	{
		parent::Model();

	}

// ------------------------------------------------------------------------

/**
 * Get user rank
 *
 *
 * @access	public
 * @param	none	   
 * @param   bool         
 * @return	array
 */
	function getUserRank(){
		$sql = "select username,score,onlinetime
		         from users
		         order by score desc,onlinetime	desc  
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

// ------------------------------------------------------------------------

/**
 * Get case rank
 *
 *
 * @access	public
 * @param	none	   
 * @param   bool         
 * @return	array
 */
	function getCaseRank(){
		$sql = "select caseid,count(caseid)
		        from instances
		        group by caseid
		        order by count(caseid),caseid
		        ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
// ------------------------------------------------------------------------

/**
 * Get case name
 *
 *
 * @access	public
 * @param	none	   
 * @param   bool         
 * @return	array
 */
	function getCaseName($caseid){
		$sql = "select casename
		        from cases
		        where uid=$caseid
		";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
}
?>