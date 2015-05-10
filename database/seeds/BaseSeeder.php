<?php
use Faker\Generator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

abstract class BaseSeeder extends Seeder {

    protected static $pool;

    protected function createMultiple($total)
    {
        for($i = 0; $i <= $total; $i++)
        {
            $this->create();
        }
    }

    /**
     * @return Model
     */
    abstract protected function getModel();

    abstract protected function getDummyData(Generator $faker);

    protected function create(array $customData = array())
    {
        $faker = Faker::create();
        $data = array_merge($this->getDummyData($faker), $customData);

        return $this->addPool($this->getModel()->create($data));
    }

    protected function addPool($entity)
    {
        $reflection = new ReflectionClass($entity);
        $class = $reflection->getShortName();

        if ( ! $this->collectionExist($class))
        {
            static::$pool[$class] = new Collection();
        }

        static::$pool[$class]->add($entity);

        return $entity;
    }

    protected function getRandom($model)
    {
        if ( ! $this->collectionExist($model))
        {
            throw new Exception('Data not exist for model ' . $model);
        }

        return static::$pool[$model]->random();
    }

    protected function collectionExist($class)
    {
        return isset(static::$pool[$class]);
    }
}