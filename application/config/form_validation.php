<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array (
	'memberInfo' => array (
		array(
		        'field' => 'id',
		        'label' => 'ID',
		        'rules' => 'required|min_length[5]|max_length[5]|is_unique[memberInfo.id]|numeric'
			),
		array(
		        'field' => 'name',
		        'label' => 'Member Name',
		        'rules' => 'required|min_length[3]|max_length[30]|is_unique[memberInfo.name]|callback_nameValidation'
			),
		array(
		        'field' => 'phone',
		        'label' => 'Phone Number',
		        'rules' => 'required|min_length[11]|max_length[11]|numeric|is_unique[memberInfo.phone]'
		    ),
		array(
		        'field' => 'email',
		        'label' => 'Email',
		        'rules' => 'valid_email|is_unique[memberInfo.email]'
		    ),
		array(
		        'field' => 'gender',
		        'label' => 'Gender',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'nid',
		        'label' => 'NID',
		        'rules' => 'numeric|is_unique[memberInfo.nid]'
		    ),
		array(
		        'field' => 'address',
		        'label' => 'Address',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'password',
		        'label' => 'Password',
		        'rules' => 'required|min_length[6]'
		    ),
		
		array(
		        'field' => 'profession',
		        'label' => 'Profession',
		        'rules' => ''
		    ),
	),
	'editmemberInfo' => array (
		array(
		        'field' => 'name',
		        'label' => 'Member Name',
		        'rules' => 'required|min_length[3]|max_length[30]|callback_nameValidation'
			),
		array(
		        'field' => 'phone',
		        'label' => 'Phone Number',
		        'rules' => 'required|min_length[11]|max_length[11]|numeric'
		    ),
		array(
		        'field' => 'email',
		        'label' => 'Email',
		        'rules' => 'valid_email'
		    ),
		array(
		        'field' => 'gender',
		        'label' => 'Gender',
		        'rules' => 'required'
		    ),
		array(
		        'field' => 'nid',
		        'label' => 'NID',
		        'rules' => 'numeric'
		    ),
		array(
		        'field' => 'address',
		        'label' => 'Address',
		        'rules' => 'required'
		    )
	),
	'product' => array (
		array(
		        'field' => 'name',
		        'label' => 'Product Name',
		        'rules' => 'required|is_unique[product.p_name]'
			),
	),
	'bazar' => array (
		array(
		        'field' => 'amount',
		        'label' => 'Product amount',
		        'rules' => 'required|numeric'
			),
	),
	'action' => array (
		array(
		        'field' => 'meal',
		        'label' => 'Meal',
		        'rules' => 'required|numeric'
			),array(
		        'field' => 'day',
		        'label' => 'Day',
		        'rules' => 'required|numeric'
			),
	),
	'password' => array (
		array(
		        'field' => 'cp',
		        'label' => 'current password',
		        'rules' => 'required|callback_oldpass'
			),
		array(
		        'field' => 'np',
		        'label' => 'new password',
		        'rules' => 'required|min_length[8]|callback_newpass'
			),
		array(
		        'field' => 'cnp',
		        'label' => 'confirm password',
		        'rules' => 'required|matches[np]'
			),
	),
	'meal' => array (
		array(
		        'field' => 'breakfast',
		        'label' => 'Breakfast',
		        'rules' => 'required|numeric'
			),
		array(
		        'field' => 'lunch',
		        'label' => 'Lunch',
		        'rules' => 'required|numeric'
			),
		array(
		        'field' => 'dinner',
		        'label' => 'Dinner',
		        'rules' => 'required|numeric'
			),
	),
	'payment' => array (
		array(
		        'field' => 'member',
		        'label' => 'Member',
		        'rules' => 'required'
			),
		array(
		        'field' => 'method',
		        'label' => 'Method',
		        'rules' => 'required'
			),
		array(
		        'field' => 'amount',
		        'label' => 'pay amount',
		        'rules' => 'required|numeric'
			),
		array(
		        'field' => 'ramount',
		        'label' => 'Return Amount',
		        'rules' => 'required|numeric'
			),
	)
	
);
