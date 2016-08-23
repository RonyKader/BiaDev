<?php $this->load->view( "layouts/header.php" ); ?>
<?php $this->load->view( "layouts/sidebar.php" ); ?>

<?php if ( isset( $student_regestration )): ?>
    <?php $this->load->view( $student_regestration ); ?>
<?php endif ?>

<?php $this->load->view( 'layouts/footer' ); ?>