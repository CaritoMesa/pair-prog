<?= $this->Html->css('dashboard') ?>
<script type="text/javascript">
$(document).ready(function() {
    $('#gallery').click(function(){
        $("#central").load(<?= $this->Html->link(__('Calificaciones'), ['controller' => 'Rubrics', 'action' => 'applyRubric', $submission->activity->rubric_id]) ?>);
    });
    ...
});
</script>
<div class="container-fluid">
  <div class="row">
    <div class="sidebar">
      <ul class="nav nav-sidebar nav-pills nav-stacked">
        <li>Descripción</li>
        <li>Rúbrica</li>
        <li>Asignar Parejas</li>
        <li>Entregas</li>
        <li><?= $this->Html->link(__('Calificaciones'), ['controller' => 'Rubrics', 'action' => 'applyRubric', $submission->activity->rubric_id]) ?></li>
        <a href="#" id="gallery" style="cursor:pointer;">Galeria</a>
      </ul>
    </div>
  </div>
  <div class="row">
    
      <div class="thumbnail">
        <img src="..." alt="...">
        <div class="caption">
          <h3>Thumbnail label</h3>
          <p>...</p>
          <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
        </div>
      </div>
    
  </div>
  <div class="row" id="central">
    <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
  </div>
  
  
</div>