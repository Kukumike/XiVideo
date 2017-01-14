<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {

        //Load db m files
        $data = array(
            'displayg' => $this->Crud->get_table('displaygroup'),
            'videos' => $this->Crud->get_all('video')
        );

        $this->load->view('welcome_message', $data);
    }

    public function vconfig($id) {
        $data = array(
            'vdata' => $this->Crud->get_group_info($id),
            'videos' => $this->Crud->get_all('video'),
            'error' => "",
            'exstatus' => TRUE
        );


        $this->load->view('view_config', $data);
    }

    public function config_action() {
        $set_status = FALSE;

        $cur_url = $_POST['cur_url'];
        $gid = $_POST['gid'];
        $vheight = $_POST['vheight'];
        $vwidth = $_POST['vwidth'];
        $vautoplay = $_POST['vautoplay'];
        $vrepeat = $_POST['vrepeat'];

        $html_media_data = array(
            'displayGroupID' => $gid,
            'autoPlay' => $vautoplay,
            'mediaRepeat' => $vrepeat,
            'height' => $vheight,
            'width' => $vwidth,
            'playStatus' => 1
        );


        if ($this->Crud->check_if_active($gid) > 0) {
            $this->reset_play($gid);
            $this->db->where('displayGroupID', $gid);
            $this->db->update('html_media', $html_media_data);

            redirect($cur_url);
        } elseif ($this->Crud->check_if_deactive($gid) > 0) {
            $this->db->where('displayGroupID', $gid);
            $this->db->update('html_media', $html_media_data);

            redirect($cur_url);
        } else {
            $set_status = $this->db->insert('html_media', $html_media_data);
        }


        if ($set_status) {
            redirect($cur_url);
        } else {
            $data = array(
                'vdata' => $this->Crud->get_group_info($gid),
                'error' => "** Changes couldn't be saved. Try again **"
            );

            $this->load->view('setplay_view', $data);
        }
    }

    function display() {
        $groupid = $_POST['disgroupid'];
        $cururl = $_POST['cur_url'];
        
        $data = array(
            'playStatus' => 0
        );
        
        $this->db->where('displayGroupID', $groupid);
        $this->db->update('html_media', $data);
        
        redirect($cururl);
    }

    function check_if_exists($mID) {
        $this->db->where('mediaID', $mID);
        $qExist = $this->db->get('html_media');
        $qRows = $qExist->result();

        return count($qRows);
    }

    function reset_play($gid) {
        $data = array(
            'playStatus' => 0
        );

        $this->db->where('displayGroupID', $gid);
        $this->db->update('html_media', $data);

        return TRUE;
    }

    function set_display_play($id) {
        $data = array(
            'vdata' => $this->Crud->get_group_info($id),
            'error' => ""
        );


        $this->load->view('setplay_view', $data);
    }

}
