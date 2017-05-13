# Setup
Needs *php* and *phpunit*   
Refer to *script/setup.sh*

# Execute Code
Navigate to *src/*
```
cd src
```
Run *runner.php*
```
php runner.php
```
Modify *runner.php* as you wish

# Run tests
Navigate to *test/*
```
cd test
```
Run phpunit tests
```
phpunit *
```
Modify *TripSorterTest.php* as you wish

# Sorting Algorithm

Given **n** as the size of the Boarding Cards. The algorithm will run in **O(n)** complexity.

The first loop is to build a hash map of **links**. Each element in the **links** represent a location, with its starting and ending points. This loop also helps to determine which location is the starting point of the trip.

The second loop is to rearrange the cards based on the starting point & the **links** hash map found above.

Because the 2 loops are separated so total complexity is O(n).

Check out implementation in method **sort** of **TripSorter** class.`