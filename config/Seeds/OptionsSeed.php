<?php

use Migrations\AbstractSeed;

/**
 * Hashtags Seed
 */
class OptionsSeed extends AbstractSeed {

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     * category
     * option_name
     * option_value
     * default_value
     */
    public function run() {
        $data = [
            [
                'category' => 'General',
                'option_name' => 'footer_about_us',
                'option_value' => 'About Unify dolor sit amet, consectetur adipiscing elit. Maecenas eget nisl id libero tincidunt sodales.',
                'default_value'=> 'About Unify dolor sit amet, consectetur adipiscing elit. Maecenas eget nisl id libero tincidunt sodales.'
            ],
            [
                'category' => 'General',
                'option_name' => 'footer_address_line_one',
                'option_value' => '795 Folsom Ave, Suite 600,',
                'default_value'=> '795 Folsom Ave, Suite 600,'
            ],
            [
                'category' => 'General',
                'option_name' => 'office_address_line_two',
                'option_value' => 'San Francisco, CA 94107 795',
                'default_value'=> 'San Francisco, CA 94107 795'
            ],
            [
                'category' => 'General',
                'option_name' => 'office_primary_phone_number',
                'option_value' => '(+123) 456 7890',
                'default_value'=> '(+123) 456 7890'
            ],
            [
                'category' => 'General',
                'option_name' => 'office_secondary_phone_number',
                'option_value' => '(+123) 456 7891',
                'default_value'=> '(+123) 456 7891'
            ],
            [
                'category' => 'General',
                'option_name' => 'office_primary_email',
                'option_value' => 'info@earwithsms.com',
                'default_value'=> 'info@earwithsms.com'
            ],
            [
                'category' => 'General',
                'option_name' => 'office_secondary_email',
                'option_value' => 'support@earwithsms.com',
                'default_value'=> 'support@earwithsms.com'
            ],
            [
                'category' => 'General',
                'option_name' => 'contact_receiver_email',
                'option_value' => 'contact@earwithsms.com',
                'default_value'=> 'contact@earwithsms.com'
            ],
            [
            'category' => 'PayTM',
            'option_name' => 'payment_receiver_mobile_number',
            'option_value' => '9463976909',
            'default_value'=> '9463976909'
            ]
        ];
        
        $table = $this->table('options');

        $table->insert($data)->save();
    }
}
