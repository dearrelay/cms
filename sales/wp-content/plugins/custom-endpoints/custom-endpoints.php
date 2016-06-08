<?php
/*
Plugin Name: Custom Endpoints
Plugin URI: http://virtusa.com
Description: A plugin containing various widgets created 
Version: 0.1
Author: Virtusa
Author URI: http://virtusa.com
License: GPLv2 
*/
function getUserData($data)
{
    $resp= $data;  
    log_me("responce : "  .  date("Y-m-d h:i:sa") . json_encode($resp) );
    if (isset($resp) ) {
      
        if (isset($resp['TokenDetail'])) {
            $result["details"] = (array) $resp;
            $result["is_user"] = true;
        } else {
            $result["is_user"] = false;
        }
    } else {
        $result["is_user"] = false;
    }
    return $result;
}
function CreateNewUser($userdata)
{
       log_me("Inside Create User Method");
    $uid = get_user_by("login", strtolower(str_replace("'", "", $userdata['user_login']))); 
    log_me("uid :" . json_encode($uid));
    if (!(isset($uid) && $uid) ) {

        $user_id     = wp_insert_user($userdata);
        if ( is_wp_error( $user_id ) ) {
                 echo $user_id->get_error_message();
                 $user["status"] = "invalid";
            }
            else{
        log_me("$userdetails :" . json_encode($user_id));
        if(isset($user_id) ) {
            $userdetails = get_user_by('id', $user_id); 
            log_me("userdetails :" . json_encode($userdetails));
            if (isset($userdetails)) {
                $user["details"] = (array) $userdetails->data;
                $user["status"]  = "new";
            } else {
                $user["status"] = "invalid";
            }
        }
    }
    } else {
        $userdetails     = get_user_by('id', $uid->ID);
        log_me("user existing" . json_encode($userdetails));
        $user["details"] = (array) $userdetails->data;
        $user["status"]  = "existing";
    }
       log_me("End of Create User Method");
    return $user;
}
function authenticate(WP_REST_Request $request)
{
    log_me("Login started:" . date("Y-m-d h:i:sa"));
    unset($_COOKIE['Token']);
    unset($_COOKIE['user_id']);
    $response['isvaliduser'] = 0;
    $dataModel = $request['dataModel'];
    log_me("Responce from API : " . json_encode($dataModel) );      
    $result = getUserData($dataModel);    
    log_me("result : " . json_encode($result) );
    if ($result['is_user'] == 1) {
        $details['user_login'] = $result['details']['UserName'];
        $details['email']      = $result['details']['Email'];
        $details['first_name'] = $result['details']['FirstName'];
        $details['last_name']  = $result['details']['LastName'];
        $details['name']       = $result['details']['FirstName']." ".$result['details']['LastName'];
        $details['user_pass']  = NULL;
        $user                  = CreateNewUser($details);

        if ($user['status'] != "invalid") {
            $uid = $user["details"]['ID'];
            setUser($uid);
            log_me("User : " . json_encode($result['details']['UserId']) );
            log_me("Token : " . json_encode($result['details']['TokenDetail']['AuthToken']) );
            if(set_newuser_cookie("Token", $result['details']['TokenDetail']['AuthToken']) && set_newuser_cookie("user_id", $result['details']['UserId'])){
                $response['isvaliduser'] = 1;               
            }
            else {
                $response['isvaliduser'] = 0;            
            }     
           
            $response['isvaliduser'] = 1;            
        } else {
            $response['isvaliduser'] = 0;            
        }        
    }
    log_me("Login End:" . date("Y-m-d h:i:sa") . " Responce" . json_encode($response));
    return $response;
}


function logout(){
  $url=API_URL."/LogOff";
 
 $data = array(
        "token" => $_COOKIE['Token']      
    );
  $args = array(
        'headers' => array(
            'content-type' => 'application/json'           
        ),
        'body' => json_encode($data)        
    ); 
  $resp=wp_remote_post($url,$args);  
  if((!is_wp_error($resp)) && isset($resp) && isset($resp['body'])) {    
    $expire = time() - 300000;
    unset($_COOKIE["Token"]);  
    unset($_COOKIE["user_id"]);  
    setcookie("Token", '', $expire);
    setcookie("user_id", '', $expire);
    unset($_COOKIE["Token"]);  
    wp_logout();
    wp_clear_auth_cookie();    
    return true; 
  }
  else{
    return false; 
  }    
}
// Details Info 
function getScriptedDetailsByID(WP_REST_Request $request)
{
    $id      = (int) $request['id'];
    $posts   = get_posts(array(
        'post_type' => 'scripted_details',
        'meta_key' => 'item_id',
        'meta_value' => $id
    ));
    $details = array();
    if ($posts):
        $pid               = $posts[0]->ID;
        $fields            = get_fields($pid);
        $field             = array_map("htmlspecialchars_decode", $fields);
        $details           = $field;
        $details['desc']   = $posts[0]->post_content;
        $details['PostID'] = $pid;
    endif;
    return $details;    
}

