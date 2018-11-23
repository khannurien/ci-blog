<!doctype html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" href="<?= base_url('css/overrides.css'); ?>">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">

		<link rel="icon" href="<?= base_url('css/favicon.ico'); ?>" />

		<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet"> 
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

		<title><?= $this->config->item('site_name'); ?> - <?= $title; ?></title>
    </head>

    <body>
		<div id="barba-wrapper" class="w-100">
		    <header class="page-header">
				<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
				    <a class="navbar-brand" href="<?= base_url(); ?>"><?= $this->config->item('site_name'); ?></a>
				    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
				    </button>

				    <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<?php 
								// header public items array
								foreach ($this->config->item('header_public_items') as $item_name => $item_url): ?>
									<li class="nav-item <?= ($this->uri->uri_string === $item_url ? 'active' : '') ?>">
									<a class="nav-link" href="<?= '/' . $item_url; ?>"><?= $item_name; ?></a>
							    </li>
							<?php endforeach; ?>

						    <?php if($this->session->usr_nick): ?>
								<?php 
									// header loggedIn items array
									foreach ($this->config->item('header_loggedIn_items') as $item_name => $item_url): ?>
										<li class="nav-item <?= ($this->uri->uri_string === $item_url ? 'active' : '') ?>">
											<a class="nav-link" href="<?= '/' . $item_url; ?>"><?= $item_name; ?></a>
									    </li>
								<?php endforeach; ?>

								<?php if($this->session->prf_act === 'A'): ?>
									<?php 
										// header private items array
										foreach ($this->config->item('header_private_items') as $item_name => $item_url): ?>
											<li class="nav-item <?= ($this->uri->uri_string === $item_url ? 'active' : '') ?>">
												<a class="nav-link" href="<?= '/' . $item_url; ?>"><sub><?= $item_name; ?></sub></a>
										    </li>
										<?php endforeach; ?>
								<?php endif; ?>
								<?php else: ?>
									<?php 
										// header loggedOut items array
										foreach ($this->config->item('header_loggedOut_items') as $item_name => $item_url): ?>
											<li class="nav-item <?= ($this->uri->uri_string === $item_url ? 'active' : '') ?>">
												<a class="nav-link" href="<?= '/' . $item_url; ?>"><?= $item_name; ?></a>
										    </li>
									<?php endforeach; ?>
						    <?php endif; ?>
						</ul>
				    </div>
				</nav>
		    </header>
		</div>

		<div class="barba-container container">
