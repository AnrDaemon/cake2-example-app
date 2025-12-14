<?php

/**
 * @property Utm $Utm
 */
class UtmsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

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
        $this->set('utms', $this->Utm->find('all'));
    }

    public function list() {
        $this->set('utms', $this->Utm->find('all'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Utm->create();
            $data = $this->_validate($this->request->data);
            if ($this->Utm->save($data)) {
                $this->Session->setFlash('UTM успешно добавлен');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Ошибка при сохранении');
            }
        }
    }

    public function edit($id = null) {
        $utm = $this->Utm->findById($id);
        if (!$utm) {
            throw new NotFoundException(__('UTM не найден'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $data = $this->_validate($this->request->data);
            if ($this->Utm->save($data)) {
                $this->Session->setFlash('UTM успешно обновлен');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Ошибка при обновлении');
            }
        }
        if (!$this->request->data) {
            $this->request->data = $utm;
        }
    }

    public function statistics() {
        $data = $this->Utm->find('all', array(
            'fields' => array(
                'source',
                'medium',
                'campaign',
                'content',
                'COUNT(*) as total'
            ),
            'group' => array('source', 'medium', 'campaign', 'content')
        ));
        $this->set(compact('data'));
    }
}
