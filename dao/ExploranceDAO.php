<?php
namespace Explorance\DAO;

class ExploranceDAO {

    private $PDOX;
    private $p;
    private $tool;

    public function __construct($PDOX, $p, $tool) {
        $this->PDOX = $PDOX;
        $this->p = $p;
        $this->tool = $tool;
    }

    // public function getDetails($link_id, $user_id, $site_id) {
    //     $stmt = $this->PDOX->queryDie(
    //         "SELECT `link_id`, `site_id`,
    //                 `gradebook_id`, `gradebook_name`, `scheduled_date`, `status`, `created_at`, `modified_at`
    //             FROM {$this->p}gradebook_upload WHERE `link_id` = :link_id",
    //         array(':link_id' => $link_id)
    //     );

    //     $rows = $stmt->fetch(\PDO::FETCH_ASSOC);

    //     # If no rows are found and a site_id is provided, create an empty record and retrieve it
    //     if (gettype($rows) == "boolean" && $site_id) {
    //         if ($this->createEmpty($link_id, $user_id, $site_id)) {
    //             return $this->getDetails($link_id, $user_id, $site_id);
    //         } else {
    //             return null;
    //         }
    //     }
    //     return $rows;
    // }

    // function createEmpty($link_id, $user_id, $site_id) {
    //     $this->PDOX->queryDie("INSERT INTO {$this->p}gradebook_upload
    //             (`link_id`, `site_id`, `modified_by`, `created_by`, `status`)
    //             VALUES (:linkId, :siteId, :userId, :userId, :status)",
    //         array(':linkId' => $link_id, ':siteId' => $site_id, ':userId' => $user_id, ':status' => 'init' ));
    //     return true;
    // }
}