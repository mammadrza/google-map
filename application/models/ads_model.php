<?php

class ads_model extends CI_Model
{
    public function get_towns()
    {
        $result = $this->db->get('towns');
        return $result->result();
    }

    public function get_metros()
    {
        $result = $this->db->get('mark');
        return $result->result();
    }

    public function select($useremail)
    {
        $sql = "SELECT
                      ads.id,
                      ads.ads_address,
                      ads.ads_about,
                      ads.ads_price,
                      ads.ads_user_phone,
                      ads.ads_user_name,
                      ads_photos.ads_photo AS photo,
                      rom.rooms_count AS room,
                      mrk.mark_name AS mark,
                      home.home_type_name AS home
                  FROM
                      `ads`
                  LEFT JOIN
                      mark mrk ON mrk.id = ads.mark_id
                  INNER JOIN
                      rooms rom ON rom.id = ads.rooms_id
                  INNER JOIN
                      home_types home ON home.id = ads.home_type_id
                  INNER JOIN
                      ads_photos ON ads_photos.ads_id = ads.id
                  WHERE ads.userdb_id= (SELECT id FROM usersdb WHERE user_email = '$useremail') GROUP BY ads.id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function add($viewData)
    {

      $this->db->insert('ads', $viewData);
        return $this->db->insert_id();;
    }


    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ads');
    }

    public function findByIdData($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $result = $this->db->get('ads');
        return $result->result_array();
    }

    public function findByIdSingleData($id){
        $sql = "SELECT
                      ads.id,
                      ads.ads_address,
                      ads.ads_about,
                      ads.ads_price,
                      ads.ads_user_phone,
                      ads.ads_user_name,
                      ads_photos.ads_photo AS photo,
                      rom.rooms_count AS room,
                      mrk.mark_name AS mark,
                      home.home_type_name AS home
                  FROM
                      `ads`
                  LEFT JOIN
                      mark mrk ON mrk.id = ads.mark_id
                  INNER JOIN
                      rooms rom ON rom.id = ads.rooms_id
                  INNER JOIN
                      home_types home ON home.id = ads.home_type_id
                  INNER JOIN
                      ads_photos ON ads_photos.ads_id = ads.id 
                WHERE
                 ads.id = $id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function findByIdSingleDataPhoto($id){
        $sql = "SELECT
                      ads.id,
                      ads_photos.ads_photo AS photo
                FROM
                      ads
                INNER JOIN
                      ads_photos ON ads_photos.ads_id = ads.id
                WHERE
                      ads.id = $id";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function update($id, $viewData)
    {
        $this->db->where('id', $id);
        $this->db->update('ads', $viewData);
    }

    public function addPhoto($photoData){
        $this->db->insert('ads_photos', $photoData);
    }

    public function findLastId(){
        $sql = "SELECT id FROM ads ORDER by id DESC LIMIT 1";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

}
