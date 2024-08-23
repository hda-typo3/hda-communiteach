<?php

declare(strict_types=1);

namespace Hda\HdaCommuniteach\Domain\Repository;


/**
 * This file is part of the "HDA CommuniTeach" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023 Matthias Krappitz <matthias@aemka.de>, aemka
 */

/**
 * The repository for Activities
 */
class ActivityRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    
    /**
     * @var array
     */
    protected $defaultOrderings = [
        'publication_date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
    ];
    
    /**
     * Finds an object matching the given identifier.
     *
     * @param array $arguments
     * @return object The matching objects if found, otherwise NULL
     */
    public function findByArguments(array $arguments)
    {
        $query = $this->createQuery();
        // debug($arguments);
        
        // filter constraints are collected to be connected with OR to each other
        $filterConstraints = [];
        foreach ($arguments as $key => $value) {
            if (is_array($value) && count($value) > 0) {
                switch ($key) {
                    // internal AND
                    case 'didacticConcepts' :
                        $subConstraints = [];
                        foreach ($value as $item) {
                            $subConstraints[] = $query->contains('didacticConcepts', $item);
                        }
                        $filterConstraints[] = $query->logicalOr($subConstraints);
                        break;
                    // internal AND
                    case 'eventFormats' :
                        $subConstraints = [];
                        foreach ($value as $item) {
                            $subConstraints[] = $query->contains('eventFormats', $item);
                        }
                        $filterConstraints[] = $query->logicalOr($subConstraints);
                        break;
                    // internal OR because it's a single select in the model
                    case 'eventModes' :
                        $subConstraints = [];
                        foreach ($value as $item) {
                            $subConstraints[] = $query->equals('eventMode', $item);
                        }
                        $filterConstraints[] = $query->logicalOr($subConstraints);
                        break;
                    // internal OR because it's a single select in the model
                    case 'specialistClusters' :
                        $subConstraints = [];
                        foreach ($value as $item) {
                            $subConstraints[] = $query->contains('specialistClusters', $item);
                        }
                        $filterConstraints[] = $query->logicalOr($subConstraints);
                        break;
                }
            }
        }
        
        // search term constraints internally connected with OR
        $searchConstraints = [];
        if (isset($arguments['searchTerm']) && trim($arguments['searchTerm'])) {
            $searchConstraints[] = $query->logicalOr(
                $query->like('title', '%' . trim($arguments['searchTerm']) . '%'),
                $query->like('subtitle', '%' . trim($arguments['searchTerm']) . '%'),
                $query->like('didacticConcepts.title', '%' . trim($arguments['searchTerm']) . '%'),
                $query->like('eventFormats.title', '%' . trim($arguments['searchTerm']) . '%'),
                $query->like('eventMode.title', '%' . trim($arguments['searchTerm']) . '%'),
                $query->like('specialistClusters.title', '%' . trim($arguments['searchTerm']) . '%'),
                // $query->like('subtitle', '%' . trim($arguments['searchTerm']) . '%'),
                $query->like('teaser', '%' . trim($arguments['searchTerm']) . '%')
            );
        }
        
        // here filter constraints internally connected with OR are connected with search term constraints with AND
        $constraints = [];
        if (count($searchConstraints) > 0 || count($filterConstraints) > 0) {
            $constraints = $query->logicalAnd(
                $searchConstraints,
                ((count($filterConstraints) > 0) ? $query->logicalAnd($filterConstraints) : null)
            );
        }
        
        // this is the final query execution
        if ($constraints) {
            return $this->createQuery()
                ->matching ($constraints)
                ->execute();
        }
        return $this->findAll();
    }
    
}
