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
						<div class="form-row">
							<div class="col">
								<label class="sr-only" for="title">Title</label>
								<input class="form-control mb-2" type="input" name="title" placeholder="An interesting title..." value="<?php echo set_value('title'); ?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="sr-only" for="text">Content</label>
							<textarea class="form-control mb-2" rows="15" id="simplemde" name="text" placeholder="Blah blah blah..."><?php echo set_value('text'); ?></textarea>

							<div class="text-right mt-2">
								<input class="btn btn-primary" type="submit" name="submit" value="Submit" />
							</div>
						</div>
					</form>
