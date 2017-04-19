<?php
require_once 'database/singleton.php';
require_once 'database/config.php';

class bdeData
{
    private $news;
    private $suggestions;

    public function __construct()
    {
        $newsQuery = singleton::getInstance()->prepare("SELECT * FROM news");
        $newsQuery->execute();
        $this->news = $newsQuery->fetchAll(PDO::FETCH_OBJ);

        $suggestionsQuery = singleton::getInstance()->prepare("SELECT * FROM suggestion INNER JOIN user ON suggestion.pk_id_user = user.pk_id_user WHERE suggestion.state = 'pending'");
        $suggestionsQuery->execute();
        $this->suggestions = $suggestionsQuery->fetchAll(PDO::FETCH_OBJ);
    }

    public function getNews()
    {
        return $this->news;
    }
    public function getSuggestions()
    {
        return $this->suggestions;
    }

    public function getMainDateTimeSuggestion($suggestion)
    {
        $nbVoteDateTime1 = $this->getDateTime1BySuggestion($suggestion);
        $dateTime1 = $suggestion->datetime1;
        $nbVoteDateTime2 = $this->getDateTime2BySuggestion($suggestion);
        $dateTime2 = $suggestion->datetime2;
        $nbVoteDateTime3 = $this->getDateTime3BySuggestion($suggestion);
        $dateTime3 = $suggestion->datetime3;

        $voteDates = array($dateTime1 => $nbVoteDateTime1, $dateTime2 => $nbVoteDateTime2, $dateTime3 => $nbVoteDateTime3);
        $bestDate = array_search(max($voteDates), $voteDates);

        return $bestDate;
    }

    public function getMainDateTimeVoteNbrSuggestion($suggestion)
    {
        $nbVoteDateTime1 = $this->getDateTime1BySuggestion($suggestion);
        $nbVoteDateTime2 = $this->getDateTime2BySuggestion($suggestion);
        $nbVoteDateTime3 = $this->getDateTime3BySuggestion($suggestion);

        $voteDates = array($nbVoteDateTime1, $nbVoteDateTime2, $nbVoteDateTime3);
        $maxVotes = max($voteDates);

        return $maxVotes;
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
}