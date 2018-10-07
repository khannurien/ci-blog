					<?php echo validation_errors('
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<p>',
							'</p>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					'); ?>

                    <?php echo form_open('posts/edit/' . $posts_item['post_id']); ?>
                        <div class="form-row mb-2">
                            <div class="col">
                                <label class="sr-only" for="title">Title</label>
								<input class="form-control rounded" type="input" name="title" value="<?php echo set_value('title', @$posts_item['post_title']); ?>" />
							</div>

							<div class="col col-lg-3">
                                <label class="sr-only" for"drawer">Drawer</label>
                                <select name="drawer" class="form-control rounded">
                                    <?php foreach ($drawers as $drawer): ?>
                                        <?php if ($drawer['drawer_id'] === $posts_item['drawer_id']): ?>
                                            <option value="<?= $drawer['drawer_id']; ?>" selected="selected"><?= $drawer['drawer_title']; ?></option>
                                        <?php else: ?>
                                            <option value="<?= $drawer['drawer_id']; ?>"><?= $drawer['drawer_title']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
							</div>
						</div>

						<div class="form-group">
                            <label class="sr-only" for="text">Content</label>
							<textarea class="form-control" rows="15" id="simplemde" name="text"><?php echo set_value('text', @$posts_item['post_text']); ?></textarea>

							<div class="text-right mt-2">
	                            <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
							</div>
                        </div>
                    </form>
