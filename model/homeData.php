<?php
require_once 'database/singleton.php';
require_once 'database/config.php';
/**
 * Created by PhpStorm.
 * User: Rémi
 * Date: 18/04/2017
 * Time: 10:05
 */
class homeData
{
    private $news;
    private $activities;
    private $activitiesPictures;
    private $suggestions;
    private $storePictures;

    public function __construct()
    {
        $newsQuery = singleton::getInstance()->prepare("SELECT * FROM news");
        $newsQuery->execute();
        $this->news = $newsQuery->fetchAll(PDO::FETCH_OBJ);

        $activitiesQuery = singleton::getInstance()->prepare("SELECT * FROM activity WHERE datetime >= CURRENT_DATE && CURRENT_TIME");
        $activitiesQuery->execute();
        $this->activities = $activitiesQuery->fetchAll(PDO::FETCH_OBJ);

        $activityPictureQuery = singleton::getInstance()->prepare("SELECT path FROM picture");
        $activityPictureQuery->execute();
        $this->activitiesPictures = $activityPictureQuery->fetchAll(PDO::FETCH_OBJ);

        $suggestionsQuery = singleton::getInstance()->prepare("SELECT * FROM suggestion INNER JOIN user ON suggestion.pk_id_user = user.pk_id_user WHERE suggestion.state = 'pending'");
        $suggestionsQuery->execute();
        $this->suggestions = $suggestionsQuery->fetchAll(PDO::FETCH_OBJ);

        $storePicturesQuery = singleton::getInstance()->prepare("SELECT img_path FROM product");
        $storePicturesQuery->execute();
        $this->storePictures = $storePicturesQuery->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNews()
    {
        return $this->news;
    }
    public function getActivities()
    {
        return $this->activities;
    }
    public function getActivitiesPictures()
    {
        return $this->activitiesPictures;
    }
    public function getActivitiesPicture($rank)
    {
        return $this->activitiesPictures[$rank];
    }
    public function getSuggestions()
    {
        return $this->suggestions;
    }

    public function checkIfUserHasAlreadyLiked($user, $suggestion, $dateTimeNbr)
    {
        $checkIfUserHasAlreadyLikedQuery = singleton::getInstance()->prepare("SELECT choice_datetime$dateTimeNbr FROM user_vote WHERE pk_id_user = $user AND pk_id_suggestion = $suggestion->pk_id_suggestion");
        $checkIfUserHasAlreadyLikedQuery->execute();
        $result = $checkIfUserHasAlreadyLikedQuery->fetch();
        return isset($result[0]);
    }

    public function checkIfUserHasAlreadySubscribed($user, $activity)
    {
        $checkIfUserHasAlreadySubscribedQuery = singleton::getInstance()->prepare("SELECT pk_id_activity FROM user_subscribe WHERE pk_id_user = $user AND pk_id_activity = $activity->pk_id_activity");
        $checkIfUserHasAlreadySubscribedQuery->execute();
        $result = $checkIfUserHasAlreadySubscribedQuery->fetch();
        return isset($result[0]);
    }

    public function countUserNbrByActivityId($activity)
    {
        $nbr_user_subscribed_Query = singleton::getInstance()->prepare("SELECT COUNT(pk_id_user) FROM user_subscribe WHERE pk_id_activity = $activity->pk_id_activity");
        $nbr_user_subscribed_Query->execute();
        $result = $nbr_user_subscribed_Query->fetch();
        return $result[0];
    }

    public function getDateTime1BySuggestion($suggestion)
    {
        $nbr_vote_datetime1Query = singleton::getInstance()->prepare("SELECT COUNT(choice_datetime1) FROM user_vote WHERE pk_id_suggestion = $suggestion->pk_id_suggestion");
        $nbr_vote_datetime1Query->execute();
        $result = $nbr_vote_datetime1Query->fetch();
        return $result[0];
    }
    public function getDateTime2BySuggestion($suggestion)
    {
        $nbr_vote_datetime2Query = singleton::getInstance()->prepare("SELECT COUNT(choice_datetime2) FROM user_vote WHERE pk_id_suggestion = $suggestion->pk_id_suggestion");
        $nbr_vote_datetime2Query->execute();
        $result = $nbr_vote_datetime2Query->fetch();
        return $result[0];
    }
    public function getDateTime3BySuggestion($suggestion)
    {
        $nbr_vote_datetime3Query = singleton::getInstance()->prepare("SELECT COUNT(choice_datetime3) FROM user_vote WHERE pk_id_suggestion = $suggestion->pk_id_suggestion");
        $nbr_vote_datetime3Query->execute();
        $result = $nbr_vote_datetime3Query->fetch();
        return $result[0];
    }

    public function getStorePictures()
    {
        return $this->storePictures;
    }
    public function getStorePicture($rank)
    {
        return $this->storePictures[$rank]->img_path;
    }

}