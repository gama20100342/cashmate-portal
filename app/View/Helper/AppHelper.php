<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */


class AppHelper extends Helper {

    public $helpers = array('Html', 'Form');

    public function showUserPicture($image, $size_class, $opt_class){
        
        if(isset($image) && !empty($image)){
            $user_image = $this->Html->image($image, array('class' => 'img-'.$size_class.' '.$opt_class));
        }else{            
            $user_image =  '<div class="user-no-pics-'.$size_class.' '.$opt_class.' bg-666"></div>';
        }

        return $user_image;
    }


    public function CommonHeader($text=null, $bcs=null, $ctr=null){

		$blink = '';
		if(isset($bcs) && !empty($bcs)){
			$blink .='<span class="pull-right">';			
			//if(count($bcs[0]) > 2){
				foreach($bcs[0] as $vw):				
					if($vw=="/"){
						$blink .='<span> &raquo; </span>';
					}else{
						//if(in_array(array("add", "edit"), $vw){							
							$blink .= $this->Html->link($vw, array('controller' => $ctr, 'action' => $vw), array('escape' => false)); 
						//}
					}
				endforeach;
				$blink .='</span>';
			//}
		}
		
		$str = '';
        //$str .= '<legend class="text-uppercase fs-11"><span class="text-default">'.$text.'</span> '.$blink.' </legend>';
        $str .= '<legend class="text-uppercase fs-11"><span class="text-default">'.$text.'</span></legend>';
		$str .= '<div class="clear"></div>';		
		return $str;
    }
    /*---------------------
    |FORM AND BUTTONS
    ---------------------*/
    public function Showbutton($name, $opt_class, $ctrl, $actn, $icon=null, $param1=null, $param2=null, $param3=null){
	   $icon 	= isset($icon) && !empty($icon) ? $icon : 'reply';	   
       $btn 	= $this->Html->link('<i class="fas fa-'.$icon.' fa-lg"></i> '.$name, array('controller' => $ctrl, 'action' => (empty($actn) ? 'index' : $actn), $param1, $param2, $param3), array('class' => 'm-b-5 btn btn-sm '.$opt_class, 'escape' => false));       
       return $btn;
    }

    public function showForminputs($inputs){
        $str = '';
        foreach($inputs as $key => $input):
                
                    $label = (isset($input['label']) && !empty($input['label']) ? $input['label']  : $input['input']);
                    $type =  (isset($input['type']) && !empty($input['type']) ? $input['type']  : 'text');

                    switch($type){
                        case "select":
                            $str .=  $this->Form->input($input['input'], array(                    
                                'div' => 'input-wrap col-md-12 nopadding-left',
                                'type'  => 'select',
                                'label' => $label,
                                'id' => $input['input'],   
                                'disabled' => (isset($input['read-only']) &&  $input['read-only']) ? true : false,
                                'separator' => '',
								'default' => isset($input['selected']) && !empty($input['selected']) ? $input['selected'] : '',
                                'empty' => isset($input['empty']) && !$input['empty'] ? false : '--Choose',
                                'options' => isset($input['options']) && !empty($input['options']) ? $input['options'] : '',
                                'class' => 'noradius noshadow border-bottom text-left form-control comonkeypress input-md '.(isset($input['class']) && !empty(isset($input['class'])) ? $input['class'] : ''),
                                'after' => '<div class="clear"></div>'
                            ));
                        break;  
                        case "textarea":
                            $str .=  $this->Form->input($input['input'], array(                    
                                'div' => 'input-wrap col-md-12 nopadding-left',
                                'type'  => 'textarea',
                                'label' => $label,
                                'id' => $input['input'],       
                                'disabled' => (isset($input['read-only']) &&  $input['read-only']) ? true : false,            
                                'separator' => '',                            
                                'class' => 'noradius noshadow text-left form-control comonkeypress input-md '.(isset($input['class']) && !empty(isset($input['class'])) ? $input['class'] : ''),
                                'after' => '<div class="clear"></div>'
                            ));
                        break;                     
                        default:
                            $str .='<div class="input-wrap col-md-12 nopadding-left '.((isset($input['class']) && $input['class']=="date") ? 'input-group input-with-addon' : '').'">';                            
                                $str .=  $this->Form->input($input['input'], array(                                                    
                                    'type'  => $type,
                                    'label' => $label,
                                    'id' => $input['input'],   
                                    'disabled' => (isset($input['read-only']) &&  $input['read-only']) ? true : false,                
                                    'separator' => '',
									'default' => isset($input['default']) && !empty($input['default']) ? $input['default'] : '',
                                    'placeholder' => isset($input['placeholder']) && !empty($input['placeholder']) ? $input['placeholder'] : '',
                                    'class' => 'noradius noshadow border-bottom text-left form-control comonkeypress input-md '.(isset($input['class']) && !empty(isset($input['class'])) ? $input['class'] : '')                                
                                ));
                            
                                if(isset($input['class']) && $input['class']=="date"){
                                    $str .='<span class="input-group-addon border-bottom"><i class="fas fa-calendar fa-lg cal"></i></span>';
                                }
                             
                            $str .='</div>';
                        break;
                       
                    }
        endforeach;

        return $str;
    }

