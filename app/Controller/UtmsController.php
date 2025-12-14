<?php

/**
 * @property Utm $Utm
 */
class UtmsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler', 'Paginator', 'Flash');

    private function _validate($data) {
        if ((isset($data["data_content"]) || isset($data["content"])) && (strtoupper($data["data_content"]) === "NULL" || strtoupper($data["content"]) === "NULL")) {
            $data["data_content"] = null;
        }
        if ((isset($data["data_term"]) || isset($data["term"])) && (strtoupper($data["data_term"]) === "NULL" || strtoupper($data["term"]) === "NULL")) {
            $data["data_term"] = null;
        }

        return $data;
    }

    public function index() {
        $this->Paginator->settings = array(
            'limit' => 20,
            'order' => array('Utm.id' => 'desc'),
            'paramType' => 'querystring'
        );

        $utms = $this->Paginator->paginate('Utm');
        $this->set(compact('utms'));
    }

    public function list() {
        $this->Paginator->settings = array(
            'limit' => 20,
            'order' => array('Utm.id' => 'desc'),
            'paramType' => 'querystring'
        );

        $utms = $this->Paginator->paginate('Utm');
        $this->set(compact('utms'));

        if ($this->Paginator->error) {
            $this->Flash->error(__('Pagination error'));
        }
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Utm->create();
            $data = $this->_validate($this->request->data);
            if ($this->Utm->save($data)) {
                $this->Flash->success(__('UTM added successfully'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Error saving entity'));
            }
        }
    }

    public function edit($id = null) {
        $utm = $this->Utm->findById($id);
        if (!$utm) {
            throw new NotFoundException(__('UTM not found'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $data = $this->_validate($this->request->data);
            if ($this->Utm->save($data)) {
                $this->Flash->success(__('UTM updated successfully'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Error updating entity'));
            }
        }
        if (!$this->request->data) {
            $this->request->data = $utm;
        }
    }
}