// Factual Details
function getFormatsDetailsByID(WP_REST_Request $request)
{
    $id      = (int) $request['id'];
    $posts   = get_posts(array(
        'post_type' => 'formats_details',
        'meta_key' => 'format_id',
        'meta_value' => $id
    ));
    $details = array();
    
    if ($posts):
        $pid               = $posts[0]->ID;
        $fields            = get_fields($pid);
        $field             = array_map("htmlspecialchars_decode", $fields);
        $details           = $field;
        $details['desc']   = $posts[0]->post_content;
        $details['title']  = $posts[0]->post_title;
        $details['PostID'] = $pid;
    endif;
    return $details;    
}

function getMoviesDetailsByID(WP_REST_Request $request)
{
    $id      = (int) $request['id'];
    $posts   = get_posts(array(
        'post_type' => 'movie_details',
        'meta_key' => 'item_id',
        'meta_value' => $id
    ));
    $details = array();
    if ($posts):
        $pid               = $posts[0]->ID;
        $fields            = get_fields($pid);
        $field             = array_map("htmlspecialchars_decode", $fields);
        $details           = $field;
        $details['desc']   = $posts[0]->post_content;
        $details['PostID'] = $pid;
    endif;
    return $details;   
}

// Casting Info
function getCastByItemID(WP_REST_Request $request)
{
    $id      = (int) $request['id'];
    $type    = $request['type'];
    $posts   = get_posts(array(
        'post_type' => 'casting',
        'posts_per_page' => -1,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'Item_id',
                'value' => $id
            ),
            array(
                'key' => 'program_type',
                'value' => $type
            )
        )
    ));
    $details = array();
    $cast    = array();    
    if ($posts):
        foreach ($posts as $post) {
            $pid               = $post->ID;
            $fields            = get_fields($pid);
            $field             = array_map("htmlspecialchars_decode", $fields);
            $details           = $field;
            $details['PostID'] = $pid;
            $cast[]            = $details;
        }
    endif;
    return $cast;    
}
// Rating Info
function getRatingByItemID(WP_REST_Request $request)
{
    $id      = (int) $request['id'];
    $type    = $request['type'];
    $posts   = get_posts(array(
        'posts_per_page' => 4,
        'post_type' => 'ratings',
        'posts_per_page' => -1,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'Item_id',
                'value' => $id
            ),
            array(
                'key' => 'program_type',
                'value' => $type
            )
        )
    ));
    $details = array();
    $cast    = array();
    
    if ($posts):
        foreach ($posts as $post) {
            $pid                 = $post->ID;
            $fields              = get_fields($pid);
            $field               = array_map("htmlspecialchars_decode", $fields);
            $details             = $field;
            $details['site_url'] = gethttpurl($field['site_url']);
            $details['PostID']   = $pid;
            $cast[]              = $details;
        }
    endif;
    return $cast;    
}
function getProgramDetailsByID(WP_REST_Request $request)
{
    $id                 = (int) $request['id'];
    $type               = $request['type'];
    $posts              = get_posts(array(
        'post_type' => 'program_details',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'program_id',
                'value' => $id
            ),
            array(
                'key' => 'program_type',
                'value' => $type
            )
        )
    ));
    $details['details'] = array();
    if ($posts):
        $pid               = $posts[0]->ID;
        $fields            = get_fields($pid);
        $field             = array_map("htmlspecialchars_decode", $fields);
        $details           = $field;
        $details['desc']   = $posts[0]->post_content;
        $details['PostID'] = $pid;
    endif;
     return $details;
}
function getBannersList(WP_REST_Request $request)
{
    $id    = $request['type'];
    $posts = get_posts(array(
        'post_type' => 'bannerslider',
        'meta_key' => 'programetype',
        'meta_value' => $id
        
    ));
    
    if ($posts):
        foreach ($posts as $post) {
            $pid              = $post->ID;
            $fields           = get_fields($pid);
            $field            = array_map("htmlspecialchars_decode", $fields);
            $field['post_id'] = $pid;
            $field['title']   = $post->post_title;
            $details[]        = $field;
            
            
        }
    endif;
    return $details;
    
}
function getContactDirectory()
{
    $posts = get_posts(array(
        'post_type' => 'contact',
        'meta_key' => 'order',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'posts_per_page' => -1
    ));
    
    if ($posts):
        foreach ($posts as $post) {
            
            $pid              = $post->ID;
            $fields           = get_fields($pid);
            $field            = array_map("htmlspecialchars_decode", $fields);
            $field['post_id'] = $pid;
            $field['title']   = $post->post_title;
            $details[]        = $field;
        }
    endif;
    return $details;
}
function getGenreDetails(WP_REST_Request $request)
{
    $id    = $request['id'];
    $posts = get_posts(array(
        'post_type' => 'movie_genre',
        'meta_key' => 'genre_id',
        'meta_value' => $id
        
    ));
    
    if ($posts):
        foreach ($posts as $post) {
            $pid              = $post->ID;
            $fields           = get_fields($pid);
            $field            = array_map("htmlspecialchars_decode", $fields);
            $field['post_id'] = $pid;
            $field['title']   = $post->post_title;
            $field['desc']    = $post->post_content;
            $details          = $field;
            
        }
    endif;
    return $details;
}
function getCarouselByType(WP_REST_Request $request)
{
    $id    = $request['type'];
    $posts = get_posts(array(
        'post_type' => 'carousel_titles',
        'meta_key' => 'page_location',
        'posts_per_page' => -1,
        'meta_value' => $id
        
    ));
    
    if ($posts):
        foreach ($posts as $post) {
            $pid       = $post->ID;
            $fields    = get_fields($pid);
            $field     = array_map("htmlspecialchars_decode", $fields);
            $details[] = $field;
        }
    endif;
    return $details;    
}
function getDetailsContentByType(WP_REST_Request $request)
{
    $id                     = $request['id'];
    $fields                 = get_post($id);
    $details['pageid']      = $id;
    $details['pagetitle']   = $fields->post_title;
    $details['pagecontent'] = $fields->post_content;
    return $details;
}
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/getPressdetails', array(
        'methods' => 'get',
        'callback' => 'getPressdetails'
    ));
});
function getPressdetails()
{
    $posts = get_posts(array(
        'post_type' => 'articles',
        'posts_per_page' => -1
    ));
    
    //print_R( $posts); exit;
    if ($posts):
        foreach ($posts as $post) {
            $pid               = $post->ID;
            $fields            = get_fields($pid);
            $fields['content'] = $post->post_content;
            $fields['title']   = $post->post_title;
            $fields['id']      = $post->ID;
            $fields['date']    = $post->post_modified;
            $field             = array_map("htmlspecialchars_decode", $fields);
            $details[]         = $field;
        }
    endif;
    return $details;
}
function searchAuthentication(WP_REST_Request $request)
{
    if((is_user_logged_in ())) {
        $username = 'select';
        $password = '12345';
        $URL      = $request['type'];
        $ch       = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://172.23.202.140:1123/solr/SSite_DEVDB_AUTO/select?q=*%3A*&wt=json&indent=true");
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;        
    }
    else{       
        $username = 'select';
        $password = '12345';
        $URL      = $request['type'];
        $ch       = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://172.23.202.140:1123/solr/SSite_DEVDB_AUTO/select?q=*%3A*&wt=json&indent=true");
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
   }    
}
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/searchAuthentication/_AUTO/(?P<type>[\w-]+)', array(
        'methods' => 'get',
        'callback' => 'searchAuthentication'
    ));
});
// User account 
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/getBannersList/(?P<type>[\w-]+)', array(
        'methods' => 'get',
        'callback' => 'getBannersList'
    ));
});
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/getGenreDetails/(?P<id>[\d]+)', array(
        'methods' => 'get',
        'callback' => 'getGenreDetails'
    ));
});
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/login', array(
        'methods' => 'post',
        'callback' => 'authenticate'
    ));
});
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/logout', array(
        'methods' => 'get',
        'callback' => 'logout'
    ));
});
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/getCastByItemID/(?P<type>[\w-]+)/(?P<id>[\d]+)', array(
        'methods' => 'get',
        'callback' => 'getCastByItemID'
    ));
});
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/getRatingByItemID/(?P<type>[\w-]+)/(?P<id>[\d]+)', array(
        'methods' => 'get',
        'callback' => 'getRatingByItemID'
    ));
});
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/getProgramDetailsByID/(?P<type>[\w-]+)/(?P<id>[\d]+)', array(
        'methods' => 'get',
        'callback' => 'getProgramDetailsByID'
    ));
});
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/getFormatsDetailsByID/(?P<id>[\d]+)', array(
        'methods' => 'get',
        'callback' => 'getFormatsDetailsByID'
    ));
});
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/contactDirectory/', array(
        'methods' => 'get',
        'callback' => 'getContactDirectory'
    ));
});
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/getCarouselByType/(?P<type>[\w-]+)', array(
        'methods' => 'get',
        'callback' => 'getCarouselByType'
    ));
});
add_action('rest_api_init', function()
{
    register_rest_route('wp/v2', '/getDetailsContentByType/(?P<id>[\d]+)', array(
        'methods' => 'get',
        'callback' => 'getDetailsContentByType'
    ));
});
function gethttpurl($var)
{
    if (strpos($var, 'http://') !== 0) {
        return 'http://' . $var;
    } else {
        return $var;
    }
}
