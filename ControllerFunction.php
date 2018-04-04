<?php

include "config.php";
//echo "working";
function checkDevice() { 
	//echo "Working";
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
header('Location: http://m.textimz.com');

}

function getNews($input) { 
	include "config.php";
    //echo "Working";
	$limit = $input;
    //echo $limit;

    $stmt = $conn->prepare("SELECT a.pk_i_id , a.s_headline, a.s_create_time, a.s_slug, a.s_content, b.s_source, c.fk_i_category_id,c.fk_i_item_id,d.categories_name from t_news_item as a, t_media as b, t_categories as c, s_categories as d where a.pk_i_id = b.fk_i_item_id and a.pk_i_id = c.fk_i_item_id and d.pk_i_id = c.fk_i_category_id and b_active = 1 group by a.pk_i_id LIMIT $limit");
    //$stmt->bindparam(":limit", $limit);
    $stmt->execute();
    $data['ids']         = array();
    $data['createTimes'] = array();
    $data['headlines']   = array();
    $data['slugs']       = array();
    $data['sources']     = array();
    $data['contents'] = array();
    $data['cardDate'] = array();
    $data['categoriesName'] = array();
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                    $data['ids'][]         = $result['pk_i_id'];
                    $data['createTimes'][] = $result['s_create_time'];
                    $data['headlines'][]   = $result['s_headline'];
                    $data['slugs'][]       = $result['s_slug'];
                    $data['sources'][]     = $result['s_source'];
                    $data['contents'][]     = $result['s_content'];
                    $data['categoriesName'][]     = $result['categories_name'];
                    $data['cardDate'][] = date('j M', strtotime($result['s_create_time']));
            }
            //print_r($data);
    $totalIds = count($data['ids']);
    //echo $totalIds;
    //print_r($data);
    return $data;
    //return json_encode($data);

}

function getEventMarkee() 
{
	$today = date("Y-m-d");
	include "config.php";
	    $stmt = $conn->prepare("SELECT a.pk_i_id , a.event_name,a.date_start, a.date_end, a.fk_country_id, a.city, a.venue, a.details ,a.product , a.fk_category_id, a.attendee , a.link ,a.media_link, a.tags, a.fk_user_id, a.b_active, a.b_publish ,b.s_source ,b.fk_event_id, c.categories_name, c.pk_i_id ,d.country_name,d.pk_i_id, e.s_fname, e.s_lname ,e.pk_i_id from t_events as a, t_media_events as b, s_categories as c, s_country as d, t_user as e where a.pk_i_id = b.fk_event_id and a.fk_country_id = d.pk_i_id and a.fk_category_id = c.pk_i_id and a.fk_user_id = e.pk_i_id and a.b_publish = 1 and a.date_start >= :today group by a.pk_i_id order by a.pk_i_id DESC  ");
    $stmt->bindparam(":today", $today);

    $stmt->execute();

    $data['id']         = array();
    $data['event'] = array();
    $data['country']   = array();
    $data['tag'] = array();
    $data['source'] = array();
    $data['dateStart'] = array();
    $data['dateEnd'] = array();

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                    $data['id'][] = $result['pk_i_id'];
                    $data['event'][] = $result['event_name'];
                    $data['country'][]     = $result['country_name'];
                    $data['tag'][] = $result['tags'];
                    $data['source'][] = $result['s_source'];
                    $data['dateStart'][] = date('j M', strtotime($result['date_start']));
                    $data['dateEnd'][] = date('j M', strtotime($result['date_end']));
            }
            
            $data['count'] = count($data['id']);
            return $data;
            //return json_encode($data);
}

