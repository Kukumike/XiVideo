<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Crud extends CI_Model {

    function get_all($type) {
        $this->db->where('type', $type);
        $return_all = $this->db->get('media');

        return $return_all->result();
    }

    function get_table($table) {
        $return_all = $this->db->get($table);

        return $return_all->result();
    }

    function get_config($id) {
        $this->db->where('mediaID', $id);
        $return_all = $this->db->get('media');

        return $return_all->result();
    }

    function get_config_join($id) {
        $this->db->where('media.mediaID', $id);
        $this->db->from('media');
        $this->db->join('html_media', "media.mediaID = html_media.mediaID");
        $return_all = $this->db->get();

        return $return_all->result();
    }

    function get_group_info($id) {
        $this->db->where('lkmediadisplaygroup.displaygroupid', $id);
        $this->db->from('lkmediadisplaygroup');
        $this->db->join('media', 'media.mediaID = lkmediadisplaygroup.mediaid');
        $this->db->join('displaygroup', 'displaygroup.DisplayGroupID = lkmediadisplaygroup.displaygroupid');
        $return_all = $this->db->get();

        return $return_all->result();
    }

    function check_if_active($id) {
        $this->db->where('displayGroupID', $id);
        $this->db->where('playStatus', 1);
        $this->db->from('html_media');
        $count_status = $this->db->count_all_results();

        return $count_status;
    }

    function check_if_deactive($id) {
        $this->db->where('displayGroupID', $id);
        $this->db->where('playStatus', 0);
        $this->db->from('html_media');
        $count_status = $this->db->count_all_results();

        return $count_status;
    }

    function get_playing($gid) {
        $this->db->where('playStatus', 1);
        $this->db->where('html_media.displayGroupID', $gid);
        $this->db->from('html_media');
        $this->db->join('lkmediadisplaygroup', 'html_media.displayGroupID = lkmediadisplaygroup.displaygroupid');
        $this->db->where('playStatus', 1);
        $return_all = $this->db->get();

        return $return_all->result();
    }

    function get_stored_as($id) {
        $this->db->where('mediaID', $id);
        $return_all = $this->db->get('media');

        $m_res = $return_all->result();
        foreach ($m_res as $row){
            $mStoredAs = $row->storedAs;
        }
        
        return$mStoredAs;
    }

}
