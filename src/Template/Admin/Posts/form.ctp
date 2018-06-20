<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $post
 */

$this->extend('Cirici/AdminLTE./Common/form');

$this->Breadcrumbs
    ->add(__d('funayaki', 'Posts'), ['action' => 'index']);

if ($this->request->params['action'] == 'edit') {
    $this->Breadcrumbs->add(__d('funayaki', 'Edit'), $this->request->getRequestTarget());
}

if ($this->request->params['action'] == 'add') {
    $this->Breadcrumbs->add(__d('funayaki', 'Add'), $this->request->getRequestTarget());
}

$this->assign('form-start', $this->Form->create($post, [
    'novalidate' => true,
]));

$this->start('form-content');
echo $this->Form->control('title');
echo $this->Form->control('body');
echo $this->Form->control('excerpt');
echo $this->Form->control('slug');
echo $this->Form->control('description');
echo $this->Form->control('keywords');
echo $this->Form->control('available', ['empty' => true]);
echo $this->Form->control('deleted', ['empty' => true]);
echo $this->Form->control('created_by');
echo $this->Form->control('modified_by');

$this->end();

$this->start('form-button');
echo $this->Form->button(__d('funayaki', 'Submit'));
$this->end();

$this->assign('form-end', $this->Form->end());