function getEvents() 
{
	$today = date("Y-m-d");
	include "config.php";
    echo "<br>";
   $stmt = $conn->prepare("SELECT a.pk_i_id , a.event_name,a.date_start, a.date_end, a.fk_country_id, a.city, a.venue, a.details ,a.product , a.fk_category_id, a.attendee , a.link ,a.media_link, a.tags, a.fk_user_id, a.b_active, a.b_publish ,b.s_source ,b.fk_event_id, c.categories_name, c.pk_i_id ,d.country_name,d.pk_i_id, e.s_fname, e.s_lname ,e.pk_i_id from t_events as a, t_media_events as b, s_categories as c, s_country as d, t_user as e where a.pk_i_id = b.fk_event_id and a.fk_country_id = d.pk_i_id and a.fk_category_id = c.pk_i_id and a.fk_user_id = e.pk_i_id and a.b_active = 1  and a.date_start >= :today  group by a.pk_i_id order by a.pk_i_id ASC");
    $stmt->bindparam(":today", $today);
    $stmt->execute();

    $data['id']         = array();
    $data['event'] = array();
    $data['country']   = array();
    $data['tag'] = array();
    $data['source'] = array();
    $data['city'] = array();
    $data['details'] = array();
    $data['dateStart'] = array();
    $data['dateEnd'] = array();
    $data['categoriesName'] = array();

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                    $data['id'][]         = $result['pk_i_id'];
                    $data['event'][] = $result['event_name'];
                    $data['country'][]     = $result['country_name'];
                    $data['tag'][] = $result['tags'];
                    $data['city'][] = $result['city'];
                    $data['details'][] = $result['details'];
                    $data['source'][] = $result['s_source'];
                    $data['categoriesName'][] = $result['categories_name'];
                    $data['dateStart'][] = date('j M', strtotime($result['date_start']));
                    $data['dateEnd'][] = date('j M', strtotime($result['date_end']));
            }
            $data['count'] = count($data['id']);
            //print_r($data);
            return $data;
            //return json_encode($data);
}

function getFeaturedEvents() 
{
    $today = date("Y-m-d");
    include "config.php";
    //echo "<br>".$today;
    $stmt = $conn->prepare("SELECT a.pk_i_id , a.event_name,a.date_start, a.date_end, a.fk_country_id, a.city, a.venue, a.details ,a.product , a.fk_category_id, a.attendee , a.link ,a.media_link, a.tags, a.fk_user_id, a.b_active, a.b_publish ,b.s_source ,b.fk_event_id, c.categories_name, c.pk_i_id ,d.country_name,d.pk_i_id, e.s_fname, e.s_lname ,e.pk_i_id from t_events as a, t_media_events as b, s_categories as c, s_country as d, t_user as e where a.pk_i_id = b.fk_event_id and a.fk_country_id = d.pk_i_id and a.fk_category_id = c.pk_i_id and a.fk_user_id = e.pk_i_id and a.b_active = 1  and a.date_start >= :today and a.isfeatured = 1 group by a.pk_i_id order by a.pk_i_id ASC ");
    $stmt->bindparam(":today", $today);
    //echo "<br>wordwrap(str)";
    $stmt->execute();
    //echo "string";

    $data['id']         = array();
    $data['event'] = array();
    $data['country']   = array();
    $data['tag'] = array();
    $data['source'] = array();
    $data['dateStart'] = array();
    $data['dateEnd'] = array();
    $data['details'] = array();
    $data['categoriesName'] = array();

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                    $data['id'][]         = $result['pk_i_id'];
                    $data['event'][] = $result['event_name'];
                    $data['country'][]     = $result['country_name'];
                    $data['tag'][] = $result['tags'];
                    $data['source'][] = $result['s_source'];
                    $data['details'][] = $result['details'];
                    $data['categoriesName'][] = $result['categories_name'];
                    $data['dateStart'][] = date('j M', strtotime($result['date_start']));
                    $data['dateEnd'][] = date('j M', strtotime($result['date_end']));
            }
            $data['count'] = count($data['id']);
            //print_r($data);
            return $data;
            //return json_encode($data);
}


function getNewsByCategory($input) 
{
	$categories_number = $input;
	//echo $categories_number;
	include "config.php";

   $stmt = $conn->prepare("SELECT a.pk_i_id , a.s_headline,a.s_content, a.s_create_time, a.s_slug, b.s_source, c.link_name, c.link , e.fk_i_category_id , e.fk_i_item_id , f.categories_name, f.pk_i_id from t_news_item as a, t_media as b, t_link as c, t_categories as e, s_categories as f where a.pk_i_id = b.fk_i_item_id and c.fk_i_news_item_id = a.pk_i_id and a.pk_i_id = e.fk_i_item_id and e.fk_i_category_id = :categories_number group by a.pk_i_id order by a.pk_i_id desc");
    $stmt->bindparam(":categories_number", $categories_number);
    $stmt->execute();

    $data['ids']         = array();
    $data['createTimes'] = array();
    $data['headlines']   = array();
    $data['slugs']       = array();
    $data['sources']     = array();
    $data['contents'] = array();
    $data['cardDate'] = array();
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                    $data['ids'][]         = $result['pk_i_id'];
                    $data['createTimes'][] = $result['s_create_time'];
                    $data['headlines'][]   = $result['s_headline'];
                    $data['slugs'][]       = $result['s_slug'];
                    $data['sources'][]     = $result['s_source'];
                    $data['contents'][]     = $result['s_content'];
                    $data['cardDate'][] = date('j M', strtotime($result['s_create_time']));
            }
            $totalIds = count($data['ids']);
            return $data;
            //return json_encode($data);
}

