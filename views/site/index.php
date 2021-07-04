<?php include ROOT . '/views/layouts/header.php'; ?>


    <?php if($successMessage): ?>
        <p class="alert alert-success mt-2"><?php echo $successMessage; ?></p>
    <?php endif; ?>
    <?php if($errorMessage): ?>
        <p class="alert alert-danger mt-2"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <a class="btn btn-primary my-5" href="/todoitems/create" role="button">Add new</a>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="username-col">Username 
                    <a class="btn btn-primary
                            <?php if (strpos($_SERVER['REQUEST_URI'],'/username/asc') !== false) : ?>
                                btn-light
                            <?php endif; ?>"
                         href="/username/asc"
                    >&#8593;</a>
                    <a class="btn btn-primary
                            <?php if (strpos($_SERVER['REQUEST_URI'],'/username/desc') !== false) : ?>
                                btn-light
                            <?php endif; ?>"
                             href="/username/desc"
                    >&#8595;</a>
                </th>
                <th scope="col" class="email-col">Email
                    <a href="/email/asc" class="btn btn-primary
                            <?php if (strpos($_SERVER['REQUEST_URI'],'/email/asc') !== false) : ?>
                                btn-light
                            <?php endif; ?>"
                    >&#8593;</a>
                    <a href="/email/desc" class="btn btn-primary
                            <?php if (strpos($_SERVER['REQUEST_URI'],'/email/desc') !== false) : ?>
                                btn-light
                            <?php endif; ?>"
                    >&#8595;</a>
                </th>
                <th scope="col">Text</th>
                <th>Edited by admin</th>
                <th scope="col" class="status-col">Status
                    <a href="/status/asc" class="btn btn-primary
                            <?php if (strpos($_SERVER['REQUEST_URI'],'/status/asc') !== false) : ?>
                                btn-light
                            <?php endif; ?>"
                    >&#8593;</a>
                    <a href="/status/desc" class="btn btn-primary
                            <?php if (strpos($_SERVER['REQUEST_URI'],'/status/desc') !== false) : ?>
                                btn-light
                            <?php endif; ?>"
                    >&#8595;</a>
                </th>

                <?php if (!User::isGuest()): ?>
                    <th></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($todoitems as $todoitem): ?>
                <tr>
                    <td><?php echo $todoitem['username']; ?></td>
                    <td><?php echo $todoitem['email']; ?></td>
                    <td><?php echo $todoitem['todoitem_text']; ?></td>
                    <td>
                        <?php if($todoitem['edited_by_admin']): ?>
                        <span class="badge badge-warning">Edited</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($todoitem['status']): ?>
                            <span class="badge badge-success">Done</span>
                        <?php else: ?>
                            <span class="badge badge-danger">New</span>
                        <?php endif; ?>
                    </td>

                    <?php if (!User::isGuest()): ?>
                        <td><a href="/admin/todoitems/update/<?php echo $todoitem['id']; ?>">Edit</a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Постраничная навигация -->
    <?php echo $pagination->get(); ?>


<?php include ROOT . '/views/layouts/footer.php'; ?>