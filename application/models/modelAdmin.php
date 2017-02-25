<?php

class modelAdmin extends CI_model
{

    private $tableName;

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'admindb';

    }


    public function checkInfo($admin_mail, $admin_pass)
    {
        $result = $this->db->get_where('admindb', array('admin_email' => $admin_mail, 'admin_pass' => $admin_pass))->row_array();
//        var_dump($result);
//        die();
        if (isset($result)) {
            return 1;
        } else {
//                   $this->session->set_flashdata()
            return 0;
        }

    }


    public function select()
    {
        $sql = "SELECT
                  ads.id,ads.ads_address,city.city_name,ads.ads_price,ads.ads_user_name,ads.ads_user_email,ads.status,ads_user_phone,rom.rooms_count AS room,mrk.mark_name AS mark
                FROM
                  `ads`
                LEFT JOIN mark mrk ON mrk.id = ads.mark_id
                INNER JOIN rooms rom ON rom.id = ads.rooms_id
                INNER JOIN city ON city.id = ads.city_id
                 order by ads.id DESC";
        $result = $this->db->query($sql);

        return $result->result_array();
    }



}