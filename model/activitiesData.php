<?php
require_once 'database/singleton.php';
require_once 'database/config.php';

class activitiesData
{
    private $activities;
    private $activityPictures;


    function __construct()
    {
        $activitiesQuery = singleton::getInstance()->prepare("SELECT * FROM activity");
        $activitiesQuery->execute();
        $this->activities = $activitiesQuery->fetchAll(PDO::FETCH_OBJ);

        $activitiesPicturesQuery = singleton::getInstance()->prepare("SELECT * FROM picture");
        $activitiesPicturesQuery->execute();
        $this->activityPictures = $activitiesPicturesQuery->fetchAll(PDO::FETCH_OBJ);
    }

    public function checkIfUserHasAlreadyLiked($user, $activityPicture)
    {
        $checkIfUserHasAlreadyLikedQuery = singleton::getInstance()->prepare("SELECT pk_id_user FROM user_like WHERE pk_id_picture = $activityPicture->pk_id_picture AND pk_id_user = $user");
        $checkIfUserHasAlreadyLikedQuery->execute();
        $result = $checkIfUserHasAlreadyLikedQuery->fetch();
        return isset($result[0]);
    }

    public function getActivities()
    {
        return $this->activities;
    }

    public function getActivityPictures()
    {
        return $this->activityPictures;
    }

    public function getActivityPictureById($activity)
    {
        $activityPictureQuery = singleton::getInstance()->prepare("SELECT path FROM picture WHERE pk_id_activity = $activity->pk_id_activity");
        $activityPictureQuery->execute();
        return $activityPictureQuery->fetch(PDO::FETCH_OBJ);
    }

    public function getCommentsByPictureId($activityPicture)
    {
        $pictureCommentQuery = singleton::getInstance()->prepare("SELECT * FROM comment WHERE pk_id_picture = $activityPicture->pk_id_picture");
        $pictureCommentQuery->execute();
        return $pictureCommentQuery->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProfilePicByUserId($userId)
    {
        $userProfilePicQuery = singleton::getInstance()->prepare("SELECT user_img FROM user WHERE pk_id_user = $userId");
        $userProfilePicQuery->execute();
        return $userProfilePicQuery->fetch(PDO::FETCH_OBJ);
    }

    public function getNumberVoteByPictureId($pictureId)
    {
        $numberVoteQuery = singleton::getInstance()->prepare("SELECT COUNT(pk_id_user) AS nbrVote FROM user_like WHERE pk_id_picture = $pictureId");
        $numberVoteQuery->execute();
        return $numberVoteQuery->fetch(PDO::FETCH_OBJ);
    }

}