<?php
/*
 * Options Framework Theme - Options Backup
 * Backup your "Theme Options" to a downloadable text file.
 * -----------------------------------------------------------------------------------

 TABLE OF CONTENTS
 - var $admin_page
 - var $token
 - function OptionsFramework_Backup () 						// Constructor
 - function init () 										// Initialize the class.
 - function register_sketch_admin_screen () 				// Register the admin screen within WordPress.
 - function sketch_admin_screen () 							// Load the admin screen.
 - function admin_notices() 								// Display admin notices when performing backup/restore.
 - function sketch_admin_screen_logic ()					// The processing code to generate the backup or restore from a previous backup.	
 - function import ()										// Import settings from a backup file.
 - function export ()										// Export settings to a backup file.
 - function construct_database_query ()						// Constructs the database query based on the export type.
 - Create Object
-----------------------------------------------------------------------------------*/

class OptionsFramework_Backup {
	var $admin_page;
	var $token;

	function OptionsFramework_Backup () {
		$this->admin_page = '';
		$this->token = 'advertica-options-backup';
	} // End Constructor


	/**
	 * init()
	 *
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */

	function init () {
		if ( is_admin() && ( get_option( 'framework_ske_backupmenu_disable' ) != 'true' ) ) {
			// Register the admin screen.
			add_action( 'admin_menu', array( &$this, 'register_sketch_admin_screen' ), 12 );
		}
	} // End init()

	/**
	 * register_sketch_admin_screen()
	 *
	 * Register the admin screen within WordPress.
	 *
	 * @since 1.0.0
	 */

	function register_sketch_admin_screen () {
		$this->admin_page = add_theme_page(__('Import / Export Options', 'advertica'),__('Advertica Backup', 'advertica'),'edit_theme_options', $this->token, array( &$this, 'sketch_admin_screen' ) );

		// Adds actions to hook in the required css and javascript
		add_action("admin_print_styles-$this->admin_page",'optionsframework_load_adminstyles');

		/* Loads the CSS */
		function optionsframework_load_adminstyles() {
			wp_enqueue_style('admin-style', OPTIONS_FRAMEWORK_DIRECTORY.'css/sketch-board.css');
			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');
		}

	
		// Admin screen logic.
		add_action( 'load-' . $this->admin_page, array( &$this, 'sketch_admin_screen_logic' ) );
		add_action( 'admin_notices', array( &$this, 'admin_notices' ), 10 );

	} // End register_sketch_admin_screen()

	/**
	 * sketch_admin_screen()
	 *
	 * Load the admin screen.
	 *
	 * @since 1.0.0
	 */

	function sketch_admin_screen () {
		$export_type = 'all';
		if ( isset( $_POST['export-type'] ) ) {
			$export_type = esc_attr( $_POST['export-type'] );
		}
?>

	<div class="sketch-backup">
		<h2 style="display:none;"></h2>
		<?php echo get_screen_icon( $screen = 'import-export' ); ?>	
		<h2><?php _e( 'Advertica Import / Export Theme Options','advertica' ); ?></h2>
		
		<div class="sketch-bkrp">
			<div class="import">
				<h3><?php _e( 'Import Settings','advertica' ); ?></h3>
				<p><?php _e( 'If you have settings in a backup file on your computer, the Import / Export system can import those into this site. To get started, upload your backup file to import from below.','advertica' ); ?></p>
				<form enctype="multipart/form-data" method="post" action="<?php echo admin_url( 'admin.php?page=' . $this->token ); ?>">
					<?php wp_nonce_field( 'OptionsFramework-backup-import' ); ?>
					<label for="OptionsFramework-import-file"><?php printf( __( 'Upload File: (Maximum Size: %s)','advertica' ), ini_get( 'post_max_size' ) ); ?></label>
					<input type="file" id="OptionsFramework-import-file" name="OptionsFramework-import-file" size="25" />
					<input type="hidden" name="OptionsFramework-backup-import" value="1" />
					<input type="submit" class="button" value="<?php _e( 'Upload File and Import','advertica' ); ?>" />
				</form>
			</div>

			<div class="export">
				<h3><?php _e( 'Export Settings','advertica' ); ?></h3>
				<p><?php _e( 'When you click the button below, the Import / Export system will create a text file for you to save to your computer.' ,'advertica'); ?></p>
				<p><?php echo sprintf( __( 'This text file can be used to restore your settings here on "%s", or to easily setup another website with the same settings".' ), get_bloginfo( 'name' ) ); ?></p>

				<form method="post" action="<?php echo admin_url( 'admin.php?page=' . $this->token ); ?>">
					<?php wp_nonce_field( 'OptionsFramework-backup-export' ); ?>
					<input type="hidden" name="OptionsFramework-backup-export" value="1" />
					<input type="submit" class="button" value="<?php _e( 'Download Export File','advertica' ); ?>" />
				</form>
			</div>
		</div>

	</div>
	<!--/.wrap-->
<?php

} // End sketch_admin_screen()


	/**
	 * admin_notices()
	 *
	 * Display admin notices when performing backup/restore.
	 *
	 * @since 1.0.0
	 */

