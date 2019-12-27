<?php

namespace App\Service;

use App\Service\AbstractService\AbstractWorkHelper;

class TopWorkHelper extends AbstractWorkHelper {

  /**
    * @access public
    * @return array
    */
    public function all(): ?array {
      return $this->workRepository->findAll();
    }
    /**
     * @access public
     */
    public function admin() {
      // TODO: 
      return $this->workRepository->findBy([],[]);
    }
}