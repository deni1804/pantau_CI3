<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mpantau extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_item()
	{
		$query = "SELECT * FROM ps_itempantauan WHERE IdStatus = 1 ORDER BY Sort"; //1 = aktif; 9 = ga aktif
		return $this->db->query($query);
	}

	function get_allitem()
	{
		$query = "SELECT * FROM ps_itempantauan";
		return $this->db->query($query);
	}
	function delete_item($row)
	{
		$this->db->delete('ps_itempantauan', array('IdItem' => $row));
	}

	function get_iditem($row)
	{
		return $this->db->get_where('ps_itempantauan', ['IdItem' => $row])->row_array();
	}

	function update_item()
	{
		$this->db->WHERE('IdItem', $this->input->post('iditem'));
	}



	function get_pantau()
	{
		$query = 'SELECT ip.Item AS Item, DATE_FORMAT(ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdKaryawan = ' . $this->session->userdata("userid") . ' AND DATE_FORMAT(ps.TanggalJam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") AND DATE_FORMAT(ps.TanggalJam, "%H") = DATE_FORMAT(now(), "%H") ORDER BY ps.TanggalJam';
		return $this->db->query($query);
	}

	function get_history($temp)
	{
		if ($temp == 1) {
			$query = 'SELECT ip.Item AS Item, DATE_FORMAT(ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdKaryawan = ' . $this->session->userdata("userid") . ' AND DATE_FORMAT(ps.TanggalJam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} else if ($temp == 2) {
			$query = 'SELECT ip.Item AS Item, DATE_FORMAT(ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus,ps.Keterangan  FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdKaryawan = ' . $this->session->userdata("userid") . ' AND DATE_FORMAT(date_add(ps.TanggalJam, INTERVAL 1 DAY), "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 3) {
			$query = 'SELECT ip.Item AS Item, DATE_FORMAT(ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan,ps.TanggalJam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdKaryawan = ' . $this->session->userdata("userid") . ' AND ps.IdItem =  1  AND DATE_FORMAT(ps.TanggalJam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 4) {
			$query = 'SELECT ip.Item AS Item, DATE_FORMAT(ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan,ps.TanggalJam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdItem =  2  AND DATE_FORMAT(ps.TanggalJam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 5) {
			$query = 'SELECT ip.Item AS Item, DATE_FORMAT(ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan,ps.TanggalJam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdItem =  3  AND DATE_FORMAT(ps.TanggalJam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 6) {
			$query = 'SELECT ip.Item AS Item, DATE_FORMAT(ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan,ps.TanggalJam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdItem =  4  AND DATE_FORMAT(ps.TanggalJam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 7) {
			$query = 'SELECT ip.Item AS Item, DATE_FORMAT(ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan,ps.TanggalJam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdItem =  5  AND DATE_FORMAT(ps.TanggalJam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 8) {
			$query = 'SELECT ip.Item AS Item, DATE_FORMAT(ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan,ps.TanggalJam FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE ps.IdItem =  6  AND DATE_FORMAT(ps.TanggalJam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 9) {
			$query = 'SELECT ip.Item AS Item, DATE_FORMAT(ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus, ps.Keterangan FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE  DATE_FORMAT(ps.TanggalJam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		} elseif ($temp == 10) {
			$query = 'SELECT ip.Item AS Item, DATE_FORMAT(ps.TanggalJam, "%H:%i:%s") AS Jam, ps.Status,ps.TingkatStatus,ps.Keterangan  FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem WHERE  DATE_FORMAT(date_add(ps.TanggalJam, INTERVAL 1 DAY), "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") ORDER BY ps.TanggalJam DESC';
		}

		return $this->db->query($query);
	}

	function get_karyawan($list)
	{
		if ($list == 1) {

			$query = ' SELECT kh.Username AS Username, ip.Item AS Item, COUNT(*) FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem JOIN kh_karyawan kh ON ps.IdKaryawan = kh.IdKaryawan WHERE  ps.IdItem =  1  AND DATE_FORMAT(ps.TanggalJam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") GROUP BY kh.Username , Ip.Item';
		} elseif ($list == 2) {
			$query = ' SELECT kh.Username AS Username, ip.Item AS Item, COUNT(*) FROM ps_pantauansistem ps INNER JOIN ps_itempantauan ip ON ps.IdItem = ip.IdItem JOIN kh_karyawan kh ON ps.IdKaryawan = kh.IdKaryawan WHERE  ps.IdItem =  1  AND DATE_FORMAT(ps.TanggalJam, "%m-%d-%Y") = DATE_FORMAT(NOW(), "%m-%d-%Y") GROUP BY kh.Username , Ip.Item';
		}
		return $this->db->query($query);
	}

	function insert($query)
	{
		$this->db->query($query);
	}

	function get_keterangan($id)
	{
		$query = 'SELECT Keterangan FROM ps_itempantauan WHERE IdItem = ' . $id;
		return $this->db->query($query);
		// return $query;
	}
}
