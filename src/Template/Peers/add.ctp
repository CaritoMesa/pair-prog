<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Peers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="peers form large-9 medium-8 columns content">
    <?= $this->Form->create($peer) ?>
    <fieldset>
        <legend><?= __('Add Peer') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <h2>Lista de estudiantes</h2>
    <select multiple class="form-control">
      <option>Estudiante 1</option>
      <option>Estudiante 2</option>
      <option>Estudiante 3</option>
      <option>Estudiante 4</option>
      <option>Estudiante 5</option>
    </select>
    <h2>Lista de parejas</h2>
    <select multiple class="form-control">
      <option>Pareja 1</option>
      <option>Pareja 2</option>
      <option>Pareja 3</option>
      <option>Pareja 4</option>
      <option>Pareja 5</option>
    </select>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
