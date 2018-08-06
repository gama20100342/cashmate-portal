<?php

class LangHelper extends Helper{

    public function showNationality(){

        $nationalities = array(
            'Afghan',
            'Argentine',
            'Spanish',
            'Australian',
            'Belgian',
            'Bolivian',
            'Brazilian',
            'Cambodian',
            'Cameroonian',
            'Canadian',
            'Chilean',
            'Chinese',
            'Colombian',
            'Costa Rican',
            'Cuban',
            'Danish',
            'Dominican',
            'Ecuadorian',	
            'Egyptian',	
            'Salvadorian',	
            'English',	
            'Estonian',	
            'Ethiopian',
            'Finnish',
            'French',
            'German',
            'Ghanaian',
            'Greek',
            'Guatemalan',
            'Haitian',
            'Honduran',
            'Indonesian',
            'Iranian',
            'Irish',
            'Israeli',
            'Italian',
            'Japanese',
            'Jordanian',	
            'Kenyan',
            'Laotian',	
            'Latvian',	
            'Lebanese',	
            'Lithuanian',	
            'Malaysian',	
            'Mexican',
            'Moroccan',	
            'Dutch',
            'New Zealander',
            'Nicaraguan',	
            'Norwegian',	
            'Panamanian',	
            'Paraguayan',	
            'Peruvian',	
            'Filipino',	
            'Polish',	
            'Portuguese',	
            'Puerto Rican',	
            'Romanian',	
            'Russian',	
            'Saudi',	
            'Scottish',	
            'Korean',	
            'Spanish',	
            'Swedish',	
            'Swiss',	
            'Taiwanese',	
            'Tajik',	
            'Thai',	
            'Turkish',	
            'Ukrainian',	
            'British',	
            'American',
            'Uruguayan',	
            'Venezuelan',	
            'Vietnamese',	
            'Welsh',	
        );

        return $nationalities;
    }

    public function showStatus(){
        $string = array(
            'Married', 'Widowed', 'Separated', 'Divorced', 'Single'
        );

        $new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = $str;
        endforeach;

        return $new_arr;
    }
	
	public function ListofIds() {
		$string = array(
			'Philippine passport',
			'Driver’s License',
			'SSS UMID Card',
			'GSIS eCard',
			'Digitized Postal ID',
			'PRC ID',
			'IBP ID',
			'OWWA ID',
			'Diplomat ID',
			'OFW ID',
			'Senior Citizen ID',
			'Voter’s ID',
			'GOCC and Government Office ID'
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = $str;
        endforeach;

        return $new_arr;
		
		
	}
	
	public function listofController(){
		$string = array(
			'atmstations',
			'branches',
			'cardapplications',
			'cardholders',
			'cardnos',
			'cards',
			'cardstatuses',
			'cardtypes',
			'currencies',
			'groups',
			'groupsettings',
			'groupsettingscategories',
			'partners',
			'passwordhistories',
			'postations',
			'settings',
			'statuses',
			'terminals',
			'transactiontypes',
			'transbalanceinquiries',
			'transbillspayments',
			'transcashouts',
			'transchangepins',
			'transloadcashes',
			'transpurchases',
			'useravatars',
			'users',
			'usertokens',
			'withdrawals'
		);
		
		$new_arr = array();

        foreach($string as $str):
            $new_arr[$str] = $str;
        endforeach;

        return $new_arr;
	}

}


