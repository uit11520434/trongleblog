<?php
#-----------------------------------------------------------------
# Columns
#-----------------------------------------------------------------

$themeum_shortcodes = array();



//Basic
$themeum_shortcodes['header_1'] = array( 
    'type'=>'heading', 
    'title'=>__('Basic', 'themeum')
    );



//container
$themeum_shortcodes['themeum_container'] = array( 
    'type'=>'simple', 
    'title'=>__('Container', 'themeum')
    );


$themeum_shortcodes['themeum_divider'] = array( 
    'type'=>'radios', 
    'title'=>__('Divider', 'themeum'), 
    'attr'=>array(
        'size'=>array(
            'type'=>'select', 
            'title'=> __('Divider Size', 'themeum'), 
            'values'=>array(
                'divider-default'   =>'Default',
                'divider-lg'        =>'Large',
                'divider-md'        =>'Medium',
                'divider-sm'        =>'Small',
                'divider-xs'        =>'Extra Small',
                )
            ),
        ) 

    );

$cols = array('1' => 'Column one','1/2' => 'Column 1/2', '1/3' => 'Column 1/3', '1/4' => 'Column 1/4', '2/3' => 'Column 2/3', '3/4' => 'Column 3/4');

// columns
$themeum_shortcodes['themeum_column'] = array( 
    'type'=>'text', 
    'title'=>__('Column', 'themeum' ), 
    'attr'=>array(
         'col'=>array(
            'type'=>'select', 
            'title'=> __('Column Type: ', 'themeum'),
            'values'=>$cols
        )
    )

    );


//Elements
$themeum_shortcodes['header_3'] = array( 
    'type'=>'heading', 
    'title'=>__('Elements', 'themeum')
);


//Button
$themeum_shortcodes['themeum_button'] = array( 
    'type'=>'radios', 
    'title'=>__('Button', 'themeum'), 
    'attr'=>array(

        'size'=>array(
            'type'=>'select', 
            'title'=> __('Button Size', 'themeum'), 
            'values'=>array(
                ''     =>'Default',
                'lg'   =>'Large',
                'sm'   =>'Medium',
                'xs'   =>'Small',
                )
            ),

        'type'=>array(
            'type'=>'select', 
            'title'=> __('Button Type', 'themeum'), 
            'values'=>array(
                'default'=>'Default',
                'primary'=>'Primary',
                'success'=>'Success',
                'info'  =>'Info',
                'warning'=>'Warning',
                'danger'=>'Danger',
                'link'=>'Link',
                )
            ),

        'url'=>array(
            'type'=>'text', 
            'title'=>__('Link URL', 'themeum')
            ),
        'text'=>array(
            'type'=>'text', 
            'title'=>__('Text', 'themeum')
            ),
        ) 

    );

// alert
$themeum_shortcodes['themeum_alert'] = array( 
    'type'=>'simple', 
    'title'=>__('Alert', 'themeum' ),
    'attr'=>array(
        'close'=>array(
            'type'=>'select', 
            'title'=> __('Show Close Button', 'themeum'), 
            'values'=>  array( 'no'=>'No', 'yes'=>'Yes' )
            ),  
        'type'=>array(
            'type'=>'select', 
            'title'=> __('Alert Type', 'themeum'), 
            'values'=>  array( 'none'=>'None', 'success'=>'Success', 'info'=>'Info', 'warning'=>'Warning', 'danger'=>'Danger' )
            ),  
        'title'=>array(
            'type'=>'text', 
            'title'=> __('Alert Title', 'themeum')
            ),
        ) 

    );

// skill
$themeum_shortcodes['themeum_skill'] = array( 
    'type'=>'radios', 
    'title'=>__('Skill', 'themeum' ),
    'attr'=>array( 
        'width'=>array(
            'type'=>'text', 
            'title'=> __('Width, Ex. 80', 'themeum')
            ),        

        'label'=>array(
            'type'=>'text', 
            'title'=> __('Label, Ex. HTML', 'themeum')
            ),
        ) 

    );

$themeum_shortcodes['themeum_tabs'] = array( 
    'type'=>'dynamic', 
    'title'=>__('Tabs', 'themeum' ), 
    'attr'=>array(
        'tabs'=>array('type'=>'custom')
        )
    );

$themeum_shortcodes['themeum_accordion'] = array( 
    'type'=>'dynamic', 
    'title'=>__('Accordion', 'themeum' ), 
    'attr'=>array(
        'accordion'=>array('type'=>'custom')
        )
    );