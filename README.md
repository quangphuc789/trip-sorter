Note: read best at (github)[https://github.com/quangphuc789/trip-sorter]

# Setup
Needs *php 5.5* and *phpunit 4.8* installed
Refer to *script/setup.sh* for ubuntu environment

# Execute Code
Navigate to *src/*
```
cd src
```
Run *runner.php*
```
php runner.php
```
Modify *runner.php* as you wish to modify input data

# Run tests
Navigate to *root folder* and run phpunit tests
```
phpunit test/*
```
Modify test files in */test* as you wish to modify the suites

# Sorting Algorithm

Given **n** as the size of the Boarding Cards. The algorithm will run in **O(n)** complexity.

The first loop is to build a hash map of **$locationHashMap**. Each element in the **$locationHashMap** represents a location, with its starting and ending index, with respect to the input cards. This loop also helps to determine which location is the initial departure of the whole trip. Complexity: O(n).

The second loop is to rearrange the cards based on the starting point & the **$locationHashMap** hash map found above. Complexity: O(n).

**Example**

The list of cards:
1. From B to C
2. From A to B
3. From C to D

After the first loop, identifies:   
* Initial Departure: A  
* $locationHashMap: 
    + [A] {startIndex: 2, endIndex: null}       
    + [B] {startIndex: 1, endIndex: 2}          
    + [C] {startIndex: 3, endIndex: 1}      

Second loop:
* Start from **A**, add **A** to result list, then move to card 2 (startIndex in hash map)  
* From card **2**, add **B** to result list, then move to card 1 (startIndex in hash map)   
* From card **1**, add **C** to result list, then move to card 3 (startIndex in hash map)   
* From card **3**, add **D** to result list, then move to card 3 (startIndex in hash map)       

The 2 loops are separated so total complexity is O(n).

Check out implementation in method **sort** of **TripSorter** class.