				<?php 	// 1 <= $i => 5 allows Bootstrap breakpoints logic for card-deck
						// cf. https://stackoverflow.com/a/47410225/9568489
						$i = 1;
				?>

				<div class="row">
					<div class="card-deck w-100">
					<?php foreach ($drawers as $drawers_item): ?>

						<div class="card mb-4">
							<a href="<?= base_url('/drawers/view/' . $drawers_item['drawer_slug'] . '/' . $drawers_item['drawer_id']); ?>"></a>
							<div class="card-header text-muted">
							</div>
							<div class="card-body">
								<h5 class="card-title"><?= $drawers_item['drawer_title']; ?></h5>
								<div class="card-text"><?= $drawers_item['drawer_text']; ?></div>
							</div>
							<div class="card-footer text-muted">
								<?php if ($this->session->prf_act === 'A'): ?>
									<div class="btn-group">
										<a class="btn btn-primary-outline" href="<?= base_url('drawers/edit/' . $drawers_item['drawer_slug'] . '/' . $drawers_item['drawer_id']) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
										<a class="btn btn-primary-outline" href="<?= base_url('drawers/delete/' . $drawers_item['drawer_slug'] . '/' . $drawers_item['drawer_id']) ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
									</div>
								<?php endif; ?>
							</div>
						</div>

						<?php if ($i === 1): ?>
							<div class="w-100 d-none d-sm-block d-md-block d-lg-block d-xl-block"></div>
						<?php endif; ?>
					
						<?php if ($i === 2): ?>
							<div class="w-100 d-none d-xl-none d-lg-none d-md-block d-sm-block"></div>
						<?php endif; ?>

						<?php if ($i === 3): ?>
							<div class="w-100 d-none d-sm-block d-md-block d-lg-block d-xl-block"></div>
						<?php endif; ?>

						<?php if ($i === 4): ?>
							<div class="w-100 d-none d-xl-none d-lg-none d-md-block d-sm-block"></div>
						<?php endif; ?>

						<?php if ($i === 5): ?>
							<div class="w-100 d-none d-sm-block d-md-block d-lg-block d-xl-block"></div>
						<?php endif; ?>

						<?php $i === 5? $i = 1 : $i++; ?>

					<?php endforeach; ?>
					</div>
				</div>
