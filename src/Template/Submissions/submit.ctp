<div class="submissions form large-9 medium-8 columns content">
    <?= $this->Form->create($submission) ?>
    <fieldset>
        <legend><?= __('Add Submission') ?></legend>
        <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= h($this->request->session()->read('Auth.User.first_name')) ?></td>
        </tr>
    </table>
        <?php
            echo $this->Form->input('submission');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
