<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;

/**
 * Libros Controller
 *
 * @property \App\Model\Table\LibrosTable $Libros
 * @method \App\Model\Entity\Libro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LibrosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $libros = $this->paginate($this->Libros, ['limit'=> 5]);

        $this->set(compact('libros'));
    }

    /**
     * View method
     *
     * @param string|null $id Libro id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $libro = $this->Libros->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('libro'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $libro = $this->Libros->newEmptyEntity();
        if ($this->request->is('post')) {
            $libro = $this->Libros->patchEntity($libro, $this->request->getData());

            // Agregar Imagen del Libro

            $imagen=$this->request->getData('imagen');

            // Haciendo pruebas para verficar si al objeto llegan la informacion de la imagen
            // print_r($this->request->getData());
            // exit();

            if($imagen) {
                $tiempo= FrozenTime::now()->toUnixString(); //Si obtenemos la imagen le asignamos tiempo
                $nombreImagen=$tiempo."_".$imagen->getClientFileName(); //Aqui al nombre de la imagen de agregamos el tiempo
                $destino=WWW_ROOT.'img/Libros/'.$nombreImagen; //Ruta donde se van a guardar las imagenes por post (libros)
                $imagen->moveTo($destino);
                $libro->imagen=$nombreImagen;
            }

            if ($this->Libros->save($libro)) {
                $this->Flash->success(__('The libro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The libro could not be saved. Please, try again.'));
        }
        $this->set(compact('libro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Libro id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $libro = $this->Libros->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $nombreImagenAnterior=$libro->imagen; //Aca obtenemos el nombre anterior actual y para luego poder modificarlo

            $libro = $this->Libros->patchEntity($libro, $this->request->getData());
            $imagen=$this->request->getData('imagen');

            $libro->imagen=$nombreImagenAnterior; //Aca obtenemos el nombre anterior actual y para luego poder modificarlo

            if($imagen->getClientFileName()){
                // print_r($imagen->getClientFileName());
                // exit();

                if(file_exists(WWW_ROOT.'img/Libros/'.$nombreImagenAnterior)){
                    unlink(WWW_ROOT.'img/Libros/'.$nombreImagenAnterior);
                }

                $tiempo= FrozenTime::now()->toUnixString(); //Si obtenemos la imagen le asignamos tiempo
                $nombreImagen=$tiempo."_".$imagen->getClientFileName(); //Aqui al nombre de la imagen de agregamos el tiempo
                $destino=WWW_ROOT.'img/Libros/'.$nombreImagen; //Ruta donde se van a guardar las imagenes por post (libros)
                $imagen->moveTo($destino);
                $libro->imagen=$nombreImagen;
            }

            if ($this->Libros->save($libro)) {
                $this->Flash->success(__('The libro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The libro could not be saved. Please, try again.'));
        }
        $this->set(compact('libro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Libro id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $libro = $this->Libros->get($id);

        // Borrando la imagen a la hora de borrar un post

        if(file_exists(WWW_ROOT.'img/Libros/'.$libro['imagen'])){
            unlink(WWW_ROOT.'img/Libros/'.$libro['imagen']);
        }

        if ($this->Libros->delete($libro)) {
            $this->Flash->success(__('The libro has been deleted.'));
        } else {
            $this->Flash->error(__('The libro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
