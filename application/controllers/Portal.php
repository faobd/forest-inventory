<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * @category   FrontPortal
 * @package    Portal
 * @author     Rokibuzzaman <rokibuzzaman@atilimited.net>
 * @copyright  2017 ATI Limited Development Group
 */

class Portal extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('utilities');
        $this->load->model('setup_model');
        $this->load->model('Menu_model');
        $this->load->model('Forestdata_model');
        $this->load->helper(array('html', 

'form'));
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper('url');
    }



    /*
     * @methodName index()
     * @access public
     * @param  none
     * @return Fao portal home page
     */

    public function index()
    {
        $data['post_description'] = $this->db->query("SELECT BODY_ID, BODY_DESC FROM post_body WHERE TITLE_ID = 1")->row();
        $data['post_cat'] = $this->db->query("SELECT t.*, c.CAT_ID,c.CAT_NAME,b.BODY_ID,b.BODY_DESC,b.TITLE_ID,i.IMG_ID,i.IMG_URL,i.BODY_ID
            FROM post_title t
            left JOIN post_category c ON t.CAT_ID = c.CAT_ID
            left JOIN post_body b ON t.TITLE_ID = b.TITLE_ID
            left JOIN post_images i ON b.BODY_ID = i.BODY_ID
            where t.CAT_ID=1")->row();

        $data['post_cat_two'] = $this->db->query("SELECT t.*, c.CAT_ID,c.CAT_NAME,b.BODY_ID,b.BODY_DESC,t.PG_URI,b.TITLE_ID,i.IMG_ID,i.IMG_URL,i.BODY_ID
            FROM post_title t
            left JOIN post_category c ON t.CAT_ID = c.CAT_ID
            left JOIN post_body b ON t.TITLE_ID = b.TITLE_ID
            left JOIN post_images i ON b.BODY_ID = i.BODY_ID
            where t.CAT_ID=2")->result();
        $data['post_cat_three'] = $this->db->query("SELECT t.*,c.CAT_ID,c.CAT_NAME,b.BODY_ID,b.BODY_DESC,t.PG_URI,b.TITLE_ID,i.IMG_ID,i.IMG_URL,i.BODY_ID
            FROM post_title t
            left JOIN post_category c ON t.CAT_ID = c.CAT_ID
            left JOIN post_body b ON t.TITLE_ID = b.TITLE_ID
            left JOIN post_images i ON b.BODY_ID = i.BODY_ID
            where t.CAT_ID=3")->result();
         $data['post_cat_four'] = $this->db->query("SELECT t.*, c.CAT_ID,c.CAT_NAME,b.BODY_ID,b.BODY_DESC,t.PG_URI,b.TITLE_ID,i.IMG_ID,i.IMG_URL,i.BODY_ID
            FROM post_title t
            left JOIN post_category c ON t.CAT_ID = c.CAT_ID
            left JOIN post_body b ON t.TITLE_ID = b.TITLE_ID
            left JOIN post_images i ON b.BODY_ID = i.BODY_ID
            where t.CAT_ID=4")->result();
        $data['sliders'] = $this->db->query("SELECT * FROM home_page_slider")->result();
        $this->template->display_portal($data);
    }

    public function adasdds($TITLE_ID)
    {
        
    }

    public function details($TITLE_ID, $PG_URI)
    {

        $data['title_name'] = $this->db->query("SELECT TITLE_NAME,TITLE_NAME_BN FROM pg_title WHERE TITLE_ID = $TITLE_ID")->row();
        $data['page_description'] = $this->db->query("SELECT BODY_ID, BODY_DESC FROM pg_body WHERE TITLE_ID = $TITLE_ID")->row();
        $body_id = $data['page_description']->BODY_ID;
        //echo $body_id;exit;
        $data['body_images'] =$this->db->query("SELECT IMG_URL FROM pg_images WHERE BODY_ID = $body_id")->result();
        $data['content_view_page'] = 'portal/pageContent';
        $this->template->display_portal($data);
    }


     /**
     
      * Show all homepage post
      
      
     */

      public function post_details($TITLE_ID ,$PG_URI)
    {
        $data['title_name'] = $this->db->query("SELECT TITLE_NAME,TITLE_NAME_BN FROM post_title WHERE TITLE_ID = $TITLE_ID")->row();
        $data['post_description'] = $this->db->query("SELECT BODY_ID, BODY_DESC FROM post_body WHERE TITLE_ID = $TITLE_ID")->row();
        $body_id = $data['post_description']->BODY_ID;
        //echo $body_id;exit;
        $data['body_images'] =$this->db->query("SELECT IMG_URL FROM post_images WHERE BODY_ID = $body_id")->result();
        $data['content_view_page'] = 'portal/postContent';
        $this->template->display_portal($data);
    }


    public function viewSliderData()
    {
        $data['sliders'] = $this->db->query("SELECT * FROM home_page_slider")->result();
        $data['content_view_page'] = 'portal/viewSliderData';
        $this->template->display($data);
    }

    public function addImageinSlider()
    {
        if(isset($_POST['title']))
        {

            //$titles = count($this->input->post('title'));
            $title = $this->input->post('title');
            $descript = $this->input->post('descript');

         
                //echo "test";
                //exit;

                $config['upload_path'] = 'resources/images/home_page_slider/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['main_image']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('main_image')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
                
                $data = array(
                    'IMAGE_TITLE' => $title,
                    'IMAGE_DESC' => $descript,
                    'IMAGE_PATH' => $picture
                );

                //$data['IMAGE_PATH'] = 'asdasdsad';

                $this->utilities->insertData($data,'home_page_slider');
                redirect('portal/addImageinSlider');
               }
        
           else
           {
            $data['content_view_page'] = 'portal/addImageinSlider';
            $this->template->display($data);
           }
}  

            public function deleteImage($id)
            {


                //$this->db->query("DELETE FROM home_page_slider WHERE ID = $id");
                $this->utilities->deleteRowByAttribute('home_page_slider', array('ID' => $id));
                redirect('portal/viewSliderData');
            }

   

    /*
     * @methodName search_keyword()
     * @access public
     * @param  none
     * @return Search view page
     */
         public function search_keyword()
            {
                    $keyword = $this->input->post('keyword');
                    $data['results'] = $this->Menu_model->search($keyword);
                    $data['content_view_page'] = 'portal/search_view';
                    $this->template->display_portal($data);
            }

    /*
     * @methodName speciesData()
     * @access public
     * @param  none
     * @return Species List page
     */

        public function speciesData()
        {
        $data['family_details'] = $this->db->query("select f.ID_Family,f.Family,(SELECT COUNT(ID_Genus) from genus WHERE ID_Family=f.ID_Family) as GENUSCOUNT,(SELECT COUNT(ID_Species)
            FROM species as s WHERE s.ID_Family=f.ID_Family) as SPECIESCOUNT from family as f
            ")->result();
        $data['content_view_page'] = 'portal/speciesData';
        $this->template->display_portal($data);
        }




    /*
     * @methodName allometricEquationData()
     * @access public
     * @param  none
     * @return Allometric EquationData List page
     */

        public function allometricEquationData($specis_id)
        {
        $data['allometricEquationData'] = $this->Forestdata_model->get_allometric_equation($specis_id);
        $data['content_view_page'] = 'portal/allometricEquation';
        $this->template->display_portal($data);
        }


    /*
     * @methodName allometricEquationView()
     * @access public
     * @param  none
     * @return Allometric Equation Menu page
     */

        public function allometricEquationView()
        {
        $data['allometricEquationView'] = $this->Forestdata_model->get_allometric_equation_list();
        $data['content_view_page'] = 'portal/allometricEquationPage';
        $this->template->display_portal($data);
        }

    /*
     * @methodName allometricEquationDetails()
     * @access public
     * @param  none
     * @return Allometric Equation Details page
     */

        public function allometricEquationDetails($ID_Species)
        {
        $data['allometricEquationDetails'] = $this->Forestdata_model->get_allometric_equation_details($ID_Species);
        $data['content_view_page'] = 'portal/allometricEquationDetails';
        $this->template->display_portal($data);
        }


}
