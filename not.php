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
    $imgFile = $_FILES['user_image']['name'];
    $tmp_dir = $_FILES['user_image']['tmp_name'];
    $imgSize = $_FILES['user_image']['size'];

    if(empty($company_name)){
    $errMSG = "Please Enter Company Name.";
    }
    else if(empty($year_of_incorporation)){
    $errMSG = "Please Enter Year of incorporation";
    }
    else if(empty($industry)){
    $errMSG = "Please Enter Industry";
    }else if(empty($country)){
    $errMSG = "Please Enter country";
    }else if(empty($subsidiaries)){
    $errMSG = "Please Enter subsidiaries.";
    }else if(empty($website)){
    $errMSG = "Please Enter website";
    }else if(empty($ceo)){  
    $errMSG = "Please Enter CEO Name";
    }else if(empty($board_members)){
    $errMSG = "Please Enter CEO Name";
    }else if(empty($key_investors)){
    $errMSG = "Please Enter key_investors";
    }else if(empty($key_investors)){
    $errMSG = "Please Enter asset_price";
    }else if(empty($asset_price)){
    $errMSG = "Please Enter mission_statements";
    }else if(empty($awards)){
    $errMSG = "Please Enter Your awards.";
    }else if(empty($about)){
    $errMSG = "Please Enter about"; 
    }
    else if(empty($imgFile)){
    $errMSG = "Please Select Image File.";
    }
    else
    {
    $upload_dir = 'user_images/'; // upload directory

   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
  }


   
    //insert
    if (isset($errMSG)) {
        global $wpdb;
        $table_name = $wpdb->prefix . "company";

        $wpdb->insert(
                $table_name, //table
                array('id' => $id, 'company_name' => $company_name, 'year_of_incorporation' => $year_of_incorporation, 'industry' => $industry, 'country' => $country, 'subsidiaries' => $subsidiaries, 'website' => $website, 'ceo' => $ceo, 'board_members' => $board_members, 'key_investors' => $key_investors, 'asset_price' => $asset_price, 'mission_statements' => $mission_statements, 'awards' => $awards, 'about' => $about, 'user_image' => $user_image), //data
                array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s') //data format			
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
                <tr>
                    <th class="ss-th-width">ID</th>
                    <td><input type="text" name="id" value="<?php echo $id; ?>" class="ss-field-width" /></td>
                </tr>
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
                <tr>
                    <th class="ss-th-width">Logo</th>
                    <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
                </tr>

                	
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
    </div>
    <?php
}