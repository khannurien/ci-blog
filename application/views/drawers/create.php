					<?php echo validation_errors('
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<p>',
							'</p>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					'); ?>

                    <?php echo form_open('drawers/create'); ?>
                        <div class="form-group">

                            <label class="sr-only" for="title">Title</label>
                            <input class="form-control" type="input" name="title" placeholder="An interesting title..." value="<?php echo set_value('title'); ?>" /><br />

                            <label class="sr-only" for="text">Content</label>
                            <textarea class="form-control" rows="15" id="simplemde" name="text" placeholder="Blah blah blah..."><?php echo set_value('text'); ?></textarea><br />

                            <input class="btn btn-primary float-right" type="submit" name="submit" value="Submit" />

                        </div>
                    </form>
