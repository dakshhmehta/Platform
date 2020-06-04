<?php

return [
    'name' => 'Contact',
    'table_columns' => [
        'full_name' => function(&$row){
            $value = '';

            if($row->company_name != ''){
                $value .= '<b>'.$row->company_name.'</b><br/>';
            }

            $value .= $row->full_name;

            return $value;
        },
        'email',
        'phone' => function(&$row){
            if($row->phone != ''){
                return $row->phone;
            }

            if($row->mobile1 != ''){
                return $row->mobile1;
            }
            if($row->mobile2 != ''){
                return $row->mobile2;
            }

            if($row->landline1 != ''){
                return $row->landline1;
            }
            if($row->landline2 != ''){
                return $row->landline2;
            }
        },
        'city' => function(&$row){
            $address = $row->billingAddress();

            return $address->city.', '.$address->state;
        }
    ],

    'fillable' => [],
];
