<?php

class SantryModel extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getSantries($params){
    	$sql = "SELECT * FROM `santi` WHERE 1";
        $bindParam = [];

        if($params['keywords']){
            $keywords = explode(' ',$params['keywords']);
            foreach ($keywords as $key => $words) {
                $sql .= "AND LOCATE(?,CONCAT_WS(' ',`nomorInduk`,`namaLengkap`,`namaPanggilan`,`tempatLahir`,`pendidikanTerakhir`,`namaPerguruan`,`perkerjaan`,`noTelpon`,`alamat`)) > 0" 
                array_push($bindParam, $words);
            }
        }

        if($params['status']){
            $sql .= " AND status in ?";
            array_push($bindParam, explode(',', $params['status']));
        }

        if($params['active']){
            $sql .= " AND active in ?";
            array_push($bindParam, explode(',', $params['active']));
        }

    	$query = $this->db->query($sql,$bindParam);
 		$result = $query->result_array();

 		if(!$result) return array();
 		return $result;
    }

    public function getSantryById($santryId){
        $sql = "SELECT * FROM `santi` WHERE santriId = ?";
        $query =  $this->db->query($sql,array(
            $santryId,
        ));

        if($query->num_rows() > 0 ) return true;
        return false;
    }

    // public function insertWishList($wishlist){
    // 	$sql = "INSERT INTO `wishlist`(`member_id`, `product_id`) VALUES (?,?)";
    // 	$res =  $this->db->query($sql,array(
    // 		$wishlist['member_id'],
    // 		$wishlist['product_id'],
    // 	));

    //     if($res) return true;
    //     return $this->db->error();
    // }

    // public function deleteWishListByMemberId($memberId){
    // 	$sql = "DELETE FROM `wishlist` WHERE `member_id` = ?";
    // 	return $this->db->query($sql,$memberId);
    // }

    // public function deleteWishListById($wishlistId){
    // 	$sql = "DELETE FROM `wishlist` WHERE `wishlist_id` = ?";
    // 	return $this->db->query($sql,$wishlistId);
    // }

}