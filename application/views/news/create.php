<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('http://localhost:9898/index.php/news/create') ?>
<!-- NOTE Form assistant function -->


    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="text">Text</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />

</form>
