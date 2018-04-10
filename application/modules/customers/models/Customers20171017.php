<?php
Class Customers extends CI_Model
{
    public function createGuest()
    {
        return $this->save([
            'id'=>false,
            'firstname'=>'',
            'lastname'=>'',
            'email'=>'',
            'email_subscribe'=>1,
            'phone'=>'',
            'company'=>'',
            'password'=>'',
            'active'=>1,
            'group_id'=>1,
            'confirmed'=>0,
            'is_guest'=>1,
        ]);
    }

	public function get_customers_form_message($ids){
	CI::db()->select('id, firstname, lastname, email, phone');
	CI::db()->where_in('id', $ids);
	$result = CI::db()->get('customers');
	return $result->result_array();
	}

	public function get_customers_list($limit=0, $offset=0, $order_by='id', $direction='DESC')
    {
        CI::db()->select('id, firstname, lastname');
		CI::db()->where('is_guest', 0)->order_by($order_by, $direction);
        if($limit>0)
        {
            CI::db()->limit($limit, $offset);
        }

        $result = CI::db()->get('customers');
		$customers[] = '--Select--';
		foreach($result->result() as $customer){
		$customers[$customer->id] = $customer->firstname.' '. $customer->lastname;
		}
	   return $customers;
    }
	 public function get_customers_sql($sql, $limit=0, $offset=0)
		{
		$query = $sql." limit ".$offset.','.$limit;
    	$result= CI::db()->query($query);
		return $result->result();
		}
		
		
	 public function count_customers_sql($sql)
	    {
		return CI::db()->query($sql)->num_rows();
    	}	
		
		
    public function get_customers($limit=0, $offset=0, $order_by='customers.id', $direction='DESC', $where=NULL)
    {
	CI::db()->select('customers.*, COUNT(customer_questions.id) as qtotal');
	CI::db()->join('customer_questions', 'customers.id = customer_questions.customer_id', 'left');
	CI::db()->group_by('customer_questions.id');
	if($where){CI::db()->where($where)->order_by($order_by, $direction); }
	else{CI::db()->where('customers.is_guest', 0)->order_by($order_by, $direction);}
     
        if($limit>0)
        {
            CI::db()->limit($limit, $offset);
        }

        $result = CI::db()->get('customers');
        return $result->result();
    }

    public function get_customer_export($limit=0, $offset=0, $order_by='id', $direction='DESC')
    {
        return CI::db()->where('is_guest', 0)->get('customers')->result();
    }

    public function count_customers($where)
    {
        CI::db()->join('customer_questions', 'customers.id = customer_questions.customer_id', 'left');
		CI::db()->group_by('customer_questions.id');
		return CI::db()->where($where)->count_all_results('customers');
    }

    public function get_customer($id)
    {

        $result = CI::db()->get_where('customers', array('id'=>$id));
        return $result->row();
    }

    public function get_address_list($id)
    {
        return CI::db()->where('deleted', 0)->
                order_by('country', 'ASC')->
                order_by('zone', 'ASC')->
                order_by('city', 'ASC')->
                order_by('address1', 'ASC')->
                order_by('address2', 'ASC')->
                order_by('company', 'ASC')->
                order_by('firstname', 'ASC')->
                order_by('lastname', 'ASC')->
                where('customer_id', $id)->
                get('customers_address_bank')->result_array();
    }

    public function count_addresses($id)
    {
        return CI::db()->where('deleted', 0)->where('customer_id', $id)->from('customers_address_bank')->count_all_results();
    }

    public function get_address($address_id)
    {
        return CI::db()->where('id', $address_id)->get('customers_address_bank')->row_array();
    }

    public function save_address($data)
    {
       
	    if(!empty($data['id']))
        {
            /***************************
            when saving an address that already exists, make sure it's not in use before updating it.
            if it is in use, set the previous instance to deleted and insert the changes as a new record
            ****************************/
            $used = CI::db()->where('shipping_address_id', $data['id'])->or_where('billing_address_id', $data['id'])->count_all_results('orders');

            if($used > 0)
            {
                CI::db()->where('id', $data['id']);
                CI::db()->update('customers_address_bank', ['deleted'=>1]);
                
                $data['id'] = false;// set ID to false
                CI::db()->insert('customers_address_bank', $data);
                return CI::db()->insert_id();
            }
            else
            {
                CI::db()->where('id', $data['id']);
                CI::db()->update('customers_address_bank', $data);
                return $data['id'];
            }

        } else {
            CI::db()->insert('customers_address_bank', $data);
            return CI::db()->insert_id();
        }
    }

    public function delete_address($id, $customer_id)
    {
        CI::db()->where(array('id'=>$id, 'customer_id'=>$customer_id))->update('customers_address_bank', ['deleted'=>1]);
        return $id;
    }

    public function save($customer)
    {
		if($customer['id'])
        {
            CI::db()->where('id', $customer['id']);
            CI::db()->update('customers', $customer);
            return $customer['id'];
        }
        else
        {
            CI::db()->select_max('id');
     		$result= CI::db()->get('customers')->row_array();
			$customer['customer_id'] = '#AKV'.($result['id']+1);
			CI::db()->insert('customers', $customer);
            return CI::db()->insert_id();
        }
    }

    public function deactivate($id)
    {
        $customer = array('id'=>$id, 'active'=>0);
        $this->save_customer($customer);
    }

    public function delete($id)
    {
        /*
        deleting a customer will remove all their orders from the system
        this will alter any report numbers that reflect total sales
        deleting a customer is not recommended, deactivation is preferred
        */

        //this deletes the customers record
        CI::db()->where('id', $id);
        CI::db()->delete('customers');

        // Delete Address records
        CI::db()->where('customer_id', $id);
        CI::db()->delete('customers_address_bank');

        //get all the orders the customer has made and delete the items from them
        CI::db()->select('id');
        $result = CI::db()->get_where('orders', array('customer_id'=>$id));
        $result = $result->result();
        foreach ($result as $order)
        {
            CI::db()->where('order_id', $order->id);
            CI::db()->delete('order_items');
        }

        //delete the orders after the items have already been deleted
        CI::db()->where('customer_id', $id);
        CI::db()->delete('orders');
    }

    public function check_email($str, $id=false)
    {
        CI::db()->select('email');
        CI::db()->from('customers');
        CI::db()->where('is_guest', 0)->where('email', $str);
        if ($id)
        {
            CI::db()->where('id !=', $id);
        }
        $count = CI::db()->count_all_results();

        if ($count > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	
	 public function get_customer_byemailid($customer_id=NULL, $email=NULL)
    {
	    CI::db()->select('id');
        CI::db()->from('customers');
		if($customer_id){
		 	CI::db()->where('customer_id', $customer_id);
		}
		if($email){
        	CI::db()->where('email', $email);
		}
	  	return CI::db()->get()->row()->id;
	      
    }
	
	

    public function reset_password($email)
    {
        CI::load()->library('encrypt');
        $customer = $this->get_customer_by_email($email);
        if ($customer)
        {
            CI::load()->helper('string');
            CI::load()->library('email');

            $newPassword = random_string('alnum', 8);
            $customer['password'] = sha1($newPassword);
            $this->save($customer);

            GoCart\Emails::resetPasswordCustomer($newPassword, $email);
            
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_customer_by_email($email)
    {
        $result = CI::db()->get_where('customers', array('email'=>$email));
        return $result->row_array();
    }

    // Customer groups public functions
    public function get_groups()
    {
        return CI::db()->get('customer_groups')->result();
    }

    public function get_group($id)
    {
        return CI::db()->where('id', $id)->get('customer_groups')->row();
    }

    public function delete_group($id)
    {
        CI::db()->where('id', $id);
        CI::db()->delete('customer_groups');
    }

    public function save_group($data)
    {
        if(!empty($data['id']))
        {
            CI::db()->where('id', $data['id'])->update('customer_groups', $data);
            return $data['id'];
        } else {
            CI::db()->insert('customer_groups', $data);
            $groupId = CI::db()->insert_id();

            //create the new fields.
            CI::load()->dbforge();
            $fields = [
                'enabled_'.$groupId=>[
                    'type'=>'TINYINT',
                    'constraint'=>'1',
                    'default'=>'1'
                ],
                'price_'.$groupId=>[
                    'type'=>'DECIMAL', 
                    'constraint'=>'10,2',
                    'default'=>'0.00'
                ],
                'saleprice_'.$groupId=>[
                    'type'=>'DECIMAL', 
                    'constraint'=>'10,2',
                    'default'=>'0.00'
                ]
            ];
            CI::dbforge()->add_column('products', $fields);
            CI::dbforge()->add_column('order_items', $fields);

            $fields = [
                'enabled_'.$groupId=>[
                    'type'=>'TINYINT',
                    'constraint'=>'1',
                    'default'=>'1'
                ]
            ];
            CI::dbforge()->add_column('categories', $fields);
        }
    }
	
	public function change_password($email, $password)
    {
        CI::load()->library('encrypt');
        $customer = $this->get_customer_by_email($email);
        if ($customer)
        {
            CI::load()->helper('string');
            CI::load()->library('email');

            $newPassword = $password;
            $customer['password'] = sha1($newPassword);
            $this->save($customer);

            GoCart\Emails::resetPasswordCustomer($newPassword, $email);
            
            return true;
        }
        else
        {
            return false;
        }
    }
	
		public function chack_old_password($email, $newPassword)
    {
        CI::load()->library('encrypt');
        $customer = $this->get_customer_by_email($email);
        if ($customer)
        {
            CI::load()->helper('string');          
            return CI::db()->where('password', sha1($newPassword))->get('customers')->row();
        }
    }
	
	public function sendanswernotification($save){
	GoCart\Emails::sendAnsweremail($save);
	}
	
	public function get_questions($limit=0, $offset=0, $order_by='id', $direction='DESC'){
	
	// CI::db()->where('is_guest', 0)->order_by($order_by, $direction);
		  CI::db()->select('customer_questions.*, module_bookings.first_name, module_bookings.last_name, module_bookings.email, module_bookings.phone');
		   CI::db()->join('module_bookings', 'customer_questions.booking_id = module_bookings.id', 'left');
		  CI::db()->order_by($order_by, $direction);
        if($limit>0)
        {
            CI::db()->limit($limit, $offset);
        }

        $result = CI::db()->get('customer_questions');
        return $result->result();
	}
	public function count_questions(){
	 	CI::db()->select('customer_questions.*, customers.firstname, customers.lastname');
		CI::db()->join('customers', 'customer_questions.customer_id = customers.id', 'left');
        CI::db()->from('customer_questions');
		return CI::db()->count_all_results();
	}	
	
	
	public function get_question($id){
	  		CI::db()->select('customer_questions.*, customers.firstname, customers.lastname');
			CI::db()->from('customer_questions');
		  	CI::db()->join('customers', 'customer_questions.customer_id = customers.id', 'left');
			CI::db()->where('customer_questions.id', $id);
		$result = CI::db()->get();
        return $result->row();
	}
	
	public function get_report_form($id){
			
	  		CI::db()->select('customer_questions.*, module_bookings.first_name, module_bookings.last_name, module_bookings.email, module_bookings.phone, module_bookings.language,module_bookings.gender, module_bookings_options.mname, module_bookings_options.mminute, module_bookings_options.mhour, module_bookings_options.mday, module_bookings_options.mmonth, module_bookings_options.myear, module_bookings_options.mbirth_place, module_bookings_options.mlatitude, module_bookings_options.mlongitude,module_bookings_options.mtimezone');
			CI::db()->from('customer_questions');
		  	CI::db()->join('module_bookings', 'customer_questions.booking_id = module_bookings.id', 'left');
			CI::db()->join('module_bookings_options', 'customer_questions.booking_id = module_bookings_options.booking_id', 'left');
			CI::db()->where('customer_questions.id', $id);
			//$result = CI::db()->get()->row();
        return CI::db()->get()->row();
	}
	
	public function delete_question($id){
	 	CI::db()->where('id', $id);
        CI::db()->delete('customer_questions');
	}
	
	
	
	
	 public function savequestion($question)
    {
		if($question['id'])
        {
            CI::db()->where('id', $question['id']);
            CI::db()->update('customer_questions', $question);
            return $question['id'];
        }
        else
        {
            CI::db()->insert('customer_questions', $question);
            return CI::db()->insert_id();
        }
    }
	
	public function update_booking_and_options($booking, $booking_options, $booking_id){
	
			CI::db()->where('id', $booking_id);
            CI::db()->update('module_bookings', $booking);
			
			CI::db()->where('booking_id', $booking_id);
            CI::db()->update('module_bookings_options', $booking_options);
			return $booking_id;	
	}
	
	
	
	public function get_customer_questions($customer_id){
		CI::db()->select('customer_questions.*');
		CI::db()->join('customers', 'customer_questions.customer_id = customers.id', 'left');
        CI::db()->from('customer_questions');
	    CI::db()->where('customer_questions.customer_id', $customer_id);
		CI::db()->order_by('customer_questions.id', 'desc');
		return CI::db()->get()->result();
	}
	
	public function send_message($customer, $temp_id){
	GoCart\Emails::sendEmailMessage($customer, $temp_id);	
	return true;
	}
	
	public function send_sms_message($customer, $temp_id){ //$customer['phone'] = '9028381460';
	 	$loader = new \Twig_Loader_String();
        $twig = new \Twig_Environment($loader);	
		$cannedMessage = \CI::db()->where('id', $temp_id)->get('canned_messages')->row_array();
        $content = $twig->render($cannedMessage['content'], $customer);
		\CI::Pages()->send_sms($customer['phone'], $content);		
	}
	
	
	public function get_enquiries($limit=0, $offset=0, $order_by='id', $direction='DESC'){
		   CI::db()->select('module_bookings.*');
		  // CI::db()->where('module_bookings.email !=', '');
		 //CI::db()->join('customers', 'customer_questions.customer_id = customers.id', 'left');
		 CI::db()->order_by($order_by, $direction);
        if($limit>0)
        {
            CI::db()->limit($limit, $offset);
        }

        $result = CI::db()->get('module_bookings');
        return $result->result();
	}
	public function count_enquiries(){
	 	CI::db()->select('module_bookings.*');
		//CI::db()->where('module_bookings.email !=', '');
        CI::db()->from('module_bookings');
		return CI::db()->count_all_results();
	}	
	public function get_reports_questions($type, $limit=0, $offset=0, $order_by='id', $direction='DESC'){
	
	// CI::db()->where('is_guest', 0)->order_by($order_by, $direction);
	 	 CI::db()->select('customer_questions.*, module_bookings.first_name, module_bookings.last_name, module_bookings.email, module_bookings.phone,module_bookings.language, module_bookings_options.mname');
		  CI::db()->join('module_bookings', 'customer_questions.booking_id = module_bookings.id', 'left');
		  CI::db()->join('module_bookings_options', 'module_bookings_options.booking_id = module_bookings.id', 'left');
		  
		  if($type == 'basic_horoscope_pdf'){
		  CI::db()->where('customer_questions.question', 'Get Report.');
		  CI::db()->or_where('customer_questions.question', 'Get Story of My Life report.');
		  CI::db()->or_where('customer_questions.question', 'Get Story of My Life basic report (25 pages).');
		  }
		  elseif($type == 'pro_horoscope_pdf'){
		  CI::db()->or_where('customer_questions.question', 'Get Story of My Life extended report (70 pages).');
		  }
		 CI::db()->order_by($order_by, $direction);
        if($limit>0)
        {
            CI::db()->limit($limit, $offset);
        }

        $result = CI::db()->get('customer_questions');
        return $result->result();
	}
	public function count_get_reports_questions(){
	 	 CI::db()->select('customer_questions.*, module_bookings.first_name, module_bookings.last_name, module_bookings.email, module_bookings.phone');
		  CI::db()->join('module_bookings', 'customer_questions.booking_id = module_bookings.id', 'left');
		   CI::db()->from('customer_questions');
		  CI::db()->where('customer_questions.question', 'Get Report.');
		return CI::db()->count_all_results();
	}	
	public function questions_read_mark($questionid){
	 	 CI::db()->select('customer_questions.id, customer_questions.read_mark');
		   CI::db()->from('customer_questions');
		  CI::db()->where('customer_questions.id', $questionid);
		  
		  $question = CI::db()->get()->row();
		  if($question->read_mark == 1){
		  	$quetiondata['read_mark'] = 0;		  
		  }else{
		  $quetiondata['read_mark'] = 1;	
		  }
		   CI::db()->where('customer_questions.id', $questionid);
		  CI::db()->update('customer_questions', $quetiondata);
		return $questionid;
	}
	
	
	
	
	public function get_report_question($id){
		  CI::db()->select('customer_questions.*, module_bookings.*, module_bookings_options.*');
		  CI::db()->join('module_bookings', 'customer_questions.booking_id = module_bookings.id', 'left');
		  CI::db()->join('module_bookings_options', 'module_bookings_options.booking_id = customer_questions.booking_id', 'left');
		  CI::db()->where('customer_questions.id', $id);
		  $result = CI::db()->get('customer_questions');
          return $result->row();
	}	
	public function sendreporttocustomer($emaildata){
				GoCart\Emails::sendreporttocustomer($emaildata);
	}
	
	public function create_pdf($oldfile, $mdata, $doenload=false){
\CI::load()->library('tcpdf/TCPDF');
\CI::load()->library('fpdi/FPDI');
$fontname = TCPDF_FONTS::addTTFfont(FCPATH.'uploads/ufonts.com_geometric-415-medium-bt.ttf', 'TrueTypeUnicode', '', 96);
\CI::TCPDF()->SetFont($fontname, 'B', 36, '', false);
//\CI::TCPDF()->SetFont('helvetica', 'B', 36);

\CI::TCPDF()->SetPrintHeader(false);

// add a page
\CI::TCPDF()->AddPage('P',array(215, 298));
// get the current page break margin
$bMargin = \CI::TCPDF()->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = \CI::TCPDF()->getAutoPageBreak();
// disable auto-page-break
\CI::TCPDF()->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = FCPATH.'uploads/new-front-cover-2.jpg';
\CI::TCPDF()->Image($img_file, 0, 0, 215, 298, '', '', '', false, 300, '', false, false, 0);
// create some HTML content
$html = '<table border="0" cellspacing="0" cellpadding="0">
<tr><th colspan="4" height="640">&nbsp;</th></tr>
    <tr>
        <th></th>        
        <th align="right" colspan="3" style="color:#ef777d;">'.$mdata['name'].'</th>
    </tr>
	   <tr>
        <th></th>      
        <th colspan="3" align="right" style="font-size:14px;color:#6d6e71;">'.date('jS-F-Y ', strtotime($mdata['year'].'-'.$mdata['month'].'-'.$mdata['day'])).'<br> Time: '.date('h:i a', strtotime($mdata['hour'].':'.$mdata['min'])).'<br>'.$mdata['place'].'</th>
    </tr>	
	</table>';

// output the HTML content
\CI::TCPDF()->writeHTML($html, true, false, true, false, '');
\CI::TCPDF()->AddPage('P',array(215, 298));
// get the current page break margin
$bMargin = \CI::TCPDF()->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = \CI::TCPDF()->getAutoPageBreak();
// disable auto-page-break
\CI::TCPDF()->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = FCPATH.'uploads/new-back-cover.png';
\CI::TCPDF()->Image($img_file, 0, 0, 215, 298, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
\CI::TCPDF()->SetAutoPageBreak($auto_page_break, $bMargin);

//\CI::TCPDF()->Cell(200, 490, '', 0, 0, 'C', 0, '', 0, false, 'T', 'M');
// set the starting point for the page content
\CI::TCPDF()->setPageMark();
\CI::TCPDF()->lastPage();

$custom_file_path = FCPATH.'uploads/reports/custom_pdf.pdf';	
	
	 \CI::TCPDF()->Output($custom_file_path, "F");
$second_page = 	FCPATH.'uploads/second_page.pdf';	 	 
	 $files = array($custom_file_path, $second_page,  $oldfile);

	 foreach($files as $key => $file) {
               $pagecount =  \CI::FPDI()->setSourceFile($file);
               for ($i = 1; $i <= $pagecount; $i++) { //echo $i;
			   if(($key == 2 && $i == 1) || ($key == 2 && $i == 25 || ($key == 0 && $i == 2))){
			   
			   }
			   elseif($key == 1 && $i == 1){
			   
			   $tplidx = \CI::FPDI()->ImportPage($i);
                    $s = \CI::FPDI()->getTemplatesize($tplidx);
                    \CI::FPDI()->AddPage('P', array(215, 298));
                    \CI::FPDI()->useTemplate($tplidx); 
					// \CI::FPDI()->SetY(-1);
					//\CI::FPDI()->Cell(0,10, \CI::FPDI()->PageNo(),0,0,'L');
			   } 
			   else{
                    $tplidx = \CI::FPDI()->ImportPage($i);
                    $s = \CI::FPDI()->getTemplatesize($tplidx);
					
                    \CI::FPDI()->AddPage('P', array($s['w'], $s['h']));
                    \CI::FPDI()->useTemplate($tplidx);
					//\CI::FPDI()->SetY(-1);
					//\CI::FPDI()->Cell(0,10, \CI::FPDI()->PageNo(),0,0,'L');
					}
               }
          }
				  $pagecount =  \CI::FPDI()->setSourceFile($custom_file_path);
				  for ($i = 1; $i <= $pagecount; $i++) {
				  if($i == 2){
				   $tplidx = \CI::FPDI()->ImportPage($i);
							$s = \CI::FPDI()->getTemplatesize($tplidx);
							\CI::FPDI()->AddPage('P', array($s['w'], $s['h']));
							\CI::FPDI()->useTemplate($tplidx);
				  }
				  }
		  
		 $file_path = FCPATH.'uploads/reports/report_'.$mdata['name'].'.pdf'; 
		 
		 if($doenload){
		 \CI::FPDI()->Output('Report_'.$mdata['name'].'.pdf', "D");
		 }else{
		 \CI::FPDI()->Output($file_path, "F");
		 }	 
		return $file_path;
	}
	
	
	public function create_custom_pdf($filename=NULL, $text ='',  $background){
	\CI::load()->library('tcpdf/TCPDF');
	 	
	\CI::TCPDF()->SetFont('helvetica', 'B', 40);
	
\CI::TCPDF()->SetPrintHeader(false);
// add a page
\CI::TCPDF()->AddPage('P',array(215.9, 279.4));
// get the current page break margin
$bMargin = \CI::TCPDF()->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = \CI::TCPDF()->getAutoPageBreak();
// disable auto-page-break
\CI::TCPDF()->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = FCPATH.'uploads/'.$background;
\CI::TCPDF()->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);

\CI::TCPDF()->Cell(200, 490, $text, 0, 0, 'C', 0, '', 0, false, 'T', 'M');

// restore auto-page-break status
\CI::TCPDF()->SetAutoPageBreak($auto_page_break, $bMargin);

// set the starting point for the page content
\CI::TCPDF()->setPageMark();

\CI::TCPDF()->lastPage();

     $filepath = FCPATH.'uploads/reports/'.$filename.'.pdf';	
	
	 \CI::TCPDF()->Output($filepath, "F");

	return $filepath;
	}
	
	
	public function send_payment_reminder($link, $data){

	GoCart\Emails::send_payment_reminder($link, $data, 24);
	}
	
	
}
