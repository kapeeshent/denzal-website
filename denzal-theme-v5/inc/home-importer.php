<?php
/**
 * Denzal Homes — Bulk CSV Importer
 * Adds an "Import Homes" page under the WordPress admin menu.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ─── Register admin menu page ────────────────────────────────────────────────
add_action( 'admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=dz_home',   // parent: Homes menu
        'Import Homes from CSV',         // page title
        'Import from CSV',               // menu label
        'manage_options',                // capability
        'dz-home-importer',              // slug
        'dz_home_importer_page'          // callback
    );
} );

// ─── Admin page HTML + processing ────────────────────────────────────────────
function dz_home_importer_page() {
    $results = [];

    // Handle form submission
    if (
        isset( $_POST['dz_import_nonce'] ) &&
        wp_verify_nonce( $_POST['dz_import_nonce'], 'dz_import_homes' ) &&
        ! empty( $_FILES['dz_csv_file']['tmp_name'] )
    ) {
        $results = dz_process_homes_csv( $_FILES['dz_csv_file']['tmp_name'] );
    }

    ?>
    <div class="wrap">
        <h1>📋 Import Homes from CSV</h1>
        <p>Upload a CSV file to bulk-create home listings. <a href="<?php echo esc_url( dz_importer_sample_url() ); ?>">Download the CSV template</a> to get started.</p>

        <?php if ( ! empty( $results ) ) : ?>
            <div class="notice notice-success is-dismissible">
                <p><strong><?php echo intval( $results['created'] ); ?> home(s) imported successfully.</strong>
                <?php if ( ! empty( $results['skipped'] ) ) : ?>
                    <?php echo intval( count( $results['skipped'] ) ); ?> row(s) skipped (missing title).
                <?php endif; ?>
                </p>
            </div>
            <?php if ( ! empty( $results['errors'] ) ) : ?>
                <div class="notice notice-warning">
                    <p><strong>Some rows had issues:</strong></p>
                    <ul>
                        <?php foreach ( $results['errors'] as $err ) : ?>
                            <li><?php echo esc_html( $err ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data" style="margin-top:24px;">
            <?php wp_nonce_field( 'dz_import_homes', 'dz_import_nonce' ); ?>
            <table class="form-table">
                <tr>
                    <th><label for="dz_csv_file">CSV File</label></th>
                    <td>
                        <input type="file" name="dz_csv_file" id="dz_csv_file" accept=".csv" required />
                        <p class="description">Accepted format: <code>.csv</code> with a header row. See the template for required columns.</p>
                    </td>
                </tr>
            </table>
            <?php submit_button( 'Import Homes', 'primary', 'submit', false ); ?>
        </form>

        <hr style="margin-top:40px;" />
        <h2>CSV Column Reference</h2>
        <table class="widefat striped" style="max-width:700px;">
            <thead>
                <tr>
                    <th>Column</th>
                    <th>Required?</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <tr><td><code>title</code></td><td>✅ Yes</td><td>The listing title / model name shown on the site</td></tr>
                <tr><td><code>description</code></td><td>No</td><td>Main body text for the listing</td></tr>
                <tr><td><code>model_name</code></td><td>No</td><td>Short model identifier, e.g. "The Ridgeline"</td></tr>
                <tr><td><code>beds</code></td><td>No</td><td>Number of bedrooms, e.g. <code>3</code> or <code>3–4</code></td></tr>
                <tr><td><code>baths</code></td><td>No</td><td>Number of bathrooms, e.g. <code>2.5</code></td></tr>
                <tr><td><code>sqft</code></td><td>No</td><td>Square footage estimate, e.g. <code>2,200</code></td></tr>
                <tr><td><code>county</code></td><td>No</td><td>County or location text</td></tr>
                <tr><td><code>home_type</code></td><td>No</td><td>Taxonomy term(s), comma-separated, e.g. <code>Ranch, Single-Story</code></td></tr>
                <tr><td><code>availability</code></td><td>No</td><td>Taxonomy term(s), e.g. <code>Available</code> or <code>Sold</code></td></tr>
                <tr><td><code>service_area</code></td><td>No</td><td>Taxonomy term(s), e.g. <code>Charlotte, Concord</code></td></tr>
                <tr><td><code>status</code></td><td>No</td><td><code>publish</code> (default) or <code>draft</code></td></tr>
            </tbody>
        </table>
    </div>
    <?php
}

// ─── CSV processing logic ─────────────────────────────────────────────────────
function dz_process_homes_csv( $tmp_path ) {
    $results = [
        'created' => 0,
        'skipped' => [],
        'errors'  => [],
    ];

    if ( ( $handle = fopen( $tmp_path, 'r' ) ) === false ) {
        $results['errors'][] = 'Could not open the uploaded file.';
        return $results;
    }

    // Read header row
    $header = fgetcsv( $handle );
    if ( ! $header ) {
        $results['errors'][] = 'The CSV file appears to be empty.';
        fclose( $handle );
        return $results;
    }

    // Normalize header keys (trim whitespace, lowercase)
    $header = array_map( function( $h ) {
        return strtolower( trim( $h ) );
    }, $header );

    $row_number = 1;
    while ( ( $row = fgetcsv( $handle ) ) !== false ) {
        $row_number++;

        // Skip blank rows
        if ( empty( array_filter( $row ) ) ) continue;

        // Map columns to keys
        $data = [];
        foreach ( $header as $i => $key ) {
            $data[ $key ] = isset( $row[ $i ] ) ? trim( $row[ $i ] ) : '';
        }

        // Title is required
        if ( empty( $data['title'] ) ) {
            $results['skipped'][] = "Row {$row_number}: no title, skipped.";
            continue;
        }

        // Determine post status
        $status = ( isset( $data['status'] ) && $data['status'] === 'draft' ) ? 'draft' : 'publish';

        // Create the post
        $post_id = wp_insert_post( [
            'post_type'    => 'dz_home',
            'post_title'   => sanitize_text_field( $data['title'] ),
            'post_content' => isset( $data['description'] ) ? wp_kses_post( $data['description'] ) : '',
            'post_status'  => $status,
        ], true );

        if ( is_wp_error( $post_id ) ) {
            $results['errors'][] = "Row {$row_number} ("{$data['title']}"): " . $post_id->get_error_message();
            continue;
        }

        // Save meta fields
        $meta_map = [
            'model_name' => '_dz_model_name',
            'beds'       => '_dz_beds',
            'baths'      => '_dz_baths',
            'sqft'       => '_dz_sqft',
            'county'     => '_dz_county',
        ];
        foreach ( $meta_map as $csv_col => $meta_key ) {
            if ( ! empty( $data[ $csv_col ] ) ) {
                update_post_meta( $post_id, $meta_key, sanitize_text_field( $data[ $csv_col ] ) );
            }
        }

        // Assign taxonomy terms
        $tax_map = [
            'home_type'    => 'home_type',
            'availability' => 'home_availability',
            'service_area' => 'service_area',
        ];
        foreach ( $tax_map as $csv_col => $taxonomy ) {
            if ( ! empty( $data[ $csv_col ] ) ) {
                $terms = array_map( 'trim', explode( ',', $data[ $csv_col ] ) );
                wp_set_object_terms( $post_id, $terms, $taxonomy );
            }
        }

        $results['created']++;
    }

    fclose( $handle );
    return $results;
}

// ─── Sample CSV download ──────────────────────────────────────────────────────
add_action( 'admin_init', function () {
    if (
        isset( $_GET['dz_download_sample'] ) &&
        $_GET['dz_download_sample'] === '1' &&
        current_user_can( 'manage_options' )
    ) {
        dz_output_sample_csv();
    }
} );

function dz_importer_sample_url() {
    return add_query_arg( 'dz_download_sample', '1', admin_url() );
}

function dz_output_sample_csv() {
    header( 'Content-Type: text/csv; charset=utf-8' );
    header( 'Content-Disposition: attachment; filename="homes-import-template.csv"' );
    header( 'Pragma: no-cache' );

    $out = fopen( 'php://output', 'w' );

    // Header row
    fputcsv( $out, [
        'title', 'description', 'model_name', 'beds', 'baths',
        'sqft', 'county', 'home_type', 'availability', 'service_area', 'status',
    ] );

    // Sample rows
    $samples = [
        [
            'The Ridgeline',
            'A spacious single-story ranch with an open floor plan and modern finishes.',
            'The Ridgeline', '3', '2', '1,850', 'Cabarrus County',
            'Ranch', 'Available', 'Concord', 'publish',
        ],
        [
            'The Summit',
            'Two-story craftsman with large bonus room and covered porch.',
            'The Summit', '4', '2.5', '2,400', 'Rowan County',
            'Two-Story', 'Available', 'Salisbury', 'publish',
        ],
        [
            'The Creekside',
            'Cozy three-bedroom with a private backyard and updated kitchen.',
            'The Creekside', '3', '2', '1,650', 'Mecklenburg County',
            'Ranch', 'Sold', 'Charlotte', 'publish',
        ],
    ];

    foreach ( $samples as $row ) {
        fputcsv( $out, $row );
    }

    fclose( $out );
    exit;
}
