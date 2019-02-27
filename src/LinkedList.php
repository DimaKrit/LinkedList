<?php

class LinkedList
{
    /** @var SeparateNode */
    private $head = null;
    private $tail = null;

    // todo use tail
    public function append($value)
    {
        $newElement = new SeparateNode();
        $newElement->setValue($value);

        if (!empty($this->head)) {
            /** @var SeparateNode $lastElement */
            $lastElement = $this->head;
            // O(n)
            while (!empty($lastElement->getNext())) {
                $lastElement = $lastElement->getNext();
            }

            $lastElement->setNext($newElement);
        } else {
            $this->head = $newElement;
        }
    }

    public function prepend($value)
    {
        $obj = new SeparateNode();
        $obj->setValue($value);

        $headObj = $this->head;
        $obj->setNext($headObj);
        $this->head = $obj;
    }

    public function deleteFromHead()
    {
        if (empty($this->head)) {
            throw new RuntimeException("Notice");
        }

        $this->head = $this->head->getNext();
    }

    // todo use tail
    public function deleteFromEnd()
    {
        if (!empty($this->head)) {
            /** @var SeparateNode $lastElement */
            $lastElement = $this->head;
            $prev = null;
            // O(n)
            while (!empty($lastElement->getNext())) {
                $prev = $lastElement;
                $lastElement = $lastElement->getNext();
            } // end of the list
            $prev->setNext(null);
        } else {
            throw new RuntimeException('Notice');
        }
    }

    /**
     * @param null $at
     * @param null $value
     * @return bool
     */

    public function insertAfterAt($at = null, $value = null)
    {

        $newElement = new SeparateNode();
        $newElement->setValue($value);

        $current = $this->head;

        while ($current->getNext() !== null) {
            $value = $current->getValue();

            if ($value === $at) {
                break;
            }
            $current = $current->getNext();
        }
        if ($current !== null) {
            if ($current->getNext() !== null) {

                $newElement->setNext($current->getNext());
            }
            $current->setNext($newElement);

            return true;
        }
        return false;
    }


    /**
     * @param null $at
     * @param null $value
     */

    public function insertBeforeAt($at = null, $value = null)
    {
        $newElement = new SeparateNode();
        $newElement->setValue($value);

        if ($this->head !== null) {
            $previous = null;
            $current = $this->head;
            while ($current->getNext() !== null) {
                if ($current->getValue() == $at) {

                    $newElement->setNext($current);
                    //$previous->setPrevious($newElement);
                    $previous->setNext($newElement);

                    break;
                }
                $previous = $current;
                $current = $current->getNext();
            }
        }
    }

    /**
     * @param $at
     * @return bool
     */

	public function deleteAt($at)
	{
		if ($this->head !== null) {
			$previous = null;
			$current = $this->head;
			while ($current->getNext() !== null) {
				if ($current->getValue() === $at) {
					if ($previous === null) {
						$this->head = $current->getNext();
					} else {

						$previous->setNext($current->getNext());
					}
					return true;
				}
				$previous = $current;

				$current = $current->getNext();
			}
		}
		return false;
	}


    /**
     * @param int $n
     * @return bool|SeparateNode|null
     */

    public function search($n = 0)
    {
        if ($this->head !== null) {
            $current = $this->head;
            for ($i = 0; $i < $n; $i++) {
                $current = $current->getNext();
            }
            return $current;
        }
        return false;
    }

    /**
     * @return SeparateNode
     */

    public function current()
    {
        return $this->head;
    }


}