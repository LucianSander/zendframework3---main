<?php

namespace Pessoa\Controller;

use Pessoa\Form\PessoaForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



class PessoaController extends AbstractActionController 
{

    private $table;

    public function __construct ($table){
        $this->table = $table;
    }

    public function indexAction() {
        return new ViewModel(['pessoas' => $this->table->getAll()]);
    }



//Adicionar pessoas no modulo pessoa
    public function adicionarAction(){
        $form = new PessoaForm();
        $form->get('submit')->setValue('Adicionar');
        $request = $this->getRequest();
        if (!$request->isPost()) {
            return new ViewModel(['form'=>$form]);
        }
        //setData vai preencher a tabela
        $pessoa = new \Pessoa\Model\Pessoa();
        $form->setData($request->getPost());
        if (!$form->isValid()) {
            return new ViewModel(['form'=>$form]);
        }
        $pessoa->exchangeArray($form->getData());
        $this->table->salvarPessoa($pessoa);
        
        //vai para a home
        return $this->redirect()->toRoute('pessoa');

        //return new ViewModel();
    }

    public function salvarAction(){
        return new ViewModel();
    }

    public function editarAction(){
        return new ViewModel();
    }

    public function removerAction(){
        return new ViewModel();
    }

    public function confirmacaoAction(){

    }

/**
 *  /pessoa -> index
 *  /pessoa/adicionar -> adicionarAction
 *  /pessoa/salvar -> salvarAction
 *  /pessoa/editar/1 -> editarAction
 *  /pessoa/remover/1 -> removerAction
 *  /pessoa/confirmacao -> confirmacaoAction
 * 
 */



}
