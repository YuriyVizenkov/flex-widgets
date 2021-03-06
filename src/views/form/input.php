<?php
/**
 * @var \flex\components\elements\ActiveField $field
 */
?>
<div class="form-group">
    <label for="<?= $field->getId(); ?>"><?= $field->getLabel(); ?></label>
    <input type="<?= $field->getType() ?>"
           class="form-control <?= $field->getClassAsString(); ?>"
           id="<?= $field->getId(); ?>"
           placeholder="<?= $field->getPlaceholder(); ?>"
           value="<?= $field->getValue() ?>"
           name="<?= $field->getNameAttribute(); ?>" <?= $field->getHtmlOptionsAsString(); ?>>
</div>
