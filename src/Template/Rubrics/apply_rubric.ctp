<!-- Cirterios Rubrica -->  
    <div class="related">

    Aquí entrega realizada...

    <h2><?= h($rubric->name) ?></h2>
        <h4><?= __('Related Rubric Criterias') ?></h4>
 
        <?php if (!empty($rubric->rubric_criterias)): ?>
        <table class="table table-bordered">
            <?php foreach ($rubric->rubric_criterias as $rubricCriterias): ?>
            <tr>
                <td class="active"><?= h($rubricCriterias->description) ?></td>
                <fieldset>
                    
                
                <?php for($i = 0; $i < count($criterias); ++$i): ?>
                    <?php if ($rubricCriterias->id == $criterias[$i]["rubric_criteria_id"]): ?> 
                    <td>                   
                        <input type="radio" name=$criterias[$i]["rubric_criteria_id"] id="inlineRadio1" value="option1">
                        <?= h($criterias[$i]["definition"])?>  
                        <br>
                        <?= h($criterias[$i]["score"])?> pts              
                    </td>
                    
                    <?php endif; ?>
                <?php endfor; ?>
                </fieldset>

            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>

    </div>
</div>
