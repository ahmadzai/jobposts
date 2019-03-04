    <?php ob_start() ?>
    <div class="text-left py-4">
        <h4>Post a new Job</h4>
        <?php if(isset($info)) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $info; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <?php if(isset($errors)) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                <?php
                foreach ($errors as $error)
                    echo $error;
                ?>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>

    </div>
    <form method="post" name="job">
        <div class="row">
            <div class="col-md-8">
                <label for="title">Job title</label>
                <input type="text" class="form-control" id="title" name="title"
                       placeholder=""
                       value="<?php echo isset($errors) ? $_POST['title'] : '' ?>"
                       required="required">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="description">Description</label>
                <div class="input-group">
                    <textarea class="form-control" rows="6"
                              name="description" id="description"
                              required="required"><?php echo isset($errors) ? $_POST['description']: '' ?></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="email">Email</label>
                <input type="email" value="<?php echo isset($errors) ? $_POST['email']:'' ?>"
                       class="form-control" id="email" name="email"
                       placeholder="you@example.com" required="required">
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>

            <div class="col-md-2">
                <label for="submit">&nbsp;</label>
                <button type="submit" name="addjob" value="Post Job"
                        class="form-control btn btn-success">Post Job</button>
            </div>
        </div>
    </form>
    <?php $content = ob_get_clean() ?>
    <?php include dirname(__DIR__) . '/template.php' ?>