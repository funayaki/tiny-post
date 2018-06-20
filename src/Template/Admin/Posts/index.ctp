<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $posts
 */

$this->extend('Cirici/AdminLTE./Common/index');

$this->Breadcrumbs
    ->add(__d('funayaki', 'Posts'), ['action' => 'index']);

$this->start('page-numbers');
echo $this->Paginator->numbers();
$this->end();

$this->append('header-actions');
echo $this->Html->link(__d('funayaki', 'New Post'),
    ['action' => 'add'],
    ['class' => 'btn btn-default pull-right']
);
$this->end();
?>

<?php $this->start('table-header'); ?>
<thead>
<tr>
    <th><?= $this->Paginator->sort('id') ?></th>
    <th><?= $this->Paginator->sort('title') ?></th>
    <th><?= $this->Paginator->sort('slug') ?></th>
    <th><?= $this->Paginator->sort('description') ?></th>
    <th><?= $this->Paginator->sort('keywords') ?></th>
    <th><?= $this->Paginator->sort('available') ?></th>
    <th><?= $this->Paginator->sort('deleted') ?></th>
    <th><?= $this->Paginator->sort('created') ?></th>
    <th><?= $this->Paginator->sort('modified') ?></th>
    <th><?= $this->Paginator->sort('created_by') ?></th>
    <th><?= $this->Paginator->sort('modified_by') ?></th>
    <th><?= __d('funayaki', 'Actions') ?></th>
</tr>
</thead>
<?php $this->end(); ?>

<?php $this->start('table-body'); ?>
<tbody>
<?php foreach ($posts as $post): ?>
    <tr>
        <td><?= $this->Number->format($post->id) ?></td>
        <td><?= h($post->title) ?></td>
        <td><?= h($post->slug) ?></td>
        <td><?= h($post->description) ?></td>
        <td><?= h($post->keywords) ?></td>
        <td><?= h($post->available) ?></td>
        <td><?= h($post->deleted) ?></td>
        <td><?= h($post->created) ?></td>
        <td><?= h($post->modified) ?></td>
        <td><?= $this->Number->format($post->created_by) ?></td>
        <td><?= $this->Number->format($post->modified_by) ?></td>
        <td class="actions" style="white-space:nowrap">
            <?= $this->Html->link(__d('funayaki', 'Edit'), ['action' => 'edit', $post->id], ['class' => 'btn btn-default btn-xs']) ?>
            <?= $this->Form->postLink(__d('funayaki', 'Delete'), ['action' => 'delete', $post->id], ['confirm' => __d('funayaki', 'Are you sure you want to delete # {0}?', $post->id), 'class' => 'btn btn-danger btn-xs']) ?>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
<?php $this->end(); ?>
