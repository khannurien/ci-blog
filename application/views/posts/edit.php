                    <?php echo validation_errors(); ?>

                    <?php echo form_open('posts/edit/' . $posts_item['post_slug'] . '/' . $posts_item['post_id']); ?>
                        <div class="form-group pb-5 mb-4">

                            <div class="input-group">
                                <label class="sr-only" for="title">Title</label>
                                <input class="form-control w-50 rounded" type="input" name="title" value="<?php echo set_value('title', @$posts_item['post_title']); ?>" />

                                <label class="sr-only" for"drawer">Drawer</label>
                                <select name="drawer" class="form-control ml-4 rounded">
                                    <?php foreach ($drawers as $drawer): ?>
                                        <?php if ($drawer['drawer_id'] === $posts_item['drawer_id']): ?>
                                            <option value="<?= $drawer['drawer_id']; ?>" selected="selected"><?= $drawer['drawer_title']; ?></option>
                                        <?php else: ?>
                                            <option value="<?= $drawer['drawer_id']; ?>"><?= $drawer['drawer_title']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div><br />

                            <label class="sr-only" for="text">Content</label>
                            <textarea class="form-control" rows="15" id="simplemde" name="text"><?php echo set_value('text', @$posts_item['post_text']); ?></textarea><br />

                            <input class="btn btn-primary float-right" type="submit" name="submit" value="Submit" />

                        </div>
                    </form>
