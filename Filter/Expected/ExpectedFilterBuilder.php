<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mv
 * Date: 04/05/13
 * Time: 22:14
 * To change this template use File | Settings | File Templates.
 */

namespace Cannibal\Bundle\FilterBundle\Filter\Expected;

use Cannibal\Bundle\FilterBundle\Filter\Expected\ExpectedFilterFactory;

use Cannibal\Bundle\FilterBundle\Filter\Expected\ExpectedFilterBuildContextInterface;

class ExpectedFilterBuilder
{
    private $expectedFactory;
    private $currentCollection;

    public function __construct(ExpectedFilterFactory $expectedFactory)
    {
        $this->expectedFactory = $expectedFactory;
    }

    /**
     * @return \Cannibal\Bundle\FilterBundle\Filter\Expected\ExpectedFilterBuildContextInterface
     */
    public function createFilters()
    {
        $this->currentCollection = $this->createExpectedFilterCollection();

        return $this;
    }

    public function createExpectedFilterCollection()
    {
        return $this->getExpectedFactory()->createExpectedFilterCollection();
    }

    public function setExpectedFactory($expectedFactory)
    {
        $this->expectedFactory = $expectedFactory;
    }

    public function getExpectedFactory()
    {
        return $this->expectedFactory;
    }

    /**
     * @param $name
     * @param $type
     * @param array $config
     * @return \Cannibal\Bundle\FilterBundle\Filter\Expected\ExpectedFilterBuildContextInterface
     */
    public function add($name, $type, array $config = array())
    {
        $out = $this->getExpectedFactory()->createExpectedFilter($name);

        $out->setType($type);

        foreach($config as $name => $value){
            $out->setConfig($name, $value);
        }

        return $this;
    }
}