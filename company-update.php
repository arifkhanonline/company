<?php

function ifm_company_update() {
    global $wpdb;
    $table_name = $wpdb->prefix . "company";
    $id = $_GET["id"];
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

//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
                 array('company_name' => $company_name, 'year_of_incorporation' => $year_of_incorporation, 'industry' => $industry, 'country' => $country, 'subsidiaries' => $subsidiaries, 'website' => $website, 'ceo' => $ceo, 'board_members' => $board_members, 'key_investors' => $key_investors, 'asset_price' => $asset_price, 'mission_statements' => $mission_statements, 'awards' => $awards, 'about' => $about), //data
                array('id' => $id), //where
                array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id));
    } else {//selecting value to update	
        $company = $wpdb->get_results($wpdb->prepare("SELECT id,company_name,year_of_incorporation,industry,country,subsidiaries,website,ceo,board_members,key_investors,asset_price,mission_statements,awards,about from $table_name where id=%s", $id));
        foreach ($company as $s) {
            $company_name = $s->company_name;
            $year_of_incorporation = $s->year_of_incorporation;
            $industry = $s->industry;
            $country = $s->country;
            $subsidiaries = $s->subsidiaries;
            $website = $s->website;
            $ceo = $s->ceo;
            $board_members = $s->board_members;
            $key_investors = $s->key_investors;
            $asset_price = $s->asset_price;
            $mission_statements = $s->mission_statements;
            $awards = $s->awards;
            $about = $s->about;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/ifm-company/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>company</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>company deleted</p></div>
            <a href="<?php echo admin_url('admin.php?page=ifm_company_list') ?>">&laquo; Back to company list</a>

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>company updated</p></div>
            <a href="<?php echo admin_url('admin.php?page=ifm_company_list') ?>">&laquo; Back to company list</a>

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' style="display: block;">
                    <tr>
                        <th>Company Name</th><td><input type="text" name="company_name" value="<?php echo $company_name; ?>"/></td>
                    </tr>
                    <tr>
                        <th>Year of Incorporation</th><td><input type="text" name="year_of_incorporation" value="<?php echo $year_of_incorporation; ?>"/></td>
                    </tr>
                    <tr>
                        <th>Industry</th><td><input type="text" name="industry" value="<?php echo $industry; ?>"/></td>
                    </tr>
                    <tr>    
                        <th>Country</th><td><input type="text" name="country" value="<?php echo $country; ?>"/></td>
                    </tr>
                    <tr>    
                        <th>Subsidaries</th><td><input type="text" name="subsidiaries" value="<?php echo $subsidiaries; ?>"/></td>
                    </tr>
                    <tr>    
                        <th>Website</th><td><input type="text" name="website" value="<?php echo $website; ?>"/></td>
                    </tr>
                    <tr>    
                        <th>CEO</th><td><input type="text" name="ceo" value="<?php echo $ceo; ?>"/></td>
                    </tr>
                    <tr>    
                        <th>Board Members</th><td><input type="text" name="board_members" value="<?php echo $board_members; ?>"/></td>
                    </tr>
                    <tr>    
                        <th>Key Investors</th><td><input type="text" name="key_investors" value="<?php echo $key_investors; ?>"/></td>
                    </tr>
                    <tr>    
                        <th>Asset Price</th><td><input type="text" name="asset_price" value="<?php echo $asset_price; ?>"/></td>
                    </tr>
                    <tr>    
                        <th>Mission Statements</th><td><input type="text" name="mission_statements" value="<?php echo $mission_statements; ?>"/></td>
                    </tr>
                    <tr>    
                        <th>Awards</th><td><input type="text" name="awards" value="<?php echo $awards; ?>"/></td>
                    </tr>
                    <tr>    
                        <th>About</th><td><input type="text" name="about" value="<?php echo $about; ?>"/></td>                       
                    </tr>
    
                </table>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Are&aacute;you sure yo want to delete')">
            </form>
        <?php } ?>

    </div>
    <?php
}