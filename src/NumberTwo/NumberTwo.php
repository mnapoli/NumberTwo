<?php

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
     *
     * @return string
     */
    public static function dump($var, $depth = 2)
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

        if (is_array($var)) {
            if (count($var) === 0) {
                return '[]';
            }

            if ($depth === 0) {
                return '[ ... ]';
            }

            $contentDump = '';
            foreach ($var as $key => $value) {
                $keyDump = self::dump($key, 1);
                $valueDump = self::dump($value, $depth - 1);
                $contentDump .= $keyDump . ' => ' . $valueDump . PHP_EOL;
            }
            $contentDump = self::indent($contentDump);

            $dump = '[' . PHP_EOL . $contentDump . ']';

            return $dump;
        }

        return '';
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
}
