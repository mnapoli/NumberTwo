<?php

namespace Doctrine\Common\Collections
{
    interface Collection
    {
        public function toArray();
    }

    class ArrayCollection implements Collection
    {
        public function toArray()
        {
            return array('foo');
        }
    }
}
