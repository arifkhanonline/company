<?php

function ifm_company_create() {
    $id = $_POST["id"];
    $company_name = $_POST["company_name"];
    $year_of_incorporation = $_POST["year_of_incorporation"];
    $industry = $_POST["industry"];
    $country = $_POST["country"];
    $subsidiaries = $_POST["subsidiaries"];
    $website = $_POST["website"];
    $ceo = $_POST["ceo"];
    $board_members = $_POST["board_members"];
    $key_investors = $_POST["key_investors"];
    $asset_price = $_POST["asset_price"];
    $mission_statements = $_POST["mission_statements"];
    $awards = $_POST["awards"];
    $about = $_POST["about"];
   
    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "company";

        $wpdb->insert(
                $table_name, //table
                array('id' => $id, 'company_name' => $company_name, 'year_of_incorporation' => $year_of_incorporation, 'industry' => $industry, 'country' => $country, 'subsidiaries' => $subsidiaries, 'website' => $website, 'ceo' => $ceo, 'board_members' => $board_members, 'key_investors' => $key_investors, 'asset_price' => $asset_price, 'mission_statements' => $mission_statements, 'awards' => $awards, 'about' => $about), //data
                array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s') //data format			
        );
        $message.="company inserted";
    }
	
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/ifm-company/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Add New company</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p>Three capital letters for the ID</p>
            <table class='wp-list-table widefat fixed'>
                <!-- <tr>
                    <th class="ss-th-width">ID</th>
                    <td><input type="text" name="id" value="<?php echo $id; ?>" class="ss-field-width" /></td>
                </tr> -->
                <tr>
                    <th class="ss-th-width">company name</th>
                    <td><input type="text" name="company_name" value="<?php echo $company_name; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Year of Incorporation</th>
                    <td><input type="text" name="year_of_incorporation" value="<?php echo $year_of_incorporation; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Industry</th>
                    <td><input type="text" name="industry" value="<?php echo $industry; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Country/ Region Presence</th>
                    <td><input type="text" name="country" value="<?php echo $country; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Subsidiaries</th>
                    <td><input type="text" name="subsidiaries" value="<?php echo $subsidiaries; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Website</th>
                    <td><input type="text" name="website" value="<?php echo $website; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">CEO NAME</th>
                    <td><input type="text" name="ceo" value="<?php echo $ceo; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Board members</th>
                    <td><input type="text" name="board_members" value="<?php echo $board_members; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Key Investors</th>
                    <td><input type="text" name="key_investors" value="<?php echo $key_investors; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Asset Price</th>
                    <td><input type="text" name="asset_price" value="<?php echo $asset_price; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Mission Statements</th>
                    <td><input type="text" name="mission_statements" value="<?php echo $mission_statements; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">Award</th>
                    <td><input type="text" name="awards" value="<?php echo $awards; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">About</th>
                    <td><input type="text" name="about" value="<?php echo $about; ?>" class="ss-field-width" /></td>
                </tr>
                	
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
    </div>
    <?php
}
