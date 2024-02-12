<?php $this->load->view('user_template/header'); ?>

<body>
	
	<?php $this->load->view('user_template/preloader'); ?>
	
	<?php $this->load->view('user_template/navbar'); ?>	
    
	<main>
		<div class="container">
			<?php $this->load->view($main_content); ?>
		</div>
		<!-- /Container -->
	</main>
	<!-- /main -->
	
	<?php $this->load->view('user_template/footer'); ?>