	function admin_notices () {

		if ( ! isset( $_GET['page'] ) || ( $_GET['page'] != $this->token ) ) { return; }
		if ( isset( $_GET['error'] ) && $_GET['error'] == 'true' ) {
			echo '<div id="message" class="error"><p>' . __( 'There was a problem importing your settings. Please Try again.','advertica') . '</p></div>';
		} else if ( isset( $_GET['error-update'] ) && $_GET['error-update'] == 'true' ) {  
			echo '<div id="message" class="error"><p>' . __( 'Please make some changes in order to save them.','advertica' ) . '</p></div>';
		} else if ( isset( $_GET['error-export'] ) && $_GET['error-export'] == 'true' ) {  
			echo '<div id="message" class="error"><p>' . __( 'There was a problem exporting your settings. Please Try again.','advertica' ) . '</p></div>';
		} else if ( isset( $_GET['invalid'] ) && $_GET['invalid'] == 'true' ) {  
			echo '<div id="message" class="error"><p>' . __( 'The import file you\'ve provided is invalid. Please try again.','advertica') . '</p></div>';
		} else if ( isset( $_GET['imported'] ) && $_GET['imported'] == 'true' ) {  
			echo '<div id="message" class="updated"><p>' . sprintf( __( 'Settings successfully imported. | Return to %sTheme Options%s', 'advertica' ), '<a href="' . admin_url( 'admin.php?page=options-framework' ) . '">', '</a>' ) . '</p></div>';
		} // End IF Statement

	} // End admin_notices()

	/**
	 * sketch_admin_screen_logic()
	 *
	 * The processing code to generate the backup or restore from a previous backup.
	 *
	 * @since 1.0.0
	 */

	function sketch_admin_screen_logic () {
		if ( ! isset( $_POST['OptionsFramework-backup-export'] ) && isset( $_POST['OptionsFramework-backup-import'] ) && ( $_POST['OptionsFramework-backup-import'] == true ) ) {
			$this->import();
		}
		if ( ! isset( $_POST['OptionsFramework-backup-import'] ) && isset( $_POST['OptionsFramework-backup-export'] ) && ( $_POST['OptionsFramework-backup-export'] == true ) ) {
			$this->export();
		}
	} // End sketch_admin_screen_logic()

	/**
	 * import()
	 *
	 * Import settings from a backup file.
	 *
	 * @since 1.0.0
	 */

	function import() {
		check_admin_referer( 'OptionsFramework-backup-import' ); // Security check.
		if ( ! isset( $_FILES['OptionsFramework-import-file'] ) ) { return; } // We can't import the settings without a settings file.
		
		// Extract file contents
		$upload = file_get_contents( $_FILES['OptionsFramework-import-file']['tmp_name'] );

		// Decode the JSON from the uploaded file
		$datafile = json_decode( $upload, true );

	
		// Check for errors
		if ( ! $datafile || $_FILES['OptionsFramework-import-file']['error'] ) {
			wp_redirect( admin_url( 'admin.php?page=' . $this->token . '&error=true' ) );
			exit;
		}

		// Make sure this is a valid backup file.
		if ( ! isset( $datafile['OptionsFramework-backup-validator'] ) ) {
			wp_redirect( admin_url( 'admin.php?page=' . $this->token . '&invalid=true' ) );
			exit;
		} else {
			unset( $datafile['OptionsFramework-backup-validator'] ); // Now that we've checked it, we don't need the field anymore.
		}

		// Get the theme name from the database.
		$optionsframework_data = get_option('optionsframework');
		$optionsframework_name = $optionsframework_data['id'];
		//$optionsframework_name = get_option( $optionsframework_name );

		// Update the settings in the database
		if ( update_option( $optionsframework_name, $datafile ) ) {

		// Redirect, add success flag to the URI
			wp_redirect( admin_url( 'admin.php?page=' . $this->token . '&imported=true' ) );
			exit;
		} else {
		// Errors: update fail
			var_dump($optionsframework_name);
			wp_redirect( admin_url( 'admin.php?page=' . $this->token . '&error-update=true' ) );
			exit;
		}
	} // End import()

	/**
	 * export()
	 *
	 * Export settings to a backup file.
	 *
	 * @since 1.0.0
	 * @uses global $wpdb
	 */
	
	function export() {
		global $wpdb;
		check_admin_referer( 'OptionsFramework-backup-export' ); // Security check.
		$optionsframework_settings = get_option('optionsframework');
		$database_options = get_option( $optionsframework_settings['id'] );
		
		// Error trapping for the export.
		if ( $database_options == '' ) {
			wp_redirect( admin_url( 'admin.php?page=' . $this->token . '&error-export=true' ) );
			return;
		}
		if ( ! $database_options ) { return; }
		// Add our custom marker, to ensure only valid files are imported successfully.
		$database_options['OptionsFramework-backup-validator'] = date( 'Y-m-d h:i:s' );
		// Generate the export file.

	    $output = json_encode( (array)$database_options );
	    header( 'Content-Description: File Transfer' );
	    header( 'Cache-Control: public, must-revalidate' );
	    header( 'Pragma: hack' );
	    header( 'Content-Type: text/plain' );
	    header( 'Content-Disposition: attachment; filename="' . $this->token . '-' . date( 'Ymd-His' ) . '.json"' );
	    header( 'Content-Length: ' . strlen( $output ) );
	    echo $output;
	    exit;
	} // End export()

} // End Class

/**
 * Create $ske_backup Object.
 * @since 1.0.0
 * @uses OptionsFramework_Backup
 */
$of_backup = new OptionsFramework_Backup();
$of_backup->init();
?>