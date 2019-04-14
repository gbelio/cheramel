<?php
if(isset($errores)):?>
    <ul class="alert alert-danger">
        <?php
        foreach ($errores as $key => $value) :?>
            <li> <?=$value;?> </li>
        <?php endforeach;?>
    </ul>
<?php endif;?>