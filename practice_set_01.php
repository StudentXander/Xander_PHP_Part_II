<?php
/**
 * Calculates the total price of items in a shopping cart.
 *
 * @param array $items An array of items with 'name' and 'price'.
 *
 * @return float The total price of the items.
 */
function calculateTotalPrice(array $items): float {
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}

/**
 * Removes spaces and converts a string to lowercase.
 *
 * @param string $text The input string.
 *
 * @return string The modified string.
 */
function modifyString(string $text): string {
    $text = str_replace(' ', '', $text);
    return strtolower($text);
}

/**
 * Checks if a number is even or odd.
 *
 * @param int $number The number to check.
 *
 * @return string A message indicating whether the number is even or odd.
 */
function checkEvenOdd(int $number): string {
    if ($number % 2 == 0) {
        return "The number " . $number . " is even.";
    } else {
        return "The number " . $number . " is odd.";
    }
}

$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];

$totalPrice = calculateTotalPrice($items);
echo "Total price: $" . $totalPrice;

$string = "This is a poorly written program with little structure and readability.";
$modifiedString = modifyString($string);
echo "\nModified string: " . $modifiedString;

$number = 42;
$evenOddMessage = checkEvenOdd($number);
echo "\n" . $evenOddMessage;
?>