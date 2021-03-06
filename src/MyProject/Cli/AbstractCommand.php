<?php
/**
 * Created by PhpStorm.
 * User: triik
 * Date: 11/18/2018
 * Time: 2:14 PM
 */

namespace MyProject\Cli;


use MyProject\Exceptions\CliException;

abstract class AbstractCommand
{
    private $params;

    public function __construct(array $params)
    {
        $this->params = $params;
        $this->checkParams();
    }

    abstract public function execute();

    abstract protected function checkParams();

    protected function getParam(string $paramName)
    {
        return $this->params[$paramName] ?? null;
    }

    /**
     * @param string $paramName
     * @throws CliException
     */
    protected function ensureParamExists(string $paramName)
    {
        if (!isset($this->params[$paramName]))
        {
            throw new CliException('Param with name: '.$paramName.' is not set!');
        }
    }
}