function getVideoGalleryLink() 
{
	include "config.php";
    $stmt= $conn->prepare("SELECT * FROM t_videos order by pk_i_id  desc LIMIT 1");
    $stmt->execute();

    $data['videoName'] = array();
    $data['videoLink'] = array();

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                    $data['videoName']   = $result['video_name'];
                    $data['videoLink']   = $result['link'];
            }
            //$totalIds = count($data['ids']);
            return $data;
            //return json_encode($data);
}

function getBanner() 
{
	include "config.php";

    $stmt = $conn->prepare("SELECT a.pk_i_id, a.Campaign_name ,a.link , b.s_source, b.fk_ads_id FROM t_ads as a , t_media_ads as b WHERE a.pk_i_id = b.fk_ads_id order by a.pk_i_id  desc LIMIT 3");
    $stmt->execute();

    $data['campaignImage'] = array();
    $data['campaignLink'] = array();
    $data['campaignName'] = array();

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                    $data['campaignImage'][]   = $result['s_source'];
                    $data['campaignLink'][]   = $result['link'];
                    $data['campaignName'][] = $result['Campaign_name'];
            } 
            return $data;
            //return json_encode($data);
}

function countCategory() 
{
    include "config.php";

    $data['categoriesName'] = array();
    $data['count'] = array();

    $stmt1 = $conn->prepare('SELECT * FROM s_categories order by pk_i_id asc ');
    $stmt1->execute();
        while($view_item = $stmt1 -> fetch(PDO::FETCH_ASSOC))
        {
        $cat_id = $view_item['pk_i_id'];
        $data['categoriesName'][] = $view_item['categories_name'];
        $stmt2 = $conn->prepare('SELECT count(pk_i_id) FROM t_categories WHERE fk_i_category_id = :cat_id');
        $stmt2->bindParam(':cat_id', $cat_id);        
        $stmt2->execute();
        $countArticles = $stmt2->fetch(PDO::FETCH_ASSOC);
        $data['count'][] = $countArticles['count(pk_i_id)'];
        } 
        //print_r($data);
        return $data;
}
function getEventByCategory($input) 
{
    $categories_number = $input;
    $today = date("Y-m-d");
    include "config.php";
   $stmt = $conn->prepare("SELECT a.pk_i_id , a.event_name,a.date_start, a.date_end, a.fk_country_id, a.city, a.venue, a.details ,a.product , a.fk_category_id, a.attendee , a.link ,a.media_link, a.tags, a.fk_user_id, a.b_active, a.b_publish ,b.s_source ,b.fk_event_id, c.categories_name, c.pk_i_id ,d.country_name,d.pk_i_id, e.s_fname, e.s_lname ,e.pk_i_id from t_events as a, t_media_events as b, s_categories as c, s_country as d, t_user as e where a.pk_i_id = b.fk_event_id and a.fk_country_id = d.pk_i_id and a.fk_category_id = c.pk_i_id and a.fk_user_id = e.pk_i_id and a.b_active = 1  and a.date_start >= :today and a.fk_category_id = :categories_number group by a.pk_i_id order by a.pk_i_id ASC");
    $stmt->bindparam(":today", $today);
    $stmt->bindparam(":categories_number", $categories_number);
    $stmt->execute();

    $data['id']         = array();
    $data['event'] = array();
    $data['country']   = array();
    $data['tag'] = array();
    $data['source'] = array();
    $data['dateStart'] = array();
    $data['dateEnd'] = array();
    $data['details'] = array();
    $data['categoriesName'] = array();
    $data['city'] = array();

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                    $data['id'][]         = $result['pk_i_id'];
                    $data['event'][] = $result['event_name'];
                    $data['country'][]     = $result['country_name'];
                    $data['tag'][] = $result['tags'];
                    $data['source'][] = $result['s_source'];
                    $data['details'][] = $result['details'];
                    $data['city'][] = $result['city'];
                    $data['categoriesName'][] = $result['categories_name'];
                    $data['dateStart'][] = date('j M', strtotime($result['date_start']));
                    $data['dateEnd'][] = date('j M', strtotime($result['date_end']));
            }
            $data['count'] = count($data['id']);
            //print_r($data);
            return $data;
            //return json_encode($data);
}

