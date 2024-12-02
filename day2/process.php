<?php

$file = new SplFileObject("./input.txt");

$safe = 0;
while($line = $file->fgets())
{
	$values = explode(" ", trim($line));

	if (isIncreasing($values) || isDecresing($values))
	{
		$safe++;
		continue;
	}

	for($i=0; $i<count($values); $i++) {
		$copyValues = $values;
		unset($copyValues[$i]);
		if (isIncreasing($copyValues) || isDecresing($copyValues)) {
			$safe++;
			continue 2;
		}
	}


}

echo $safe;


function isIncreasing(array $values, $mostlyBy = 3): bool
{
	$lastValue = null;
	foreach ($values as $value)
	{
		if ($lastValue === null)
		{
			$lastValue = $value;
			continue;
		}

		if ($lastValue >= $value)
		{
			return false;
		}

		if ($value - $lastValue > $mostlyBy)
		{
			return false;
		}

		$lastValue = $value;
	}

	return true;
}

function isDecresing(array $values, $mostlyBy = 3): bool
{
	$lastValue = null;
	foreach ($values as $value)
	{
		if ($lastValue === null)
		{
			$lastValue = $value;
			continue;
		}

		if ($lastValue <= $value)
		{
			return false;
		}

		if ($lastValue - $value > $mostlyBy)
		{
			return false;
		}

		$lastValue = $value;
	}

	return true;
}