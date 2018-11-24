<?php

namespace App\Helpers\Fakers;


use App\Models\Field;

/**
 * Class FieldFakerHelper
 * @package App\Helpers\Fakers
 */
class FieldFakerHelper
{
    /**
     * To generate dummy titles for fields, Faker has to know the type, As this functionality will be reused, It has been extracted here.
     *
     * @param $faker
     * @param $type
     * @return string
     */
    public static function getValue($faker, $type)
    {
        switch ($type) {
            case Field::TYPE['DATE'] == $type:
                $value = $faker->date;
                break;
            case Field::TYPE['NUMBER'] == $type:
                $value = $faker->numberBetween;
                break;
            case Field::TYPE['STRING'] == $type:
                $value = $faker->sentence;
                break;
            case Field::TYPE['BOOLEAN'] == $type:
                $value = $faker->boolean;
                break;
            default:
                $value = 'UNDEFINED';
        }

        return $value;
    }
}