    public function formEnd($label=null, $id=null, $type=null){
        $type = isset($type) && !empty($type) ? $type : 'button';
        $str    = '';
        $str    .='<button type="button" class="btn btn-success btnsave pull-right m-r-15 m-b-10" id="'.$id.'" form-id="'.$id.'">'.$label.'</button>';
        //$str = $this->Form->submit($label, array('class' => 'btn btn-success btnsave', 'id'=> $id, 'form-id' => $id, 'type' => $type));
        $str    .='</form>';
        return $str;
    }

    public function pageLink($text, $controller, $action, $param1=null, $param2=null, $param3=null){
        $param1 = isset($param1) && !empty($param1) ? $param1 : '';
        $param2 = isset($param2) && !empty($param2) ? $param2 : '';
        $param3 = isset($param3) && !empty($param3) ? $param3 : '';

        return $this->Html->link($text, array('controller' => $controller, 'action' => $action, $param1, $param2, $param3));
    }

    public function btnLink($text, $icon, $controller, $action, $param_1=null, $param_2=null, $param_3=null, $param_4=null, $param_5=null){
        switch($icon){
            case "edit": $icon  = 'edit'; break;
            case "view": $icon  = 'eye';break;
            case "delete": $icon  = 'trash-alt';break;            
            default: $icon = 'edit'; break;
        }

        return $this->Html->link('<i class="fas fa-'.$icon.' fa-lg"></i>', 
            array(
				'controller' => $controller, 
				'action' => $action, 
				(isset($param_1) && !empty($param_1) ? $param_1 :''),
				(isset($param_2) && !empty($param_2) ? $param_2 :''),
				(isset($param_3) && !empty($param_3) ? $param_3 :''),
				(isset($param_4) && !empty($param_4) ? $param_4 :''),
				(isset($param_5) && !empty($param_5) ? $param_5 :''),
			), 
            array('class' =>'pull-right m-l-3 m-r-3', 'escape' => false, 'title' => $text)
        );

    }

    public function tHead($headers, $normal=false, $tableid = null, $noborder=false){
		
		if(empty($tableid)){
			$tableid = 'tableid';			
		}
		
		if($noborder){
			$noborder = 'datatable_defaul_noborder';
		}else{
			$noborder = 'datatable_default';
		}
		
        $str = '';
        $str .='<table id="'.$tableid.'" class="fs-11 '.$noborder.' table commontable'.(($normal) ? 'table' : '').'">';
        $str .='<thead><tr>';
            foreach($headers as $h):
                    $str .='<th class="text-left">'.ucwords($h).'</th>';
            endforeach;
        $str .='</tr></thead><tbody>';
        return $str;
    }

    public function tFoot(){        
        $str  = '</tbody></table>';
        $str .='<div id="table_page_Info_search" class="p-b-10"></div>';
        return $str;
    }

}
