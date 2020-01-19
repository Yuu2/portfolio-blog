<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use App\Entity\Portfolio;
use App\Entity\PortfolioSkill;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Yuu2
 * updated 2020.01.19
 */
class HomeFixtures extends AbstractFixtures {

  public function load(ObjectManager $manager) {
    
    $portfolio = $this->createPortfolio($manager, "JavaFx-Chat", "Window/Mac 어플리케이션", "https://github.com/Yuu2/javafx-chat");

    $this->addPortfolioSkill(
      $manager, 
      $portfolio,
      $this->createSkill($manager, 'Java', 70, "A")
    );
    $this->addPortfolioSkill(
      $manager, 
      $portfolio,
      $this->createSkill($manager, 'MySQL', 50, "B", false)
    );
    
    $manager->flush();
  }
  
  /**
   * @access protected
   * @param ObjectManager $manager
   * @param Portfolio $portfolio
   * @param Skill $skill
   */
  protected function addPortfolioSkill(ObjectManager $manager, Portfolio $portfolio, Skill $skill) {

    $portfolio_skill = new PortfolioSkill();
    $portfolio_skill->setPortfolio($portfolio);
    $portfolio_skill->setSkill($skill);

    $manager->persist($portfolio_skill);
  }
}