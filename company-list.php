<?php

function ifm_company_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/ifm-company/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>company</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=ifm_company_create'); ?>">Add New</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "company";

        $rows = $wpdb->get_results("SELECT id,company_name,year_of_incorporation,industry,country,subsidiaries,website,ceo,board_members,key_investors,asset_price,mission_statements,awards,about from $table_name");
        ?>

        <table class='wp-list-table widefat fixed striped posts' style="border: solid 1px #bcb8b8;">
            <tr style="text-align: center; background: #dbdbdb; border: solid 1px #bcb8b8;">
                <th style="text-align: center;" >ID</th>
                <th style="text-align: center;" >Company Name</th>
                <th style="text-align: center;" >Year</th>
                <th style="text-align: center;" >Industry</th>
                <th >Country</th>
                <th >subsidaries</th>
                <th >Website</th>
                <th >CEO</th>
                <th >Board Members</th>
                <th >Key Investyors</th>
                <th >Asset Price</th>
                <th >Missiopn Statements</th>
                <th >Awards</th>
                <th >About</th>
               <!--  <th >Action</th> -->
                
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td ><?php echo $row->id; ?></td>
                    <td ><?php echo $row->company_name; ?></td>
                    <td ><?php echo $row->year_of_incorporation; ?></td>
                    <td ><?php echo $row->industry; ?></td>
                    <td ><?php echo $row->country; ?></td>
                    <td ><?php echo $row->subsidiaries; ?></td>
                    <td ><?php echo $row->website; ?></td>
                    <td ><?php echo $row->ceo; ?></td>
                    <td ><?php echo $row->board_members; ?></td>
                    <td ><?php echo $row->key_investors; ?></td>
                    <td ><?php echo $row->asset_price; ?></td>
                    <td ><?php echo $row->mission_statements; ?></td>
                    <td ><?php echo $row->awards; ?></td>
                    <td style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"    ><?php echo $row->about; ?></td>
                    <td ><a href="<?php echo admin_url('admin.php?page=ifm_company_update&id=' . $row->id); ?>">Update</a></td>

                </tr>
            <?php } ?>
        </table>
    </div>
    <?php
}
