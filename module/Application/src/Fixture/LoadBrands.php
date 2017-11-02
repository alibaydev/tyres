<?php

namespace Application\Fixture;

use Car\Entity\Brand;
use Car\Entity\Generation;
use Car\Entity\Model;
use Car\Entity\Modification;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use User\Entity\Role;
use User\Entity\User;
use Zend\Crypt\Password\Bcrypt;

class LoadBrands extends BaseFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        $brandsData = [
            [
                'name' => 'Audi',
                'models' => [
                    [
                        'name' => 'A3',
                        'generations' => [
                            [
                                'name' => 'Typ 8L',
                                'yearFrom' => 1996,
                                'yearTo' => 2003,
                                'modifications' => []
                            ],
                            [
                                'name' => 'Typ 8P',
                                'yearFrom' => 2003,
                                'yearTo' => 2012,
                                'modifications' => []
                            ],
                            [
                                'name' => 'Typ 8V',
                                'yearFrom' => 2012,
                                'yearTo' => 0,
                                'modifications' => [
                                    ['name' => '1.4 TFSI MT'],
                                    ['name' => '1.4 TFSI AMT'],
                                    ['name' => '1.4 TFSI MT 150 hp'],
                                    ['name' => '1.4 TFSI AMT 150 hp'],
                                    ['name' => '1.8 TFSI MT'],
                                    ['name' => '1.8 TFSI AMT'],
                                    ['name' => '1.8 TFSI quattro AMT'],
                                    ['name' => '2.0 TDI AMT'],
                                    ['name' => '2.0 TFSI AMT'],
                                    ['name' => '2.0 TFSI quattro AMT'],
                                ]
                            ],
                        ]
                    ],
                    [
                        'name' => 'A4',
                        'generations' => []
                    ],
                    [
                        'name' => 'A5',
                        'generations' => []
                    ],
                    [
                        'name' => 'A5 Sportback',
                        'generations' => []
                    ],
                ]
            ],
            [
                'name' => 'BMW',
                'models' => [
                    [
                        'name' => 'X1',
                        'generations' => []
                    ],
                    [
                        'name' => 'X3',
                        'generations' => []
                    ],
                    [
                        'name' => 'X4',
                        'generations' => []
                    ],
                    [
                        'name' => 'X5',
                        'generations' => []
                    ],
                    [
                        'name' => 'X6',
                        'generations' => []
                    ],
                ]
            ],
            [
                'name' => 'Mercedes',
                'models' => [
                    [
                        'name' => 'A Class',
                        'generations' => []
                    ],
                    [
                        'name' => 'B Class',
                        'generations' => []
                    ],
                    [
                        'name' => 'C Class',
                        'generations' => []
                    ],
                    [
                        'name' => 'E Class',
                        'generations' => []
                    ],
                ]
            ]
        ];

        foreach ($brandsData as $brandData) {
            $brand = new Brand();
            $brand->setName($brandData['name']);
            $this->entityManager->persist($brand);

            foreach ($brandData['models'] as $modelData) {
                $model = new Model();
                $model->setName($modelData['name']);
                $model->setBrand($brand);
                $this->entityManager->persist($model);

                foreach ($modelData['generations'] as $generationData) {
                    $generation = new Generation();
                    $generation->setName($generationData['name']);
                    $generation->setYearFrom($generationData['yearFrom']);
                    $generation->setYearTo($generationData['yearTo']);
                    $generation->setModel($model);
                    $this->entityManager->persist($generation);

                    foreach ($generationData['modifications'] as $modificationData) {
                        $modification = new Modification();
                        $modification->setName($modificationData['name']);
                        $modification->setGeneration($generation);
                        $this->entityManager->persist($modification);
                    }
                }
            }
        }

        $this->entityManager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return FixtureOrderHelper::LOAD_BRANDS;
    }
}