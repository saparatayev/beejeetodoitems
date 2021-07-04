<?php include ROOT . '/views/layouts/header.php'; ?>

<form action="#" method="POST" class="my-5">

    <?php if (isset($errors) && is_array($errors)): ?>
        <ul class="my-2">
            <?php foreach ($errors as $error): ?>
                <li class="alert alert-danger"> <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

  <div class="form-row">
    <div class="form-group col-md-6">
      <input type="text" name="username" class="form-control" placeholder="Username" 
        value="<?php if(isset($options['username'])) {echo $options['username'];} ?>"
      >
    </div>
    <div class="form-group col-md-6">
      <input type="text" name="email" class="form-control" placeholder="Email"
        value="<?php if(isset($options['email'])) {echo $options['email'];} ?>"
      >
    </div>
  </div>
  <div class="form-group">
    <textarea class="form-control"  name="todoitem_text" placeholder="Text" rows="3"><?php if(isset($options['todoitem_text'])) {echo $options['todoitem_text'];} ?></textarea>
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Save</button>
</form>

<?php include ROOT . '/views/layouts/footer.php'; ?>