function getSingleNews($input) 
{
    $news = $input;
    //echo $categories_number;
    include "config.php";

   $stmt = $conn->prepare("SELECT a.pk_i_id , a.s_headline,a.s_content, a.s_create_time, a.s_slug, b.s_source, c.link_name, c.link , e.fk_i_category_id , e.fk_i_item_id , f.categories_name, f.pk_i_id from t_news_item as a, t_media as b, t_link as c, t_categories as e, s_categories as f where a.pk_i_id = b.fk_i_item_id and c.fk_i_news_item_id = a.pk_i_id and a.pk_i_id = e.fk_i_item_id and a.s_slug = :news group by a.pk_i_id order by a.pk_i_id desc");
    $stmt->bindparam(":news", $news);
    $stmt->execute();

    $data['ids']         = array();
    $data['createTimes'] = array();
    $data['headlines']   = array();
    $data['slugs']       = array();
    $data['sources']     = array();
    $data['contents'] = array();
    $data['cardDate'] = array();
    $data['link'] = array();
    $data['categoriesName'] = array();
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                    $data['ids']         = $result['pk_i_id'];
                    $data['createTimes'] = $result['s_create_time'];
                    $data['headlines']   = $result['s_headline'];
                    $data['slugs']       = $result['s_slug'];
                    $data['sources']     = $result['s_source'];
                    $data['contents']     = $result['s_content'];
                    $data['link']     = $result['link'];
                    $data['categoriesName'] = $result['categories_name'];
                    $data['cardDate'] = date('j M', strtotime($result['s_create_time']));
            }
            $totalIds = count($data['ids']);
            //print_r($data);
            return $data;
            //return json_encode($data);
}
function getSingleEvent($input) 
{
    $tag = $input;
    $today = date("Y-m-d");
    include "config.php";
   $stmt = $conn->prepare("SELECT a.pk_i_id , a.event_name,a.date_start, a.date_end, a.fk_country_id, a.city, a.venue, a.details ,a.product , a.fk_category_id, a.attendee , a.link ,a.media_link, a.tags, a.fk_user_id, a.b_active, a.b_publish ,b.s_source ,b.fk_event_id, c.categories_name, c.pk_i_id ,d.country_name,d.pk_i_id, e.s_fname, e.s_lname ,e.pk_i_id from t_events as a, t_media_events as b, s_categories as c, s_country as d, t_user as e where a.pk_i_id = b.fk_event_id and a.fk_country_id = d.pk_i_id and a.fk_category_id = c.pk_i_id and a.fk_user_id = e.pk_i_id and a.b_active = 1  and a.date_start >= :today and a.tags = :tag group by a.pk_i_id order by a.pk_i_id ASC");
    $stmt->bindparam(":today", $today);
    $stmt->bindparam(":tag", $tag);
    $stmt->execute();

    $data['id']         = array();
    $data['event'] = array();
    $data['country']   = array();
    $data['tag'] = array();
    $data['source'] = array();
    $data['dateStart'] = array();
    $data['dateEnd'] = array();
    $data['details'] = array();
    $data['categoriesName'] = array();
    $data['city'] = array();

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                    $data['id']         = $result['pk_i_id'];
                    $data['event'] = $result['event_name'];
                    $data['country']     = $result['country_name'];
                    $data['tag'] = $result['tags'];
                    $data['source'] = $result['s_source'];
                    $data['details'] = $result['details'];
                    $data['city'] = $result['city'];
                    $data['categoriesName'] = $result['categories_name'];
                    $data['dateStart'] = date('j M', strtotime($result['date_start']));
                    $data['dateEnd'] = date('j M', strtotime($result['date_end']));
            }
            $data['count'] = count($data['id']);
            //print_r($data);
            return $data;
            //return json_encode($data);
}

?>