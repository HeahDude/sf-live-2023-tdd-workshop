<?php

namespace App\Tests\Game;

use App\Entity\Player;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @group integration
 */
class ScoreBoardTest extends KernelTestCase
{
    private PlayerRepository $playerRepository;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->playerRepository = self::getContainer()->get(PlayerRepository::class);
    }

    public function testScoreBoardIsEmpty()
    {
        self::assertCount(0, $this->playerRepository->getScoreBoard());
    }

    public function testScoreBoardWithOnePlayer()
    {
        $player = new Player('toto');

        /** @var EntityManagerInterface $entityManager */
        $entityManager = self::getContainer()->get(EntityManagerInterface::class);
        $entityManager->persist($player);
        $entityManager->flush();

        self::assertCount(1, $this->playerRepository->getScoreBoard());
    }
}
