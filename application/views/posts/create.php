                    <?php echo validation_errors(); ?>

                    <?php echo form_open('posts/create'); ?>
                        <div class="form-group pb-5 mb-4">

                            <div class="input-group">
                                <label class="sr-only" for="title">Title</label>
                                <input class="form-control w-50 rounded" type="input" name="title" placeholder="An interesting title..." value="<?php echo set_value('title'); ?>" />

                                <label class="sr-only" for"drawer">Drawer</label>
                                <select name="drawer" class="form-control ml-4 rounded">
                                    <?php foreach ($drawers as $drawer): ?>
                                        <option value="<?= $drawer['drawer_id']; ?>"><?= $drawer['drawer_title']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><br />

                            <label class="sr-only" for="text">Content</label>
                            <textarea class="form-control" rows="15" id="simplemde" name="text" placeholder="Blah blah blah..."><?php echo set_value('text'); ?></textarea><br />

                            <input class="btn btn-primary float-right" type="submit" name="submit" value="Submit" />

                        </div>
                    </form>
