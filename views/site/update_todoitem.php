<?php include ROOT . '/views/layouts/header.php'; ?>

<form action="#" method="post" class="my-5">
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" disabled value="<?php echo $todoitem['email']; ?>">
  </div>
  <div class="form-group">
    <label>Todoitem text</label>
    <textarea name="todoitem_text" class="form-control"><?php echo $todoitem['todoitem_text']; ?></textarea>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1"
    
        <?php if($todoitem['status']): ?>
            checked
        <?php endif; ?>

    >
    <label class="form-check-label" for="exampleCheck1">Completed</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php include ROOT . '/views/layouts/footer.php'; ?>