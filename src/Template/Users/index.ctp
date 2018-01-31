<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="container">
    <div class="util_title">
        Util Content
    </div>
    <hr class="hr" />
    <div class="util">        
        <?= $this->Form->create(null, ['url' => ['controller' => 'Users',
                                    'action' => 'form']]);?>
            <?= $this->Form->button(__('View'), ['class' => 'btn']); ?>
        <?= $this->Form->end(); ?>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Users',
                                    'action' => 'form']]);?>
            <?= $this->Form->button(__('Post'), ['class' => 'btn']); ?>
        <?= $this->Form->end(); ?>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Users',
                                    'action' => 'form']]);?>
            <?= $this->Form->button(__('Edit'), ['class' => 'btn']); ?>
        <?= $this->Form->end(); ?>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Users',
                                    'action' => 'form']]);?>
            <?= $this->Form->button(__('Delete'), ['class' => 'btn']); ?>
    <?= $this->Form->end(); ?>
    </div>
</div>
<div class="users form">
    <?= $this->Flash->render() ?>
</div>
<div class="container">
    <div class="search_section">
    <?php
        echo $this->Form->create(null,
            ['url' => [
                    'controller' => 'Search',
                    'action' => 'execute'
                ]
            ]
        );
        echo $this->Form->control('name', [
            'label' => [
                'class' => 'name',
                'text' => 'User Search'
            ],
            'class' => 'search'
        ]);
        echo $this->Form->end();
    ?>
    </div>
</div>

<?php if($user): ?>
    <div class="container">
        <div class="result_user">
                <?= $this->Form->create(null, ['url' => [
                                'controller' => 'Users',
                                'action' => 'viewContent',
                                $user->user_id]]);?>
                    <li>
                        <?= $this->Form->button(__($user->name), ['class' => 'submit']); ?>
                    </li>
                    <?= $this->Form->end(); ?>
            </li>
        </div>
    </div>
<?php endif ?>
