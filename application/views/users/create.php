				<?php echo validation_errors('
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<p>',
						'</p>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				'); ?>

                <div class="card">
                    <h5 class="card-header"><?= $title; ?></h5>

                    <div class="card-body">
                        <?php echo form_open('users/create'); ?>
                            <div class="form-group">

                                <label class="sr-only" for="username">Username</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Username" name="username" />
                                </div>

                                <label class="sr-only" for="mail">Mail</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Mail</span>
                                    </div>
                                    <input type="mail" class="form-control" name="mail" />
                                </div>

                                <label class="sr-only" for="password">Password</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Password</span>
                                    </div>
                                    <input type="password" class="form-control" name="password" />
                                </div>

                                <label class="sr-only" for="passwordcheck">Password (check)</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Password (check)</span>
                                    </div>
                                    <input type="password" class="form-control" name="passwordcheck" />
                                </div>

								<div class="text-right">
	                                <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
								</div>

                            </div>
                        </form>
                    </div>

                    <div class="card-footer text-muted">
						<p>Rules are simple:</p>

						<ol>
							<li>You are always wrong;</li>
							<li>If you happen to be right, refer to #1.</li>
						</ol>
                    </div>
                </div>
