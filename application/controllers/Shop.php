<?php

/**
 * Created by PhpStorm.
 * User: Gowtham
 * Date: 3/2/2016
 * Time: 2:39 PM
 */
class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); // TODO: Change the autogenerated stub
        $this->load->model('product_model','pro');
        $this->load->model("category_model","cat");
        $this->load->model("option_model","op");
        $this->load->model("blog_model","blog");
        $this->load->model("testimonial_model","testimonial");
        $this->load->helper('text');
        $this->load->library('cart');
        $this->load->library('wishlist');
        $this->load->library('compare');
        $this->load->library('user_agent');
        $this->load->model("banner_model","banner");
    }

    function product($id,$sub,$main){

        if($this->input->get_post('action')) {
            $this->_writeReview();
            exit;
        }

        $d['top'] = $this->banner->getBy(array( 'status'=>1 , 'position' => 1 ) , 1 , null , array('order_by'=>'id DESC') );
        $d['meta_key'] = "";
        if($main){
            $d['mainmenu'] = $this->cat->getBy(array('status ' => 1 ,"id" => $main ) , 1 , "id,title,meta_key" );
            $d['link'] = url_title($d['mainmenu']->title)."/".$d['mainmenu']->id ;
            $d['meta_key'] .=  ",{$d['mainmenu']->meta_key}";
        }
        if($sub){
 
            $d['menu'] = $this->cat->getBy(array('status ' => 1 ,"id" => $sub ) , 1 , "id,title,meta_key" );
            $d['link'] = url_title($d['mainmenu']->title)."/".$d['mainmenu']->id."/".url_title($d['menu']->title)."/".$d['menu']->id;
            $d['meta_key'] .=    ",{$d['menu']->meta_key}";
        }

        $d['category'] = $this->cat->getBy(array('status ' => 1 ,"category_id" => 0 ) , null , "id,title,short,image,icon" );
        foreach($d['category'] as &$cat  ) {
            $cat->sub = $this->cat->getBy(array('status' => 1 ,"category_id" => $cat->id ) , null , "id,title"  );
        }

        $pro = $this->pro->getBy(array("{$this->pro->table}.id" => $id ) , 1 );
        $pro->qty = 10 ;
        if(!is_object($pro)) show_404();
        if( !isset($d['menu']) ){
            // $d['menu'] = $this->cat->getBy(array('status ' => 1 ,"id" => $pro->category ) , 1 , "id,title" );
        }
        $this->load->model('Customer','cus');
        $d['reviews']  = $this->db->from("reviews")->where("id_product",$id)->where("reviews.status",1)->get()->result();


        $d['related']  = $this->pro->getRelatedPro($pro->category,$id ,"{$this->pro->table}.id,title,image,short, discount  " , 12 );

     //  $pro->qty = $this->pro->getStock($id)->qty;

        $pro->cart_qty = $this->cart->in_cart($pro->id , 'id','qty');
        if(! is_float($pro->cart_qty)) $pro->cart_qty =1 ;

		 $d['product']  = $pro;

        $options  = $this->pro->getStock($id) ;
        $d['options'] = $options ;
        if( !empty($options['all']) ) {
            $pro->price = $options['all'][0]->price ;
            $pro->qty = $options['all'][0]->qty ;
        }else{

        } 
		
		//echo "<span style='display:none' >";
		//p($pro);
		//echo "</span>";


//        ----------------------- option  start -------------------------------------


//        ------------------------- option end -----------------------------------





        // p($d['options']);
        $d['images'] = $this->pro->getMoreImages($pro->id);
        $d['datasheet'] = $this->pro->getMoreDataSheet($pro->id);

        $d['meta_key'] .=   ",$pro->meta_key";
        $d['meta_des'] = $pro->meta_des ;

        $this->load->view("product",$d);
    }

    function _writeReview(){
        $user = $this->session->userdata("front_user") ;
        $this->form_validation->set_rules('email',"Email","required|valid_email");
        $this->form_validation->set_rules('title',"Title","required");
        $this->form_validation->set_rules('content',"Content","required");
        if($this->form_validation->run()){
            $this->db->insert("reviews", array_merge($this->input->post(),array('cus_id' => $user['id'])) );
            echo json_encode(array('errors'=> "" , 'result' => true ) ) ;
        }else{
            echo json_encode(array('result' => false ,'errors'=> explode('-',validation_errors('-',' ') )) ) ;
        }
    }

    // view the products by menu id
    function mainMenu($id){
        $d['top'] = $this->banner->getBy(array( 'status'=>1 , 'position' => 1 ) , 1 , null , array('order_by'=>'id DESC') );

        $d['popular']  = $this->pro->getHomeWithDetails($this->pro->new_arrivals,4);
        //$d['narrow']  = $this->op->getNarrow($id);

        $d['category'] = $this->cat->getBy(array('status ' => 1 ,"category_id" => 0 ) , null , "id,title,short,image,icon" );
        foreach($d['category'] as &$cat  ) {
            $cat->sub = $this->cat->getBy(array('status' => 1 ,"category_id" => $cat->id ) , null , "id,title"  );
            foreach($cat->sub as &$sub ){
                $sub->count = $this->pro->getProCount($sub->id);
            }
        }

        $d['menu'] = $this->cat->getBy(array('status ' => 1 ,"id" => $id ) , 1 , "id,title,banner,short,description , meta_key , meta_des" );
        $d['mainmenu'] = &$d['menu']  ;
        $d['meta_key'] =   ",{$d['menu']->meta_key}";
        $d['meta_des'] = $d['menu']->meta_des ;
        $d['link'] = url_title($d['menu']->title)."/".$d['menu']->id;

        $d['limit']   = $this->input->get('limit') ?  $this->input->get('limit') : LIMIT ;


        $d = array_merge($d, $this->pro->getProList( $id , "{$this->pro->table}.id,title,image,short,discount" )) ;

        $this->load->view("product_list",$d);


    }

    function subMenu($menu,$id){
        $d['top'] = $this->banner->getBy(array( 'status'=>1 , 'position' => 1 ) , 1 , null , array('order_by'=>'id DESC') );

        $d['popular']  = $this->pro->getHomeWithDetails($this->pro->new_arrivals,4);
        $d['narrow']  = $this->op->getNarrow($id);

        $d['category'] = $this->cat->getBy(array('status ' => 1 ,"category_id" => 0 ) , null , "id,title,short,image,icon" );
        foreach($d['category'] as &$cat  ) {
            $cat->sub = $this->cat->getBy(array('status' => 1 ,"category_id" => $cat->id ) , null , "id,title"  );
            foreach($cat->sub as &$sub ){
                $sub->count = $this->pro->getProCount($sub->id);
            }
        }

        $d['menu'] = $this->cat->getBy(array('status ' => 1 ,"id" => $id ) , 1 , "id,title,banner , short,description ,meta_key ,meta_des "  );
        $d['mainmenu'] = $this->cat->getBy(array('status ' => 1 ,"id" => $menu ) , 1 , "id,title,image,short,description ,meta_key" );

        $d['meta_key'] = $d['menu']->meta_key ;
        $d['meta_key'] .=  ",{$d['mainmenu']->meta_key}";
        $d['meta_des'] = $d['menu']->meta_des ;

        $d['link'] = url_title($d['mainmenu']->title)."/".$d['mainmenu']->id."/".url_title($d['menu']->title)."/".$d['menu']->id;

        $d['limit']   = $this->input->get('limit') ?  $this->input->get('limit') : LIMIT ;

        $con['category'] = $id;

        $d = array_merge($d, $this->pro->getProList( $id , "{$this->pro->table}.id,title,image,short , discount" )) ;

        $this->load->view("product_list",$d);
    }

    function clearance($view){
        switch($view){
            case 'clearance': $this->_clearance();break;
        }
    }

    function _clearance(){
        $d['top'] = $this->banner->getBy(array( 'status'=>1 , 'position' => 1 ) , 1 , null , array('order_by'=>'id DESC') );

        $d['category'] = $this->cat->getBy(array('status ' => 1 ,"category_id" => 0 ) , null , "id,title,short,image,icon" );
        foreach($d['category'] as &$cat  ) {
            $cat->sub = $this->cat->getBy(array('status' => 1 ,"category_id" => $cat->id ) , null , "id,title"  );
        }

        $d['products'] = $this->pro->getBy(array('status ' => 1 , "clearance" =>1 ) , "id,title,image,short,price,clearance,clearance_discount" );


    }

    function pro_list($type){
        switch($type){
            case 1 : $table = "new_arrivals"; $d['menu'] = "New Arrival"; break;
            case 2 : $table = "todaydeals"; $d['menu'] = "Todays Deals"; break;
            case 3 : $table = "buyonegetone"; $d['menu'] = "Buy One Get One"; break;
            case 4 : $table = "bundleoffer"; $d['menu'] = "Bundle Offer"; break;
            case 5 : $table = "belowhunderd"; $d['menu'] = "Below 100 LKR"; break;
            default : show_404(); break;
        }

        $d['category'] = $this->cat->getBy(array('status ' => 1 ,"category_id" => 0 ) , null , "id,title,short,image,icon" );
        foreach($d['category'] as &$cat  ) {
            $cat->sub = $this->cat->getBy(array('status' => 1 ,"category_id" => $cat->id ) , null , "id,title"  );
            foreach($cat->sub as &$sub ){
                $sub->count = $this->pro->getProCount($sub->id);
            }
        }
        $d['top'] = $this->banner->getBy(array( 'status'=>1 , 'position' => 1 ) , 1 , null , array('order_by'=>'id DESC') );
        $d['products'] = array_reverse($this->pro->getHomeWithDetails($table)) ;
        $d['count'] =  count($d['products']) ;

        $this->load->view("pro_list",$d);

    }



    function search(){
        $d['top'] = $this->banner->getBy(array( 'status'=>1 , 'position' => 1 ) , 1 , null , array('order_by'=>'id DESC') );

        $d['category'] = $this->cat->getBy(array('status ' => 1 ,"category_id" => 0 ) , null , "id,title,short,image,icon" );
        foreach($d['category'] as &$cat  ) {
            $cat->sub = $this->cat->getBy(array('status' => 1 ,"category_id" => $cat->id ) , null , "id,title"  );
            foreach($cat->sub as &$sub ){
                $sub->count = $this->pro->getProCount($sub->id);
            }
        }

        $d = array_merge( $d ,  $this->pro->getProSearch( $this->input->get('cate') ,"{$this->pro->table}.id,title,image,short ,clearance,clearance_discount") );


        $this->load->view('search',$d);
    }

    function write(){
        $d['top'] = $this->banner->getBy(array( 'status'=>1 , 'position' => 1 ) , 1 , null , array('order_by'=>'order_no DESC') );

        $product = $this->pro->getBy(array('id' => $this->input->get('product_id') ) , 1 );

        $com = $this->com->getBy(array('id'=> $product->company_id  ), 1 );


        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('text', 'Message', 'required|min_length[10]');

        if ($this->form_validation->run() == TRUE){

            $e_body = 	"You have Received a message from: "
                .$this->input->post('name')
                . "\n"
                ."Their additional message is as follows."
                ."\r\n\n";

            $e_content = "\" {$this->input->post('text')} \"\r\n\n";

            $e_reply = 	"You can contact "
                .$this->input->post('name')
                . " via email, "
                .$this->input->post('email');

            $e_subject = 'You Have Received a Message From ' . $this->input->post('name') . '.';

            $msg = $e_body . $e_content . $e_reply;


            $this->load->library('email');
            $this->email->from($this->input->post('email'), $this->input->post('name'));
            $this->email->to('gowtham@itmartx.com');
            $this->email->cc($com->email);
            $this->email->subject($e_subject);
            $this->email->message($msg);
            $this->email->send();

            echo json_encode(array('success' => "Thank You For you Inquiry we will contact you soon..." ));

        }else{
            echo json_encode( array('error' => validation_errors() ) );
        }

    }

    function sendtoafriend(){

        $this->load->model('Customer','cus');
        $user = $this->session->userdata("front_user") ;
        $d['customer'] = $this->cus->getBy(array('id'=> $user['id']  ) , 1 ) ;
		
		$id = $this->input->get_post("id_product") ;

		$pro = $this->pro->getBy(array("{$this->pro->table}.id" => $id ) , 1 );

		$pro->cart_qty = $this->cart->in_cart($pro->id , 'id','qty');
        if(! is_float($pro->cart_qty)) $pro->cart_qty =1 ;

		// $d['product']  = $pro;

        $options  = $this->pro->getStock($id) ;
        $d['options'] = $options ;
        if( !empty($options['all']) ) {
            $pro->price = $options['all'][0]->price ;
            $pro->qty = $options['all'][0]->qty ;
        }else{

        } 

        $d['pro'] = $pro ;  
		//pro->getBy(array("{$this->pro->table}.id" => $this->input->get_post("id_product") ) , 1 );
		//echo $this->db->last_query(); 
        ob_start();
        $this->load->view('inc/email-sent_to_friend',$d);
        $mge = ob_get_contents();
        ob_clean();

        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
		if(!empty($d['customer'])){
			$this->email->from($d['customer']->email, $d['customer']->firtname);
		}else{
				$this->email->from(EMAIL,'luxuryhandcraft.com');
		}        
        $this->email->to( $this->input->get_post("email")  );

        $this->email->subject(PROJECT_TITLE."- ".$d['pro']->title);
        $this->email->message($mge);
        echo $this->email->send() ? TRUE : FALSE;
    }
    function recommended(){}
    function accessories(){}

}