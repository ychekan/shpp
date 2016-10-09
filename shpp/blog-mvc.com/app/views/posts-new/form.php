<!-- block to form placing articles -->
<div class="box-content">
    <div class="alert alert-info"> Article form
    </div>
</div>
<div class="box-content">
    <div class="box-inner">
        <div class="box-content">
            <form method="post" action="" enctype="multipart/form-data">
                <!-- Hidden -->
                <input type="hidden" value="<?php print_r($_SESSION['login']); ?>" name="name">
                <!-- start block title -->
                <p>
                    <label>Title</label>
                    <input type="text" class="form-control" title="Name article" name="title" value="<?php
                    if (isset($_POST['title']))
                        print_r($_POST['title']);
                    ?>"/>
                </p>
                <p>
                    <!-- start block select -->
                    <label>Status</label>
                    <select class="form-control" title="Status your article" name="status" id="status">
                        <option value="1">New</option>
                        <option value="2">Open</option>
                        <option value="3">Closed</option>
                    </select>
                    <!-- end block select -->
                </p>
                <!-- end block title -->
                <!-- start block content -->
                <p><label>Content</label>
                    <textarea type="text" class="form-control" title="Text article" id="content" name="content"
                              rows="13"></textarea>
                </p>

                <!-- end block content -->

                <!-- start block tags -->
                <p>
                    <label>Tags</label>
                    <textarea type="text" class="form-control" title="HTML tag" id="tags" name="tags"
                              rows="13"></textarea>
                    <!-- end block content -->
                </p>

                <!-- start block update file -->
                <p>
                <div class="form-group">
                    <label>You load any more images for this post</label>
                    <input type="file" title="Upload images" accept="image/*" name="uri[]" multiple>
                </div>
                <!-- end block update file -->
                </p>
                <!-- start block button -->
                <div class="alert alert-default">
                    <button type="submit" class="btn btn-warning" name="submit" value="setArticle"
                            title="Publish article!">
                        Publish
                    </button>
                    <div class="box-icon">
                        <button type="submit" class="btn btn-danger" name="submit" value="previewArticle"
                                title="Review this article!">Preview
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

