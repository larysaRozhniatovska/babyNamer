<form action="/process.php" method="post">
    <div class="form-row">
        <div class="form-column">
            <label for="babyName">Enter the baby's name</label>
            <input type="text" name="babyName" id="babyName"  >
        </div>
        <fieldset>
            <legend>Select the gender:</legend>
            <div>
                <input type="radio" id="girl" name="gender" value="girl" checked />
                <label for="girl">girl</label>
            </div>
            <div>
                <input type="radio" id="boy" name="gender" value="boy" />
                <label for="boy">boy</label>
            </div>
        </fieldset>
    </div>
    <button type="submit">Add</button>
</form>
<?php if (!empty($errors)): var_dump( $errors);?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<table>
    <caption>List of baby names</caption>
    <thead>
    <tr>
        <td>Girl</td>
        <td>Boy</td>
    </tr>
    </thead>
    <tbody>
        <?php if($size > 0):?>
            <?php for ($i = 0; $i < $size; $i++): ?>
            <tr>
                <td><?= isset($names['girl'][$i]) ? $names['girl'][$i] : '' ?></td>
                <td><?= isset($names['boy'][$i]) ? $names['boy'][$i] : '' ?></td>
            </tr>
            <?php endfor; ?>
        <?php endif; ?>
    </tbody>
</table>
