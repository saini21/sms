<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Options Controller
 *
 * @property \App\Model\Table\OptionsTable $Options
 *
 * @method \App\Model\Entity\Option[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OptionsController extends AppController {


    public function settings($category = "General") {
        $options = $this->Options->find('all')->where(['category' => $category]);
        $categories = $this->Options->find('all')->select(['category' => 'DISTINCT Options.category'])->hydrate(false)->toArray();
        $this->set('category', $category);
        $this->set('options', $options);
        $this->set('categories', $categories);
    }

    public function save() {

        $this->autoRender = false;
        $this->responseCode = CODE_BAD_REQUEST;
        $option = $this->Options->find('all')->where(['option_name' => $this->request->data['name']])->first();
        $option->option_value = $this->request->data['value'];
        if ($this->Options->save($option)) {
            $this->responseMessage = __('Saved.');
            $this->responseData = $this->request->data;
        } else {
            $this->responseMessage = __('Something went wrong. Please, try again.');
        }

        echo $this->responseFormat();
        exit;
    }

}
