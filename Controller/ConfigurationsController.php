<?php

class ConfigurationsController extends ConfigurationAppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $categories = $this->Configuration->categories;
        $this->Configuration->recursive = 0;
        if (isset($this->request->query['category']) && $this->request->query['category'] != null) {
            $this->Paginator->settings['Configuration']['conditions']['Configuration.category'] = $this->request->query['category'];
        }
        if (isset($this->request->query['name']) && $this->request->query['name'] != null) {
            $this->Paginator->settings['Configuration']['conditions']['Configuration.name LIKE'] = "%{$this->request->query['name']}%";
        }
        $this->set('configurations', $this->Paginator->paginate());
        $this->set('categories', $categories);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->Configuration->exists($id)) {
            throw new NotFoundException(__('Invalid configuration'));
        }
        $options = array('conditions' => array('Configuration.' . $this->Configuration->primaryKey => $id));
        $this->set('configuration', $this->Configuration->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $this->Configuration->create();
            if ($this->Configuration->save($this->request->data)) {
                //set log
                $this->request->data['Configuration']['id'] = $this->Configuration->getLastInsertID();
                CakeLog::write('info', array('aciklama' => 'Yeni ayar eklendi.', 'data' => $this->request->data, 'operasyon' => 'Configuration.add'));
                $this->Session->setFlash('Ayar kaydedildi.', 'success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Ayar kaydedilemedi. Lütfen tekrar deneyin.', 'fail');
            }
        }
        $this->set('categories', $this->Configuration->categories);
        $this->set('types', $this->Configuration->types);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->Configuration->exists($id)) {
            throw new NotFoundException(__('Invalid configuration'));
        }
        $options = array('conditions' => array('Configuration.' . $this->Configuration->primaryKey => $id));
        $configuration = $this->Configuration->find('first', $options);

        if ($this->request->is(array('post', 'put'))) {
            if ($this->Configuration->save($this->request->data)) {
                //set log
                CakeLog::write('info', array('aciklama' => 'Ayar değiştirildi.', 'data' => $this->request->data, 'operasyon' => 'Configuration.edit'));
                $this->Session->setFlash('Değişiklik kaydedildi.', 'success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Değişiklik kaydedilemedi. Lütfen tekrar deneyin.', 'fail');
            }
        } else {
            $options = array('conditions' => array('Configuration.' . $this->Configuration->primaryKey => $id));
            $this->request->data = $configuration;
        }
        $this->set('configuration', $configuration);
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->Configuration->id = $id;
        if (!$this->Configuration->exists()) {
            throw new NotFoundException(__('Invalid configuration'));
        }
        $data = $this->Configuration->read();
        //$this->request->allowMethod('post', 'delete');
        if ($this->Configuration->delete()) {
            //set log
            CakeLog::write('info', array('aciklama' => 'Ayar silindi.', 'data' => $data, 'operasyon' => 'Configuration.delete'));
            $this->Session->setFlash(__('The configuration has been deleted.'));
        } else {
            $this->Session->setFlash(__('The configuration could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function install()
    {
        $this->Configuration->install();
        //set log
        CakeLog::write('info', array('aciklama' => 'Ayarlar öntanımlı olarak güncellendi.', 'data' => '', 'operasyon' => 'Configuration.install'));
        $this->redirect(array('action' => 'index'));
    }

}
