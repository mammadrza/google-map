<?php

class home_model extends CI_Model
{
    public function select()
    {
        $sql = "SELECT
                  ads.id,ads.ads_address,ads.ads_user_name,rom.rooms_count AS room,mrk.mark_name AS mark,ads_photos.ads_photo AS photo
                FROM
                  `ads`
                LEFT JOIN mark mrk ON mrk.id = ads.mark_id
                INNER JOIN rooms rom ON rom.id = ads.rooms_id
                INNER JOIN ads_photos ON ads_photos.ads_id = ads.id
                WHERE status = 1 GROUP BY ads.id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
