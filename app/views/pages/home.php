<form action="/include/loading_form.php" method="post">
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
