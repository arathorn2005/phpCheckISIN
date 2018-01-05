# phpCheckISIN
This is a simple class to check an ISIN with php.

The ISIN (International Securities Identification Number) is a code for stocks and bonds. Like many other codes like this, the ISIN too has a control value. 
How this works in theory, please read within [Wikipedia](https://de.wikipedia.org/wiki/Internationale_Wertpapierkennnummer).

## Usage

```php
$cv_test = new isin_validate("DE000BAY0017");
echo $cv_test->isin_check();
```

The result will be ```true``` if the check is succesful, otherwise ```false```.
