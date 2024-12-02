<?php

$file = new SplFileObject("input.txt");
while($line = $file->fgets())
{
	$values = explode("  ", trim($line));

	$list1[] = (int) $values[0];
	$list2[] = (int) $values[1];
}


sort($list1);
sort($list2);

$sum = 0;
foreach ($list1 as $key => $value)
{
	$sum += abs($list1[$key] - $list2[$key]);
}


echo $sum . "\n";



$sum = 0;
foreach ($list1 as $value)
{
	$count = 0;
	foreach ($list2 as $value2)
	{
		if ($value2 === $value)
		{
			$count++;
		}
	}

	$sum += ($value * $count);
}

echo $sum . "\n";