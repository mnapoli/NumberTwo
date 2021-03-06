<?php
/**
 * NumberTwo
 *
 * @link      https://github.com/mnapoli/NumberTwo
 * @copyright Matthieu Napoli (http://mnapoli.fr/)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 */

namespace NumberTwo;

/**
 * NumberTwo is a classy variable dumper.
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class NumberTwo
{
    const TAB = '    ';

    /**
     * Returns a string representation of the variable.
     *
     * @param mixed $var
     * @param int   $depth
     * @param array $filters Array of filters for displaying specific classes
     *
     * @return string
     */
    public static function dump($var, $depth = 2, array $filters = array())
    {
        // Null
        if (is_null($var)) {
            return 'null';
        }

        // Boolean
        if (is_bool($var)) {
            if ($var === false) {
                return 'false';
            }
            return 'true';
        }

        // String
        if (is_string($var)) {
            return '"' . $var . '"';
        }

        // Scalar
        if (is_scalar($var)) {
            return (string) $var;
        }

        // Array
        if (is_array($var)) {
            return self::dumpArray($var, $depth, $filters);
        }

        // Class filters
        foreach ($filters as $filter) {
            /** @var Filter $filter */
            $className = $filter->getClassName();

            if ($var instanceof $className) {
                $var = $filter->filter($var);
            }

            // If it's not an object anymore, restart from scratch
            if (! is_object($var)) {
                return self::dump($var, $depth, $filters);
            }
        }

        // Object
        return self::dumpObject($var, $depth, $filters);
    }

    /**
     * Indents a block of lines
     * @param string $dump
     * @return string
     */
    protected static function indent($dump)
    {
        $lines = explode(PHP_EOL, $dump);

        // Removes last empty line
        $lastIndex = count($lines) - 1;
        unset($lines[$lastIndex]);

        // Add an indentation level for each line
        $lines = array_map(function($line) { return self::TAB . $line; }, $lines);

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    /**
     * @param array $var
     * @param int   $depth
     * @param array $filters
     * @return string
     */
    private static function dumpArray($var, $depth, $filters)
    {
        if (count($var) === 0) {
            return 'array(0)';
        }

        if ($depth === 0) {
            $count = count($var);
            return "array($count)";
        }

        $contentDump = '';
        foreach ($var as $key => $value) {
            $keyDump = self::dump($key, 1, $filters);
            $valueDump = self::dump($value, $depth - 1, $filters);
            $contentDump .= $keyDump . ' => ' . $valueDump . PHP_EOL;
        }
        $contentDump = self::indent($contentDump);

        $dump = '[' . PHP_EOL . $contentDump . ']';

        return $dump;
    }

    /**
     * @param object $var
     * @param int $depth
     * @param array $filters
     * @return string
     */
    private static function dumpObject($var, $depth, $filters)
    {
        $class = get_class($var);

        if ($depth === 0) {
            return $class . ' { ... }';
        }

        $reflectionClass = new \ReflectionClass($var);
        $properties = $reflectionClass->getProperties();

        if (count($properties) === 0) {
            return $class . ' { }';
        }

        $contentDump = '';
        foreach ($properties as $property) {
            if ($property->isPrivate() || $property->isProtected()) {
                $property->setAccessible(true);
            }

            $valueDump = self::dump($property->getValue($var), $depth - 1, $filters);
            $contentDump .= $property->getName() . ': ' . $valueDump . PHP_EOL;
        }
        $contentDump = self::indent($contentDump);

        $dump = $class . ' {' . PHP_EOL . $contentDump . '}';

        return $dump;
    }
}
